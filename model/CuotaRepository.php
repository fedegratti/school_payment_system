<?php 

class CuotaRepository extends PDORepository
{

	public function createCuota($cuotaData)
	{
		$query="INSERT INTO cuota (anio,mes,numero,monto,tipo,comisionCobrador,fechaAlta) VALUES (?,?,?,?,?,?,CURRENT_DATE)";


		$stmnt = $this->executeQuery($query,array($cuotaData["year"],$cuotaData["month"], $cuotaData["numeroCuota"],
		 										  $cuotaData["monto"],$cuotaData["tipoCuota"], $cuotaData["comision"]));
	}

	public  function deleteCuota($idCuota)
	{
		$query= "UPDATE cuota set borrado=true where id=?";

		$stmnt = $this->executeQuery($query,array($idCuota));
	}

	public  function getCuota($idCuota)
	{
		$query = "select * from cuota where id= ?";
		$stmnt = $this->executeQuery($query,array($idCuota));
		return $stmnt ->fetch();
	}
}