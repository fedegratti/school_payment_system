<?php

class UnavailableSiteView extends TwigView {

    public function show($message)
    {

        self::getTwig()->display('unavailableSite.html.twig',array('message'=>$message));
    }

}
