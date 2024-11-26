document.addEventListener('DOMContentLoaded', function() {
    function calculateTotal() {
        let total = 0;
        const prices = document.getElementsByClassName('product_total');
        Array.from(prices).forEach(price => {
            total += parseFloat(price.textContent);
        });
        document.getElementById('total').textContent = total.toFixed(2);
    }

    function calculateProductTotal(product) {
        const unitaryPrice = parseFloat(product.getElementsByClassName('unitary_price')[0].textContent);
        const quantity = parseInt(product.getElementsByClassName('quantity')[0].value);
        const total = unitaryPrice * quantity;

        product.getElementsByClassName('product_total')[0].textContent = total.toFixed(2);
    }

    const products = document.getElementsByClassName('cart_product');
    for (let i = 0; i < products.length; i++) {
        const product = products[i];
        product.getElementsByClassName('quantity')[0].addEventListener('change', function() {
            calculateProductTotal(product);
            calculateTotal();
        });

        calculateProductTotal(product);
    };
    calculateTotal();
});