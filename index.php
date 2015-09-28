<?php

	require __DIR__.'/vendor/autoload.php';

	use PHPRouter\RouteCollection;
	use PHPRouter\Router;
	use PHPRouter\Route;
	include ("./UserManager.php");

	$collection = new RouteCollection();
	$collection->attachRoute(new Route('/AgregarUsuario/', array(
	    '_controller' => 'UserManager::AgregarUsuario',
	    'methods' => 'POST'
	)));

		$collection->attachRoute(new Route('/AltaUsuario/', array(
	    '_controller' => 'UserManager::AltaUsuarios',
	    'methods' => 'GET'
	)));

    $collection->attachRoute(new Route('/login/', array(
        '_controller' => "include('login.html'",
        'methods' => 'POST'
    )));

	//$router = new Router($collection);
	//$router->setBasePath('/');
	//$route = $router->matchCurrentRequest();


?>