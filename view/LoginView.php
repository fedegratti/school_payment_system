<?php

class LoginView extends TwigView {

    public function show() {

        echo self::getTwig()->render('login.html.twig');
    }

}
