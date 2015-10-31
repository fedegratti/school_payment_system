<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 30/10/2015
 * Time: 23:29
 */
class ListCollectorPaymentRevenueView extends TwigView
{
    public function show($years)
    {
        self::getTwig()->display('listCollectorPaymentRevenue.html.twig',array("years"=>$years));
    }
}