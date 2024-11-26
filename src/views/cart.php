<?php
$title = 'À propos';
$scripts = ['cart.js'];
$styles = ['cart.css'];

require_once 'partials/header.php';
?>
<main>
    <section class="cart">
        <fieldset>
            <legend>
                Panier
            </legend>

            <table>
                <thead>
                    <tr>
                        <th scope="col">Article</th>
                        <th scope="col">Prix Unitaire</th>
                        <th scope="col">Prix Total</th>
                        <th scope="col">Quantité</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="cart_product">
                        <th scope="row">RTX 4090</th>
                        <td><span class="unitary_price">7880.39</span>€</td>
                        <td><span class="product_total">0</span>€</td>
                        <td>
                            <input type="number" value="1" min="1" max="99" class="quantity">
                        </td>
                        <td>
                            <svg class="remove_product" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg>
                        </td>
                    </tr>
                    <tr class="cart_product">
                        <th scope="row">RTX 4080</th>
                        <td><span class="unitary_price">3089.99</span>€</td>
                        <td><span class="product_total">0</span>€</td>
                        <td>
                            <input type="number" value="1" min="1" max="99" class="quantity">
                        </td>
                        <td>
                            <svg xmlns="http://www.w3.org/2000/svg" class="remove_product" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="row" colspan="2">
                            Total
                        </th>
                        <td colspan="3">
                            <span id="total">
                                7880.39
                            </span>
                            €
                        </td>
                    </tr>
                </tfoot>
            </table>

            <button class="button_primary" style="float: right;">Valider le panier</button>
        </fieldset>
    </section>
</main>
<?php require_once 'partials/footer.php'; ?>