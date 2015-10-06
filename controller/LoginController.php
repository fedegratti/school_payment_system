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
        $username = $_POST['username'];
        $password = $_POST['password'];
        $rolesAction = array(1 => "/ListConfigurations/", 2 => "/ListStudents/", 3 => "/ListAdmittedStudents/");

        $loginModel=new LoginModel();
        $roleId = $loginModel->authenticate($username,$password);

        if ($roleId != "error")
        {
            $userModel = new UserModel();

            if($userModel->isEnabled($username))
            {
                $_SESSION['role'] = $roleId;
                $_SESSION['username'] = $username;

                header('Location: '.$rolesAction[$roleId]);
            }
            else
            {
                header('Location: /login/Usuario_no_esta_habilitado');
            }

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