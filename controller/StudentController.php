<?php

class StudentController
{
    public static function addStudentView()
    {
        AuthController::checkPermission();
        $view = new AddStudentView();
        $view->show();
    }

    public static function addStudentAction()
    {
        AuthController::checkPermission();
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
        AuthController::checkPermission();
        $view = new ListStudentsView();
        $studentData = (new StudentModel())->getStudents();
        $view ->show($studentData);

    }
    public  static function listStudentsWithNameView($studentName)
    {
        AuthController::checkPermission();
        $view = new ListStudentsView();
        $studentData = (new StudentModel())->getStudentsByName($studentName);
        $view ->show($studentData);
    }
    public static function updateStudentView($studentID)
    {
        AuthController::checkPermission();
        $view = new UpdateStudentView();
        $studentData = (new StudentModel())->getStudent($studentID);
        $view->show($studentData, $studentID);
    }

    public static function updateStudentAction ($studentID)
    {

        AuthController::checkPermission();
        $studentRepository = new StudentModel();
        $studentRepository->updateStudent($_POST, $studentID);
        header("Location: /ListStudents");
    }

    public static function listStudentsWithPayedEnrolmentView($startingIndex = 0)
    {
        AuthController::checkPermission();
        $studentRepository = new StudentModel();
        $students = $studentRepository->getStudentsWithPayedEnrolment($startingIndex);
        (new StudentsWithPayedEnrolmentView())->show($students);
    }
    public  static function deleteStudentAction($studentID)
    {
        AuthController::checkPermission();
        (new StudentModel())->deleteStudent($studentID);
        header("Location: /ListStudents");
    }
}