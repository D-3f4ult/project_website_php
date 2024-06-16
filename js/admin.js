document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission
        
        const productName = document.getElementById("product-name").value;
        const productPrice = document.getElementById("product-price").value;
        const productQuantity = document.getElementById("product-quantity").value;
        const productImage = document.getElementById("product-image").value;

        if (productName.trim() === "") {
            alert("Please enter product name");
            return;
        }

        if (productPrice.trim() === "" || isNaN(productPrice)) {
            alert("Please enter valid product price");
            return;
        }

        if (productQuantity.trim() === "" || isNaN(productQuantity)) {
            alert("Please enter valid product quantity");
            return;
        }

        if (productImage.trim() === "") {
            alert("Please select product image");
            return;
        }

        // If all fields are valid, submit the form
        form.submit();
    });
});
