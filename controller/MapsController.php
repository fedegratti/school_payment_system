<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 31/10/2015
 * Time: 14:30
 */
class MapsController
{
    public static function openMapsView()
    {
        (new OpenMapView())->show();
    }
}