<?php

namespace DAO;

use Conexao\Conectar;
use PDOException;
use PDO;

class UserDAO
{

    private $conexao;
    private $conn;
    function __construct()
    {
        require_once '../controller/controller.conexao/Connection.php';
        $this->conn = new Conectar();
    }

    function insert($usuario)
    {

        try {
            $this->conexao = $this->conn->conecta();
            $sql = "INSERT INTO USUARIO (nome, email, palavraPasse, num_bi, datanasc, telefone) VALUES (?,?,?,?,?,?)";
            $stmt = $this->conexao->prepare($sql);

            $stmt->execute([
                $usuario->getNome(), $usuario->getMail(), $usuario->getPass(),
                $usuario->getBi(), $usuario->getDatanasc(), $usuario->getTelfone()
            ]);

            return true;
        } catch (PDOException $e) {
        }
    }

    function select()
    {
        try {
            $this->conexao = $this->conn->conecta();
            $sql = "SELECT nome, email, palavraPasse, num_bi, datanasc, telefone FROM USUARIO";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOException $e) {
        }
    }

    function login($credenciais)
    {
        try {
            $this->conexao = $this->conn->conecta();

            $stmt = $this->conexao->prepare("SELECT * FROM USUARIO WHERE email=:email AND palavraPasse=:senha");
            $stmt->bindParam(':email', $credenciais["email"], pdo::PARAM_STR);
            $stmt->bindParam(':senha', $credenciais["password"], pdo::PARAM_STR);
            $stmt->execute();

            $usuarioEncontrado = $stmt->fetchAll();
            
            if(count($usuarioEncontrado)==1){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
        }
    }
}
