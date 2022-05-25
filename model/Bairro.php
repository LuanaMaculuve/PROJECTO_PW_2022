<?php

namespace Bairro;

class Bairro{
    private $nome;

    public function setNome($nome){
        $this->nome=$nome;
    }

    public  function getNome(){
        return $this->nome;
    }
}