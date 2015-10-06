<?php

class UpdateUserView extends TwigView {

    public function show($user) {

        self::getTwig()->display('user/userForm.html.twig', array('user' => $user, 'action' => 'UpdateUserAction'));
    }
}
