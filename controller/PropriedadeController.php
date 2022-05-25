<?php

use Prop\Propriedade;
use DAO\PropriedadeDAO;

if (isset($_POST) >= 4) {
    //Nesse if abaixo, tem que se comparar a senha introduzida com a senha que tera sido armazenada na variavel $_Session[]
    //if()
    newProps();
}

function newProps(){
    require_once '../model/Propriedade.php';
    $prop= new Propriedade();

    $prop->setBairro($_POST["bairro"]);
    $prop->setTipo($_POST["tipoProp"]);
    $prop->setEstado("Disponivel");

    require_once '../model/model.DAO/PropriedadeDAO.php';
    $am = new PropriedadeDAO();

    $inicio = $am->select();
    $am->insert($prop, $_POST["qtd"], count($inicio));
}
