<?php
class ListStudentsView extends TwigView
{
    public function show($students = null)
    {

        self::getTwig()->display('listStudents.html.twig',array("students" => $students));


    }
}