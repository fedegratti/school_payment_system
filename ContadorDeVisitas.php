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
		$result = $connection->prepare($query);
		$result -> bind_param("i", $cantidadDeVisitas);
		$result -> execute();
		mysqli_close($connection);
		
	}

	private function GetDBConnection()
	{
		$host 	= static :: db_host;
		$user 	= static :: db_user;
		$pass 	= static :: db_pass;
		$dbName = static :: db_name;
		$dbConnection = mysqli_connect($host,$user,$pass,$dbName) or die("Error " . mysqli_error($dbConnection));
		return $dbConnection;
	}
}

?>