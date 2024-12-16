document.addEventListener('DOMContentLoaded', function() {
    const removeButtons = document.querySelectorAll('.remove_product');
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const url = `/cart/removeFromCart?product_id=${productId}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    }
                });
        });
    });

    const quantityInputs = document.querySelectorAll('.quantity');
    quantityInputs.forEach(input => {
        input.addEventListener('change', function() {
            const productId = this.getAttribute('data-product-id');
            const quantity = this.value;
            const url = `/cart/updateQuantity?id=${productId}&quantity=${quantity}`;

            window.location.href = url;
        });
    });
});