<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 04/11/2015
 * Time: 23:41
 */
class ListTotalRevenue extends TwigView
{
    public function show ($years)
    {
        //echo '<pre>'; print_r($years); echo '</pre>'; die;
        $this->getTwig()->display("listTotalRevenue.html.twig", array("years"=>$years));
    }
}