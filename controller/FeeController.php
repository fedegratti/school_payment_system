<?php

class FeeController
{
    public static function addFeeView()
    {
        $view = new AddFeeView();
        $view->show();
    }

    public static function addFeeAction()
    {
        $feeRepository = new FeeModel();
        $feeRepository->createFee($_POST);
        header("Location: /ListFees");
    }

    public static function payOrGrantFeeView($feeId,$studentId,$grant)
    {
        $feeRepository = new FeeModel();
        $feeRepository->payOrGrantFee($feeId,$studentId,$grant);
        header("Location: /ListFees/".$studentId);
    }



    public static function listStudentFeesView($studentId)
    {
        $feeModel = new FeeModel();
        $studentModel = new StudentModel();

        $payedFees = $feeModel->getPaidFeesOfStudent($studentId);
        $unPayedFees = $feeModel->getUnPaidFeesOfStudent($studentId);
        $student = $studentModel->getStudent($studentId);
        $expiredFees = $feeModel->getExpiredFeesOfStudent($studentId);

        $view = new ListStudentFeesView();
        $view->show($payedFees,$unPayedFees,$expiredFees,$student);
    }
    public static function listFeesView()
    {
        $feeModel = new FeeModel();

        $fees = $feeModel->listFees();

        $view = new ListFeesView();
        $view->show($fees);
    }
    public  static function deleteFeeAction($feeID)
    {
        $feeModel = new FeeModel();
        $feeModel->deleteFee($feeID);
        header("Location: /ListFees");
    }

    public static function updateFeeView($feeID)
    {
        $feeModel = new FeeModel();
        $fee = $feeModel->getFee($feeID);
        $view = new UpdateFeeView();
        $view->show($fee);
    }
    public static function updateFeeAction()
    {
        $feeRepository = new FeeModel();

        $feeRepository->updateFee($_POST);
        header("Location: /ListFees");
    }

}