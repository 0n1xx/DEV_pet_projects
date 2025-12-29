<!doctype html>
<html lang="en">
<head>
    <!-- In the head element, we add our metadata -->
    <!-- Declare our character set -->
    <meta charset="utf-8">
    <!-- This measures the viewport of the device we are using -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- This will describe our pages content, this should be different
      on each page -->
    <meta name="description" content="<?php echo $pageDesc; ?>">
    <!-- This will tell the search engine to index the site or not -->
    <meta name="robots" content="noindex, nofollow">
    <!-- This is our title tag  -->
    <title> <?php echo $pageTitle ?></title>
    <!-- This is the element that connects css file to our html_css_js_introduction file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Using a special google font -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Varela&display=swap" rel="stylesheet">
</head>
<body>
<!-- Creating a header with the nav bar -->
<header>
    <div class="logo-container">
        <a href="index.php">
            <img src="logo_img/logo.jpg" alt="header logo">
        </a>
    </div>
    <nav>
        <ul class="big_screens_li">
            <li><a href="#">Home</a></li>
            <li><a href="#">Support Page</a></li>
            <li><a href="#">About Page</a></li>
        </ul>
    </nav>
</header>