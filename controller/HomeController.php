<?php

class HomeController
{
    public static function showView()
    {
        AuthController::checkPermission();
        $view = new HomeView();
        $view->show();
    }
}