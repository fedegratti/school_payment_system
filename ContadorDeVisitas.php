<?php
class ContadorDeVisitas
{
	const db_host ="localhost";
	const db_user ="grupo_2";
	const db_pass ="Bz8Kdq4fvyywStdc";
	const db_name ="grupo_2"; 
	
	public function GetCantidadDeVisitas()
	{

		$connection = $this -> GetDBConnection();
		$result = $connection -> query("select cantidadDeVisitas from ContadorTest");

		$cantidadDeVisitas = $result -> fetch_row();
		
		mysqli_close($connection);
		
		return $cantidadDeVisitas[0];
	}

	public function SetCantidadDeVisitas($cantDeVisitas)
	{
		
		$connection = $this -> GetDBConnection();

		$query = "update contadorTest set cantidadDeVisitas=?";
		//$stmnt = msqli_prepare($connection, $query);
		$stmnt = $connection->prepare($query);
		//$cantDeVisitas = 10;
		$stmnt -> bind_param("i", $cantDeVisitas);
		$stmnt -> execute();
		//$stmnt -> close();
		$connection -> close();
		
	}

	private function GetDBConnection()
	{
		$host 	= static :: db_host;
		$user 	= static :: db_user;
		$pass 	= static :: db_pass;
		$dbName = static :: db_name;
		$dbConnection = new mysqli($host,$user,$pass,$dbName) or die("Error " . mysqli_error($dbConnection));
		return $dbConnection;
	}
}

?>