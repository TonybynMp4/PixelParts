<?php
$title = 'Catalogue';
require_once __DIR__ . '/partials/header.php';
?>

<main>
    <section class="register">
        <form action="" method="post">
            <fieldset style="display:flex; flex-direction:column; width:30%; gap: 1em; margin-inline:auto; padding: 1em; border-radius: 1em;">
                <legend>
                    Créer un compte
                </legend>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" required autofocus placeholder="Nom d'utilisateur">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required placeholder="Mot de passe">
                <button>Créer un compte</button>
            </fieldset>
        </form>
        <a href="login" style="font-style: italic; text-decoration:none; margin: 1em auto;">
            Déjà inscrit ?
        </a>
    </section>
</main>


<?php
require_once __DIR__ . '/partials/footer.php';
?>