<?php
class Database{
    // These private properties store the database information
    private $host = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $database = DB_NAME;
    // This property will hold the pdo object
    private $pdo;
    // Creating a variable in case we have an error
    private $errorMessage;
    // Create our method to return the database function
    public function getConnection(){
        // Check the DSN(Data source name) string with host, and current charset
        if ($this->pdo == null){
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8mb4";
                // create a new PDO object using the DSN, username and the password
                $this->pdo = new PDO($dsn, $this->username, $this->password);
                // Set the PDO to throw exceptions when an error occurs
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            // setting connection to null if it is not successful
            catch (PDOException $e){
                $this->errorMessage = $e->getMessage();
                $this->conn = null;
            }
        }
        // no matter what is the result returning the connection because it's just a regular method, not a magic method :)
        return $this->pdo;
    }
    // a method that we'll be activated in case we have an error
    public function getErrorMessage() {
        return $this->errorMessage;
    }
}
?>