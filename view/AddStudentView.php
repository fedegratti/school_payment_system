<?php

class AddStudentView extends TwigView
{
    public function show() {

        self::getTwig()->display('addStudent.html.twig',array("action"=>"AddStudentAction"));

    }
}