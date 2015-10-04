<?php

class LoginView extends TwigView {

    public function show($error = null) {

        self::getTwig()->display('login.html.twig',array("error"=>$error));
    }

}
