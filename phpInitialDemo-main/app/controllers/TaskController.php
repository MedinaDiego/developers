<?php
require_once (ROOT_PATH."/app/models/TaskModel.class.php");

class TaskController extends ApplicationController
{
    public function uitaskAction()
    {
        //echo "";
    }  

    public function obtenerTasks(){
        $objTask = new TaskModel();
        $tareas = $objTask->getTasksByUser($_SESSION["sys_idUsuario"]);
        return $tareas;
    }

    public function nuevoTask(){
        $inicio         = $_POST["txtinicio"];
        $fin            = $_POST["txtfin"];
        $nombre         = $_POST["txtnombre"];
        $descripcion    = $_POST["txtdescripcion"];
        $observaciones  = $_POST["txtobservaciones"];
        
        $objTask = new TaskModel();
        $objTask->addTask($inicio, $fin, $nombre, $descripcion, $observaciones, $usuario);
    }

    public function editarTask(){
        $idTarea        = $_POST["txtIdTarea"];
        $inicio         = $_POST["txtinicio"];
        $fin            = $_POST["txtfin"];
        $nombre         = $_POST["txtnombre"];
        $descripcion    = $_POST["txtdescripcion"];
        $observaciones  = $_POST["txtobservaciones"];
        $estado         = $_POST["txtestado"];
        
        $objTask = new TaskModel();
        $objTask->editTask($idTarea, $inicio, $fin, $nombre, $descripcion, $observaciones, $estado);
    }
    
    public function deleteTask(){
        $objTask = new TaskModel();
        $objTask->deleteTask($_POST["txtIdTarea"]);
    }

}