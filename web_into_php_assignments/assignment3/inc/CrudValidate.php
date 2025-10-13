<?php
    require_once("Database.php");
    class CrudValidate{

        private $connection;
        // public property to store any errors
        public $error = null;

        public function __construct(PDO $connection){
            $this->connection = $connection;
        }

        // Does validation for images based on multiple factors
        public function validateImage(array $fileData){
            // check to see if an image is actually uploaded
            if (empty($fileData['name'])) {
                $this->error = "Please select an image";
                return false;
            }
            // Get the file properties
            $fileName = $fileData['name'];
            $fileTmpName = $fileData['tmp_name'];
            $fileSize = $fileData['size'];
            $fileError = $fileData['error'];
            // 1. check for upload errors
            if ($fileError !== 0){
                $this->error = "There was an error uploading your file.";
                return false;
            }
            // 2. define the allowed types
            $allowed = ["jpg", "jpeg", "png", "gif"];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if (!in_array($fileExt, $allowed)){
                $this->error = "Must be a file of type: jpg, jpeg, png, gif";
                return false;
            }
            // 3. set a max filesize
            $maxsize = 2 * 1024 * 1024; // could just say 2mb
            if ($fileSize > $maxsize){
                $this->error = "File size must be less than or equal to 2 MB";
                return false;
            }

            // 4. Create a unique file name to prevent overwriting and path traversal attacks
            $newFileName = uniqid('', true) . "_assignment3." . $fileExt;
            $fileDestination = "./uploads/" . $newFileName;

            // 5. Move the uploaded file from the temp location to the final folder
            if(!move_uploaded_file($fileTmpName, $fileDestination)){
                $this->error = "File could not be uploaded.";
                return false;
            }

            //6. Last thing that I want to check if the image dimension is too big, I'm not going to store it
            $imageInfo = getimagesize($fileTmpName);
            // I found on the Internet there are some pictures that have this size which is massive
            // If a user enters this images, I don't want them to be saved because they're humongous
            $maxWidth = 2480;
            $maxHeight = 3508;
            if ($imageInfo[0] > $maxWidth || $imageInfo[1] > $maxHeight) {
                $this->error = "Image dimensions exceed allowed limit (2480x3508).";
                return false;
            }

            // if all the checks pass return the path to be stored in the database
            return $fileDestination;
        }

        // Also, I want to add validation to username and password
        // I was just curious to explore different php string manipulation methos
        public function validationUsernamePassword(string $username, string $password){
            // ctype_alnum -> checking if a string contains only letters and numbers
            if (!ctype_alnum($username)){
                $this->error = "The username should only contain letters and numbers.";
                return false;
            }
            // strlen -> checking the len of a string
            if (strlen($password) < 8){
                $this->error = "The password should be at least 8 characters.";
                return false;
            }
            // preg-match, we need to put a regex and then check if a password matches it
            // here, I'm checking if a password contains at least one number
            if(!preg_match("/\d/", $password)){
                $this->error = "The password should be at least 1 number.";
                return false;
            }
            // here, I'm checking if a password contains at least one upper case letter
            if (!preg_match("/[A-Z]/", $password)){
                $this->error = "The password should contain at least 1 uppercase letter.";
                return false;
            }
            // here, I'm checking if a password contains at least one smaller case letter
            if (!preg_match("/[a-z]/", $password)){
                $this->error = "The password should contain at least 1 lowercase letter.";
                return false;
            }
            return true;
        }

        // After that I basically need to finish the class with create and read functions
        // Starting by writing a function that inserts data
        public function create($username, $password, $first_name, $last_name, $email, $phone, array $fileData){
            // first, validate and upload the image using a private method
            $imagePath = $this->validateImage($fileData);
            // if validate fails, stop and return false
            if ($imagePath === false){
                return false;
            }
            if ($this->validationUsernamePassword($username, $password)){
                try {
                    // prepare the SQL INSERT statement using PDO prepared statements for security
                    $sql = "INSERT INTO user_profiles (username, password, first_name, last_name, email, phone, imagePath) 
                            VALUES (:username, :password, :first_name, :last_name, :email, :phone, :imagePath)";
                    // prepare our statement
                    $stmt = $this->connection->prepare($sql);
                    // bind values to placeholders (this prevents SQL injection
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':first_name', $first_name);
                    $stmt->bindParam(':last_name', $last_name);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':phone', $phone);
                    $stmt->bindParam(':imagePath', $imagePath);
                    // now fire the statement
                    return $stmt->execute();
                } catch (PDOException $e) {
                    // Store the error message
                    $this->error = "Database Error: " . $e->getMessage();
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    return false;
                }
            }
        }

        // Finally, the function for reading data
        public function read(){
            try{
                // Store our SQL select statement
                $sql = "SELECT * FROM user_profiles ORDER BY id DESC";
                // execute the query
                $stmt = $this->connection->query($sql);
                // fetch all the results in an associative array
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $e){
                $this->error = "Database read error: " . $e->getMessage();
                return false;
            }
        }
    }
    // Creating a database object first and then using it to create an object of CrudValidate class
    $database = new Database();
    $db = new CrudValidate($database->connection);
?>