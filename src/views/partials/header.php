<?php
    function printNav() {
        $nav = [
            'Accueil' => BASE_PATH.'/',
            'Catalogue' => BASE_PATH.'/catalog',
            'À propos' => BASE_PATH.'/about'
        ];
        foreach ($nav as $key => $value) {
            echo '<a class="nav_button" href="' . $value . '">' . $key . '</a>';
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        PixelParts <?php if (isset($title)) { echo ' | ' . $title; } ?>
    </title>
    <link rel="stylesheet" href="<?= BASE_PATH; ?>/css/style.css">
    <script src="<?= BASE_PATH; ?>/js/header.js" defer></script>
    <link rel="icon" href="<?= BASE_PATH; ?>/images/Pixelparts.png">
    <?php
        if (isset($styles) && is_array($styles)) {
            foreach ($styles as $style) {
                echo '<link rel="stylesheet" href="' . BASE_PATH . '/css/' . $style . '">';
            }
        }

        if (isset($scripts) && is_array($scripts)) {
            foreach ($scripts as $script) {
                echo '<script src="' . BASE_PATH . '/js/' . $script . '" defer></script>';
            }
        }
    ?>

</head>
<body>
    <header>
        <a href="<?= BASE_PATH; ?>/">
            <img src="<?= BASE_PATH; ?>/images/Pixelparts.png" alt="Logo du site">
            <h1>
                PixelParts
            </h1>
        </a>

        <nav>
            <?php
                printNav();
            ?>
        </nav>

        <!-- Account -->
        <div id="nav_account">
            <?php if (isset($_SESSION['user'])) { ?>
                <div style="display: flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <?=$_SESSION['user']['firstname'];?>
                </div>
                <a class="nav_button" href="<?= BASE_PATH; ?>/account/logout">Déconnexion</a>
            <?php } else { ?>
                <a class="nav_button" href="<?= BASE_PATH; ?>/login">Connexion</a>
            <?php } ?>
            <a class="nav_button" href="<?= BASE_PATH.'/cart'?>">Panier</a>
        </div>

        <div id="nav_open">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
        </div>
    </header>
    <aside id="nav_menu">
        <div style="display: flex; margin-bottom:2em; gap:1em; align-items: center; justify-content: space-between;">
            <div id="opened_nav_account">
                <?php if (isset($_SESSION['user'])) { ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <?=$_SESSION['user']['firstname'];?>
                    <a class="nav_button" href="<?= BASE_PATH; ?>/account/logout">Déconnexion</a>
                <?php } else { ?>
                    <a class="nav_button" href="<?= BASE_PATH; ?>/login">Connexion</a>
                <?php } ?>
                <a class="nav_button" href="<?= BASE_PATH.'/cart'?>">Panier</a>
            </div>
                <svg id="nav_close" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </div>
        <nav>
            <?php printNav(); ?>
        </nav>
    </aside>