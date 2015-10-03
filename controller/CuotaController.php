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
        $cuotaRepository = new CuotaRepository();
        $cuotaRepository ->createCuota($_POST);
        echo "cuota agregada";
    }
}