<?php

function __autoload($classname)
{

    $fileName= $classname . ".php";

    if(file_exists("controller/". $fileName))
    {
        require_once("controller/". $fileName);
    }
    if(file_exists( "view/". $fileName))
    {
        require_once("view/". $fileName);
    }
    if(file_exists( "model/". $fileName))
    {
        require_once("model/". $fileName);
    }
}

spl_autoload_register('__autoload');
