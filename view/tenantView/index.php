<?php
session_start();
if (isset($_SESSION['email'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestion Immo — Locataires</title>
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
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Adresse</th>
                            <th>Bail (début)</th>
                            <th>Bail (fin)</th>
                            <th>Loyer (€)</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($_SESSION['aInfos'] as $oInfo) {
                            ?>
                            <tr>
                                <td><?php echo $oInfo['nom'] ?></td>
                                <td><?php echo $oInfo['prenom'] ?></td>
                                <td><?php echo $oInfo['email'] ?></td>
                                <td><?php echo $oInfo['telephone'] ?></td>
                                <td><?php echo $oInfo['adresse'] ?></td>
                                <td><?php echo $oInfo['debut_bail'] ?></td>
                                <td><?php echo $oInfo['fin_bail'] ?></td>
                                <td><?php echo $oInfo['loyer'] ?></td>
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
                            <a href="tenantForm.php" class="button is-success">
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
} else {
    header('Location: ../../index.php');
    exit();
}