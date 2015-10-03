<?php

class GuardianOfStudentModel extends PDORepository
{
    public  function associateStudentWithGuardian($studentId,$guardianId)
    {
        $query="INSERT INTO guardian_student_relationship (studentId,guardianId)
                        VALUES (?,?)";
        $this->executeQuery($query,array($studentId,$guardianId));

    }
}