<?php

namespace Prop;

class Propriedade
{

    private $bairro, $tipo, $codigo, $estado;

    public function setEstado($estado){
        $this->estado=$estado;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setCodigo($cod)
    {
        $this->codigo = $cod;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }
}
