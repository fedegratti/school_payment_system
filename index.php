<?php

	require __DIR__.'/vendor/autoload.php';

	use PHPRouter\RouteCollection;
	use PHPRouter\Router;
	use PHPRouter\Route;

    // Carga las cosas q esten en la carpeta model, view, controller.

    require_once __DIR__.'/autoload.php';

    if (!ConfigurationController::isSiteEnabled())
    {
        ConfigurationController::siteUnavailableView();
        return;
    }

	$collection = new RouteCollection();


    $collection->attachRoute(new Route('/', array(
        '_controller' => 'HomeController::showView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/Login/', array(
        '_controller' => 'LoginController::loginView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/Logout/', array(
        '_controller' => 'LoginController::LogoutView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/login/:error', array(
        '_controller' => 'LoginController::loginView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/loginAction/', array(
        '_controller' => 'LoginController::loginAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/backend/', array(
        '_controller' => 'BackendController::showView',
        'methods' => 'GET'
    )));

	$collection->attachRoute(new Route('/AddUser/', array(
		'_controller' => 'UserController::addUserView',
		'methods' => 'GET'
	)));

	$collection->attachRoute(new Route('/AddUserAction/', array(
	    '_controller' => 'UserController::addUserAction',
	    'methods' => 'POST'
	)));

    $collection->attachRoute(new Route('/ListUsers/', array(
        '_controller' => 'UserController::listUsersView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateUser/:id', array(
        '_controller' => 'UserController::updateUserView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateUserAction/:userID', array(
        '_controller' => 'UserController::updateUserAction',
        'methods' => 'POST'
    )));

	$collection->attachRoute(new Route('/AddStudent/', array(
        '_controller' => 'StudentController::addStudentView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/AddStudentAction/', array(
        '_controller' => 'StudentController::addStudentAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/ListStudents/', array(
        '_controller' => 'StudentController::listStudentsView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListStudents/:studentName', array(
        '_controller' => 'StudentController::listStudentsWithNameView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListStudentsWithPayedEnrolment/:fromIndex', array(
        '_controller' => 'StudentController::listStudentsWithPayedEnrolmentView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListAdmittedStudents/', array(
        '_controller' => 'StudentController::listAdmittedStudentsView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddGuardian/', array(
        '_controller' => 'GuardianController::addGuardianView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddGuardianAction/', array(
        '_controller' => 'GuardianController::addGuardianAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/AddFee/', array(
        '_controller' => 'FeeController::addFeeView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddFeeAction/', array(
        '_controller' => 'FeeController::addFeeAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/UpdateFeeAction/', array(
        '_controller' => 'FeeController::updateFeeAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/UpdateFee/:feeID', array(
        '_controller' => 'FeeController::updateFeeView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/DeleteFeeAction/:feeID', array(
        '_controller' => 'FeeController::deleteFeeAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListFees/', array(
        '_controller' => 'FeeController::listFeesView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListFees/:id', array(
        '_controller' => 'FeeController::listStudentFeesView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListGuardians/:index', array(
        '_controller' => 'GuardianController::listGuardiansView',
        'methods' => 'GET'
    )));

//    $collection->attachRoute(new Route('/ListGuardians/', array(
//        '_controller' => 'GuardianController::listGuardiansView',
//        'methods' => 'GET'
//    )));

$collection->attachRoute(new Route('/AssociateGuardianAction/:guardianID/:studentID', array(
        '_controller' => 'GuardianController::associateGuardianAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateStudent/:studentID', array(
        '_controller' => 'StudentController::updateStudentView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateStudentAction/:studentID', array(
        '_controller' => 'StudentController::updateStudentAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/DeleteUser/:id', array(
        '_controller' => 'UserController::deleteUserView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/DeleteUserAction/:id', array(
        '_controller' => 'UserController::deleteUserAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/DeleteStudentAction/:studentID', array(
        '_controller' => 'StudentController::deleteStudentAction',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/DeleteUserAction', array(
        '_controller' => 'StudentController::deleteStudentAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/DeleteFee/:feeID', array(
        '_controller' => 'FeeController::deleteFeeAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListConfiguration/', array(
        '_controller' => 'ConfigurationController::listConfigurationView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/UpdateConfiguration/', array(
        '_controller' => 'ConfigurationController::updateConfigurationView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/UpdateConfigurationAction/', array(
        '_controller' => 'ConfigurationController::updateConfigurationAction',
        'methods' => 'POST'
    )));
    $collection->attachRoute(new Route('/SiteUnavailable/', array(
        '_controller' => 'ConfigurationController::siteUnavailableView',
        'methods' => 'GET'
    )));


	$router = new Router($collection);
	$router->setBasePath('/');
	$route = $router->matchCurrentRequest();

