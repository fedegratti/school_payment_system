<?php

class BackendView extends TwigView {

    public function show($username) {

        self::getTwig()->display('backend.html.twig', array('username' => $username));

    }

}
