<?php

class LoginController
{
    public static function LoginView($error = null)
    {
        $view = new LoginView();
        $view->show($error);
    }

    public static function LoginAction ()
    {
        $rolesAction = array(1 => "/ListConfigurations/", 2 => "/ListUsers/", 3 => "/ListAdmittedStudents/");

        $loginModel=new LoginModel();
        $roleId = $loginModel->authenticate($_POST['username'],$_POST['password']);

        if ($roleId != "error")
        {
            session_start();

            $_SESSION['role'] = $roleId;

            header('Location: '.$rolesAction[$roleId]);
        }
        else
        {
            header('Location: /login/error');
        }

    }

    public static function LogoutView($error = null)
    {
        session_start();
        session_destroy();
        header('Location: /login/');
    }
}