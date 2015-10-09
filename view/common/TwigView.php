<?php

require_once './vendor/autoload.php';

abstract class TwigView {

    private static $twig;

    public static function getTwig() {

        if (!isset(self::$twig)) {
            //session_start();

            Twig_Autoloader::register();
            $loader = new Twig_Loader_Filesystem('./templates');
            self::$twig = new Twig_Environment($loader);

            if (isset($_SESSION['role']))
                self::$twig->addGlobal('role', $_SESSION['role']);
            if (isset($_SESSION['title']))
                self::$twig->addGlobal('siteTitle', $_SESSION['title']);
            if (isset($_SESSION['description']))
                self::$twig->addGlobal('siteDescription', $_SESSION['description']);
        }
        return self::$twig;
    }
}
