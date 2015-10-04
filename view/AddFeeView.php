<?php

class AddFeeView extends TwigView
{
    public function show() {

        self::getTwig()->display('feeForm.html.twig', array("action" => "AddFeeAction"));
        
    }
}