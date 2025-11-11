<?php

namespace includes;
class Database
{
    // Defining database credentials
    private $host = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $database = DB_NAME;
    public $connection = null;

    // I'm using __construct which is a magic method, it will run as soon as an object of this class is created
    // I prefer to use PDO because I can catch errors as soon as the connection is created
    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            die("Database connection error.");
        }
    }
}

?>