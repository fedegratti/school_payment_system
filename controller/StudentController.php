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
        $studentRepository = new StudentModel();
        $studentID = $studentRepository->createStudent($_POST);

       	if($_POST['guardianType'] == 'createGuardian')
       	{

    		GuardianController::addGuardianView($studentID);
       	}
       	else
       	{
            GuardianController::listGuardiansView($studentID);
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
        $studentData = (new StudentModel())->getStudentsByName($studentName);
        $view ->show($studentData);
    }
    public static function updateStudentView($studentID)
    {
        $view = new UpdateStudentView();
        $studentData = (new StudentModel())->getStudent($studentID);
        $view->show($studentData);
    }

    public static function updateStudentAction ()
    {
        $studentRepository = new StudentModel();
        $studentRepository->updateStudent($_POST);
        echo "alumno actualizado";
    }

    public  static function deleteStudentAction($studentID)
    {
        //(new StudentRepository())->deleteStudent($studentID);
        echo "alumno eliminado";
    }
}