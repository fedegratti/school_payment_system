<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 04/10/2015
 * Time: 18:17
 */
class ConfigurationModel extends PDORepository
{
    public  function updateConfiguration($configData)
    {
        $query = "UPDATE configuration SET siteEnabled=?, title = ?,
                                            description=?, contactEmail=?,
                                            elementsPerList=?, disabledSiteMessage=?";

        $this->executeQuery($query,$configData["siteEnabled"],$configData["title"],
            $configData["description"],$configData["contactEmail"],$configData["elementsPerList"],
            $configData["disabledSiteMessage"]);

    }

    public  function getConfiguration()
    {
        $query = "SELECT * FROM configuration";
        return $this->executeQuery($query,array()) ->fetchAll();
    }

    public  function isSiteEnabled()
    {
        $query = "SELECT siteEnabled from configuration";
        $stmnt =  $this->executeQuery($query,array());
        return $stmnt ->fetch();
    }
}