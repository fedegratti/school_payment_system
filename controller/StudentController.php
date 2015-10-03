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

    public  static function listStudentsView()
    {
        if(isset($_POST["studentName"]))
        {
            StudentController::listStudentsWithNameView($_POST["studentName"]);
        }
        else
        {
            $view = new ListStudentsView();
            $view ->show();
        }

    }
    public  static function listStudentsWithNameView($studentName)
    {
        $view = new ListStudentsView();
        $studentData = (new StudentRepository())->getStudentsByName($studentName);
        $view ->show($studentData);
    }
    public static function updateStudentView($studentID)
    {
        $view = new UpdateStudentView();
        $studentData = (new StudentRepository())->getStudent($studentID);
        $view->show($studentData);
    }

    public static function updateStudentAction ()
    {
        $studentRepository = new StudentRepository();
        $studentRepository->updateStudent($_POST);
        echo "alumno actualizado";
    }

    public  static function deleteStudentAction($studentID)
    {
        //(new StudentRepository())->deleteStudent($studentID);
        echo "alumno eliminado";
    }
}