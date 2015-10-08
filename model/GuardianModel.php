<?php

class GuardianModel extends PDORepository
{
    public function createGuardian($guardianData)
    {

        $query = "INSERT INTO guardian (kind,lastName,firstName,birthDate,sex,email,phone, address, userId)
                VALUES (?,?,?,?,?,?,?,?,? )";

        $this->executeQuery($query, array($guardianData["kind"], $guardianData["lastName"],
            $guardianData["firstName"], $guardianData["birthDate"], $guardianData["sex"],
            $guardianData["email"], $guardianData["phone"], $guardianData["address"],$guardianData["userId"]));

        return $this->getLastInsertedID();
    }

//    public function cargarDB()
//    {
//        //Mock data
//        $guardianData["kind"] = 0;
//        $guardianData["firstName"] = "nombre";
//        $guardianData["lastName"] = "apellido";
//        $guardianData["sex"] = 0;
//        $guardianData["email"] = "asd@asd.com";
//        $guardianData["phone"] = 1234567;
//        $guardianData["address"] = "direcion re loca";
//
//        $i = 0;
//        for ($i; $i < 50; $i++) {
//            $this->createGuardian($guardianData);
//        }
//    }

    public function listGuardians($index,$paginationNumber)
    {
        $indexSanitized = filter_var($index, FILTER_SANITIZE_NUMBER_INT);

        $query = "SELECT id, firstName, lastName, kind, sex, email, phone, address FROM guardian WHERE deleted=false LIMIT ?,?";

        $stmt = $this->executeUnpreparedQuery($query, array($indexSanitized, $paginationNumber));
        return $stmt->fetchAll();
    }

    public function getGuardiansAmount()
    {
        $query = "SELECT COUNT(id) FROM guardian where deleted=false";

        $stmt = $this->executeQuery($query, array());
        return $stmt->fetch()[0];
    }

    public function getGuardian($guardianID)
    {
        $query = "SELECT * FROM guardian where id=? and deleted=false";
        return $this->executeQuery($query,array($guardianID))->fetch();

    }
    public function deleteGuardian($guardianID)
    {

        $query = "UPDATE guardian set deleted=true where id=?";
        $this->executeQuery($query,array($guardianID));
    }

    public function updateGuardian($guardianData)
    {
        $query = "UPDATE guardian set kind=?,lastName=?,firstName=?,birthDate=?,sex=?,email=?,phone=?, address=?
               WHERE id=?";

        $this->executeQuery($query, array($guardianData["kind"], $guardianData["lastName"],
            $guardianData["firstName"], $guardianData["birthDate"], $guardianData["sex"],
            $guardianData["email"], $guardianData["phone"], $guardianData["address"], $guardianData["guardianID"]));


    }
}