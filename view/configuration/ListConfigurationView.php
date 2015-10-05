<?php

class ListConfigurationView extends TwigView {

    public function show($configurations)
    {
        self::getTwig()->display('configuration/listConfigurations.html.twig',array("configurations" => $configurations));
    }

}
