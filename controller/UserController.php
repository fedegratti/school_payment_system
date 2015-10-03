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
            header('Location: /login');
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

    public static function deleteUserView()
    {
        echo "falta implementar vista";
    }
    public static function deleteUserAction($username)
    {
        $result = (new UserRepository()) ->deleteUser($username);
        if($result == "SUCCESS")
        {
            echo "delete exitoso";
        }
        else
        {
            echo "fallo el delete, usuario no existe para borrar";
        }

    }
}