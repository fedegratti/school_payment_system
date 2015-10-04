<?php
class UpdateStudentView extends TwigView
{
    public function show($student, $studentID) {

        self::getTwig()->display('student/studentForm.html.twig',array("student" => $student, 'action' => 'UpdateStudentAction/'.$studentID));

    }
}