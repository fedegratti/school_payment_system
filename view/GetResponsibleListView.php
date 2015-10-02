<?php

class GetResponsibleListView extends TwigView
{
    public function show($responsibleDataArray)
    {

        self::getTwig()->display('linkResponsible.html.twig', array('responsibles' => $responsibleDataArray));

    }
}