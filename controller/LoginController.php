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
        $regId = $loginModel->authenticate($_POST['username'],$_POST['password']);

        if ($regId != "error")
        {
            session_start();

            $_SESSION['role'] = $regId;

            header('Location: /backend');
        }
        else
        {
            header('Location: /login/error');
        }

    }
}