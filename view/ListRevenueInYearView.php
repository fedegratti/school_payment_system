<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 28/10/2015
 * Time: 12:12
 */
class ListRevenueInYearView extends TwigView
{
    public function show($montlyRevenue = null, $maxValue = null, $year = null )
    {
        self::getTwig()->display('listRevenueInYear.html.twig',array("revenue"=>$montlyRevenue,
                                                                     "maxValue" => $maxValue,
                                                                      "year" => $year));
    }


}