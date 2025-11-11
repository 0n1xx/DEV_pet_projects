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

    // Initialize form submission flags
    $form_submitted = false;
    $form_error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate CSRF token to ensure the form came from our website
        if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            $form_error = "Security validation failed. Please try again.";
        } else {
            // Trim whitespace from user input
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            // Check if all required fields are filled
            if (empty($name) || empty($email) || empty($password)) {
                $form_error = "All fields are required!";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Validate email format
                $form_error = "Please enter a valid email address.";
            } elseif ($password !== $confirm_password) {
                // Ensure both password entries match
                $form_error = "Passwords do not match!";
            } elseif (strlen($password) < 6) {
                // Check minimum password length for security
                $form_error = "Password must be at least 6 characters long.";
            } else {
                // Hash password securely before saving to database
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                
                // Save to database with prepared statement
                try {
                    $db = new Database();
                    $stmt = $db->connection->prepare(
                        "INSERT INTO admin_users (name, email, password) VALUES (:name, :email, :password)"
                    );
                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
                    
                    if ($stmt->execute()) {
                        $form_submitted = true;
                    } else {
                        $form_error = "Registration failed. Please try again.";
                    }
                } catch (PDOException $e) {
                    $form_error = "Email already exists or database error occurred.";
                }
            }
        }
    }
?>

<section class="page-header">
    <div class="container">
        <h1>Create Account</h1>
        <p>Join our community today</p>
    </div>
</section>

<section class="register-section">
    <div class="container">
        <div class="register-wrapper">
            <div class="register-form-container">
                <h2>Register</h2>

                <?php if ($form_submitted): ?>
                    <div class="success-message">
                        <h3>Welcome!</h3>
                        <p>Your account has been created successfully. You can now log in to your account.</p>
                        <a href="index.php" class="btn btn-primary">Back to Home</a>
                    </div>
                <?php else: ?>
                    <?php if (!empty($form_error)): ?>
                        <div class="error-message">
                            <p><?php echo htmlspecialchars($form_error); ?></p>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="register.php" class="register-form">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number (Optional)</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="password" id="password" name="password" required>
                            <small>Minimum 6 characters</small>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm Password *</label>
                            <input type="password" id="confirm_password" name="confirm_password" required>
                        </div>

                        <div class="form-group checkbox">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">I agree to the Terms and Conditions</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-large">Create Account</button>
                    </form>

                    <p class="login-link">
                        Already have an account? <a href="login.php">Log in here</a>
                    </p>
                <?php endif; ?>
            </div>

            <div class="register-info">
                <h3>Why Register?</h3>
                <ul>
                    <li>✓ Faster checkout process</li>
                    <li>✓ Save your favorite products</li>
                    <li>✓ Track your orders</li>
                    <li>✓ Exclusive member discounts</li>
                    <li>✓ Get early access to new products</li>
                    <li>✓ Personalized recommendations</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
    // Include footer template
    include 'templates/footer.php';
?>
