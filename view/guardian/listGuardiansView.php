<?php

class listGuardiansView extends TwigView
{
    public function show($guardians, $guardiansAmount, $studentID, $paginationNumber)
    {

        self::getTwig()->display('guardian/listGuardians.html.twig', array("guardians" => $guardians,
                                                                            "guardiansAmount" => $guardiansAmount,
                                                                            "studentID" => $studentID,
                                                                            "paginationNumber" => $paginationNumber));

    }
}