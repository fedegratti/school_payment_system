<?php

class GuardianWithUserAssociationView extends TwigView
{
    public function show($guardians, $guardiansAmount, $userID, $paginationNumber)
    {
        self::getTwig()->display('guardian/listGuardians.html.twig', array("guardians" => $guardians,
                                                                            "guardiansAmount" => $guardiansAmount,
                                                                            "associationAction" => 'AssociateGuardianWithUserAction',
                                                                            "personID" => $userID,
                                                                            "association" => true,
                                                                            "paginationNumber" => $paginationNumber));

    }
}