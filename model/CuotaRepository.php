<?php 

class CuotaRepository extends PDORepository
{

	public function createCuota($cuotaData)
	{
		$query="INSERT INTO usuario (username,password,habilitado,rol) VALUES (?,?,?,?)";


		//$stmnt = $this->executeQuery($query,array($userData["username"],$userData["password"],$enabled,  $userData["rol"]));
	}

}