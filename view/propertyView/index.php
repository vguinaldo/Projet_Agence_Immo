<?php
session_start();

if (isset($_SESSION['email'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestion Immo — Biens</title>
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
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Type</th>
                            <th>Catégorie</th>
                            <th>Surface (m²)</th>
                            <th>Adresse</th>
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Nbre pièce(s)</th>
                            <th>Prix</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($_SESSION['aInfos'] as $oInfo) {
                            ?>
                            <tr>
                                <td><?php echo $oInfo['id'] ?></td>
                                <td><?php echo $oInfo['type'] ?></td>
                                <td><?php echo $oInfo['categorie'] ?></td>
                                <td><?php echo $oInfo['surface'] ?></td>
                                <td><?php echo $oInfo['adresse'] ?></td>
                                <td><?php echo $oInfo['code_postal'] ?></td>
                                <td><?php echo $oInfo['ville'] ?></td>
                                <td><?php echo $oInfo['piece'] ?></td>
                                <td><?php echo $oInfo['prix'] ?></td>
                                <td><i class="fas fa-edit"></i></td>
                                <td id="<?php echo $oInfo['id'] ?>"><i class="fas fa-trash"></i></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="level">
                    <div class="level-left"></div>
                    <div class="level-right">
                        <div class="level-item">
                            <a href="propertyForm.php" class="button is-success">
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
    <?php
//} else {
//    header('Location: ../../index.php');
//    exit();
}
?>