<?php

class UpdateFeeView extends TwigView
{
    public function show($fee) {

        self::getTwig()->display('fee/feeForm.html.twig', array("action" => "UpdateFeeAction", "fee" => $fee ));

    }
}