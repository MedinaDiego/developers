<?php 

class conexion{

    private $conexion;
    public function __construct()
    {
      $this->conexion = new mysqli('localhost', 'root','','');
    }

    public function getUsers(){
        $query = $this->conexion->query("");
        $response = [];
        $i=0;
        while($fila = $query->fetch_assoc()){
            $response[$i] = $fila;
            $i++;
        }
    }
}

?>