<?php

class BackendView extends TwigView {

    public function show($username = null) {

        self::getTwig()->display('backend.html.twig', array('username' => $username));

    }

}
