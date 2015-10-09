<?php

class ConfigurationModel extends PDORepository
{
    public function createConfiguration($configuration)
    {
        if( !$this->ConfigurationAlreadyExists($configuration["name"]))
        {
            $query="INSERT INTO configuration (name,value) VALUES (?,?)";

            $stmnt = $this->executeQuery($query,array($configuration["name"],$configuration["value"]));

            return "SUCCESS";
        }
        return "ERROR";
    }

    public function updateConfiguration($config)
    {
        if($this->ConfigurationAlreadyExists($config["name"]))
        {
            $query = "UPDATE configuration SET value = ? WHERE name=?";

            $this->executeQuery($query,array($config["value"],$config["name"]));

            $_SESSION[$config["name"]] = $config["value"];
            return "SUCCESS";
        }
        return "ERROR";
    }

    public function getConfigurations()
    {
        $query = "SELECT * FROM configuration";
        return $this->executeQuery($query,array()) ->fetchAll();
    }

    public function getConfiguration($configurationName)
    {
        $query = "SELECT * from configuration where name = ?";
        $stmnt =  $this->executeQuery($query,array($configurationName));
        return $stmnt ->fetch();
    }

    public function isSiteEnabled ()
    {
        $siteEnabled = $this->getConfiguration("siteEnabled")["value"];
        return ($siteEnabled == 1);
    }

    public function getPaginationNumber ()
    {
        return $this->getConfiguration("paginationNumber")["value"];
    }

    public function ConfigurationAlreadyExists($configurationName)
    {
        $query="SELECT COUNT(*) FROM configuration WHERE name= ?";

        $stmnt = $this->executeQuery($query, array($configurationName));

        if ($stmnt->fetchColumn() > 0)
        {
            return true;
        }
        return false;
    }

    public function deleteConfiguration($configurationName)
    {
        if($this->ConfigurationAlreadyExists($configurationName))
        {
            $query= "DELETE FROM configuration where name=?";

            $stmnt = $this->executeQuery($query,array($configurationName));
            return "SUCCESS";
        }
        return "ERROR";
    }
}