<?php
    $pageTitle = "Create profile";
    $pageDesc = "This page will allow the user to create a profile";
    require_once "./inc/CrudValidate.php";
    $success = null;
    // 1. check if the form was sumbitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 2. GEt the submitted data
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $first_name = trim($_POST["first_name"]);
        $last_name = trim($_POST["last_name"]);
        $email = trim($_POST["email"]);
        $phone = trim($_POST["phone"]);
        // 3. the $_FILES superglobal holds information about the uploaded file
        $imageFile = $_FILES["product_image"];
        // 4. Validate and create the record using the oop method
        if($db->create($username, $password, $first_name, $last_name, $email, $phone, $imageFile)) {
            $success = "Product created successfully!";
        }
    }
    require "./templates/header.php";
?>
<main>
    <!-- Adding a section which will be displayed if a success or an error happen -->
    <section class="messageSuccessFail">
        <?php if($success): ?>
            <div class="alert_success">
                <p><?php echo $success; ?></p>
            </div>
        <?php endif; ?>
        <?php if($db->error): ?>
            <div class="alert_failure">
                <p>Error: <?php echo $db->error; ?></p>
            </div>
        <?php endif; ?>
    </section>
    <div>
        <h1>Please fill up the information about you</h1>
    </div>
    <section class="form_submit_info">
        <form method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Your Personal information</legend>
                <label for="username">Username: </label>
                <input type="text" placeholder="username (at least 8 characters)" id="username" name="username" required>
                <label for="password">Password: </label>
                <input type="password" placeholder="password" id="password" name="password" required>
                <label for="first_name">First Name: </label>
                <input type="text" placeholder="first_name" id="first_name" name="first_name" required>
                <label for="last_name">Last Name: </label>
                <input type="text" placeholder="last_name" id="last_name" name="last_name" required>
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required>
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="+1 (555) 123-4567" required>
                <label for="product_image" class="form-label">Product Image</label>
                <input class="file-upload" type="file" id="product_image" name="product_image" required>
                <small class="text-muted">Allowed: JPG, PNG, GIF. Max 2MB.</small>
            </fieldset>
            <div id="submit_button">
                <button type="submit">Submit details</button>
            </div>
        </form>
    </section>
</main>
<?php require "./templates/footer.php"; ?>