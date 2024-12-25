<?php


class DBConnection {
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'MyStr0ng!Passw0rd';
    private $dbname = 'Test_DataBase';
    public $conn;


    function __construct()
    {
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected Successfuly";
        } 
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}
?>