<?php

class BackendController
{
    public static function showView()
    {
        $view = new BackendView();
        $view->show($_POST['username']);
    }
}