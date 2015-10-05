<?php

class AddGuardianView extends TwigView
{
    public function show($studentID) {
        self::getTwig()->display('guardian/guardianForm.html.twig',array('studentID' => $studentID, 'action' => 'AddGuardianAction') );
    }
}