<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 30/10/2015
 * Time: 14:02
 */
class ServiceView
{
    public  function showAsJSON($data)
    {
        echo json_encode($data);
    }

    public  function showAsXML($data)
    {

    }
}