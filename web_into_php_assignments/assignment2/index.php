<?php
    // require our files with database connection, config and a file where we insert a record
    require_once "config.php";
    require_once "Database.php";
    require_once "Post.php";
    $database_connection = new Database();
    $connection = $database_connection->getConnection();
    $success = false;
    $error = ""; // creating a variable that we'll store the message of our error
    // on form submission
    if (!$connection) {
        $error = $database_connection->getErrorMessage();
    }
    else {
        $post_delivery = new Post($connection);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"] ?? "";
            $address = $_POST["address"] ?? "";
            $phone = $_POST["phone"] ?? "";
            $email = $_POST["email"] ?? "";
            $delivery_type = $_POST["delivery_type"] ?? "";
            $textbox = $_POST["textbox"] ?? "";
            $pizza_size = $_POST["pizza_size"] ?? "";
            $pizza_sauce = $_POST["pizza_sauce"] ?? "";
            try {
                // try to save our record
                $post_delivery->create($username, $address, $email, $phone, $delivery_type, $textbox, $pizza_size, $pizza_sauce);
                $success = true;
            } catch (PDOException $e) {
                $error = "Could not submit your delivery " . $e->getMessage();
            }
        }
    }
    // load the rest of our templates
    include "templates/header.php";
    include "form.php";
    include "templates/footer.php";
?>