<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" lang="fr">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion Immo — Connexion</title>
    <link rel="stylesheet" href="rss/css/bulma.css">
</head>
<body>
<section class="hero is-link is-fullheight" style="background-color: black;">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <div class="card">
                        <form action="controller/login.php" method="post">
                            <div class="card-content">
                                <div class="field">
                                    <p class="control has-icons-left has-icons-right">
                                        <input id="email" class="input" type="email" placeholder="Email" required>
                                        <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                        <span class="icon is-small is-right"><i class="fas fa-check"></i></span>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control has-icons-left">
                                        <input id="pwd" class="input" type="password" placeholder="Password" required>
                                        <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <button class="button is-success">
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
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>
</html>