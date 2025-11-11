<?php
    // Start session to manage user authentication and security tokens
    session_start();

    // Load the page header with navigation menu
    include 'templates/header.php';
    
    // Include database classes for connecting to the database
    require_once 'includes/config.php';
    require_once 'includes/Database.php';

    // Generate CSRF token if not exists (prevents unauthorized form submissions)
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    // Initialize login submission flags
    $login_success = false;
    $login_error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate CSRF token to ensure the form came from our website
        if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            $login_error = "Security validation failed. Please try again.";
        } else {
            // Trim whitespace from user input
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Validate required fields
            if (empty($email) || empty($password)) {
                $login_error = "Email and password are required!";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Validate email format
                $login_error = "Please enter a valid email address.";
            } else {
                // Query database for user with prepared statement
                try {
                    $db = new Database();
                    $stmt = $db->connection->prepare("SELECT id, password FROM admin_users WHERE email = :email LIMIT 1");
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->execute();
                    
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    // Verify password hash matches stored password
                    if ($user && password_verify($password, $user['password'])) {
                        // Store user info in session for future page requests
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_email'] = $email;
                        $login_success = true;
                    } else {
                        $login_error = "Invalid email or password!";
                    }
                } catch (PDOException $e) {
                    $login_error = "Database error occurred. Please try again later.";
                }
            }
        }
    }
?>

<section class="page-header">
    <div class="container">
        <h1>Login</h1>
        <p>Access your account</p>
    </div>
</section>

<section class="register-section">
    <div class="container">
        <div class="register-wrapper">
            <div class="register-form-container">
                <h2>Sign In</h2>

                <?php if ($login_success): ?>
                    <div class="success-message">
                        <h3>Welcome back!</h3>
                        <p>You have successfully logged in to your account.</p>
                        <a href="index.php" class="btn btn-primary">Back to Home</a>
                    </div>
                <?php else: ?>
                    <?php if (!empty($login_error)): ?>
                        <div class="error-message">
                            <p><?php echo htmlspecialchars($login_error); ?></p>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="login.php" class="register-form">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="password" id="password" name="password" required>
                        </div>

                        <div class="form-group checkbox">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Remember me</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-large">Sign In</button>
                    </form>

                    <p class="login-link">
                        Don't have an account? <a href="register.php">Register here</a>
                    </p>
                    <p class="login-link">
                        <a href="#">Forgot your password?</a>
                    </p>
                <?php endif; ?>
            </div>

            <div class="register-info">
                <h3>Benefits of Login</h3>
                <ul>
                    <li>✓ View order history</li>
                    <li>✓ Faster checkout</li>
                    <li>✓ Save favorite products</li>
                    <li>✓ Track shipments</li>
                    <li>✓ Manage your profile</li>
                    <li>✓ Exclusive offers</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
    // Include footer template
    include 'templates/footer.php';
?>
