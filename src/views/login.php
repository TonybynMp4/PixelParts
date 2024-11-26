<?php
$title = 'PixelParts | Catalogue';
require_once __DIR__ . '/partials/header.php';
?>


<main>
    <section class="login">
        <form action="" method="post">
            <fieldset style="display:flex; flex-direction:column; width:30%; gap: 1em; margin-inline:auto; padding: 1em; border-radius: 1em;">
                <legend>
                    Se connecter
                </legend>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" required autofocus placeholder="Nom d'utilisateur">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required placeholder="Mot de passe">
                <button>Se connecter</button>
            </fieldset>
        </form>
        <a href="register" style="font-style: italic; text-decoration:none; margin: 1em auto;">
            Pas encore inscrit ?
        </a>
    </section>
</main>

<?php
require_once __DIR__ . '/partials/footer.php';
?>