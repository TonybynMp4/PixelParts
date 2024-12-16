<?php
$title = 'À propos';
$scripts = ['cart.js'];
$styles = ['cart.css'];

require_once 'partials/header.php';
?>
<main>
    <section class="cart">
        <form action="/cart/validate" method="post">
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
                                    <th scope="row"><?= $product['product']->getName() ?></th>
                                    <td><span class="unitary_price"><?= $product['product']->getPrice() ?></span>€</td>
                                    <td><span class="product_total"><?= $product['product']->getPrice() * $product['quantity'] ?></span>€</td>
                                    <td>
                                        <input data-product-id="<?= $product['product']->getId() ?>" type="number" name="quantity[<?= $product['product']->getId() ?>]" value="<?= $product['quantity'] ?>" min="1" max="99" class="quantity">
                                    </td>
                                    <td>
                                        <a href="/cart/removeFromCart?id=<?= $product['product']->getId() ?>">
                                            <svg class="remove_product" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                                <path d="M18 6 6 18" />
                                                <path d="m6 6 12 12" />
                                            </svg>
                                        </a>
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
                                    <?= $total ?>
                                </span>
                                €
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <a class="button_destructive" href="cart/empty">
                    Vider le panier
                </a>
                <button class="button_primary" style="float: right;">Valider le panier</button>
            </fieldset>
        </form>
    </section>
</main>
<?php require_once 'partials/footer.php'; ?>