<?php
require_once("JsonConnection.class.php");

class UserModel{
    private $user;
    private $password;
    private $mail;
    private $dataUsers;
    private $objConnection;

    public function __construct(){
        $this->objConnection = new JsonConnection("usuarios.json");
    }

    public function validateUser($user, $pass){
        $this->dataUsers = $this->objConnection->getJson();

        /***
        Código para validar si existe el usuario, y si es el mismo password.
        Debe retornar true o false.
        
        foreach($this->dataUsers as $user){
            var_dump($user);
        }
        ***/
        
    }
}
