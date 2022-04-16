<?php

class DataAccess
{


    public $connection;
    private $dbServerName = "localhost";
    private $dbUserName = "root";
    private $dbPassword = "";
    private $dbName = "dbdb";

    public function __construct()
    {

        $this->connection = new  mysqli($this->dbServerName, $this->dbUserName, $this->dbPassword, $this->dbName);
    }
    //Todo: Finish the class with other functions
    public function executeQuery($sql)
    {
        //here $sql is the query string
        echo "<br>";
        echo "I am in Execute query";
        var_dump($sql);

        $result = $this->connection->query($sql);
        $this->connection->close();
    }
    public function getData($sql)
    {
        $result = $this->connection->query($sql);
        $this->connection->close();
        $result->fetch_assoc();
        return $result;
        //this will return the data got from a select query
        //You need to extract the data using $result->fetch_assoc()
        //Then you will get  an associative array
    }
}
