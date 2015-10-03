<?php

class GuardianModel extends PDORepository
{

    public  function createGuardian($responsibleData)
    {
        $query="INSERT INTO guardian (kind,lastName,firstName,birthDate,sex,
                                      email,phone, address)
                        VALUES (?,?,?,?,?,?,?,? )";


        $this->executeQuery($query,array($responsibleData["kind"], $responsibleData["lastName"],
            $responsibleData["firstName"],$responsibleData["birthDate"],$responsibleData["sex"],
            $responsibleData["email"],$responsibleData["phone"],$responsibleData["address"]));


        return $this->getLastInsertedID();

    }

    public function listGuardians ($name=null)
    {
        $query="SELECT id, firstName FROM guardian";
        $stmt = $this->executeQuery($query, array());
        return $stmt ->fetchAll();
    }
}