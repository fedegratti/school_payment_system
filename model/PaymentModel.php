<?php 

class PaymentModel extends PDORepository
{

	public function paymentFee($paymentData)
	{
		$query = "INSERT INTO payment (idStudent,idFee,date,grantholding,createDate,fechaActualizado) VALUES (?,?,?,?,CURRENT_DATE,?,)";


		$stmnt = $this->executeQuery($query, array($paymentData["idStudent"], $paymentData["idFee"], $paymentData["date"],
			$paymentData["grandholding"], $paymentData["createDate"], $paymentData["fechaActualizado"]));
	}

}