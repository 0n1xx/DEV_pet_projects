<?php

use includes\Database;

require_once 'Database.php';
    // First of all, we require a database class which is a connection to our database
    // Using this class, we can perform all our crud operations
    class CrudProducts{

        // created two variables that I'm going to use within this class
        private $connection;
        public $error = [];

        private $table_name = "products_description"; // The table on which we can perform all crud operations

        // Constructor: receives the database connection object
        public function __construct($db) {
            $this->connection = $db;
        }

        // Creating a private function which will be called inside the public function
        // This function allows us to check that if the name, description or a file path already exists
        private function recordExists(string $columnName, $value): bool {
            $query = "SELECT COUNT(*) FROM {$this->table_name} WHERE {$columnName} = :value";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':value', $value);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        }

        /* First of all, the data has to be validated. There are so many ways how data
         * can be verified. Each column has it own proper (in my opinion) validation
         */

        public function validateData($data){

            /* First of all, I'm going to check a product name
             * This project is the ability to learn new functions and just generally a good opportunity
             * The reason why I prefer to use just if statements instead of if/elseif statements because
             * the user sees one error each time.
             */

            // First of all, validating the name based on multiple factors
            if (empty($data['name'])) {
                $errors['name'] = "Name is required.";
            }
            if (!preg_match("/^[a-zA-Z-' ]*$/", $data['name'])) {
                $errors['name'] = "Only letters and white space allowed for Name.";
            }
            // strlen is a pretty basic function that checks a number of characters
            if (strlen($data['name']) > 150){
                $errors['name'] = "Name cannot be more than 50 characters.";
            }
            if (strlen($data['name']) < 5){
                $errors['name'] = "Name cannot be less than 5 characters.";
            }
            // str_word_count checks the number of words inside the function
            if (str_word_count($data['name']) < 1){
                $errors['name'] = "Name cannot be less than 1 word";
            }
            if($this->recordExists('name', $data['name'])){
                $errors['name'] = "Name is already in use.";
            }

            // Now, checking description
            if (empty($data['description'])) {
                $errors['description'] = "Description is required.";
            }
            if (!preg_match("/^[a-zA-Z0-9\s\-']+$/", $data['description'])) {
                $errors['description'] = "Description may only contain letters, numbers, spaces, hyphens, and apostrophes.";
            }
            // I set the description limits for 5 and 200 because I'm thinking in terms of the user experience
            // I'm not going to read a description with more than 200 words :)
            if (strlen($data['description']) < 5){
                $errors['description'] = "Description cannot be less than 5 characters.";
            }
            if (strlen($data['description']) > 200){
                $errors['description'] = "Description cannot be more than 200 characters.";
            }
            if($this->recordExists('description', $data['description'])){
                $errors['description'] = "Description is already in use.";
            }
            // To be honest I asked chat gpt what are the most frequent spam words and decided to check if any of them
            // are in the list
            $spamWords = ["act now", "limited time", "urgent", "immediate", "expires", "deadline", "hurry",
                "last chance", "time-sensitive", "click here", "don't miss", "buy now", "order now"];
            foreach ($spamWords as $words) {
                if (stripos($data['description'], $words) !== false) {
                    $errors['description'] = "Description includes the following spam word" . $words;
                }
            }

            // Now checking the price
            if (empty($data['price'])) {
                $errors['price'] = "Price is required.";
            }
            // Checking the price based on our products that we sell
            if ($data['price'] < 0) {
                $errors['price'] = "Price cannot be less than 0.";
            }
            if ($data['price'] > 5000) {
                $errors['price'] = "Price cannot be less than 5000.";
            }
            if (!preg_match("/[a-zA-Z]/", $data['price'])) {
                $errors['price'] = "Price can not contain letters.";
            }

            // Now checking the image
            if (empty($data['imagePath']['name'])) {
                $this->error = "Please select an image";
                return false;
            }
            // Get the file properties
            $fileName = $data['imagePath']['name'];
            $fileTmpName = $data['imagePath']['tmp_name'];
            $fileSize = $data['imagePath']['size'];
            $fileError = $data['imagePath']['error'];

            // 1. check for upload errors
            if ($fileError !== 0) {
                $this->error['image'] = "There was an error uploading your file.";
            }
            // 2. define the allowed types
            $allowed = ["jpg", "jpeg", "png", "gif"];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if (!in_array($fileExt, $allowed)) {
                $this->error["image"] = "Image must be a file of type: jpg, jpeg, png, gif";
            }
            // 3. set a max filesize
            $maxsize = 2 * 1024 * 1024; // could just say 2mb
            if ($fileSize > $maxsize) {
                $this->error['image'] = "File size must be less than or equal to 2 MB";
            }
            //6. Last thing that I want to check if the image dimension is too big, I'm not going to store it
            $imageInfo = getimagesize($fileTmpName);
            $maxWidth = 2480;
            $maxHeight = 3508;
            if ($imageInfo[0] > $maxWidth || $imageInfo[1] > $maxHeight) {
                $this->error = "Image dimensions exceed allowed limit (2480x3508).";
            }

            if ($this->recordExists('image', $data['imagePath'])) {
                $errors['image'] = "Image is already in use.";
            }

            // Checking if the error variable is empty, then validation is successful
            if (empty($errors)){
                return true;
            }
            else{
                return false;
            }
        }

        // Now I need to create 4 functions of crud
        // Starting from insert
        public function create($data){
            if ($this->validateData($data)){
                try {
                    // prepare the SQL INSERT statement using PDO prepared statements for security
                    $sql = "INSERT INTO products_description (name, description, price, imagePath) 
                                VALUES (:name, :description, :price, :imagePath)";
                    // prepare our statement
                    $stmt = $this->connection->prepare($sql);

                    $name = htmlspecialchars(strip_tags($data['name']));
                    $description = htmlspecialchars(strip_tags($data['description']));
                    $price = htmlspecialchars(strip_tags($data['price']));
                    $imagePath = htmlspecialchars(strip_tags($data['imagePath']));

                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':price', $price);
                    $stmt->bindParam(':imagePath', $imagePath);

                    return $stmt->execute();}
                catch(PDOException $e){
                    // Store the error message
                    $this->error = "Database create error";
                    return false;
                }
            }
        }

        // Creating a read function
        public function read(){
            try{
                // Store our SQL select statement
                $sql = "SELECT * FROM products_description ORDER BY id DESC";
                // execute the query
                $stmt = $this->connection->query($sql);
                // fetch all the results in an associative array
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $e){
                $this->error = "Database read error";
                return false;
            }
        }

        // Creating un update function
        public function update($id,$data){
            if ($this->validateData($data)){
                try {
                    $query = "UPDATE " . $this->table_name . "
                  SET name=:name, description=:description, price=:price, imagePath=:imagePath
                  WHERE id = :id";
                    $stmt = $this->connection->prepare($query);
                    $name = htmlspecialchars(strip_tags($data['name']));
                    $description = htmlspecialchars(strip_tags($data['description']));
                    $price = htmlspecialchars(strip_tags($data['price']));
                    $imagePath = htmlspecialchars(strip_tags($data['imagePath']));
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':price', $price);
                    $stmt->bindParam(':imagePath', $imagePath);
                    $stmt->bindParam(':id', $id);
                    return $stmt->execute();
                }
                catch(PDOException $e){
                    $this->error = "Database update error";
                    return false;
                }
            }
        }

        public function delete($id){
            try {
                $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
                $stmt = $this->connection->prepare($query);
                $clean_id = htmlspecialchars(strip_tags($id));
                $stmt->bindParam(1, $clean_id);
                return $stmt->execute();
            }
            catch(PDOException $e){
                $this->error = "Database delete error";
                return false;
            }
        }
    }
    // Creating a database object first and then using it to create an object of CrudValidate class
    $database = new Database();
    $db = new CrudValidate($database->connection);
?>