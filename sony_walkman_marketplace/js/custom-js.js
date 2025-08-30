// Using simple JavaScript
// Waiting until the whole html file is loaded
document.addEventListener('DOMContentLoaded', function(){
    // Creating a function for counting letters
    document.getElementById('writing_problem').addEventListener('input', function (){
        // this.value refers to the current value of the text area
        const text = this.value
        //upgrade the character count display
        document.getElementById('charCount').textContent = `Characters: ${text.length}`;
    })
});

// Using jQuery
$(document).ready(function () {

    // Using jQuery to dynamically import header and footer
    $(function () {
        $("#footer").load("./includes/footer.html");
        $("#header").load("./includes/header.html");
    });
    // Create a function which helps increase the price based on how many products does the
    // user choose, take notes from the lesson 10. This will be applied for a page with product


    // Search the text in the table
    $("#myInput").on("keyup", function (){
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function (){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    // Create a function that will display cool after you submit a form
    $('.add-to-cart-btn').click(function () {
        $(this).next('.success-message').fadeToggle();
    });

    // Setting the price sony walkman wm 2011
    const unitPrice_wm_2011 = 59.99;

    $('.product-quantity').on('input', function() {
        // Taking the value from the input, what is the current quantity
        let quantity = parseInt($(this).val());

        // If the value is incorrect, return to quantity 1
        if (isNaN(quantity) || quantity < 1) {
            quantity = 1;
            $(this).val(1);
        }

        // Setting the price based on that
        const total = (unitPrice_wm_2011 * quantity).toFixed(2);
        $('.product-price_wm_2011').text(`$${total} CAD`);
    });

    // Setting the price sony walkman wm-a12
    const unitPrice_wm_a12 = 79.99;

    $('.product-quantity').on('input', function() {
        let quantity = parseInt($(this).val());

        if (isNaN(quantity) || quantity < 1) {
            quantity = 1;
            $(this).val(1);
        }

        const total = (unitPrice_wm_a12 * quantity).toFixed(2);
        $('.product-price_wm_a12').text(`$${total} CAD`);
    });

    // Setting the price sony walkman wm-f2015
    const unitPrice_wm_f2015 = 99.99;

    $('.product-quantity').on('input', function() {
        let quantity = parseInt($(this).val());

        if (isNaN(quantity) || quantity < 1) {
            quantity = 1;
            $(this).val(1);
        }

        const total = (unitPrice_wm_f2015 * quantity).toFixed(2);
        $('.product-price_wm_f2015').text(`$${total} CAD`);
    });
});