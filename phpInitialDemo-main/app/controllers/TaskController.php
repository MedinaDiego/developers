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

    public function obtenerTask(){
        $objTask = new TaskModel();
        $tarea = $objTask->getTask($_POST["txtIdTarea"]);
        return $tarea;
    }

    public function nuevoTask(){
        $inicio         = $_POST["txtinicio"];
        $fin            = $_POST["txtfin"];
        $nombre         = $_POST["txtnombre"];
        $descripcion    = $_POST["txtdescripcion"];
        $observaciones  = $_POST["txtobservaciones"];
        
        $objTask = new TaskModel();
        $resp = $objTask->addTask($inicio, $fin, $nombre, $descripcion, $observaciones, $usuario);
        
        if($resp["msj"]=="success"){
            echo "<script>Se grabó correctamente :)</script>";
        }else{
            echo "<script>No se ha podido grabar :(</script>";
        }
        header("Location: ".WEB_ROOT."/main");
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
        $resp =  $objTask->editTask($idTarea, $inicio, $fin, $nombre, $descripcion, $observaciones, $estado);
        if($resp["msj"]=="success"){
            echo "<script>Se grabó correctamente :)</script>";
        }else{
            echo "<script>No se ha podido actualizar :(</script>";
        }
        header("Location: ".WEB_ROOT."/main");
    }
    
    public function deleteTask(){
        $objTask = new TaskModel();
        $resp = $objTask->deleteTask($_POST["txtIdTarea"]);

        if($resp["msj"]=="success"){
            echo "<script>Se grabó correctamente :)</script>";
        }else{
            echo "<script>No se ha podido eliminar :(</script>";
        }
        header("Location: ".WEB_ROOT."/main");
    }

}