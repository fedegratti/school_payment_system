<?php
class ListUsersView extends TwigView
{
    public function show($users = null)
    {

        self::getTwig()->display('listUsers.html.twig',array("users" => $users));

    }
}