<?php 
//echo $_SERVER['SERVER_NAME'];
//echo $_SERVER["DOCUMENT_ROOT"];
//echo ROOT_PATH;
//require_once ($_SERVER["DOCUMENT_ROOT"]."/todo/app/models/UserModel.class.php");
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

        $objUserJson = new UserModel();
        $objUserJson = $objUserJson->validateUser($email,$password);

        echo $objUserJson;

        header("Location: ".WEB_ROOT."/main");


    }

}
