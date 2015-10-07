<?php

class GuardianController
{
    public static function addGuardianView($studentID = null)
    {

        $view = new AddGuardianView();
        $view->show($studentID);
    }
    public static function addGuardianAction()
    {

        $guardianID = (new GuardianModel())->createGuardian($_POST);

        (new GuardianOfStudentModel())->associateStudentWithGuardian($_POST["studentID"],$guardianID);
        header('Location: /ListGuardians');
    }

    public static function listGuardiansView($index = 0,$studentID = null)
    {

        $guardianModel=new GuardianModel();

        $paginationNumber = (new ConfigurationModel())->getPaginationNumber();

        $guardians = $guardianModel->listGuardians($index,$paginationNumber);

        $guardiansAmount = $guardianModel->getGuardiansAmount();


        $view = new ListGuardiansView();

        $view->show($guardians, $guardiansAmount, $studentID,$paginationNumber);
    }

    public  static function deleteGuardianAction($guardianID)
    {


        $guardianModel=new GuardianModel();
        $guardianModel->deleteGuardian($guardianID);

        header('Location: /ListGuardians');
    }

    public  static function updateGuardianView($guardianID)
    {

        $guardianModel=new GuardianModel();
        (new UpdateGuardianView())->show(($guardianModel->getGuardian($guardianID)));
    }

    public  static function updateGuardianAction()
    {

        $guardianModel=new GuardianModel();
        $guardianModel->updateGuardian($_POST);
        header('Location: /ListGuardians');
    }
    public static function associateGuardianAction($guardianID, $studentID)
    {

        (new GuardianOfStudentModel())->associateStudentWithGuardian($studentID,$guardianID);
        header('Location: /ListStudents');
    }
}