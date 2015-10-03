<?php

class GetResponsibleListView extends TwigView
{
    public function show($responsibleDataArray, $studentID)
    {

        self::getTwig()->display('linkResponsible.html.twig', array('responsibles' => $responsibleDataArray, "studentID" => $studentID));

    }
}