<?php

class AuthController
{
    public static function checkPermission($resourceCalled)
    {

        echo debug_backtrace()[1]['function'];
        session_start();

        if (!isset($_SESSION['role'])) header('Location: /login');

        if(!(new AuthModel())->authenticate($_SESSION['role'],$resourceCalled)) header('Location: /login');

    }
}