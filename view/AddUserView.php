<?php

class AddUserView extends TwigView
{
    public function show() {

        self::getTwig()->display('user.html.twig',array('action' => 'AddUserAction'));
    }
}