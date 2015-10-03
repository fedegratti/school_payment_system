<?php

class AddFeeView extends TwigView
{
    public function show() {

        self::getTwig()->display('addFee.html.twig');
        

    }
}