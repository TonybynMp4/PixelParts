<?php
$title = 'Catalogue';
$styles = ['catalog.css'];
require_once __DIR__ . '/partials/header.php';
?>

<main>
    <?php if (isset($products) && !empty($products)): ?>
        <section>
            <h2>
                <?= $category->getName() ?>
            </h2>
            <div class="catalog">
                <?php foreach ($products as $product):
                    require __DIR__ . '/partials/product.php';
                endforeach; ?>
            </div>
        </section>
    <?php elseif (isset($categories)): ?>
        <section>
            <h2>
                Catégories
            </h2>
            <div class="categories">
                <?php foreach ($categories as $category): ?>
                    <fieldset class="category">
                        <legend>
                            <?= $category->getName() ?>
                        </legend>
                        <a href="<?= BASE_PATH; ?>/catalog?category_id=<?= $category->getId() ?>">
                            <img class="category_img" src="<?= BASE_PATH; ?>/images/category/<?= $category->getImage() ?? 'default.png' ?>" alt="Image de la catégorie">
                        </a>
                    </fieldset>
                <?php endforeach; ?>
            </div>
        </section>
    <?php else: ?>
        <section style="display:flex; flex-direction:column; align-items: center;">
            <p style="text-align: center; font-size: 1.5rem;">
                Aucun produit ne correspond à votre recherche.
            </p>
            <a href="<?= BASE_PATH; ?>/catalog" class="button_primary">
                Retourner au catalogue
            </a>
        </section>
    <?php endif; ?>
</main>

<?php
require_once __DIR__ . '/partials/footer.php';
?>