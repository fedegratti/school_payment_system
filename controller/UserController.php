<?php

class UserController
{
    
    public static function addUserView()
    {
        $view = new AddUserView();
        $view->show();
    }

    public static function addUserAction ()
    {
        $result = UserRepository::getInstance()->createUser();
        if ($result == "SUCCESS")
        {
            header('Location: /backend?message=hola');
        }
    }
}