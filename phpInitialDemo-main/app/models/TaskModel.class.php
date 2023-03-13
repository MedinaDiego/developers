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

    public function getAllTasks(){
        $objJsonConn = new JsonConnection(ROOT_PATH . '/app/models/database/tareas.json');
        //$objJsonConn = new JsonConnection('database/tareas.json');
        return $objJsonConn->getConnection();
        
    }

    public function getTasksByUser($usuario){
        $objJsonConn = new JsonConnection(ROOT_PATH . '/app/models/database/tareas.json');
        //$objJsonConn = new JsonConnection('database/tareas.json');
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

    public function getNewId(){
        $objJsonConn = new JsonConnection(ROOT_PATH . '/app/models/database/tareas.json');
        //$objJsonConn = new JsonConnection('database/tareas.json');
        $dataTareas = $objJsonConn->getConnection();
        $indexMayor = -1;
        
        foreach($dataTareas as $tareas){
            if($tareas["idTarea"] > $indexMayor){
                $indexMayor = $tareas["idTarea"];
            }
        }
        if($indexMayor==-1){
            return 1;
        }else{
            return $indexMayor+1;
        }
    }

    public function addTask($inicio, $fin, $nombre, $descripcion, $observaciones, $usuario){
        $idTask = $this->getNewId();
        $data = $this->getAllTasks();
        $data[$idTask] = (object) [
            "idTarea" => $idTask,
            "inicio" => $inicio,
            "fin" => $fin,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "observaciones" => $observaciones,
            "estado" => "PENDIENTE",
            "usuario" => $usuario
        ];
        $json = json_encode(array_values($data), JSON_PRETTY_PRINT);
        $insert = file_put_contents(ROOT_PATH . '/app/models/database/tareas.json', $json);
        //$insert = file_put_contents('database/tareas.json', $json);
        if ($insert) {
            $resp['msj'] = 'success';
        } else {
            $resp['msj'] = 'failed';
        }
        return $resp;
    }

    public function editTask($idTarea, $inicio, $fin, $nombre, $descripcion, $observaciones, $estado){ 
        $data = $this->getAllTasks();
        $data[$idTarea-1] = (object) [
            "idTarea" => $idTarea,
            "inicio" => $inicio,
            "fin" => $fin,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "observaciones" => $observaciones,
            "estado" => $estado
        ];
        $json = json_encode(array_values($data), JSON_PRETTY_PRINT);
        $update = file_put_contents('database/tareas.json', $json);
        if ($update) {
            $resp['msj'] = 'success';
        } else {
            $resp['msj'] = 'failed';
        }
        return $resp;       
    }

    public function deleteTask($id = ''){   
        if (empty($id)) {
            $resp['msj'] = 'failed';
            $resp['msj'] = 'El ID de miembro dado está vacío.';
        } else {
            $id = $id-1;
            $data = $this->getAllTasks();
            if (isset($data[$id])) {
                unset($data[$id]);
                $json = json_encode(array_values($data), JSON_PRETTY_PRINT);
                $update = file_put_contents('database/tareas.json', $json);
                if ($update) {
                    $resp['msj'] = 'success';
                } else {
                    $resp['msj'] = 'failed';
                }
            } else {
                $resp['msj'] = 'El ID de miembro dado no existe en el archivo JSON.';
            }
        }
        return $resp;
    }

}