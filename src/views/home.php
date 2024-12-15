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
            <?php foreach ($popularProducts as $product):
                require __DIR__ . '/partials/product.php';
            endforeach; ?>
        </div>
    </section>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>