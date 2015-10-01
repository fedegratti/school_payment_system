<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 30/09/2015
 * Time: 22:12
 */
class ResponsibleRepository extends PDORepository
{

    public  function createResponsible($responsibleData)
    {
        $query="INSERT INTO responsable (tipo,apellido,nombre,fechaNacimiento,sexo,
                                      mail,telefono, direcciona)
                        VALUES (?,?,?,?,?,?,?,? )";


        $this->executeQuery($query,array($responsibleData["responsibleType"], $responsibleData["lastName"],
            $responsibleData["firstName"],$responsibleData["birthDate"],$responsibleData["sex"],
            $responsibleData["email"],$responsibleData["telefono"],$responsibleData["adress"]));


        return $this->getLastInsertedID();

    }
}