<?php
//require_once("Connection.class.php");
require_once(ROOT_PATH ."/lib/base/Model.php");

//todo_app
//medina29
//00q&mO67o
class MySqlConnection extends Model{

    //private $host;
    private $port;
    
    //private $password;
    private $database;
    private $servername;
    private $username;
    private $password;

    public function __construct(){
        $this->servername = "localhost";
        $this->port = "3306";
        $this->username = "medina29";
        $this->password = "00q&mO67o";
        $this->database = "todo_app";
    }

    public function getConnection($sql){
        try {
        $conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->database."", $this->username, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        $result = $conn->exec($sql);
        //echo "Connected successfully";
        return $result;
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        echo "Connection failed: " . $e->getMessage();
        }

    }
}