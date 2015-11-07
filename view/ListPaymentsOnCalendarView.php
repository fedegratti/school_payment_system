<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 06/11/2015
 * Time: 19:43
 */
class ListPaymentsOnCalendarView extends TwigView
{
    public function show($data = null)
    {
        $this->getTwig()->display("calendar.html.twig", array( "data" => $data));
    }

}