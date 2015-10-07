<?php

class UpdateGuardianView extends TwigView
{
    public function show($guardianData)
    {
        self::getTwig()->display('guardian/guardianForm.html.twig',array('guardian' => $guardianData,
                                                                           'action' => 'UpdateGuardianAction',
                                                                            "title" => "Editar responsable") );
    }
}