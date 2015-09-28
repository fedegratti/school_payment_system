<?php 
require_once("./DBConnection.php");
class UserManager
{
	public static function AltaUsuarios()
	{
		include("altaUsuariosView.html");
	}
	public static function AgregarUsuario()
	{

		if( !UserManager::UserAlreadyExists($_POST["username"]))
		{
			$connection = DBConnection::GetDBConnection();
			$query="INSERT INTO usuario (username,password,habilitado,rol)
			VALUES (:username,:password,:habilitado,:rol)";
			$stmnt = $connection->prepare($query);
			$habilitado = true;
			
			$stmnt -> bindParam(":username", $_POST["username"]);
            $stmnt -> bindParam(":password", $_POST["password"]);
            $stmnt -> bindParam(":habilitado", $habilitado);
            $stmnt -> bindParam("rol", $_POST["rol"]);
			$stmnt -> execute();
            $connection = null;

		}


	}

	public static function UserAlreadyExists($username)
	{

		$connection = DBConnection::GetDBConnection();


		$query="SELECT COUNT(*) FROM usuario WHERE username= :username";

		$stmnt = $connection->prepare($query);
		$stmnt ->bindParam(':username',$username);
		$stmnt -> execute();

        $connection = null;
        if ($stmnt->fetchColumn() > 0)
        {
            return true;
        }
        return false;
	}
}
?>