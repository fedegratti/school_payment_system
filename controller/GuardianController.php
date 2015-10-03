<?php

class GuardianController
{
    public static function addGuardianView($studentID)
    {
        $view = new AddGuardianView();
        $view->show($studentID);
    }
    public static function addGuardianAction()
    {
        $guardianID = (new GuardianModel())->createGuardian($_POST);

        (new GuardianOfStudentModel())->associateStudentWithGuardian($_POST["studentID"],$guardianID);
        header('Location: /backend');
    }

    public static function listGuardiansView($studentID = null)
    {
        $guardianModel=new GuardianModel();
       // $guardianModel->cargarDB();

        $guardians = $guardianModel->listGuardians();

       $view = new listGuardiansView();
       $view->show($guardians, $studentID);
    }

    public static function associateGuardianAction($guardianID, $studentID)
    {
        (new GuardianOfStudentModel())->associateStudentWithGuardian($studentID,$guardianID);
        header('Location: /login');
    }
}