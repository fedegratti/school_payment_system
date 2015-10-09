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
        $userId = (new UserModel()) ->createUser($_POST);

        if ($userId == "ERROR") header('Location: /error');

        header('Location: '.$_POST['associationAction']."/".$userId);
    }

    public static function listUsersView()
    {
        $userModel = new UserModel();
        $users = $userModel->getUsers();

        $paginationNumber = (new ConfigurationModel())->getPaginationNumber();
        $usersAmount = $userModel->getUsersAmount();

        $view = new ListUsersView();
        $view ->show($users,$paginationNumber,$usersAmount, $_SESSION["username"]);
    }

    public static function updateUserView($id)
    {

        $result = (new UserModel()) ->getUser($id);

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