<?php

class AddStudentView extends TwigView
{
    public function show() {
        self::getTwig()->display('studentForm.html.twig',array('action' => 'AddStudentAction'));
    }
}