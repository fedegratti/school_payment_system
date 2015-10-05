<?php

class UpdateConfigurationView extends TwigView
{
    public function show($configuration) {

        self::getTwig()->display('configuration/configurationForm.html.twig',array('action' => 'UpdateConfigurationAction',
                                                                                    "configuration" => $configuration));

    }
}