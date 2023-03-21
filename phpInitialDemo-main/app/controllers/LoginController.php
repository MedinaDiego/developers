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
    }
}
