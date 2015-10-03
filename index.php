<?php

	require_once '/vendor/autoload.php';

	use PHPRouter\RouteCollection;
	use PHPRouter\Router;
	use PHPRouter\Route;

    // Carga las cosas q esten en la carpeta model, view, controller.
    // El resto lo van a tener q declarar abajo de esto.
    require_once('/Autoload.php');

	$collection = new RouteCollection();


    $collection->attachRoute(new Route('/', array(
        '_controller' => 'HomeController::showView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/login/', array(
        '_controller' => 'LoginController::showView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/backend/', array(
        '_controller' => 'BackendController::showView',
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

    $collection->attachRoute(new Route('/ListStudents/', array(
        '_controller' => 'StudentController::listStudentsView',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/ListStudents/:studentName', array(
        '_controller' => 'StudentController::listStudentsWithNameView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddResponsibleAction/', array(
        '_controller' => 'ResponsibleController::addResponsibleAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/AddCuota/', array(
        '_controller' => 'CuotaController::addCuotaView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/AddCuotaAction/', array(
        '_controller' => 'CuotaController::addCuotaAction',
        'methods' => 'POST'
    )));
    $collection->attachRoute(new Route('/GetResponsibleList/', array(
        '_controller' => 'ResponsibleController::getResponsibleListView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/asociateResponsibleAction/:responsibleID/:studentID', array(
        '_controller' => 'ResponsibleController::asociateResponsibleAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateStudent/:id', array(
        '_controller' => 'StudentController::updateStudentView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateStudentAction', array(
        '_controller' => 'StudentController::updateStudentAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/DeleteUser', array(
        '_controller' => 'UserController::deleteUserView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/DeleteUserAction', array(
        '_controller' => 'UserController::deleteUserAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/DeleteStudentAction/:studentID', array(
        '_controller' => 'StudentController::deleteStudentAction',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/DeleteUserAction', array(
        '_controller' => 'StudentController::deleteStudentAction',
        'methods' => 'POST'
    )));

	$router = new Router($collection);
	$router->setBasePath('/');
	$route = $router->matchCurrentRequest();