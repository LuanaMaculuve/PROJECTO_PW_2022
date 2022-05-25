<?php

namespace DAO;

use Typ\Tipo;
use Conexao\Conectar;
use PDOException;
use PDO;

class TipoDAO
{

    private $conexao;
    private $conn;
    function __construct()
    {
        require_once '../controller/controller.conexao/Connection.php';
        $this->conn = new Conectar();
    }
    
    function insert($tipo)
    {

        try {
            $this->conexao = $this->conn->conecta();
            $sql = "INSERT INTO tiposDePropriedade (nome, bairro, renda, categoria, imgurl, descricao) VALUES (?,?,?,?,?,?)";
            $stmt = $this->conexao->prepare($sql);

            $stmt->execute([
                $tipo->getNome(), $tipo->getBairro(), $tipo->getRenda(),
                $tipo->getCategoria(), $tipo->getImagem(), $tipo->getDescricao()
            ]);

            $resultado["msg"] = " Tipo de propriedade adicionado com sucesso";
            $resultado["cod"] = 1;
            return $resultado;
        } catch (PDOException $e) {
            $resultado["msg"] = " Erro".$e;
            $resultado["cod"] = 2;
            return $resultado;
        }
    }

    function verify($nome, $bairro)
    {
        try {
            $this->conexao = $this->conn->conecta();

            $stmt = $this->conexao->prepare("SELECT * FROM tiposDePropriedade WHERE nome=:nome AND bairro=:bairro");
            $stmt->bindParam(':nome', $nome, pdo::PARAM_STR);
            $stmt->bindParam(':bairro', $bairro, pdo::PARAM_STR);
            $stmt->execute();

            $usuarioEncontrado = $stmt->fetchAll();
            if (count($usuarioEncontrado) == 1) {
                return true;
            } else {
                return "falso";
            }
        } catch (PDOException $e) {
        }
    }

    function select()
    {
        try {
            $this->conexao = $this->conn->conecta();
            $sql = "SELECT * FROM tiposDePropriedade";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOException $e) {
        }
    }


    function remover($nome)
    {
        try {
            $this->conexao = $this->conn->conecta();
            $sql = "DELETE FROM tiposDePropriedade WHERE id =" . $nome;
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            $resultado["msg"] = " Tipo de dropriedade removido com sucesso";
            $resultado["cod"] = 1;
            return $resultado;
        } catch (PDOException $e) {
            $resultado["msg"] = " Erro ao Remover Tipo De Propriedade".$e;
            $resultado["cod"] = 2;
            return $resultado;
        }
    }


    function update()
    {
        try {
            $this->conexao = $this->conn->conecta();

            $sql = "UPDATE tiposDePropriedade SET nome=?, renda=? WHERE id =?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute([$_POST['nome'], $_POST['renda'], $_POST['id']]);

            $resultado["msg"] = "Actualizacao feita com sucesso";
            $resultado["cod"] = 1;
            return $resultado;
        } catch (PDOException $e) {
            $resultado["msg"] = "Erro".$e;
            $resultado["cod"] = 2;
            return $resultado;
        }
    }
}
