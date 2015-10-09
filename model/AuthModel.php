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

	public  function getAuthorizedResourcesOf($role)
	{
		$query = "SELECT r.description
				  FROM resource as r
				  		inner join auth_mapper as am on ( am.resourceId = r.id )
				  		inner join role as ro on ( am.roleId = ro.id)
				  WHERE ro.description = ?";

		$stmnt = $this->executeQuery($query,array($role));
		return $stmnt->fetchAll();
	}
}