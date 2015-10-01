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

       	if($_POST['responsibleType'] == 'createResponsible')
       	{
    		ResponsibleController::addResponsibleView($_POST);
       	}
       	else
       	{

       	}
    }
}