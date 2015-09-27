<?php
	require_once("./vendor/autoload.php");
	require_once("./autoload.php");

	$templates = "./templates";
	
	$loader = new Twig_Loader_Filesystem($templates);
	$twig = new Twig_Environment($loader);

	$contadorDeVisitas = new ContadorDeVisitas();
	

	$template = $twig->loadTemplate("backend.tpl");
	$cantDeVisitas = $contadorDeVisitas->GetCantidadDeVisitas();
	$cantDeVisitas = $cantDeVisitas + 5;

	$contadorDeVisitas-> SetCantidadDeVisitas($cantDeVisitas+5);
	//$template->display(array('username' => $_REQUEST["username"]));

	$template->display(array("username" => $cantDeVisitas));
?>