<?php

class StudentController
{
    public static function addStudentView()
    {
        $view = new AddStudentView();
        $view->show();
    }
    public static function addStudentAction()
    {
        $studentRepository = new StudentRepository();
        $studentID = $studentRepository->createStudent($_POST);

       	if($_POST['responsibleType'] == 'createResponsible')
       	{

    		ResponsibleController::addResponsibleView($studentID);
       	}
       	else
       	{
            ResponsibleController::getResponsibleListView($studentID);
       	}
    }
}