<?php

class BackendView extends TwigView {

    public function show($resourceArray) {

        echo self::getTwig()->render('backend.html.twig', array('username' => $resourceArray));

    }

}
