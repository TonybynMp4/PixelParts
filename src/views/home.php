<?php
$styles = ['catalog.css'];
require __DIR__ . '/partials/header.php'; ?>

<main>
    <section>
        <h2>Bienvenue!</h2>
        <p>
            Bienvenue sur PixelParts, votre référence en matière de pièces informatiques!
        </p>
    </section>
    <section>
        <h2>Produits populaires</h2>
        <div class="catalog">
            <?php foreach ($popularProducts as $product) : ?>
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

<?php require __DIR__ . '/partials/footer.php'; ?>