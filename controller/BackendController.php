<?php

class BackendController
{
    public static function showView()
    {

        $view = new BackendView();
        if(isset($_SESSION['username']))
        {
            $view->show($_SESSION['username']);
        }
        else
        {
            $view->show("hola gato");
        }

    }
}