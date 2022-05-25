<?php

namespace Typ;

class Tipo{
    
    private $nome, $imagem, $bairro, $descricao, $renda, $categoria;
    
    
    public function setNome($nome){
        $this->nome=$nome;
    }

    
    public function setdescricao($descricao){
        $this->descricao=$descricao;
    }

    
    public function setImagem($imagem){
        $this->imagem=$imagem;
    }

    
    public function setBairro($bairro){
        $this->bairro=$bairro;
    }

    public function setRenda($renda){
        $this->renda=$renda;
    }

    public function setCategoria($categoria){
        $this->categoria=$categoria;
    }


    public function getNome(){
        return $this->nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getImagem(){
        return $this->imagem;
    }

    public function getRenda(){
        return $this->renda;
    }
    
    public function getCategoria(){
        return $this->categoria;
    }

    public function getBairro(){
        return $this->bairro;
    }
}
