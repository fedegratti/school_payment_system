<?php

class AuthController
{
    public static function checkPermission($resourceCalled)
    {

        $exclusions = array("showHomeView",
                            "loginView",
                            "loginAction",
                            "logoutView");

        if(in_array($resourceCalled,$exclusions))
        {
            return true;
        }

        if (!isset($_SESSION['role']))
        {
            header('Location: /login/1');
        }

        if ($_SESSION['role'] == 1)
        {
            return true;
        }

        if(!(new AuthModel())->authenticate($_SESSION['role'],$resourceCalled))
        {
            header("Location: /login/0");
        }

    }
}