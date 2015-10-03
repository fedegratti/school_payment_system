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

    public static function updateStudentView()
    {
        $view = new UpdateStudentView();
        $studentData = (new StudentRepository())->getStudent(5);
        $view->show($studentData);
    }

    public static function updateStudentAction ()
    {
        $studentRepository = new StudentRepository();
        $studentRepository->updateStudent($_POST);
        echo "alumno actualizado";
    }
    public static function deleteStudentView()
    {
        echo "falta implementar vista";
    }
    public  static function deleteStudentAction($studentID)
    {
        (new StudentRepository())->deleteStudent($studentID);
        echo "alumno eliminado";
    }
}