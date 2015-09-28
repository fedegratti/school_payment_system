<?php

	require __DIR__.'/vendor/autoload.php';

	use PHPRouter\RouteCollection;
	use PHPRouter\Router;
	use PHPRouter\Route;

    require_once('controller/UserController.php');
    require_once('controller/HomeController.php');
    require_once('controller/LoginController.php');
    require_once('controller/BackendController.php');

    require_once('model/PDORepository.php');
    require_once('model/UserRepository.php');

    require_once('view/TwigView.php');
    require_once('view/BackendView.php');
    require_once('view/AddUserView.php');
    require_once('view/HomeView.php');
    require_once('view/LoginView.php');

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

	$collection->attachRoute(new Route('/createUser/', array(
	    '_controller' => 'UserController::createUser',
	    'methods' => 'POST'
	)));


	$router = new Router($collection);
	$router->setBasePath('/');
	$route = $router->matchCurrentRequest();

