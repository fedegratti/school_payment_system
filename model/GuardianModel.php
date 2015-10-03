<?php

class GuardianModel extends PDORepository
{

    public function createGuardian($guardianData)
    {
        $query="INSERT INTO guardian (kind,lastName,firstName,birthDate,sex,
                                      email,phone, address)
                        VALUES (?,?,?,?,?,?,?,? )";

        $this->executeQuery($query,array($guardianData["kind"], $guardianData["lastName"],
            $guardianData["firstName"],$guardianData["birthDate"],$guardianData["sex"],
            $guardianData["email"],$guardianData["phone"],$guardianData["address"]));


        return $this->getLastInsertedID();

    }

    public function cargarDB ()
    {
        //$guardianData[];
        $guardianData["kind"] = 0;
        $guardianData["firstName"] = "nombre";
        $guardianData["lastName"] = "apellido";
        $guardianData["sex"] = 0;
        $guardianData["email"] = "asd@asd.com";
        $guardianData["phone"] = 1234567;
        $guardianData["address"] = "direcion re loca";

        $i = 0;
        for ($i; $i < 50; $i++)
        {
            $this->createGuardian($guardianData);
        }
    }

    public function listGuardians ($name=null)
    {
        $query="SELECT id, firstName, lastName, kind, sex, email, phone, address FROM guardian";
        $stmt = $this->executeQuery($query, array());
        return $stmt ->fetchAll();
    }
}