<?php

use Bairro\Bairro;
use DAO\BairroDAO;

if (count($_POST) >= 1) {

    newBairro();
}

function newBairro()
{
    require_once '../model/Bairro.php';
    $bairro = new Bairro();

    $bairro->setNome($_POST["bairro"]);
    require_once '../model/model.DAO/BairroDAO.php';
    $am = new BairroDAO();
    $guarda = $am->verify($bairro->getNome());
    
    if ($guarda == "falso") :
        return $am->insert($bairro);
    else :
        echo "falsosssss";
    endif;
}
