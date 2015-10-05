<?php

class ConfigurationModel extends PDORepository
{
    public function createConfiguration($configuration)
    {
        if( !$this->ConfigurationAlreadyExists($configuration["configuration"]))
        {
            $query="INSERT INTO configuration (configuration,value) VALUES (?,?)";

            $stmnt = $this->executeQuery($query,array($configuration["configuration"],$configuration["value"]));

            return "SUCCESS";
        }
        return "ERROR";
    }

    public function updateConfiguration($config)
    {
        if($this->ConfigurationAlreadyExists($config["configuration"]))
        {
            $query = "UPDATE configuration SET value = ? WHERE configuration=?";

            $this->executeQuery($query,array($config["value"],$config["configuration"]));

            return "SUCCESS";
        }
        return "ERROR";
    }

    public function getConfigurations()
    {
        $query = "SELECT * FROM configuration";
        return $this->executeQuery($query,array()) ->fetchAll();
    }

    public function getConfiguration($configuration)
    {
        $query = "SELECT * from configuration where configuration = ?";
        $stmnt =  $this->executeQuery($query,array($configuration));
        return $stmnt ->fetch();
    }

    public function isSiteEnabled ()
    {
        $siteEnabled = $this->getConfiguration("siteEnabled")["value"];
        return ($siteEnabled == 1);
    }

    public function ConfigurationAlreadyExists($configuration)
    {
        $query="SELECT COUNT(*) FROM configuration WHERE configuration= ?";

        $stmnt = $this->executeQuery($query, array($configuration));

        if ($stmnt->fetchColumn() > 0)
        {
            return true;
        }
        return false;
    }

    public function deleteConfiguration($configuration)
    {
        if($this->ConfigurationAlreadyExists($configuration))
        {
            $query= "DELETE FROM configuration where configuration=?";

            $stmnt = $this->executeQuery($query,array($configuration));
            return "SUCCESS";
        }
        return "ERROR";
    }
}