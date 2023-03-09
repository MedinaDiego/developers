<?php
require_once("Connection.class.php");

class MySqlConnection extends Connection{

    private $host;
    private $port;
    private $user;
    private $password;
    private $database;

    public function __construct(){
        $this->host = "localhost";
        $this->port = "3306";
        $this->user = "rccr";
        $this->password = "rccr";
        $this->database = "optica";
    }

    public function getConnection(){
        try {
            $conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->database", $this->user,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

    }
}