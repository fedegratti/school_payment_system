<?php

class ResponsibleController
{
	private static $studentData;
    public static function addResponsibleView($studentData)
    {
    	self::$studentData = $studentData;
        $view = new AddResponsibleView();
        $view->show();
    }
    public static function addResponsibleAction()
    {
    	
    }
}