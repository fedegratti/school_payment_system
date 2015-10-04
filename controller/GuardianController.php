<?php

class GuardianController
{
    public static function addGuardianView($studentID = null)
    {
        AuthController::checkPermission();
        $view = new AddGuardianView();
        $view->show($studentID);
    }
    public static function addGuardianAction()
    {
        AuthController::checkPermission();
        $guardianID = (new GuardianModel())->createGuardian($_POST);

        (new GuardianOfStudentModel())->associateStudentWithGuardian($_POST["studentID"],$guardianID);
        header('Location: /backend');
    }

    public static function listGuardiansView($index = 0,$studentID = null)
    {
        AuthController::checkPermission();
        $guardianModel=new GuardianModel();
       // $guardianModel->cargarDB();

       $guardians = $guardianModel->listGuardians($index);
       $guardiansAmount = $guardianModel->getGuardiansAmount();

       $view = new listGuardiansView();
       $view->show($guardians, $guardiansAmount, $studentID);
    }

    public static function associateGuardianAction($guardianID, $studentID)
    {
        AuthController::checkPermission();
        (new GuardianOfStudentModel())->associateStudentWithGuardian($studentID,$guardianID);
        header('Location: /login');
    }
}