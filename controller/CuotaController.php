<?php

class CuotaController
{
    public static function addCuotaView()
    {
        $view = new AddCuotaView();
        $view->show();
    }

    public static function addCuotaAction()
    {
        $view = new AddCuotaView();
        $view->show();
    }
}