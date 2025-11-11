<?php
    // Load the page header with navigation menu
    include 'templates/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Welcome to iPod Marketplace</h1>
        <p>Discover the latest and greatest iPod collection</p>
        <a href="shop.php" class="btn btn-primary">Shop Now</a>
    </div>
</section>

<!-- Featured Products Section -->
<section class="featured-products">
    <div class="container">
        <h2>Featured Products</h2>
        <div class="products-grid">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200" alt="iPod Classic">
                </div>
                <div class="product-info">
                    <h3>iPod Classic</h3>
                    <p class="price">$299.99</p>
                    <p class="description">Timeless design with massive storage</p>
                    <a href="product.php?id=1" class="btn btn-secondary">View Details</a>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200" alt="iPod Nano">
                </div>
                <div class="product-info">
                    <h3>iPod Nano</h3>
                    <p class="price">$149.99</p>
                    <p class="description">Compact and colorful music player</p>
                    <a href="product.php?id=2" class="btn btn-secondary">View Details</a>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200" alt="iPod Shuffle">
                </div>
                <div class="product-info">
                    <h3>iPod Shuffle</h3>
                    <p class="price">$49.99</p>
                    <p class="description">Ultra-portable with clip design</p>
                    <a href="product.php?id=3" class="btn btn-secondary">View Details</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Explore?</h2>
        <p>Browse our full collection and find your perfect iPod</p>
        <a href="shop.php" class="btn btn-primary">View All Products</a>
    </div>
</section>

<?php
    // Load the page footer
    include 'templates/footer.php';
?>
