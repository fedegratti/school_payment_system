<?php
class UpdateStudentView extends TwigView
{
    public function show($studentData) {

        self::getTwig()->display('updateStudent.html.twig',array("studentData" => $studentData,"action"=>"UpdateStudentAction"));

    }
}