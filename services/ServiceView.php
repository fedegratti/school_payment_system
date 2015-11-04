<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 30/10/2015
 * Time: 14:02
 */
use Slim\Slim;
class ServiceView
{

    public  function showAsJSON($data)
    {
        $slim = Slim::getInstance();
        $slim->response->headers['Content-Type'] = "application/json";
        $slim->response->headers['Access-Control-Allow-Origin'] = "*";


        //echo '<pre>'; print_r($data); echo '</pre>'; die;
        echo json_encode($data);
    }

    public  function showAsXML($data)
    {

    }

    public function showPlainText($data)
    {
        $slim = Slim::getInstance();
        $slim->response->headers['Access-Control-Allow-Origin'] = "*";
        echo json_encode($data);
    }
}