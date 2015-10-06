<?php

class AddUserView extends TwigView
{
    public function show() {

        self::getTwig()->display('user/userForm.html.twig',array('action' => 'AddUserAction'));
    }
}