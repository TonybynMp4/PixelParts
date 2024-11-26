<?php
    define('BASE_PATH', '/ecommerce/public');

    function printNav() {
        $nav = [
            'Accueil' => BASE_PATH.'/',
            'Connexion' => BASE_PATH.'/login',
            'Inscription' => BASE_PATH.'/register',
            'Catalogue' => BASE_PATH.'/catalog',
            'Produit' => BASE_PATH.'/product',
            'Panier' => BASE_PATH.'/cart',
            'À propos' => BASE_PATH.'/about'
        ];

        foreach ($nav as $key => $value) {
            echo '<a href="' . $value . '">' . $key . '</a>';
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        PixelParts <?php if ($title) { echo ' | ' . $title; } ?>
    </title>
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/style.css">
    <script src="<?php echo BASE_PATH; ?>/js/header.js" defer></script>
    <link rel="icon" href="<?php echo BASE_PATH; ?>/images/Pixelparts.png">
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
        <a href="/">
            <img src="<?php echo BASE_PATH; ?>/images/Pixelparts.png" alt="Logo du site">
            <h1>
                PixelParts
            </h1>
        </a>

        <nav>
            <?php
                printNav();
            ?>
        </nav>

        <div id="nav_open">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
        </div>
    </header>
    <aside id="nav_menu">
        <div id="nav_close">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </div>
        <nav>
            <?php printNav(); ?>
        </nav>
    </aside>