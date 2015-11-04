<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 30/10/2015
 * Time: 14:03
 */
class RevenueService
{
    public  static function totalRevenueByMonthInYear($year)
    {
        $feeModel = new FeeModel();
        $totalRevenue = $feeModel->getMontlyRevenueByYear($year);

        // vardump formateado super cheto
        //echo '<pre>'; print_r($feeModel->getToBePayedFeesOfStudentInYear($studentID,$year)); echo '</pre>'; die;

        (new ServiceView())->showAsJSON($totalRevenue);
    }
}