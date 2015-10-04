<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 04/10/2015
 * Time: 18:40
 */
class ListConfigurationView extends TwigView {

    public function show($configData)
    {
        self::getTwig()->display('configurationList.html.twig',array("config"=>$configData));
    }

}
