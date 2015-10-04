<?php

class AddStudentView extends TwigView
{
    public function show() {
        self::getTwig()->display('student/studentForm.html.twig',array('action' => 'AddStudentAction'));
    }
}