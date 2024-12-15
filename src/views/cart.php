<?php
$title = 'À propos';
$scripts = ['cart.js'];
$styles = ['cart.css'];

$products = $_SESSION['cart'] ?? [];

require_once 'partials/header.php';
?>
<main>
    <section class="cart">
        <form action="process_cart.php" method="post">
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
                            <th scope="col" colspan="2">Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($products)) : ?>
                            <tr>
                                <td colspan="5" style="text-align: center; font-size: 1.5rem; padding: 3rem; color: var(--text); font-weight: bold;">
                                    Votre panier est vide.
                                </td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($products as $product) : ?>
                                <tr class="cart_product">
                                    <th scope="row"><?= $product->getName() ?></th>
                                    <td><span class="unitary_price"><?= $product->getPrice() ?></span>€</td>
                                    <td><span class="product_total">0</span>€</td>
                                    <td>
                                        <input type="number" name="quantity[<?= $product->getId() ?>]" value="1" min="1" max="99" class="quantity">
                                    </td>
                                    <td>
                                        <svg class="remove_product" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                            <path d="M18 6 6 18" />
                                            <path d="m6 6 12 12" />
                                        </svg>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="row" colspan="2">
                                Total
                            </th>
                            <td colspan="3">
                                <span id="total">
                                    0.00
                                </span>
                                €
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <button class="button_primary" style="float: right;">Valider le panier</button>
            </fieldset>
        </form>
    </section>
</main>
<?php require_once 'partials/footer.php'; ?>