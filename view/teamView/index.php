<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion Immo — Équipe</title>
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
            <table class="table is-fullwidth">
                <thead>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Email</td>
                <td>Téléphone</td>
                <td></td>
                <td></td>
                </thead>
            </table>
            <div class="level">
                <div class="level-left"></div>
                <div class="level-right">
                    <div class="level-item">
                        <a href="teamForm.php" class="button is-success">
                            Ajouter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>
</html>