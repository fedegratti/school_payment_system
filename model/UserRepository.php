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

	public function updateUser($userData)
	{
		if($this->UserAlreadyExists($userData["username"]))
		{
			$query="UPDATE usuario SET username=?,email=?,habilitado=?,rol=? WHERE id=?";

			$stmnt = $this->executeQuery($query,array($userData["username"],$userData["email"],$userData["habilitado"],$userData["rol"],$userData["id"]));

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

	public function listUser ($id)
	{
		$query="SELECT id,username,email,habilitado,rol FROM usuario WHERE id = ?";

		$stmnt = $this->executeQuery($query,array($id));

		$user = $stmnt->fetch();

		return $user;
	}

    public  function deleteUser($username)
    {
        if($this->UserAlreadyExists($username))
        {
            $query= "UPDATE usuario set borrado=true where username=?";

            $stmnt = $this->executeQuery($query,array($username));
            return "SUCCESS";
        }
        return "ERROR";
    }
}