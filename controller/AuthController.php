<?php

class AuthController
{
    public static function checkPermission($resourceCalled)
    {
        //$resourceCalled = debug_backtrace()[1]['function'];

        if( $resourceCalled == "showHomeView" or
            $resourceCalled == "loginView"    or
            $resourceCalled == "loginAction"  or
            $resourceCalled == "loginView"    or
            $resourceCalled == "logoutView" )
        {
            return true;
        }


        if (!isset($_SESSION['role']))
        {

            header('Location: /login/No_iniciaste_sesion');
        }


        if ($_SESSION['role'] == 1)
        {
            return true;
        }


        if(!(new AuthModel())->authenticate($_SESSION['role'],$resourceCalled))
        {
            header("Location: /login/No_tenes_permisos_para_acceder_al_recurso");
        }

    }
}