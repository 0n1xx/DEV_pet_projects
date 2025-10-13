<?php
    // define our page title and description
    $pageTitle = "View profiles";
    $pageDesc = "This page will allow the user to view profiles";
    require_once("./inc/CrudValidate.php");
    // call on the read method
    $profiles = $db->read();
    // check for a read error
    if($profiles == false){
        $readError = "<p class='no-profiles'>No profiles found !</p>";
    }
    // Putting header in the beginning of the page
    require("./templates/header.php");
?>
<main>
    <div>
        <h1>Here is the main content of the page</h1>
    </div>
    <section id="view-information">
        <?php if (isset($readError)): ?>
            <?php echo $readError; ?>
        <?php else: ?>
        <?php foreach ($profiles as $profile): ?>
        <div class="user-profile">
            <div class="user-image">
                <img src="<?php echo htmlspecialchars($profile['imagePath']); ?>" alt="Profile picture of <?php echo htmlspecialchars($profile['username']); ?>">
            </div>
            <div class="user-details">
                <p>Username:<?php echo htmlspecialchars($profile['username']); ?></p>
                <p>First Name: <?php echo htmlspecialchars($profile['first_name']); ?></p>
                <p>Last Name: <?php echo htmlspecialchars($profile['last_name']); ?></p>
                <p>Email: <?php echo htmlspecialchars($profile['email']); ?></p>
                <p>Phone: <?php echo htmlspecialchars($profile['phone']); ?></p>
                <p>Created at: <?php echo htmlspecialchars($profile['created_at']); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </section>
</main>
<?php
    // putting footer at the end of the page
    require "./templates/footer.php";
?>