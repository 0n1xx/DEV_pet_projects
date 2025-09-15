<?php

require_once "config.php";
require_once "DogApi.php";
require_once "DogApp.php";

// create my API Handler
$api = new DogApi(DOG_BASE_URL, DOG_API_KEY);
// create our movie app object
$app = new DogApp($api);
?>
<!-- Creating our foundation of the html doc -->
<!doctype html>
<html lang="en">
<head>
    <!-- This is our title tag  -->
    <title>This is the page with different cool dogs</title>
    <!-- This will describe our pages content, this should be different
      on each page -->
    <meta name="description" content="This is a page about dogs">
    <!-- Declare our character set -->
    <meta charset="utf-8">
    <!-- This measures the viewport of the device we are using -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- This will tell the search engine to index the site or not -->
    <meta name="robots" content="noindex, nofollow">
    <!-- This is the element that connects css file to our html_css_js_introduction file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Using a special google font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav>
        <a href="index.php" class="logo">
            <img src="photo_logo/logo.png" alt="header logo">
        </a>
        <menu>
            <li class="nav_menu"><a href="#">Home</a></li>
            <li class="nav_menu"><a href="#">Breeds</a></li>
            <li class="nav_menu"><a href="#">Random Dog</a></li>
            <li class="nav_menu"><a href="#">About</a></li>
        </menu>
    </nav>
</header>
<main>
    <div id="greeting_section">
        <h1> Discover Dogs Around the World </h1>
    </div>
    <?php
        $app ->show_dog_posting();
    ?>
</main>
<footer>
    <div>
        <a href="index.php" class="logo">
            <img src="photo_logo/logo.png" alt="footer logo">
        </a>
    </div>
    <div id="footer_contact_info">
        <p class="big_screens_info">Contact us:
            <a href="mailto:dog_lover@gmail.com">dog_lover@gmail.com</a>
        </p>
        <p class="phone_contact_info">+1 (705) 534-4567</p>
        <p>123 Anne St, Barrie, Canada</p>
        <p class="footer-copy">© Cool dogs. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
