<fieldset class="catalog_product">
    <legend style="text-align: center; font-size: 1rem; font-weight: bold;">
        <?= $product->getName() ?>
    </legend>
    <a class="unstyled_anchor catalog_product_info" href="<?= BASE_PATH; ?>/product?id=<?= $product->getId() ?>">
        <img class="catalog_product_img" src="<?= BASE_PATH; ?>/images/product/<?= $product->getPicture() ?? 'default.png' ?>" alt="Image du produit">
    </a>
    <div style="text-align: center; display: flex; flex-direction: column; align-items: center;">
        <p class="product_price">
            <?= $product->getPrice() ?>€
        </p>
        <a href="<?= BASE_PATH; ?>/product?id=<?= $product->getId() ?>" class="button_primary">
            Voir le produit
        </a>
    </div>
</fieldset>