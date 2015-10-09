<?php

class GuardianController
{
    public static function addGuardianView($student = null)
    {
        $view = new AddGuardianView();
        $view->show($student);
    }
    public static function addGuardianForUserView($userId)
    {
        $user = (new UserModel())->getUser($userId);
        $view = new AddGuardianForUserView();
        $view->show($user);
    }

    public static function addGuardianAction()
    {
        $guardianID = (new GuardianModel())->createGuardian($_POST);

        if ($_POST["studentID"] != null)
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

    public static function associateWithStudentView ($index = 0,$studentID)
    {
        $guardianModel=new GuardianModel();

        $paginationNumber = (new ConfigurationModel())->getPaginationNumber();

        $guardians = $guardianModel->listGuardians($index,$paginationNumber);

        $guardiansAmount = $guardianModel->getGuardiansAmount();


        $view = new GuardianWithStudentAssociationView();

        $view->show($guardians, $guardiansAmount, $studentID,$paginationNumber);
    }

    public static function associateWithUserView ($userID,$index = 0)
    {
        $guardianModel=new GuardianModel();

        $paginationNumber = (new ConfigurationModel())->getPaginationNumber();

        $guardians = $guardianModel->listGuardians($index,$paginationNumber);

        $guardiansAmount = $guardianModel->getGuardiansAmount();


        $view = new GuardianWithUserAssociationView();

        $view->show($guardians, $guardiansAmount, $userID,$paginationNumber);
    }

    public static function associateWithStudentAction($guardianID, $studentID)
    {
        (new GuardianOfStudentModel())->associateStudentWithGuardian($studentID,$guardianID);
        header('Location: /ListStudents');
    }

    public static function associateWithUserAction($guardianID, $userId)
    {
        $guardian["id"] = $guardianID;
        $guardian["userId"] = $userId;
        (new GuardianModel())->updateGuardianUser($guardian);
        header('Location: /ListUsers');
    }
}