<?php
class ListUsersView extends TwigView
{
    public function show($users = null,$paginationNumber,$usersAmount)
    {

        self::getTwig()->display('user/listUsers.html.twig',array("users" => $users,
                                                                "paginationNumber" => $paginationNumber,
                                                                "usersAmount"=>$usersAmount));

    }
}