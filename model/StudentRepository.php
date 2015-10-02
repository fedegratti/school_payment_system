<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 30/09/2015
 * Time: 22:12
 */
class StudentRepository extends PDORepository
{

    public  function createStudent($studentData)
    {
        $query="INSERT INTO alumno (tipoDocumento,numeroDocumento,apellido,nombre,fechaNacimiento,sexo,
                                      mail,direccion,fechaIngreso,fechaEgreso,fechaAlta)
                        VALUES (?,?,?,?,?,?,?,?,?,?, CURRENT_DATE )";


        $this->executeQuery($query,array($studentData["documentType"],$studentData["documentNumber"],
            $studentData["lastName"],$studentData["firstName"],$studentData["birthDate"],$studentData["sex"],
            $studentData["email"],$studentData["adress"],$studentData["ingresoEscuela"], null));


        return $this->getLastInsertedID();

    }

    public  function updateStudent($studentData)
    {
        $query="INSERT INTO alumno (tipoDocumento,numeroDocumento,apellido,nombre,fechaNacimiento,sexo,
                                      mail,direccion,fechaIngreso,fechaEgreso,fechaAlta)
                        VALUES (?,?,?,?,?,?,?,?,?,?, CURRENT_DATE )";


        $this->executeQuery($query,array($studentData["documentType"],$studentData["documentNumber"],
            $studentData["lastName"],$studentData["firstName"],$studentData["birthDate"],$studentData["sex"],
            $studentData["email"],$studentData["adress"],$studentData["ingresoEscuela"], null));


    }


    public function getStudent ($studentID)
    {
        $query= "SELECT * FROM alumno WHERE id=?";
        $result= $this->executeQuery($query, array($studentID));

        return $result->fetch();
    }

}