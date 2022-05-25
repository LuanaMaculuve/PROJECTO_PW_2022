<?php

namespace User;

class Usuario
{
    private $nome;
    private $email;
    private $password;
    private $bi;
    private $datanasc;
    private $telefone;

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setMail($email)
    {
        $this->email = $email;
    }

    public function setPass($pass)
    {
        $this->password = $pass;
    }

    public function setBi($bi)
    {
        $this->bi = $bi;
    }

    public function setDataNasc($datanasc)
    {
        $this->datanasc = $datanasc;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getMail()
    {
        return $this->email;
    }

    public function getPass()
    {
        return $this->password;
    }

    public function getBi()
    {
        return $this->bi;
    }

    public function getDatanasc()
    {
        return $this->datanasc;
    }

    public function getTelfone()
    {
        return $this->telefone;
    }
}
