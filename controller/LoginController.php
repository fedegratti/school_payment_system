<?php

class LoginController
{
    public static function LoginView()
    {
        $view = new LoginView();
        $view->show();
    }

    public static function LoginAction ()
    {
        $loginModel=new LoginModel();
        $regId = $loginModel->authenticate($_POST['username'],sha1($_POST['password']));
        echo $regId;
        if ($regId != "error")
        {
            session_start();

            $_SESSION['role'] = $regId;
            header('Location: /addStudent');
        }

    }
}