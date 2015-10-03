<?php

class LoginController
{
    public static function showView()
    {
        $view = new LoginView();
        $view->show();
    }
}