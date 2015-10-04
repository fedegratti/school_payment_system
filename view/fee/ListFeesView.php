<?php
class ListFeesView extends TwigView
{
    public function show($fees = null)
    {
        self::getTwig()->display('fee/listFees.html.twig',array("fees" => $fees));
    }
}