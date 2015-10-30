<?php

class LoginController
{
    static $rolesAction = array(1 => "/ListConfigurations/", 2 => "/ListAdmittedStudents/", 3 => "/ListAdmittedStudents/");

    public static function loginView($error = null)
    {
        if (isset($_SESSION["username"])) header('Location: '.static::$rolesAction[$_SESSION['role']]);

        $view = new LoginView();
        $view->show($error);
    }

    public static function loginAction ()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $loginModel=new LoginModel();
        $roleId = $loginModel->authenticate($username,$password);

        if ($roleId == "error") header('Location: /login/3');

        $userModel = new UserModel();

        if(!$userModel->isEnabled($username)) header('Location: /login/2');

        $_SESSION['role'] = $roleId;
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userModel->getUserID($username);
        $_SESSION['title'] = (new ConfigurationModel())->getConfiguration("title")["value"];
        $_SESSION['description'] = (new ConfigurationModel())->getConfiguration("description")["value"];

        header('Location: '.static::$rolesAction[$roleId]);
    }

    public static function logoutView($error = null)
    {
        session_destroy();
        header('Location: /login/');
    }
}