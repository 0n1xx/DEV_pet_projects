<?php
    // Start session to manage CSRF tokens for form security
    session_start();

    // Load the page header with navigation menu
    include 'templates/header.php';

    // Generate CSRF token if not exists (prevents cross-site request forgery)
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    // Initialize form submission flags
    $form_submitted = false;
    $form_message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate CSRF token to ensure the form came from our website
        if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            $form_submitted = false;
            $form_message = "Security validation failed. Please try again.";
        } else {
            // Form was submitted successfully
            $form_submitted = true;
            $form_message = "Thank you for your message! We'll get back to you soon.";
        }
    }
?>

<section class="page-header">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you</p>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact-wrapper">
            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <h2>Send us a Message</h2>
                
                <?php if ($form_submitted): ?>
                    <div class="success-message">
                        <p><?php echo $form_message; ?></p>
                    </div>
                <?php endif; ?>

                <form method="POST" action="contact.php" class="contact-form">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="6" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-large">Send Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="contact-info-wrapper">
                <h2>Contact Information</h2>
                
                <div class="contact-info-item">
                    <h3>📍 Address</h3>
                    <p>123 Music Street<br>Tbilisi, Georgia 1234</p>
                </div>

                <div class="contact-info-item">
                    <h3>📧 Email</h3>
                    <p>support@ipodmarketplace.com<br>info@ipodmarketplace.com</p>
                </div>

                <div class="contact-info-item">
                    <h3>☎ Phone</h3>
                    <p>+995 32 123 4567<br>+995 32 123 4568</p>
                </div>

                <div class="contact-info-item">
                    <h3>🕒 Hours</h3>
                    <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                </div>

                <div class="contact-info-item">
                    <h3>Follow Us</h3>
                    <p>
                        <a href="#" class="social-link">Facebook</a> | 
                        <a href="#" class="social-link">Instagram</a> | 
                        <a href="#" class="social-link">Twitter</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    // Include footer template
    include 'templates/footer.php';
?>
