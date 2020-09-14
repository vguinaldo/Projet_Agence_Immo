<?php
session_start();
if (!isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" lang="fr">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion Immo — Connexion</title>
    <link rel="stylesheet" href="rss/css/bulma.css">
    <link rel="stylesheet" href="rss/css/style.css">
</head>
<body>
<div id="gradient" />
<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <div class="card">
                        <form action="controller/loginController.php" method="post">
                            <div class="card-content">
                                <div class="field">
                                    <p class="control has-icons-left has-icons-right">
                                        <input name="email" class="input" type="email" placeholder="Email" required>
                                        <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                        <span class="icon is-small is-right"><i class="fas fa-check"></i></span>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control has-icons-left">
                                        <input name="pwd" class="input" type="password" placeholder="Password" required>
                                        <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <button type="submit" class="button is-success">
                                            Connexion
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script src="rss/js/script.js"></script>
</body>
</html>
<?php
} else {
    header('Location: controller/homepageController.php');
    exit();
}