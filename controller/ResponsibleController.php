<?php

class ResponsibleController
{

    public static function addResponsibleView($studentID)
    {

        $view = new AddResponsibleView();
        $view->show($studentID);
    }
    public static function addResponsibleAction()
    {
        $responsibleID = (new ResponsibleRepository())->createResponsible($_POST);

        (new ResponsibleOfStudentRepository())->asociateStudentWithResponsible($_POST["studentID"],$responsibleID);
        header('Location: /backend');
    }

    public static function getResponsibleListView($alumnoID)
    {
        $responsibleRepository=new ResponsibleRepository();
        $responsibles = $responsibleRepository->getResponsibleList();

       $view = new GetResponsibleListView();
       $view->show($responsibles, $alumnoID);
    }

    public static function asociateResponsibleAction($responsibleID, $studentID)
    {
        (new ResponsibleOfStudentRepository())->asociateStudentWithResponsible($studentID,$responsibleID);
        header('Location: /login');
    }
}