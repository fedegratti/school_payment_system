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
        echo "cuota agregada";
    }
}