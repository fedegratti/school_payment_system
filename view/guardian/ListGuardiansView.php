<?php

class ListGuardiansView extends TwigView
{
    
    public function show($guardians, $guardiansAmount, $paginationNumber)
    {
        self::getTwig()->display('guardian/listGuardians.html.twig', array("guardians" => $guardians,
                                                                            "guardiansAmount" => $guardiansAmount,
                                                                            "paginationNumber" => $paginationNumber,
                                                                            "association" => false,
                                                                            "addAction" => "addGuardian",
                                                                            "deleteAction" => "deleteGuardian"));
    }
}