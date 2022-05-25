<?php
$logou;

use User\Usuario;
use DAO\UserDAO;

if (count($_POST) > 2) {
    //adiciona usuarios
    if (($_POST["password"] === $_POST["cPassword"])) {
        session_start();
        if (newUser() == 1) {
            $resultado["msg"] = "Usuario adicionado com sucesso";
            $resultado["cod"] = 1;
        } else if (newUser() == 2) {
            $resultado["msg"] = "Erro";
            $resultado["cod"] = 2;
        } else if (newUser() == 3) {
            $resultado["msg"] = "O usuario ja foi associado ao SIAR-IMOB";
            $resultado["cod"] = 2;
        }
        unset($_POST);
        include('../view/Cadastro2.php');
    } else {
        $resultado["msg"] = "Erro, as palvras passes devem ser iguais!!";
        $resultado["cod"] = 2;
        unset($_POST);
        include('../view/Cadastro2.php');
    }
} else {
    //Procura eriicar a veracidade das credenciais 
    require_once '../model/model.DAO/UsuarioDAO.php';
    $am = new UserDAO();
    if ($am->login($_POST)) {
        header('location: ../view/Home.php');
    } else {
        unset($_POST);
        $resultado["msg"] = "Email ou palavra passe errado/a!";
        $resultado["cod"] = 2;
        include('../view/Login.php');
    }
}


function newUser()
{
    require_once '../model/Usuario.php';
    $novoUser = new Usuario();

    $novoUser->setNome($_POST["nome"]);
    $novoUser->setMail($_POST["email"]);
    $novoUser->setPass($_POST["password"]);
    $novoUser->setBi($_POST["bi"]);
    $novoUser->setDataNasc($_POST["dataNasc"]);
    $novoUser->setTelefone($_POST["Telefone"]);

    require_once '../model/model.DAO/UsuarioDAO.php';
    $am = new UserDAO();

    if (verificar($novoUser)) :
        $meteu = $am->insert($novoUser);
        if ($meteu) {
            return 1;
        } else {
            return 2;
        }
    else :
        return 3;
    endif;
}

function verificar($novoUser)
{
    require_once '../model/model.DAO/UsuarioDAO.php';
    $am = new UserDAO();
    $novoUser2 = new Usuario();
    $userA_serAdicionado = new Usuario();
    $todosUsuarios = $am->select();

    $userA_serAdicionado->setNome($novoUser->getNome());
    $userA_serAdicionado->setMail($novoUser->getMail());
    $userA_serAdicionado->setPass($novoUser->getPass());
    $userA_serAdicionado->setBi($novoUser->getBi());
    $userA_serAdicionado->setDataNasc($novoUser->getDatanasc());
    $userA_serAdicionado->setTelefone($novoUser->getTelfone());

    foreach ($todosUsuarios as $t) {
        /**
         * novoUser2 e o objecto que vem do banco de dados
         */
        $novoUser2->setNome($t["nome"]);
        $novoUser2->setMail($t["email"]);
        $novoUser2->setPass($t["palavraPasse"]);
        $novoUser2->setBi($t["num_bi"]);
        $novoUser2->setDataNasc($t["datanasc"]);
        $novoUser2->setTelefone($t["telefone"]);


        if ($userA_serAdicionado == $novoUser2) {
            return false;
        }
    }
    return true;
}
