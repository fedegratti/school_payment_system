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
        $documentType	= 	$_POST["documentType"];
        $documentNumber	=	$_POST["documentNumber"];
        $fullName		=	$_POST["fullName"];
        $birthDate		=	$_POST["birthDate"];
        $sex			=	$_POST["sex"];
        $email			=	$_POST["email"];
        $address		=	$_POST["address"];
        $ingresoEscuela	=	$_POST["ingresoEscuela"];

       	if($_POST['responsibleType'] == 'createResponsible')
       	{
    		ResponsibleController::showView($_POST);
       	}
       	else
       	{

       	}
    }
}