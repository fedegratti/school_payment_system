<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 28/10/2015
 * Time: 12:08
 */
class PaymentController
{
    public static function listRevenueView($year = null)
    {
        if($year == null)
            (new ListRevenueInYearView())->show();
        else
        {
            $response = file_get_contents('http://localhost/ingresosTotalesEn/'.$year);
            $data = json_decode($response,true);
            $montlyRevenue = array(0,0,0,0,0,0,0,0,0,0,0,0);
            $maxValue=0;
            foreach($data as $month)
            {
                $montlyRevenue[$month["mes"]-1] = $month["cantidad"];
                if($maxValue<$month["cantidad"])
                {
                    $maxValue=$month["cantidad"];
                }
            }
            (new ListRevenueInYearView())->show($montlyRevenue,$maxValue, $year);
        }

    }

    public static function listRevenueAction()
    {
        header("Location: /listRevenue/".$_POST["year"]);
    }
}