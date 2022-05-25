<?php

namespace DAO;

use Conexao\Conectar;
use PDOException;
use PDO;

class BairroDAO
{

    private $conexao;
    private $conn;
    function __construct()
    {
        require_once '../controller/controller.conexao/Connection.php';
        $this->conn = new Conectar();
    }
    function insert($bairro)
    {
        try {
            $this->conexao = $this->conn->conecta();
            $sql = "INSERT INTO bairro (nome) VALUES (?)";
            $stmt = $this->conexao->prepare($sql);

            $stmt->execute([$bairro->getNome()]);

            return true;
        } catch (PDOException $e) {
        }
    }

    function verify($nome){
        try {
            $this->conexao = $this->conn->conecta();

            $stmt = $this->conexao->prepare("SELECT * FROM bairro WHERE nome=:nome");
            $stmt->bindParam(':nome', $nome, pdo::PARAM_STR);
            $stmt->execute();

            $usuarioEncontrado = $stmt->fetchAll();
            if(count($usuarioEncontrado)==1){
                return true;
            }else{
                return "falso";
            }
        } catch (PDOException $e) {
        }
    }

    
    function select()
    {
        try {
            $this->conexao = $this->conn->conecta();
            $sql = "SELECT * FROM bairro";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOException $e) {
        }
    }
}
