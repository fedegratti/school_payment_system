<?php

class AddGuardianView extends TwigView
{
    public function show($studentID) {

        self::getTwig()->display('addGuardian.html.twig',array('studentID' => $studentID) );

    }
}