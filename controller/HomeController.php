<?php

class HomeController
{
    public static function showView()
    {
        $view = new HomeView();
        $view->show();
    }
}