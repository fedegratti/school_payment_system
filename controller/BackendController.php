<?php

class BackendController
{
    public static function showView()
    {
        AuthController::checkPermission();
        $view = new BackendView();

        $view->show($_POST['username']);
    }
}