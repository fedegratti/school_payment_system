<?php

class HomeController
{
    public static function showHomeView()
    {
        $view = new HomeView();
        $view->show();
    }
}