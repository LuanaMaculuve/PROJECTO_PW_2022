<?php

namespace DAO;

use Conexao\Conectar;
use PDOException;
use pdo;

class PropriedadeDAO
{

    private $conexao;
    private $conn;
    private $bb;
    function __construct()
    {
        require_once '../controller/controller.conexao/Connection.php';
        $this->conn = new Conectar();
    }

    function insert($Prop, $qtd, $inicio)
    {
        $bb = $Prop->getBairro();
        for ($i = 1; $i <= $qtd; $i++) {
            $Prop->setCodigo($bb."#".$inicio);
 
            try {
                $this->conexao = $this->conn->conecta();
                $sql = "INSERT INTO propriedades (id, bairro,tipo, estado) VALUES (?,?,?,?)";
                $stmt = $this->conexao->prepare($sql);

                $stmt->execute([$Prop->getCodigo(), $Prop->getBairro(), $Prop->getTipo(), $Prop->getEstado()]);
            } catch (PDOException $e) {
            }
            $inicio++;
        }
    }

    function select()
    {
        try {
            $this->conexao = $this->conn->conecta();
            $sql = "SELECT * FROM propriedades";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOException $e) {
        }
    }

    function verify($nome){
        try {
            $this->conexao = $this->conn->conecta();

            $stmt = $this->conexao->prepare("SELECT * FROM propriedades WHERE Tipo=:Tipo");
            $stmt->bindParam(':Tipo', $nome, pdo::PARAM_STR);
            $stmt->execute();

            $tipoEncontrado = $stmt->fetchAll();
            if(count($tipoEncontrado)>=1){
                //Isso significa que o tipo que se deseja eliminar, tem propriedades entao nao se pode eliminar
                return true;
            }else{
                //Isso significa que pode eliminar sem problemas o tipo.
                return "falso";
            }
        } catch (PDOException $e) {
        }
    }
}
