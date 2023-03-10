<?php
require_once("database/JsonConnection.class.php");

class UserModel{
    private $idUsuario;
    private $nombre;
    private $mail;
    private $password;
    
    public function __construct(){

    }

    public function createUser($idUsuario, $nombre, $mail, $password){
        $obj = new UserModel();
        $obj->idUsuario = $idUsuario;
        $obj->nombre = $nombre;
        $obj->mail = $mail;
        $obj->password = $password;
        return $obj;
    }


    public function validateUser($email, $password){
        
        $objJsonConn = new JsonConnection(ROOT_PATH . '/app/models/database/usuarios.json');
        $dataUsers = $objJsonConn->getConnection();
        foreach($dataUsers as $usuarios){
            foreach($usuarios as $usuario){
               if($usuario["mail"] == $email && $usuario["password"]==$password){
                    //echo $usuario["idUsuario"],$usuario["nombre"],$usuario["mail"],$usuario["password"];
                    return $usuario;
               }
            }
        }
        return null;
    }
}