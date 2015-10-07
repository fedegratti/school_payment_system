<?php

class AddGuardianForUserView extends TwigView
{
    public function show($user = null)
    {
        $title = "Agregar responsable para el usuario ".$user["username"];

        self::getTwig()->display('guardian/guardianForm.html.twig',array("user" => $user,
                                                                          "action" => "AddGuardianAction",
                                                                           "title" => $title));
    }
}