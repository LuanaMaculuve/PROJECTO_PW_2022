<?php

namespace Conexao;


use PDO;
use PDOException;

class Conectar
{
    function conecta()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbpw";

        try {
            $conn =  new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo"PROBLEMAS DE CONEXAO";
        }
    }
}
