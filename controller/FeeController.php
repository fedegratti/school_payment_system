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

}