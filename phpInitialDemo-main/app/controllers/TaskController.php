<?php
require_once (ROOT_PATH."/app/models/TaskModel.class.php");

class TaskController extends ApplicationController
{
    public function iutaskAction(){
        $this->headerAction();
        $this->showTaskAction();
    }

    public function showTaskAction()
    {
        $this->view->__set('data',$this->obtenerTasks());
       
    }

    public function obtenerTasks(){
       
        $objTask = new TaskModel();
        $tareas = $objTask->getTasksByUser($_SESSION["sys_idUsuario"]);
        return $tareas;
    }

    public function uinewtaskAction()
    {
        $this->headerAction();
    }

    public function nuevoTaskAction()
    {
        $this->view->disableView();
        $request = $this->getRequest();

        $inicio         = $request->getParam("txtinicio", $default = null);
        $fin            = $request->getParam("txtfin", $default = null);
        $nombre         = $request->getParam("txtnombre", $default = null);
        $descripcion    = $request->getParam("txtdescripcion", $default = null);
        $observaciones  = $request->getParam("txtobservaciones", $default = null);
        $usuario        = $_SESSION["sys_idUsuario"];

        $objTask = new TaskModel();
        $resp = $objTask->addTask($inicio, $fin, $nombre, $descripcion, $observaciones, $usuario);
       
        if($resp["msj"]=="success"){
            echo '<script>alert("Se grabó correctamente :)")</script>';
            header("Location: ".WEB_ROOT."/main");
        }else{
            echo '<script>alert("No se ha podido grabar :(")</script>';
        }
    }

    public function uiedittaskAction()
    {
        $request = $this->getRequest();
        $this->headerAction();
        $objTask = new TaskModel();
        $this->view->__set('data',$objTask->getTask($request->getParam("txtIdTarea", $default = null)));

    }

    public function editarTaskAction(){

        $this->view->disableView();
        //$request = $this->getRequest();
        //$parametros = $request->getAllParams();
        //var_dump($parametros);
        //exit;

        $idTarea        = $_POST["txtIdTarea"];
        $inicio         = $_POST["txtinicio"];
        $fin            = $_POST["txtfin"];
        $nombre         = $_POST["txtnombre"];
        $descripcion    = $_POST["txtdescripcion"];
        $observaciones  = $_POST["txtobservaciones"];
        $estado         = $_POST["txtestado"];
        $usuario        = $_SESSION["sys_idUsuario"];

    

        $objTask = new TaskModel();
        $resp =  $objTask->editTask($idTarea, $inicio, $fin, $nombre, $descripcion, $observaciones, $estado,$usuario);
        if($resp["msj"]=="success"){
            echo "<script>Se grabó correctamente :)</script>";
        }else{
            echo "<script>No se ha podido actualizar :(</script>";
        }
        header("Location: ".WEB_ROOT."/main");
    }
    
    public function deleteTaskAction(){

        $objTask = new TaskModel();
        $resp = $objTask->deleteTask($_REQUEST["txtIdTarea"]);

        if($resp["msj"]=="success"){
            //echo "<script>Se grabó correctamente :)</script>";
            header("Location: ".WEB_ROOT."/main");
        }else{
            echo '<script> alert("No se ha podido eliminar :(")</script>';
        }
        
    }

}