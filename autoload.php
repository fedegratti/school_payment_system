<?php

function __autoload($classname)
{

    $fileName= $classname . ".php";

    set_include_path(get_include_path() . PATH_SEPARATOR . 'services');
    set_include_path(get_include_path() . PATH_SEPARATOR . 'model');
    set_include_path(get_include_path() . PATH_SEPARATOR . 'controller');

    set_include_path(get_include_path() . PATH_SEPARATOR . 'view');
    set_include_path(get_include_path() . PATH_SEPARATOR . 'view/common');
    set_include_path(get_include_path() . PATH_SEPARATOR . 'view/configuration');
    set_include_path(get_include_path() . PATH_SEPARATOR . 'view/fee');
    set_include_path(get_include_path() . PATH_SEPARATOR . 'view/guardian');
    set_include_path(get_include_path() . PATH_SEPARATOR . 'view/student');
    set_include_path(get_include_path() . PATH_SEPARATOR . 'view/user');

    include_once $fileName;

}

spl_autoload_register('__autoload');
