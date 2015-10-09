<?php

class GuardianWithStudentAssociationView extends TwigView
{
    public function show($guardians, $guardiansAmount, $studentID, $paginationNumber)
    {
        self::getTwig()->display('guardian/listGuardians.html.twig', array("guardians" => $guardians,
                                                                            "guardiansAmount" => $guardiansAmount,
                                                                            "associationAction" => 'AssociateGuardianWithStudentAction',
                                                                            "personID" => $studentID,
                                                                            "association" => true,
                                                                            "paginationNumber" => $paginationNumber,
                                                                            "addAction" => "addGuardian",
                                                                            "deleteAction" => "deleteGuardian"));

    }
}