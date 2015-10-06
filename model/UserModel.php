<?php 

class UserModel extends PDORepository
{
	public function createUser($userData)
	{

		if( !$this->UserAlreadyExists($userData["username"]))
		{
			$query="INSERT INTO user (username,password,email, enabled,roleid,deleted) VALUES (?,?,?,?,?,?)";


			$deleted = false;
            $stmnt = $this->executeQuery($query,array($userData["username"],sha1($userData["password"]),$userData["email"],$userData["enabled"],$userData["role"],$deleted));

			return "SUCCESS";
		}
		return "ERROR";
	}

	public function updateUser($userData)
	{

		if($this->UserAlreadyExists($userData["id"]))
		{
			$query="UPDATE user SET username=?,password=?,email=?,enabled=?,roleid=? WHERE id=?";

			$stmnt = $this->executeQuery($query,array($userData["username"],sha1($userData["password"]),$userData["email"],$userData["enabled"],$userData["role"],$userData["id"]));

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

	public function getUser ($id)
	{
		$query="SELECT id,username,email,enabled,roleid FROM user WHERE id = ?";

		$stmnt = $this->executeQuery($query,array($id));

		$user = $stmnt->fetch();

		return $user;
	}
	public  function getRolByUsername($username)
	{
		$query="SELECT roleid FROM user WHERE username = ?";

		$stmnt = $this->executeQuery($query,array($username));

		$user = $stmnt->fetch();

		return $user;
	}

	public function getUsers ()
	{
		$query="SELECT id,username,email,enabled,roleid FROM user where deleted=false";

		$stmnt = $this->executeQuery($query,array());

		$user = $stmnt->fetchAll();

		return $user;
	}

	public function getUsersAmount()
	{
		$query = "SELECT COUNT(id) FROM users where deleted=false";

		$stmt = $this->executeQuery($query, array());
		return $stmt->fetch()[0];
	}

	public  function isEnabled($username)
	{
		$query="SELECT enabled FROM user WHERE username = ?";

		$stmnt = $this->executeQuery($query,array($username));

		$isEnabled = $stmnt->fetch();

		return $isEnabled["enabled"] == 1;
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