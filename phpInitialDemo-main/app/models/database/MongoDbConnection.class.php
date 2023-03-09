<?php 
require_once("Connection.class.php");
require 'vendor/autoload.php';
use MongoDB\Client as Mongo;

class MongoDbConnection extends Connection{

    private $host;
    private $port;
    private $database;

    public function __construct(){
        $this->host = "localhost";
        $this->port = "3306";
        $this->database = "optica";
    }

    public function getConnection(){      
        try{
            $mongo = new Mongo("mongodb://".$this->host.":".$this->port);
            return $mongo->$this->database;
        }catch(Exception $e){
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }

}









