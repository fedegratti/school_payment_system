<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 03/10/2015
 * Time: 23:02
 */
class StudentsWithPayedEnrolmentView extends TwigView
{
    public function show($students = null)
    {
        self::getTwig()->display('student/listStudents.html.twig',array("students" => $students, "enrolment"=>1));
    }
}