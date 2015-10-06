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
        header('Location: /Login');

        if ($result == "SUCCESS")
        {
            header('Location: /ListUsers');
        }
    }

    public static function listUsersView()
    {

        $userModel = new UserModel();
        $result = $userModel->getUsers();

        $paginationNumber = (new ConfigurationModel())->getPaginationNumber();
        $usersAmount = $userModel->getUsersAmount();

        $view = new ListUsersView();
        $view ->show($result,$paginationNumber,$usersAmount);
    }

    public static function updateUserView($id)
    {

        $result = (new UserModel()) ->getUser($id);

        $view = new UpdateUserView();
        $view->show($result);
    }

    public static function updateUserAction ($userID)
    {

        $result = (new UserModel()) ->updateUser($_POST,$userID);
        if ($result == "SUCCESS")
        {
            header('Location: /ListUsers');
        }
    }

    public static function deleteUserAction($id)
    {

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