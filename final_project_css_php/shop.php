<?php
    // Load the page header with navigation menu
    include 'templates/header.php';
?>

<section class="page-header">
    <div class="container">
        <h1>Shop</h1>
        <p>Browse our complete iPod collection</p>
    </div>
</section>

<section class="shop-section">
    <div class="container">
        <div class="shop-wrapper">
            <!-- Sidebar Filter (Optional for Week 1) -->
            <aside class="sidebar">
                <h3>Filter by Price</h3>
                <form>
                    <label>
                        <input type="checkbox"> Under $100
                    </label>
                    <label>
                        <input type="checkbox"> $100 - $200
                    </label>
                    <label>
                        <input type="checkbox"> $200 - $300
                    </label>
                    <label>
                        <input type="checkbox"> Over $300
                    </label>
                </form>
            </aside>

            <!-- Products Grid -->
            <div class="products-main">
                <div class="products-grid">
                    <?php
                        // Placeholder product data - will be replaced with database queries in Phase 2
                        // This demonstrates the site structure and layout
                        $products = [
                            ['id' => 1, 'name' => 'iPod Classic 160GB', 'price' => 299.99, 'image' => 'https://via.placeholder.com/250'],
                            ['id' => 2, 'name' => 'iPod Nano 16GB', 'price' => 149.99, 'image' => 'https://via.placeholder.com/250'],
                            ['id' => 3, 'name' => 'iPod Shuffle 2GB', 'price' => 49.99, 'image' => 'https://via.placeholder.com/250'],
                            ['id' => 4, 'name' => 'iPod Touch 64GB', 'price' => 249.99, 'image' => 'https://via.placeholder.com/250'],
                            ['id' => 5, 'name' => 'iPod Video 80GB', 'price' => 349.99, 'image' => 'https://via.placeholder.com/250'],
                            ['id' => 6, 'name' => 'iPod Mini 6GB', 'price' => 199.99, 'image' => 'https://via.placeholder.com/250'],
                        ];

                        foreach($products as $product) {
                            echo '
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="' . $product['image'] . '" alt="' . $product['name'] . '">
                                    </div>
                                    <div class="product-info">
                                        <h3>' . $product['name'] . '</h3>
                                        <p class="price">$' . number_format($product['price'], 2) . '</p>
                                        <a href="product.php?id=' . $product['id'] . '" class="btn btn-secondary">View Details</a>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    // Load the page footer
    include 'templates/footer.php';
?>
