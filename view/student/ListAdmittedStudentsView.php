<?php

class ListAdmittedStudentsView extends TwigView
{
    public function show($students = null)
    {
        self::getTwig()->display('student/listStudents.html.twig',array("students" => $students,
                                                                        "selectAction"=>"ListFees/".$students["id"],
                                                                        "admitted"=>"true"));
    }
}