<?php

class UserController
{
    public static function addUserView()
    {
        $view = new AddUserView();
        $view->show();
    }

    public static function createUser ()
    {
//        $result = UserRepository::getInstance()->createUser();
        header('Location: /backend?message=hola');
        if ($result == "SUCCESS")
        {
            BackendController::showView();
        }
    }
}