<?php

use Typ\Tipo;
use DAO\TipoDAO;
use DAO\PropriedadeDAO;
use upimg\uploadImg;

if (isset($_POST) >= 4 && isset($_FILES['img'])) {

    require_once '../controller/upload_Img.php';
    $upimg = new uploadImg();
    $new_img_name = $upimg->urlImg($_FILES);

    if (!empty($new_img_name)) {
        $resultado = novoTipo($new_img_name);
        include("../view/RegistarTipo.php");
    } else {
        $resultado["msg"] = "Erro";
        $resultado["cod"] = 2;
        include("../view/RegistarTipo.php");
    }
}

if (isset($_GET)) {
    if (isset($_POST['id']) && $_POST['id'] != null) {
        $resultado = update();
        include("../view/RegistarTipo.php");
    } else if ($_GET['idTipo'] != null) {
        $resultado = removerTipo();
        unset($_GET);
        include("../view/RegistarTipo.php");
    }
}


function novoTipo($new_img_name)
{
    require_once "../model/Tipo.php";
    $tipo = new Tipo();

    $tipo->setNome($_POST["nome"]);
    $tipo->setBairro($_POST["bairros"]);
    $tipo->setCategoria($_POST["gridRadios"]);
    $tipo->setdescricao($_POST["descriacao"]);
    $tipo->setRenda($_POST["renda"]);
    $tipo->setImagem($new_img_name);

    require_once '../model/model.DAO/TipoDAO.php';
    $am = new TipoDAO();
    $guarda = $am->verify($_POST["nome"], $_POST["bairros"]);
    unset($_POST);
    if ($guarda == "falso") :
        return $am->insert($tipo);
    else :
        $resultado["msg"] = "Ja existe uma propriedade com esse nome";
        $resultado["cod"] = 1;
        return $resultado;
    endif;
}


function removerTipo()
{
    require_once '../model/model.DAO/PropriedadeDAO.php';
    $am = new PropriedadeDAO();
    $tipoEncontrado = $am->verify($_GET['idTipo']);

    if ($tipoEncontrado == "falso") {
        require_once '../model/model.DAO/TipoDAO.php';
        $am = new TipoDAO();

        $nome = $_GET['idTipo'];
        $mensagem = $am->remover($nome);
        return $mensagem;
    } else {
        $resultado["msg"] = "Tem casas relacionadas a esse tipo,nao e possivel remover!";
        $resultado["cod"] = 2;
        return $resultado;
    }
}

function update()
{
    //eh normal o usuario usaurio apagar os dados do formulario  submeter, entao esse algoritmo 
    //ajuda a controloar se os dados estao preenchidos ou nao
    $naonulo = 1;

    if ($_POST['nome'] != null) {
        $naonulo = 2;
    }
    if ($_POST['renda'] != null) {
        $naonulo = 2;
    }
    if ($naonulo != 1) {
        require_once '../model/model.DAO/TipoDAO.php';
        $am = new TipoDAO();
        $mensagem = $am->update();
        unset($_POST);
        return $mensagem;
    }else{
        $resultado["msg"] = "Erro ao fazer actualizacao, dados nao preenchidos corretamente!";
        $resultado["cod"] = 2;
        return $resultado;
    }
}
