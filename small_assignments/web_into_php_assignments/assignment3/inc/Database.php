<?php
class Database{
    // Defining database credentials
    private $host = "172.31.22.43";
    private $username = "Vladislav200625361";
    private $password = "NJ4EWrB_jU";
    private $database = "Vladislav200625361";
    public $connection = null;
    // public property to store any errors
    public $error = null;

    // I'm using __construct which is a magic method, it will run as soon as an object of this class is created
    // I prefer to use PDO because I can catch errors as soon as the connection is created
    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log("crudvalidate connection failed: " . $e->getMessage());
            die("crudvalidate connection error.");
        }
    }
}
?>