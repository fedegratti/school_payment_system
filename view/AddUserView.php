<?php

class AddUserView extends TwigView
{
    public function show() {

        echo self::getTwig()->render('addUser.html.twig');

    }
}