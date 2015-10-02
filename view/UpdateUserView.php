<?php

class UpdateUserView extends TwigView {

    public function show($user) {

        self::getTwig()->display('user.html.twig', array('user' => $user, 'action' => 'UpdateUserAction'));

    }

}
