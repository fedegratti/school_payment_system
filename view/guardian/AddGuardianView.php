<?php

class AddGuardianView extends TwigView
{
    public function show($student = null)
    {
        if ($student == null)
            $title = "Agregar responsable";
        else
            $title = "Agregar responsable para el alumno ".$student["firstName"]." ".$student["lastName"];

        self::getTwig()->display('guardian/guardianForm.html.twig',array("student" => $student,
                                                                          "action" => "AddGuardianAction",
                                                                           "title" => $title));
    }
}