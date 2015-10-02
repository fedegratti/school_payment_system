<?php

class StudentController
{
    public static function addStudentView()
    {
        $view = new AddStudentView();
        $view->show();
    }

    public static function updateStudentView()
    {
        $view = new UpdateStudentView();
        $studentData = (new StudentRepository())->getStudent(5);
        $view->show($studentData);
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

    public static function updateStudent ($studentID)
    {
        $studentRepository = new StudentRepository();
        $student=$studentRepository->getStudent($studentID);
    }

    public static function updateStudentAction ()
    {
        $studentRepository = new StudentRepository();
        $studentRepository->updateStudent($_POST);
        header("Location: /login");
    }
}