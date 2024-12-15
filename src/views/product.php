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
                    <button class="button_primary">Ajouter au panier</button>
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
                <fieldset class="catalog_product">
                    <legend style="text-align: center; font-size: 1rem; font-weight: bold;">
                        <?= $product->getName(); ?>
                    </legend>
                    <a class="unstyled_anchor catalog_product_info" href="<?= BASE_PATH; ?>/product?id=<?= $product->getId(); ?>">
                        <img class="catalog_product_img" src="<?= BASE_PATH; ?>/images/product/<?= $product->getPicture() ?? 'default.png'; ?>" alt="Image du produit">
                    </a>
                    <div style="text-align: center;">
                        <p class="product_price">
                            <?= $product->getPrice(); ?>€
                        </p>
                        <button class="button_primary">Ajouter au panier</button>
                    </div>
                </fieldset>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/partials/footer.php'; ?>