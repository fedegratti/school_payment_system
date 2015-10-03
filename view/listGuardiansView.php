<?php

class listGuardiansView extends TwigView
{
    public function show($responsibleDataArray, $studentID)
    {

        self::getTwig()->display('listGuardians.html.twig', array('guardians' => $responsibleDataArray, "studentID" => $studentID));

    }
}