<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 04/10/2015
 * Time: 1:10
 */
class UpdateFeeView extends TwigView
{
    public function show($fee) {

        self::getTwig()->display('fee/feeForm.html.twig', array("action" => "UpdateFeeAction", "fee" => $fee ));

    }
}