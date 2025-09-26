<?php
    // This class will handle the connection
    class Post{
        private $db_connection; // storing the db connection
        // not requiring the PDO object cause it can be null if the connection is not successful
        public function __construct($db_connection){
            $this->db_connection = $db_connection;
        }
        // inserting data into a table in the database
        public function create($username, $address, $email, $phone, $delivery_type, $textbox, $pizza_size, $pizza_sauce){
            $sql = "INSERT INTO pizza_delivery(username, address, email, phone, delivery_type, textbox, pizza_size, pizza_sauce) 
        VALUES (:username, :address, :email, :phone, :delivery_type, :textbox, :pizza_size, :pizza_sauce)";
            $stmt = $this->db_connection->prepare($sql);
            $stmt->execute([
                ":username" => $username,
                ":address" => $address,
                ":email" => $email,
                ":phone" => $phone,
                ":delivery_type" => $delivery_type,
                ":textbox" => $textbox,
                ":pizza_size" => $pizza_size,
                ":pizza_sauce" => $pizza_sauce
            ]);
        }
    }
?>