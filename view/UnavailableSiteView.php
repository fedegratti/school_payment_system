<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 04/10/2015
 * Time: 19:11
 */
class UnavailableSiteView extends TwigView {

    public function show($message)
    {

        self::getTwig()->display('unavailableSite.html.twig',array('message'=>$message));
    }

}
