<?php 

class UserRepository extends PDORepository
{
	private static $instance;

	public static function getInstance() {

		if (!isset(self::$instance)) {
			self::$instance = new self();
		}

		return self::$instance;
	}
	public function createUser()
	{
		if( !$this->UserAlreadyExists($_POST["username"]))
		{
			$query="INSERT INTO usuario (username,password,habilitado,rol) VALUES (?,?,?,?)";

            $enabled = true;

            $stmnt = $this->executeQuery($query,array($_POST["username"],$_POST["password"],$enabled,  $_POST["rol"]));

			return "SUCCESS";
		}
		return "ERROR";
	}

	public function UserAlreadyExists($username)
	{
		$query="SELECT COUNT(*) FROM usuario WHERE username= ?";

        $stmnt = $this->executeQuery($query, array($username));

        if ($stmnt->fetchColumn() > 0)
        {
            return true;
        }
        return false;
	}
}