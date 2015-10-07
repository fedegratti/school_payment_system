<?php
class ListStudentsView extends TwigView
{
    public function show($students = null)
    {

        self::getTwig()->display('student/listStudents.html.twig',array("students" => $students, "title" => "Alumnos"));


    }
}