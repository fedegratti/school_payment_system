<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 27/10/2015
 * Time: 23:47
 */
class FeeService
{
    public  static function listPaidAndToBePaidFeesOfStudentInYear($slimApp,$studentID,$year)
    {


        $feeModel = new FeeModel();
        $cuotasPagasYPorPagar["por_pagar"] = $feeModel->getToBePaidFeesOfStudentInYear($studentID,$year);

        // vardump formateado super cheto
        //echo '<pre>'; print_r($feeModel->getToBePayedFeesOfStudentInYear($studentID,$year)); echo '</pre>'; die;


        $cuotasPagasYPorPagar["pagas"] = $feeModel->getPaidFeesOfStudentInYear($studentID,$year);

        $slimApp->response->headers['Content-Type'] = "application/json";
        echo json_encode($cuotasPagasYPorPagar);
    }


    public  static function totalRevenueByMonthInYear($slimApp,$year)
    {


        $feeModel = new FeeModel();
        $totalRevenue = $feeModel->getMontlyRevenueByYear($year);

        // vardump formateado super cheto
        //echo '<pre>'; print_r($feeModel->getToBePayedFeesOfStudentInYear($studentID,$year)); echo '</pre>'; die;



        $slimApp->response->headers['Content-Type'] = "application/json";
        echo json_encode($totalRevenue);
    }
}