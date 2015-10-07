<?php

class GuardianOfStudentModel extends PDORepository
{
    public function associateStudentWithGuardian($studentId,$guardianId)
    {
        $query="INSERT INTO guardian_student_relationship (studentId,guardianId)
                        VALUES (?,?)";
        $this->executeQuery($query,array($studentId,$guardianId));
    }

    public function getGuardiansOfStudentAmount ($studentId)
    {
        $query = "SELECT COUNT(*) FROM guardian_student_relationship WHERE studentId=? and deleted=false";

        $stmt = $this->executeUnpreparedQuery($query, array($studentId));
        return $stmt->fetch()[0];
    }
}