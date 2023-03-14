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
        $tareas = $objTask->getTasks($_SESSION["sys_idUsuario"]);
        return $tareas;
    }

    public function nuevoTask(){

    }
    public function editarTask(){

    }
    public function deleteTask(){
        echo "";

    }

}