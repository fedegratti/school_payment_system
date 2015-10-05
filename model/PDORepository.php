<?php
abstract class PDORepository {

    const db_host ="localhost";
    const db_user ="grupo_2";
    const db_pass ="Bz8Kdq4fvyywStdc";
    const db_name ="grupo_2";

    protected static $lastInsertedID;

    private function getConnection(){
        $host 	= static :: db_host;
        $user 	= static :: db_user;
        $pass 	= static :: db_pass;
        $dbName = static :: db_name;
        $dbConnection = new PDO("mysql:dbname=$dbName;host=$host",$user,$pass);

        return $dbConnection;
    }

    protected function executeUnpreparedQuery ($query, $args)
    {
        $connection = $this->getConnection();
        $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        return $this->exeQuery($query,$connection,$args);
    }

    protected function executeQuery ($query, $args)
    {
        $connection = $this->getConnection();
        return $this->exeQuery($query,$connection,$args);
    }

    private function exeQuery ($query, $connection, $args)
    {
        $stmt = $connection->prepare($query);
        $stmt->execute($args);

        self :: $lastInsertedID = $connection ->lastInsertId();
        return $stmt;
    }
    
    protected function queryList($query, $args, $mapper){
        $stmt = $this->executeQuery($query,$args);
        $list = [];

        while($element = $stmt->fetch()){
            $list[] = $mapper($element);
        }
        return $list;
    }

    public function getLastInsertedID()
    {
        return static ::$lastInsertedID;
    }
    
}