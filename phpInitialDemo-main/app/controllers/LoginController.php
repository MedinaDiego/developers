<?php 

require_once (ROOT_PATH."/app/models/UserModel.class.php");

class LoginController extends ApplicationController
{
	public function uiLoginAction()
    {
        //echo "";
    }

    public function enviarDatosAction(){
        $email= $_POST["email"];
        $password = $_POST["password"];
        
        $objUser = new UserModel();
        $usuario = $objUser->validateUser($email,$password);

        if($usuario != null){
            $_SESSION["sys_idUsuario"] = $usuario["idUsuario"];
            $_SESSION["sys_nombre"] = $usuario["nombre"];
            $_SESSION["sys_mail"] = $usuario["mail"];
            header("Location: ".WEB_ROOT."/main");
        }else{
            echo "<h2>Las credenciales son incorrectas.";
        }

    }

}
