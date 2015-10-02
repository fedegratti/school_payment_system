<?php

class AddCuotaView extends TwigView
{
    public function show() {

        self::getTwig()->display('addCuota.html.twig');
        

    }
}