<div class="form_order_page">
    <?php if ($success): ?>
        <div class="alert_success">
            <p>Your post has been created</p>
        </div>
    <?php endif;?>
    <?php if (!empty($error)):?>
        <div class="alert_failure">
            <p>Your post has not been created and here is an error</p>
            <?php echo "<p>{htmlspecialchars($error)}</p>"; ?>
        </div>
    <?php endif;?>
    <form method="post" enctype="multipart/form-data">
        <!--Since the form becomes huge, I decided to group each element of it logically using  fieldset -->
        <fieldset>
            <!-- Provides the naming of fieldset -->
            <legend>Contact Information</legend>
            <label for="username">Username: </label>
            <input type="text" placeholder="username" id="username" name="username" required>
            <label for="address">Address: </label>
            <input type="text" placeholder="address" id="address" name="address" required>
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="you@example.com" required>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="+1 (555) 123-4567" required>
        </fieldset>
        <fieldset>
            <legend>Delivery info</legend>
            <label class="pick_one">Pick One:</label>
            <label class="radio-option">
                <input type="radio" id="delivery" name="delivery_type" value="delivery" required>
                Delivery
            </label>
            <label class="radio-option">
                <input type="radio" id="pickup" name="delivery_type" value="pickup">
                Pick up
            </label>
            <label for="textbox">Additional information:</label>
            <input type="text" id="textbox" name="textbox" placeholder="Type here...">
        </fieldset>
        <fieldset>
            <legend>Pizza Customization</legend>
            <label for="pizza_size">Size: </label>
            <select name="pizza_size" id="pizza_size" required>
                <option value="" disabled selected>Choose the size</option>
                <option value="small" >Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
                <option value="extra_large">Extra Large</option>
            </select>
            <label for="pizza_sauce">Sauce: </label>
            <select name="pizza_sauce" id="pizza_sauce" required>
                <option value="" disabled selected>Choose the sauce</option>
                <option value="buffalo_sauce">Buffalo Sauce</option>
                <option value="pesto_sauce">Pesto Sauce</option>
            </select>
        </fieldset>
        <!-- At the end of the form adding the button -->
        <div id="submit_button">
            <button type="submit">Place Order</button>
        </div>
    </form>
</div>