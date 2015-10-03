<?php 

class FeeModel extends PDORepository
{

	public function createFee($feeData)
	{
		$query="INSERT INTO fee (year,month,number,amount,kind,collectorPayment,createDate) VALUES (?,?,?,?,?,?,CURRENT_DATE)";


		$stmnt = $this->executeQuery($query,array($feeData["year"],$feeData["month"], $feeData["number"],
		 										  $feeData["amount"],$feeData["kind"], $feeData["collectorPayment"]));
	}

	public  function deleteFee($idFee)
	{
		$query= "UPDATE fee set deleted=true where id=?";

		$stmnt = $this->executeQuery($query,array($idFee));
	}

	public  function getFee($idFee)
	{
		$query = "select * from fee where id= ?";
		$stmnt = $this->executeQuery($query,array($idFee));
		return $stmnt ->fetch();
	}
}