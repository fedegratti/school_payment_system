<?php

class DBConnection
{
	const db_host ="localhost";
	const db_user ="grupo_2";
	const db_pass ="Bz8Kdq4fvyywStdc";
	const db_name ="grupo_2"; 

	public static function GetDBConnection()
	{
		$host 	= static :: db_host;
		$user 	= static :: db_user;
		$pass 	= static :: db_pass;
		$dbName = static :: db_name;
        $dbConnection = new PDO("mysql:dbname=$dbName;host=$host",$user,$pass);

		return $dbConnection;
	}
	
}
?>