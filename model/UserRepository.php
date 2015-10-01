<?php 

class UserRepository extends PDORepository
{

	public function createUser($userData)
	{
		if( !$this->UserAlreadyExists($userData["username"]))
		{
			$query="INSERT INTO usuario (username,password,habilitado,rol) VALUES (?,?,?,?)";

            $enabled = true;

            $stmnt = $this->executeQuery($query,array($userData["username"],$userData["password"],$enabled,  $userData["rol"]));

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