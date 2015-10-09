<?php

class ListStudentGuardiansView extends TwigView
{
    public function show($guardians, $guardiansAmount, $student, $paginationNumber)
    {
        self::getTwig()->display('guardian/listGuardians.html.twig', array("guardians" => $guardians,
                                                                            "guardiansAmount" => $guardiansAmount,
                                                                            "student" => $student,
                                                                            "paginationNumber" => $paginationNumber,
                                                                            "association" => true,
                                                                            "addAction" => "AssociateGuardianWithStudent/0/".$student["id"],
                                                                            "deleteAction" => "breakGuardianStudentRelationship"));
    }
}