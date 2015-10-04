<?php

class AuthController
{
    public static function checkPermission()
    {
        $resourceCalled = debug_backtrace()[1]['function'];
        session_start();

        //lineas comentadas para deshabilitar la seguridad
        //if (!isset($_SESSION['role'])) header('Location: /login');
        //if(!(new AuthModel())->authenticate($_SESSION['role'],$resourceCalled)) header("Location: /login/TuUserEsBullshit");

    }
}