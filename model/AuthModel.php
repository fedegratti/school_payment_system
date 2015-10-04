<?php 

class AuthModel extends PDORepository
{
	public function authenticate($role,$resource)
	{
		$query="SELECT * FROM resource as re
				INNER JOIN auth_mapper as am ON (re.id = am.resourceId)
				INNER JOIN role as ro ON (ro.id = am.roleId)
				WHERE re.description = ? AND ro.id = ?
				";

		$stmnt = $this->executeQuery($query,array($resource,$role));

		return ($stmnt->rowCount() > 0);
	}
}