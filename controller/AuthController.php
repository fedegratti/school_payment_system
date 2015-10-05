<?php

class AuthController
{
    public static function checkPermission()
    {

        $resourceCalled = debug_backtrace()[1]['function'];
        session_start();


        if (!isset($_SESSION['role']))
        {
            header('Location: /login/No_iniciaste_sesion');
        }

        if(!(new AuthModel())->authenticate($_SESSION['role'],$resourceCalled))
        {
            header("Location: /login/No_tenes_permisos_para_acceder_al_recurso");
        }

    }
}