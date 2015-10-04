<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 04/10/2015
 * Time: 1:10
 */
class UpdateFeeView extends TwigView
{
    public function show($feeData) {

        self::getTwig()->display('feeForm.html.twig', array("action" => "UpdateFeeAction/".$feeData["id"], "feeData" => $feeData ));

    }
}