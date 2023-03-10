<?php
require_once("Connection.class.php");

class JsonConnection extends Connection{

    private $rutaFile;

    public function __construct($ruta){
        $this->rutaFile = $ruta;
    }

    public function getConnection(){
        $data = file_get_contents($this->rutaFile);
        return json_decode($data, true);//return data json.
    }
   
}