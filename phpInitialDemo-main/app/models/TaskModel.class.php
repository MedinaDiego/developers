<?php
require_once("database/JsonConnection.class.php");

class TaskModel{
    private $idTarea;
    private $inicio;
    private $fin;
    private $nombre;
    private $descripcion;
    private $observaciones;
    private $estado;
    private $usuario;
    
    public function __construct(){

    }

    public function createTask($inicio, $fin, $nombre, $descripcion, $observaciones, $usuario){
        $obj = new TaskModel();
        $obj->idTarea = 10; //crear metodo que devolvera un nuevo ID (correlativo).
        $obj->inicio = $inicio;
        $obj->fin = $fin;
        $obj->nombre = $nombre;
        $obj->descripcion = $descripcion;
        $obj->observaciones = $observaciones;
        $obj->usuario = $usuario;
        return $obj;
    }

    public function getTasks($usuario){
        $objJsonConn = new JsonConnection(ROOT_PATH . '/app/models/database/tareas.json');
        $dataTareas = $objJsonConn->getConnection();
        $arrayTareas = array();
        foreach($dataTareas as $tareas){
            foreach($tareas as $tarea){
                if($tarea["usuario"] == $usuario){
                    array_push($arrayTareas,$tarea);  
                }
            } 
        }
        return $arrayTareas;
    }

    public function addTask(){
    }
    public function editTask(){        
    }
    public function deleteTask(){        
    }

}