<?php
$title = 'Inscription';
$scripts = ['register.js'];
$styles = ['register.css'];
require_once __DIR__ . '/partials/header.php';
?>

<main>
    <section class="register">
        <?php
            if (isset($error)) {
                echo '<p class="error">' . $error . '</p>';
            }
        ?>
        <form action="/account/register" method="post">
            <fieldset style="display:flex; flex-direction:column; width:30%; gap: 1em; margin-inline:auto; padding: 1em; border-radius: 1em;">
                <legend>
                    Créer un compte
                </legend>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required autofocus placeholder="Email">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" required placeholder="Prénom">
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" required placeholder="Nom">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required placeholder="Mot de passe">
                <label for="passwordConfirmation">Confirmer le mot de passe</label>
                <input type="password" id="passwordConfirmation" name="passwordConfirmation" required placeholder="Confirmer le mot de passe">
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