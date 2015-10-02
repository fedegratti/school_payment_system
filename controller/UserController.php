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
        }
    }

    public static function updateUserView($id)
    {
        $result = (new UserRepository()) ->listUser($id);

        $view = new UpdateUserView();
        $view->show($result);
    }

    public static function updateUserAction ()
    {
        $result = (new UserRepository()) ->updateUser($_POST);
        if ($result == "SUCCESS")
        {
            header('Location: /backend');
        }
    }
}