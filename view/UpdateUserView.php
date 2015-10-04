<?php

class UpdateUserView extends TwigView {

    public function show($user) {
        self::getTwig()->display('addUser.html.twig', array('user' => $user, 'action' => 'UpdateUserAction/'.$user["id"]));
    }
}
