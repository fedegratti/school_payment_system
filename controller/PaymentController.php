<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 28/10/2015
 * Time: 12:08
 */
class PaymentController
{
    public static function listRevenueByYearView($year = null)
    {

        if($year == null)
            (new ListRevenueInYearView())->show();
        else
        {

            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );

            //guarda con esto xD si el server muere o quieren probar algo en la db local, cambienlo.
            // Si tuviesemos configurado el apache para aceptar https, podriamos dejar localhost y funciona siempre.
            $restURL='https://grupo_2.proyecto2015.linti.unlp.edu.ar/ingresosTotalesEn/'.$year;

            $response = file_get_contents($restURL, false,  stream_context_create($arrContextOptions));
            $montlyRevenue = json_decode($response,true);

            $maxValue=0;

            foreach($montlyRevenue as $amount)
            {
                if($amount>$maxValue)
                    $maxValue=$amount;
            }
            (new ListRevenueInYearView())->show($montlyRevenue,$maxValue, $year);
        }

    }

    public static function listRevenueByYearAction()
    {
        header("Location: /listRevenueByYear/".$_POST["year"]);
    }

    public static function payOrGrantFeeView($feeId,$studentId,$grant)
    {
        $paymentModel = new PaymentModel();

        $paymentId = $paymentModel->payOrGrantFee($feeId,$studentId,$grant);
        if($_SESSION["role"]==2)
            $paymentModel->generateUserPayment($_SESSION['userid'],$paymentId);

        header("Location: /ListFees/".$studentId);
    }

    public static function listCollectorPaymentRevenueView()
    {
        $years = (new PaymentModel())->getYearlyCollectorPaymentRevenueOfUser($_SESSION["userid"]);
        (new ListCollectorPaymentRevenueView())->show($years);
    }

    public static function listTotalRevenueView()
    {
        $paymentModel = new PaymentModel();
        $totalRevenue = $paymentModel->getTotalRevenue();
        (new ListTotalRevenue())->show($totalRevenue);

    }

    public static function listPaymentsOnCalendarView($dni = null, $year = null)
    {
        if($dni== null )
        {
            (new ListPaymentsOnCalendarView())->show();
        }
        else
        {

            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );

            //guarda con esto xD si el server muere o quieren probar algo en la db local, cambienlo.
            // Si tuviesemos configurado el apache para aceptar https, podriamos dejar localhost y funciona siempre.
            $restURL="https://grupo_2.proyecto2015.linti.unlp.edu.ar/cuotasImpagasYPorPagarDe/{$dni}/year/{$year}";

            $response = file_get_contents($restURL, false,  stream_context_create($arrContextOptions));
            $cuotasPagasEImpagas = json_decode($response,true);


            // le agrego la key porq php tiene problemitas   http://stackoverflow.com/questions/10121483/php-modify-current-object-in-foreach-loop
            foreach($cuotasPagasEImpagas["pagas"] as $key =>$cuota)
            {
                $cuotasPagasEImpagas["pagas"][$key]["fechaDePago"] = date("m/d/Y", strtotime($cuota["fechaDePago"]));
            }

            (new ListPaymentsOnCalendarView())->show($cuotasPagasEImpagas);

        }

    }

    public static function listPaymentsOnCalendarAction()
    {
        header("Location: /calendar/".$_POST["dni"]."/".$_POST["year"]);
    }
}