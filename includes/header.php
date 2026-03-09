<?php
// includes/header.php
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book & Go</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="assets/js/main.js" defer></script>
</head>

<body>

    <header class="site-header">
        <div class="container header-inner">

            <!-- Logo -->
            <a class="brand" href="index.php">
                <img class="brand__logo"
                    src="assets/images/logo-bookandgo.webp"
                    alt="Book & Go">
            </a>

            <!-- NAV DESKTOP -->
            <nav class="nav nav--desktop">
                <a class="nav__link" href="service.php?id=1">Audit de site</a>
                <a class="nav__link" href="service.php?id=2">Accompagnement web</a>
                <a class="nav__link" href="service.php?id=3">Atelier découverte</a>
            </nav>

            <!-- ACTIONS DESKTOP -->
            <div class="header-actions header-actions--desktop">
                <a class="btn btn--ghost" href="register.php">S’inscrire</a>
                <a class="btn btn--primary" href="login.php">Se connecter</a>
            </div>

            <!-- BOUTON BURGER MOBILE -->
            <button class="burger"
                type="button"
                aria-label="Ouvrir le menu"
                aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>

        </div>

        <!-- MENU MOBILE -->
        <div class="mobile-menu" id="mobile-menu" hidden>
            <nav class="nav nav--mobile">
                <a class="nav__link" href="service.php?id=1">Audit de site</a>
                <a class="nav__link" href="service.php?id=2">Accompagnement web</a>
                <a class="nav__link" href="service.php?id=3">Atelier découverte</a>

                <div class="mobile-actions">
                    <a class="btn btn--ghost" href="register.php">S’inscrire</a>
                    <a class="btn btn--primary" href="login.php">Se connecter</a>
                </div>
            </nav>
        </div>

    </header>

    <main class="main-content">