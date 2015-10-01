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
        $result = (new UserRepository()) ->createUser($_POST);
        if ($result == "SUCCESS")
        {
            header('Location: /backend');
            //header('Location: /backend?message=hola');
        }
    }
}