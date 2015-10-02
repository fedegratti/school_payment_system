<?php

class AddUserView extends TwigView
{
    public function show() {

        self::getTwig()->display('addUser.html.twig',array('action' => 'AddUserAction'));
    }
}