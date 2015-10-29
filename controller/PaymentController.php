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
            $montlyRevenue = json_decode($response,true);
            $maxValue=0;

            foreach($montlyRevenue as $amount)
            {
                if($maxValue<$amount)
                    $maxValue=$amount;
            }
            (new ListRevenueInYearView())->show($montlyRevenue,$maxValue, $year);
        }

    }

    public static function listRevenueAction()
    {
        header("Location: /listRevenue/".$_POST["year"]);
    }
}