<?php 
require_once("./DBConnection.php");
class UserManager
{
	public static function AltaUsuarios()
	{
		
		include ("altaUsuarios.html");
	}
	public static function AgregarUsuario()
	{
		echo "asd";
		DBConnection::GetDBConnection();
		//UserManager::UserAlreadyExists($_POST["username"]);
/*		if( UserManager::UserAlreadyExists($_POST["username"]) == 0)
		{
			$connection = DBConnection::GetDBConnection();
			$query="INSERT INTO usuario (username,password,habilitado,rol)
			VALUES (?,?,?,?)";
			$stmnt = $connection->prepare($query);
			$habilitado = true;
			
			$stmnt -> bind_param("ssii", $_POST["username"],$_POST["password"], $habilitado,$_POST["rol"]);
			$stmnt -> execute();
			mysqli_close($connection);
		}
		else
		{
			echo "chau";
		}
*/
	}

	private static function UserAlreadyExists($username)
	{
		echo $username;
		$connection = DBConnection::GetDBConnection();
		$query="SELECT * FROM usuario";

		$stmnt = $connection->prepare($query);
		
		//$stmnt -> bind_param("s", $username);
		$stmnt -> execute();

		mysqli_close($connection);
		echo ($stmnt->num_rows);
		var_dump($stmnt);

		return ($stmnt->num_rows) != 0;
	}
}


?>