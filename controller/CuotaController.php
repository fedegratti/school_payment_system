<?php

class CuotaController
{
    public static function showView()
    {
        $view = new AddCuotaView();
        $view->show();
    }
}