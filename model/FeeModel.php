<?php 

class FeeModel extends PDORepository
{

	public function createFee($feeData)
	{
		$query="INSERT INTO fee (year,month,number,amount,kind,collectorPayment,createDate) VALUES (?,?,?,?,?,?,CURRENT_DATE)";


		$stmnt = $this->executeQuery($query,array($feeData["year"],$feeData["month"], $feeData["number"],
		 										  $feeData["amount"],$feeData["kind"], $feeData["collectorPayment"]));
	}


	public function updateFee($feeData)
	{
		print_r($feeData);
		$query="UPDATE fee SET year=?,month=?,number=?,amount=?,kind=?,collectorPayment=? WHERE id=?";

		$stmnt = $this->executeQuery($query,array($feeData["year"],$feeData["month"], $feeData["number"],
			$feeData["amount"],$feeData["kind"], $feeData["collectorPayment"], $feeData["id"]));
	}

	public function deleteFee($idFee)
	{
		$query= "UPDATE fee set deleted=true where id=?";

		$stmnt = $this->executeQuery($query,array($idFee));
	}

	public function getFee($idFee)
	{
		$query = "select * from fee where id= ? and deleted=false";
		$stmnt = $this->executeQuery($query,array($idFee));
		return $stmnt ->fetch();
	}

	public function getPayedFeesOfStudent($studentID)
	{

		$query= "SELECT f.number, f.year, f.month, f.amount
                 FROM payment as p
                         inner join fee as f on (p.idFee = f.id)
                  WHERE p.idStudent = ?
                  order by f.year, f.month";

		return $this->executeQuery($query,array($studentID))->fetchAll();
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

		return $this->executeQuery($query,array($studentID))->fetchAll();
	}

	public function listFees()
	{
		$query = "select * from fee where deleted=false";
		$stmnt = $this->executeQuery($query,array());
		return $stmnt ->fetchAll();
	}
}