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

    public  function updateStudent($studentData, $studentID)
    {
        $query="UPDATE student SET documentType=?,documentNumber=?,lastName=?,firstName=?,birthDate=?,sex=?,
                                      email=?,address=?,admissionDate=?,graduationDate=? WHERE id=?";


        $this->executeQuery($query,array($studentData["documentType"],$studentData["documentNumber"],
            $studentData["lastName"],$studentData["firstName"],$studentData["birthDate"],$studentData["sex"],
            $studentData["email"],$studentData["address"],$studentData["admissionDate"], $studentData["graduationDate"], $studentID));


    }

    public  function  getStudentsByName($studentName)
    {
        $query= "SELECT id,firstName,lastName FROM student WHERE firstName like ? or lastName like ?";
        $result= $this->executeQuery($query, array("%".$studentName."%", "%".$studentName."%"));
        return $result->fetchAll();
    }

    public function getStudents()
    {
        $query= "SELECT id,firstName,lastName,email,sex FROM student where deleted=false";
        $result= $this->executeQuery($query, array());

        return $result->fetchAll();

    }

    public function getStudent ($studentID)
    {
        $query= "SELECT * FROM student WHERE id=?";
        $result= $this->executeQuery($query, array($studentID));

        return $result->fetch();
    }

    public function getStudentsWithPayedEnrolment($fromIndex = 0)
    {

        $query= "SELECT s.id ,s.firstName, s.lastName, s.email, s.sex FROM student as s
                                inner join payment as p on (s.id = p.idStudent)
                                inner join fee as f on (p.idFee = f.id)
                                where f.kind=1
                               ";

        return $this->executeQuery($query,array( $fromIndex))->fetchAll();

    }

    public function getPayedFeesOfStudent($studentID)
    {
        $query= "SELECT f.number, f.year, f.month, f.amount
                 FROM payment as p
                         inner join fee as f on (p.idFee = f.id)
                  WHERE p.idStudent = ?
                  order by f.year, f.month";

        return $this->executeQuery($query,$studentID)->fetchAll();
    }

    public function getUnPayedFeesOfStudent($studentID)
    {
        $query= "SELECT f.number, f.year, f.month, f.amount
                 FROM fee as f
                 WHERE f.id not in (select fe.id
                                     FROM payment as p
                         				  inner join fee as fe on (p.idFee = fe.id)
                  					WHERE p.idStudent = ?)
                  order by f.year, f.month";

        return $this->executeQuery($query,$studentID)->fetchAll();
    }


    public  function deleteStudent($studentID)
    {
        $query= "UPDATE student set deleted=true where id=?";

        $stmnt = $this->executeQuery($query,array($studentID));

    }
}