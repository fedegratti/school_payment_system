<?php 

class UserModel extends PDORepository
{
	public function createUser($userData)
	{
		if( !$this->UserAlreadyExists($userData["username"]))
		{
			$query="INSERT INTO user (username,password,enabled,role) VALUES (?,?,?,?)";

            $enabled = true;

            $stmnt = $this->executeQuery($query,array($userData["username"],$userData["password"],$enabled,$userData["role"]));

			return "SUCCESS";
		}
		return "ERROR";
	}

	public function updateUser($userData)
	{
		if($this->UserAlreadyExists($userData["username"]))
		{
			$query="UPDATE user SET username=?,email=?,enabled=?,role=? WHERE id=?";

			$stmnt = $this->executeQuery($query,array($userData["username"],$userData["email"],$userData["enabled"],$userData["role"],$userData["id"]));

			return "SUCCESS";
		}
		return "ERROR";
	}

	public function UserAlreadyExists($id)
	{
		$query="SELECT COUNT(*) FROM user WHERE id= ?";

        $stmnt = $this->executeQuery($query, array($id));

        if ($stmnt->fetchColumn() > 0)
        {
            return true;
        }
        return false;
	}

	public function listUser ($id)
	{
		$query="SELECT id,username,email,enabled,role FROM user WHERE id = ?";

		$stmnt = $this->executeQuery($query,array($id));

		$user = $stmnt->fetch();

		return $user;
	}

	public function listUsers ()
	{
		$query="SELECT id,username,email,enabled,role FROM user";

		$stmnt = $this->executeQuery($query,array());

		$user = $stmnt->fetchAll();

		return $user;
	}

    public  function deleteUser($id)
    {
        if($this->UserAlreadyExists($id))
        {
            $query= "UPDATE user set deleted=true where id=?";

            $stmnt = $this->executeQuery($query,array($id));
            return "SUCCESS";
        }
        return "ERROR";
    }
}