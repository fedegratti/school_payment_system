<?php

class LoginController
{
    public static function loginView($error = null)
    {
        $view = new LoginView();
        $view->show($error);
    }

    public static function loginAction ()
    {
        $rolesAction = array(1 => "/ListConfigurations/", 2 => "/ListUsers/", 3 => "/ListAdmittedStudents/");

        $loginModel=new LoginModel();
        $roleId = $loginModel->authenticate($_POST['username'],$_POST['password']);

        if ($roleId != "error")
        {


            $_SESSION['role'] = $roleId;
            $_SESSION['username'] = $_POST['username'];

            header('Location: '.$rolesAction[$roleId]);
        }
        else
        {
            header('Location: /login/error');
        }

    }

    public static function logoutView($error = null)
    {

        session_destroy();
        header('Location: /login/');
    }
}