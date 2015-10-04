<?php

class UserController
{
    public static function addUserView()
    {
        //AuthController::checkPermission();
        $view = new AddUserView();
        $view->show();
    }

    public static function addUserAction ()
    {

        $result = (new UserModel()) ->createUser($_POST);

        AuthController::checkPermission();
        if ($result == "SUCCESS")
        {

            header('Location: /ListUsers');
        }
    }

    public static function listUsersView()
    {
        AuthController::checkPermission();
        $result = (new UserModel()) ->getUsers();

        $view = new ListUsersView();
        $view ->show($result);
    }

    public static function updateUserView($id)
    {
        AuthController::checkPermission();
        $result = (new UserModel()) ->getUser($id);

        $view = new UpdateUserView();
        $view->show($result);
    }

    public static function updateUserAction ($userID)
    {
        AuthController::checkPermission();
        $result = (new UserModel()) ->updateUser($_POST,$userID);
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
            header('Location: /ListUsers');
        }
        else
        {
            echo "fallo el delete, usuario no existe para borrar o no se, exploto todo";
        }

    }
}