<?php
    function request() {
        $url = "https://api.thedogapi.com/v1" . "/images/search?limit=2";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        var_dump($data);
        ?>
        <section class="dog_content">
        <?php
            foreach ($data as $dog){
                $id = htmlspecialchars($dog['id'] ?? "N/A");
                $imageURL = htmlspecialchars($dog['url'] ?? "");?>
            <div>
                <?php
                echo "<img class='dog-img' src='{$imageURL}' alt='{$id}'>'";
                ?>
            </div>
        </section>
        <?php
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- This is our title tag  -->
    <title>This is the page for our memories for my wife</title>
    <!-- This will describe our pages content, this should be different
      on each page -->
    <meta name="description" content="This is an about page">
    <!-- Declare our character set -->
    <meta charset="utf-8">
    <!-- This measures the viewport of the device we are using -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- This will tell the search engine to index the site or not -->
    <meta name="robots" content="noindex, nofollow">
    <!-- This is the element that connects css file to our html_css_js_introduction file -->
    <link rel="stylesheet" href="assignment1/css/style.css">
    <!-- Using a special google font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
    request();
?>
</body>
</html>
