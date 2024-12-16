<?php
    $title = $product->getName() || 'Produit';
    $styles = ['product.css', 'catalog.css'];
    require_once __DIR__ . '/partials/header.php';
?>

<main>
    <section>
        <fieldset id="product">
            <img class="product_img" src="<?= BASE_PATH; ?>/images/product/<?= $product->getPicture() ?? 'default.png'; ?>" alt="Image du produit">
            <div id="product_details">
                <h2>
                    <?= $product->getName(); ?>
                </h2>
                <h3>
                    <?= $brand->getName(); ?>
                </h3>
                <p id="product_description">
                    <?= $product->getDescription(); ?>
                </p>
                <div id="product_buy">
                    <p class="product_price">
                        <span id="price">
                            <?= $product->getPrice(); ?>
                        </span>€
                    </p>
                    <a class="button_primary" href="<?= BASE_PATH; ?>/cart/addToCart?id=<?= $product->getId(); ?>">
                        Ajouter au panier
                    </a>
                </div>
            </div>
        </fieldset>
    </section>
    <section>
        <h2>
            Produits similaires
            <a href="<?= BASE_PATH; ?>/catalog?category_id=<?= $product->getCategory_id() ?>" style="font-size: 0.9rem; font-weight: normal; color: var(--link);">
                Voir plus
            </a>
        </h2>
        <div class="catalog">
            <?php foreach ($similarProducts as $product): ?>
                <?php require __DIR__ . '/partials/product.php'; ?>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/partials/footer.php'; ?>