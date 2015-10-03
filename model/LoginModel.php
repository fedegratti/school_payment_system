<?php 

class LoginModel extends PDORepository
{
	public function authenticate($username,$password)
	{
		$query="SELECT roleId FROM user WHERE username = ? AND password = ?";

		$stmnt = $this->executeQuery($query,array($username,$password));

		if ($stmnt->rowCount() == 0)
			return 'error';
		else
			return $stmnt->fetch()['roleId'];
	}
}