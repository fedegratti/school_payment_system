<?php

class FeeController
{
    public static function addFeeView()
    {
        AuthController::checkPermission();
        $view = new AddFeeView();
        $view->show();
    }

    public static function addFeeAction()
    {
        AuthController::checkPermission();
        $feeRepository = new FeeModel();
        $feeRepository->createFee($_POST);
        header("Location: /ListFees");
    }

    public static function payOrGrantFeeView($feeId,$studentId,$grant)
    {
        AuthController::checkPermission();
        $feeRepository = new FeeModel();
        $feeRepository->payOrGrantFee($feeId,$studentId,$grant);
        header("Location: /ListFees/".$studentId);
    }

    public static function listStudentFeesView($studentId)
    {
        AuthController::checkPermission();
        $feeModel = new FeeModel();
        $studentModel = new StudentModel();

        $payedFees = $feeModel->getPayedFeesOfStudent($studentId);
        $unPayedFees = $feeModel->getUnPayedFeesOfStudent($studentId);
        $student = $studentModel->getStudent($studentId);
        $expiredFees = $feeModel->getExpiredFeesOfStudent($studentId);
        $view = new ListStudentFeesView();
        $view->show($payedFees,$unPayedFees,$expiredFees,$student);
    }
    public static function listFeesView()
    {
        AuthController::checkPermission();
        $feeModel = new FeeModel();

        $fees = $feeModel->listFees();

        $view = new ListFeesView();
        $view->show($fees);
    }
    public  static function deleteFeeAction($feeID)
    {
        AuthController::checkPermission();
        $feeModel = new FeeModel();
        $feeModel->deleteFee($feeID);
        header("Location: /ListFees");
    }

    public static function updateFeeView($feeID)
    {
        AuthController::checkPermission();
        $feeModel = new FeeModel();
        $fee = $feeModel->getFee($feeID);
        $view = new UpdateFeeView();
        $view->show($fee);
    }
    public static function updateFeeAction()
    {
        AuthController::checkPermission();
        $feeRepository = new FeeModel();

        $feeRepository->updateFee($_POST);
        header("Location: /ListFees");
    }

}