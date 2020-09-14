<?php
session_start();
if (isset($_SESSION['email'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" lang="fr">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestion Immo — Accueil</title>
        <link rel="stylesheet" href="../../rss/css/bulma.css">
    </head>
    <body>
    <section class="hero is-primary is-fullheight" style="background-color: black;">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <?php include '../_navbar.php'; ?>
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    Gestion Immo.
                </h1>
                <h2 class="subtitle">
                    © 2020 Nicolas CAO & Vincent GUINALDO - All rights reserved
                </h2>
            </div>
        </div>
    </section>
    <script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    </body>
    </html>
    <?php
} else {
    header('Location: ../../index.php');
    exit();
}