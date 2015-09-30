<?php

class AddResponsibleView extends TwigView
{
    public function show() {

        self::getTwig()->display('addResponsible.html.twig');

    }
}