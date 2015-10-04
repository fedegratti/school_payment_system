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
        echo "cuota agregada";
    }

    public static function listFeesView()
    {
        AuthController::checkPermission();
        $feeModel = new FeeModel();

        $fees = $feeModel->listFees();

        $view = new listFeesView();
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
        $feeData = $feeModel->getFee($feeID);
        $view = new UpdateFeeView();
        $view->show($feeData);
    }
    public static function updateFeeAction($feeID)
    {
        AuthController::checkPermission();
        $feeRepository = new FeeModel();
        $feeRepository->updateFee($feeID, $_POST);
        header("Location: /ListFees");
    }

}