<?php

    function __autoload($classname)
    {
    	require ("./". $classname . ".php");
    }
    spl_autoload_register('__autoload');
?>