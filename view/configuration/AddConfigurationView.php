<?php

class AddConfigurationView extends TwigView
{
    public function show() {

        self::getTwig()->display('configuration/configurationForm.html.twig',array('action' => 'AddConfigurationAction'));
    }
}