<?php

class HomeView extends TwigView {

    public function show() {
        self::getTwig()->display('home.html.twig');
    }
}
