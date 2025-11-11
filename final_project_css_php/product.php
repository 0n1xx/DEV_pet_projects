<?php
    // Load the page header with navigation menu
    include 'templates/header.php';

    // Get product ID from URL parameter (for now using placeholder data)
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;
?>

<section class="page-header">
    <div class="container">
        <h1>Product Details</h1>
    </div>
</section>

<section class="product-detail">
    <div class="container">
        <div class="product-detail-wrapper">
            <!-- Product Image -->
            <div class="product-detail-image">
                <img src="https://via.placeholder.com/400" alt="Product Image">
            </div>

            <!-- Product Information -->
            <div class="product-detail-info">
                <h1>iPod Classic 160GB</h1>
                <p class="rating">★★★★★ (45 reviews)</p>
                
                <div class="price-section">
                    <p class="price">$299.99</p>
                    <p class="stock">In Stock</p>
                </div>

                <div class="description">
                    <h3>Description</h3>
                    <p>The iPod Classic is the ultimate music player with massive storage capacity. With 160GB of storage, you can carry your entire music library with you wherever you go. Experience superior sound quality and intuitive controls.</p>
                </div>

                <div class="specifications">
                    <h3>Specifications</h3>
                    <ul>
                        <li><strong>Storage:</strong> 160GB</li>
                        <li><strong>Battery Life:</strong> Up to 30 hours</li>
                        <li><strong>Display:</strong> 2.5-inch color display</li>
                        <li><strong>Weight:</strong> 182g</li>
                        <li><strong>Connectivity:</strong> USB 2.0</li>
                    </ul>
                </div>

                <!-- Add to Cart / Purchase -->
                <div class="product-actions">
                    <div class="quantity-selector">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1">
                    </div>
                    <button class="btn btn-primary btn-large">Add to Cart</button>
                    <button class="btn btn-secondary btn-large">Buy Now</button>
                </div>

                <!-- Additional Info -->
                <div class="additional-info">
                    <p>✓ Free Shipping on orders over $50</p>
                    <p>✓ 30-day money back guarantee</p>
                    <p>✓ Warranty included</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="related-products">
    <div class="container">
        <h2>You Might Also Like</h2>
        <div class="products-grid">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200" alt="iPod Nano">
                </div>
                <div class="product-info">
                    <h3>iPod Nano</h3>
                    <p class="price">$149.99</p>
                    <a href="product.php?id=2" class="btn btn-secondary">View Details</a>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200" alt="iPod Touch">
                </div>
                <div class="product-info">
                    <h3>iPod Touch</h3>
                    <p class="price">$249.99</p>
                    <a href="product.php?id=4" class="btn btn-secondary">View Details</a>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200" alt="iPod Shuffle">
                </div>
                <div class="product-info">
                    <h3>iPod Shuffle</h3>
                    <p class="price">$49.99</p>
                    <a href="product.php?id=3" class="btn btn-secondary">View Details</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    // Load the page footer
    include 'templates/footer.php';
?>
