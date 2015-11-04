<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 03/11/2015
 * Time: 23:16
 */
class StudentService
{
    public static function getStudentsPositions()
    {
        $studentModel = new StudentModel();
        $positions = $studentModel->getStudentsPositions();
        $processedPositions = [];
        foreach($positions as $pos)
        {
            array_push($processedPositions,[floatval($pos[0]),floatval($pos[1])]);
        }

        (new ServiceView())->showPlainText($processedPositions);
    }

}