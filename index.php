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

    session_start();

	$collection = new RouteCollection();


    $collection->attachRoute(new Route('/', array(
        '_controller' => 'HomeController::showHomeView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/Login/', array(
        '_controller' => 'LoginController::loginView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/Logout/', array(
        '_controller' => 'LoginController::logoutView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/Login/:error', array(
        '_controller' => 'LoginController::loginView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/LoginAction/', array(
        '_controller' => 'LoginController::loginAction',
        'methods' => 'POST'
    )));

	$collection->attachRoute(new Route('/AddUser/', array(
		'_controller' => 'UserController::addUserView',
		'methods' => 'GET'
	)));

	$collection->attachRoute(new Route('/AddUserAction/', array(
	    '_controller' => 'UserController::addUserAction',
	    'methods' => 'POST'
	)));

    $collection->attachRoute(new Route('/ListUsers/:index', array(
        '_controller' => 'UserController::listUsersView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListUsers/:index/:userId', array(
        '_controller' => 'UserController::listUsersView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListUsers/', array(
        '_controller' => 'UserController::listUsersView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateUser/:id', array(
        '_controller' => 'UserController::updateUserView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateUserAction/', array(
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

    $collection->attachRoute(new Route('/listStudentGuardiansView/:studentId', array(
        '_controller' => 'StudentController::listStudentGuardiansView',
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

    $collection->attachRoute(new Route('/AddGuardian/:studentId', array(
        '_controller' => 'GuardianController::addGuardianView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddGuardianForUser/:userId', array(
        '_controller' => 'GuardianController::addGuardianForUserView',
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

    $collection->attachRoute(new Route('/DeleteFee/:feeID', array(
        '_controller' => 'FeeController::deleteFeeAction',
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

    $collection->attachRoute(new Route('/PayOrGrantFee/:feeId/:studentID/:grant', array(
        '_controller' => 'FeeController::payOrGrantFeeView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListGuardians/:index', array(
        '_controller' => 'GuardianController::listGuardiansView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/ListGuardians/', array(
        '_controller' => 'GuardianController::listGuardiansView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/DeleteGuardian/:guardianID', array(
        '_controller' => 'GuardianController::deleteGuardianAction',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/UpdateGuardian/:guardianID', array(
        '_controller' => 'GuardianController::updateGuardianView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/UpdateGuardianAction/', array(
        '_controller' => 'GuardianController::updateGuardianAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/AssociateGuardianWithStudentAction/:guardianID/:studentID', array(
        '_controller' => 'GuardianController::associateWithStudentAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AssociateGuardianWithUser/:userID', array(
        '_controller' => 'GuardianController::associateWithUserView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AssociateGuardianWithUserAction/:guardianID/:userID', array(
        '_controller' => 'GuardianController::associateWithUserAction',
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

    $collection->attachRoute(new Route('/AddConfiguration/', array(
        '_controller' => 'ConfigurationController::addConfigurationView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddConfigurationAction/', array(
        '_controller' => 'ConfigurationController::addConfigurationAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/ListConfigurations/', array(
        '_controller' => 'ConfigurationController::listConfigurationsView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateConfiguration/:configurationName', array(
        '_controller' => 'ConfigurationController::updateConfigurationView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateConfigurationAction/', array(
        '_controller' => 'ConfigurationController::updateConfigurationAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/DeleteConfigurationAction/:configurationName', array(
        '_controller' => 'ConfigurationController::deleteConfigurationAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/SiteUnavailable/', array(
        '_controller' => 'ConfigurationController::siteUnavailableView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/BreakGuardianStudentRelationship/:guardianId/:studentId', array(
        '_controller' => 'StudentController::breakGuardianStudentRelationshipAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AssociateGuardianWithStudent/:studentId', array(
        '_controller' => 'GuardianController::associateWithStudentView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AssociateGuardianWithStudent/:studentId/:pagination', array(
        '_controller' => 'GuardianController::associateWithStudentView',
        'methods' => 'GET'
    )));

	$router = new Router($collection);
	$router->setBasePath('/');

	$route = $router->matchCurrentRequest();

    if (!$route)
        ConfigurationController::actionNotFound();
    else
    {
        AuthController::checkPermission($route->getAction());
        $route->dispatch();
    }
