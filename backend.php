<?php
	require_once('./vendor/autoload.php');
	$templates = "./templates";
	
	$loader = new Twig_Loader_Filesystem($templates);
	$twig = new Twig_Environment($loader);

	$template = $twig->loadTemplate("backend.tpl");
	$template->display(array('username' => $_REQUEST["username"]));
?>