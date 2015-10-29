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
            // una cagada...
            /*
            if($_SERVER['HTTP_HOST'] == "localhost" )
                $response = file_get_contents("http://". $_SERVER['HTTP_HOST']."/ingresosTotalesEn/".$year);
            else

                $response = file_get_contents("https://". $_SERVER['HTTP_HOST']."/ingresosTotalesEn/".$year);
            */

            $curlSession = curl_init();
            if($_SERVER['HTTP_HOST'] == "localhost" )
                curl_setopt($curlSession, CURLOPT_URL, "http://". $_SERVER['HTTP_HOST']."/ingresosTotalesEn/".$year);
            else
                curl_setopt($curlSession, CURLOPT_URL, "https://". $_SERVER['HTTP_HOST']."/ingresosTotalesEn/".$year);
            
            curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

            $data = json_decode(curl_exec($curlSession),true);
            curl_close($curlSession);

            //$data = json_decode($response,true);
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