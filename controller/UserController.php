<?php

class UserController
{
    public static function addUserView()
    {
        AuthController::checkPermission();
        $view = new AddUserView();
        $view->show();
    }

    public static function addUserAction ()
    {
        AuthController::checkPermission();
        $result = (new UserModel()) ->createUser($_POST);

        if ($result == "SUCCESS")
        {
            header('Location: /login');
        }
    }

    public static function listUsersView()
    {
        AuthController::checkPermission();
        $result = (new UserModel()) ->listUsers();

        $view = new ListUsersView();
        $view ->show($result);
    }

    public static function updateUserView($id)
    {
        AuthController::checkPermission();
        $result = (new UserModel()) ->listUser($id);

        $view = new UpdateUserView();
        $view->show($result);
    }

    public static function updateUserAction ()
    {
        AuthController::checkPermission();
        $result = (new UserModel()) ->updateUser($_POST);
        if ($result == "SUCCESS")
        {
            header('Location: /ListUsers');
        }
    }

    public static function deleteUserView()
    {
        AuthController::checkPermission();
        echo "falta implementar vista";
    }
    public static function deleteUserAction($id)
    {
        AuthController::checkPermission();
        $result = (new UserModel()) ->deleteUser($id);
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