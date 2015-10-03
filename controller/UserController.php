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
        $result = (new UserModel()) ->createUser($_POST);

        if ($result == "SUCCESS")
        {
            header('Location: /login');
        }
    }

    public static function listUsersView()
    {
        $result = (new UserModel()) ->listUsers();

        $view = new ListUsersView();
        $view ->show($result);
    }

    public static function updateUserView($id)
    {
        $result = (new UserModel()) ->listUser($id);

        $view = new UpdateUserView();
        $view->show($result);
    }

    public static function updateUserAction ()
    {
        $result = (new UserModel()) ->updateUser($_POST);
        if ($result == "SUCCESS")
        {
            header('Location: /ListUsers');
        }
    }

    public static function deleteUserView()
    {
        echo "falta implementar vista";
    }
    public static function deleteUserAction($username)
    {
        $result = (new UserModel()) ->deleteUser($username);
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