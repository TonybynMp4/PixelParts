<?php
$title = 'Produit';
$styles = ['product.css'];
require_once __DIR__ . '/partials/header.php';
?>

<main>
    <section>
        <fieldset id="product">
            <img class="product_img" src="<?php echo BASE_PATH; ?>/images/4090.png" alt="Image du produit">
            <div id="product_details">
                <h2>RTX 4090</h2>
                <h3>Description du produit</h3>
                <p id="product_description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam, explicabo sunt voluptate harum magnam similique veniam beatae iure est corrupti, culpa amet maiores ipsum reprehenderit, nesciunt tempore adipisci? Praesentium, voluptatem? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum, commodi sed nobis porro iste ex, excepturi error dicta necessitatibus voluptas, mollitia nesciunt eos unde neque alias eveniet corporis repellat temporibus? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, minima! Repellat veritatis quisquam dolorum assumenda quidem! Sequi, laboriosam necessitatibus impedit sint ullam voluptates officia excepturi, deserunt iure delectus maxime magni? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente corrupti est aspernatur, ea error unde, suscipit vitae deserunt repudiandae perspiciatis doloremque illo, ipsa nulla maxime! Ullam facilis et in itaque.</p>
                <div id="product_buy">
                    <p class="product_price">
                        <span id="price">7880.39</span>€
                    </p>
                    <button class="button_primary">Ajouter au panier</button>
                </div>
            </div>
        </fieldset>
    </section>
</main>

<?php require_once __DIR__ . '/partials/footer.php'; ?>