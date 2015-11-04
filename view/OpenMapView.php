<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 31/10/2015
 * Time: 13:53
 */
class OpenMapView extends TwigView
{
    public function show($students)
    {
        $this->getTwig()->display("openMapsView.html.twig",array( "students" => $students));
    }
}