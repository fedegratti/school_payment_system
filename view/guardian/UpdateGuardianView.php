<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 04/10/2015
 * Time: 23:11
 */
class UpdateGuardianView extends TwigView
{
    public function show($guardianData)
    {
        self::getTwig()->display('guardian/guardianForm.html.twig',array('guardian' => $guardianData, 'action' => 'UpdateGuardianAction') );
    }
}