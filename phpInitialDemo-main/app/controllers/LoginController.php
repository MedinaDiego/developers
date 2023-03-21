<?php
require_once(ROOT_PATH . "/app/models/UserModel.class.php");

class LoginController extends ApplicationController
{
    public function indexAction()
    {
        $this->headerAction();
        $url = $this->view->baseUrl();
        $this->view->__set('ruta', $url);
    }

    public function validarAction()
    {
        $request = $this->getRequest();

        $email = $request->getParam("email", $default = null);
        $password = $request->getParam("password", $default = null);

        $objUser = new UserModel();
        $usuario = $objUser->validateUser($email, $password);

        if ($usuario != null) {
            $_SESSION["sys_idUsuario"] = $usuario["idUsuario"];
            $_SESSION["sys_nombre"] = $usuario["nombre"];
            $_SESSION["sys_mail"] = $usuario["mail"];
            header("Location: " . WEB_ROOT . "/main");
        } else {
            echo "Error";
           // $this->indexAction();
        }
    }

    public function cerrarAction()
    {
       
        // Iniciamos la sesion
        session_start();
 
        // Destruir todo en esta sesión
        session_destroy();

        $this->view->disableView();
        header("Location: " . WEB_ROOT . "/");

    }

    public function checkAction()
    {
        echo "hello from test::check";
    }

    public function registroAction(){
        $this->headerAction();
        $url = $this->view->baseUrl();
        $this->view->__set('ruta', $url);   
    }

    public function altausuarioAction(){
        $this->view->disableView();
        $request = $this->getRequest();
        
        $nombre     = $request->getParam("nombre", $default = null); ; 
        $email      = $request->getParam("email", $default = null);
        $password   = $request->getParam("password", $default = null);
        $perfil     = $request->getParam("perfil", $default = null);
        $submit     = $request->getParam("daralta", $default = null);
        if(isset($submit)){
            if(!empty($nombre) && !empty($email) && !empty($password)){
                $newUser= new UserModel();
                $usuario = $newUser->addUser($nombre, $email, $password,$perfil);
            }else{
                echo "<script>alert('Por favor, rellena el formulario.')</script>";
            }
        }
    }
}
