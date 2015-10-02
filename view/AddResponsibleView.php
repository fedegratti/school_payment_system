<?php

class AddResponsibleView extends TwigView
{
    public function show($studentID) {

        self::getTwig()->display('addResponsible.html.twig',array('studentID' => $studentID) );

    }
}