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
        $loginModel=new LoginModel();
        $roleId = $loginModel->authenticate($_POST['username'],$_POST['password']);

        if ($roleId != "error")
        {
            session_start();

            $_SESSION['role'] = $roleId;

            header('Location: /ListUsers/');
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