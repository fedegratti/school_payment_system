<?php

class GuardianOfStudentModel extends PDORepository
{
    public function associateStudentWithGuardian($studentId,$guardianId)
    {
        $query="INSERT INTO guardian_student_relationship (studentId,guardianId)
                        VALUES (?,?)";
        $this->executeQuery($query,array($studentId,$guardianId));
    }

    public  function breakStudentGuardianRelationship($studentId,$guardianId)
    {
        $query="DELETE FROM guardian_student_relationship where studentId=? and guardianId=?";
        $this->executeQuery($query,array($studentId,$guardianId));
    }
    public function getGuardiansOfStudentAmount ($studentId)
    {
        $query = "SELECT COUNT(*) FROM guardian_student_relationship WHERE studentId=? and deleted=false";

        $stmt = $this->executeQuery($query, array($studentId));
        return $stmt->fetch()[0];
    }

    public function getStudentGuardians ($studentId)
    {
        $query = "SELECT g.id, g.firstName, g.lastName, g.email, g.sex, g.kind  FROM guardian_student_relationship as gs
                  inner join guardian as g on (g.id = gs.guardianId)
                  WHERE gs.studentId=? and g.deleted=false";

        $stmt = $this->executeQuery($query, array($studentId));
        return $stmt->fetchAll();
    }

    public  function getStudentsOfGuardian($guardianID)
    {
        $query = "SELECT * FROM guardian_student_relationship as gs inner join student as s on (gs.studentId = s.id)
                            WHERE gs.guardianId=? and s.deleted=false";

        $stmt = $this->executeQuery($query, array($guardianID));
        return $stmt->fetchAll();
    }
}