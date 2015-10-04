<?php

class AddFeeView extends TwigView
{
    public function show() {

        self::getTwig()->display('fee/feeForm.html.twig', array("action" => "AddFeeAction"));
        
    }
}