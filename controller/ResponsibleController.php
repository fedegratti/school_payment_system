<?php

class ResponsibleController
{
	private static $studentData;
    public static function addResponsibleView($studentData)
    {
        // esto con un poquito de concurrencia explota xD
    	static::$studentData = $studentData;
        $view = new AddResponsibleView();
        $view->show();
    }
    public static function addResponsibleAction()
    {
        $responsibleID = (new ResponsibleRepository())->createResponsible($_POST);
        $studentID = (new StudentRepository())->createStudent(static :: $studentData);

        (new ResponsibleOfStudentRepository())->asociateStudentWithResponsible($studentID,$responsibleID);
        header('Location: /backend');
    }
}