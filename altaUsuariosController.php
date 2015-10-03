<?php

    require_once("./vendor/autoload.php");
    require_once("./autoload.php");

    if(UserManager::UserAlreadyExists($_POST["username"]))
    {
        echo "ya existe";
    }
    else
    {

        UserManager::AgregarUsuario();
        echo "usuario agregado";
    }

?>