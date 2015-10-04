<?php

class AddUserView extends TwigView
{
    public function show() {

        self::getTwig()->display('user/addUser.html.twig',array('action' => 'AddUserAction'));
    }
}