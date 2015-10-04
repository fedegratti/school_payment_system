<?php
class UpdateStudentView extends TwigView
{
    public function show($student) {

        self::getTwig()->display('addStudent.html.twig',array("student" => $student, 'action' => 'UpdateUserAction'));

    }
}