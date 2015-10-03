<?php

class StudentModel extends PDORepository
{
    public  function createStudent($studentData)
    {
        $query="INSERT INTO student (documentType,documentNumber,lastName,firstName,birthDate,sex,
                                      email,address,admissionDate,graduationDate,createDate)
                        VALUES (?,?,?,?,?,?,?,?,?,?, CURRENT_DATE )";


        $this->executeQuery($query,array($studentData["documentType"],$studentData["documentNumber"],
            $studentData["lastName"],$studentData["firstName"],$studentData["birthDate"],$studentData["sex"],
            $studentData["email"],$studentData["address"],$studentData["admissionDate"], null));


        return $this->getLastInsertedID();

    }

    public  function updateStudent($studentData)
    {
        $query="INSERT INTO student (documentType,documentNumber,lastName,firstName,birthDate,sex,
                                      email,address,admissionDate,graduationDate,createDate)
                        VALUES (?,?,?,?,?,?,?,?,?,?, CURRENT_DATE )";


        $this->executeQuery($query,array($studentData["documentType"],$studentData["documentNumber"],
            $studentData["lastName"],$studentData["firstName"],$studentData["birthDate"],$studentData["sex"],
            $studentData["email"],$studentData["address"],$studentData["admissionDate"], null));


    }

    public  function  getStudentsByName($studentName)
    {
        $query= "SELECT id,firstName,lastName FROM student WHERE firstName like ? or lastName like ?";
        $result= $this->executeQuery($query, array("%".$studentName."%", "%".$studentName."%"));
        return $result->fetchAll();
    }

    public function getStudent ($studentID)
    {
        $query= "SELECT * FROM student WHERE id=?";
        $result= $this->executeQuery($query, array($studentID));

        return $result->fetch();
    }

    public function getStudentsWithPayedEnrolment($studentID,$fromIndex)
    {
        $query= "SELECT s.firstName, s.lastName FROM student as s
                                inner join payment as p on (s.id = p.idStudent)
                                inner join fee as f on (p.idFee = f.id)
                                where f.kind=1
                                limit ?,20";

        return $this->executeQuery($query,$studentID,$fromIndex)->fetchAll();

    }

    public function getPaymentsOfStudent($studentID)
    {
        $query= "SELECT s.firstName, s.lastName, f.year, f.month
                 FROM student as s
                         inner join payment as p on (s.id = p.idStudent)
                         inner join fee as f on (p.idFee = f.id)
                  WHERE s.id = ?
                  order by f.year, f.month";

        return $this->executeQuery($query,$studentID)->fetchAll();
    }

    public  function deleteStudent($studentID)
    {
        $query= "UPDATE student set deleted=true where id=?";

        $stmnt = $this->executeQuery($query,array($studentID));

    }
}