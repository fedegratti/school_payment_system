<?php

class LoginView extends TwigView {

    public function show() {

        self::getTwig()->display('login.html.twig');
    }

}
