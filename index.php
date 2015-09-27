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

	$router = new Router($collection);
	$router->setBasePath('/');
	$route = $router->matchCurrentRequest();

	//var_dump($route);
?>