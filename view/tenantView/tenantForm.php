<?php
session_start();
if (isset($_SESSION['email'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestion Immo — Locataire</title>
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
                <div class="columns">
                    <div class="column is-half is-offset-one-quarter">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-header-title">
                                    Ajouter un agent
                                </p>
                            </div>
                            <div class="card-content">
                                <form action="../../controller/tenantController.php" method="post">
                                    <div class="columns">
                                        <div class="column">
                                            <div class="field">
                                                <label class="label">Prénom</label>
                                                <div class="control has-icons-right">
                                                    <input id="firstname" class="input" type="text" placeholder="Jean">
                                                    <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="field">
                                                <label class="label">Nom</label>
                                                <div class="control has-icons-right">
                                                    <input id="lastname" class="input" type="text" placeholder="Dupont">
                                                    <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="columns">
                                        <div class="column">
                                            <div class="field">
                                                <label class="label">Email</label>
                                                <div class="control has-icons-left has-icons-right">
                                                    <input name="email" class="input" type="email" placeholder="adresse@example.com">
                                                    <span class="icon is-small is-left"><i
                                                            class="fas fa-envelope"></i></span>
                                                    <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="field">
                                                <label class="label">Téléphone</label>
                                                <div class="control has-icons-left has-icons-right">
                                                    <input name="phone" class="input" type="email" placeholder="0607080910">
                                                    <span class="icon is-small is-left"><i
                                                            class="fas fa-envelope"></i></span>
                                                    <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Début bail, fin bail et loyer mensuel-->
                                    <div class="columns">
                                        <div class="column">
                                            <div class="field">
                                                <label class="label">Bail (début)</label>
                                                <div class="control has-icons-left has-icons-right">
                                                    <input name="bail_debut" class="input" type="date" required>
                                                    <span class="icon is-small is-left"><i
                                                            class="fas fa-calendar"></i></span>
                                                    <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="field">
                                                <label class="label">Bail (fin)</label>
                                                <div class="control has-icons-left has-icons-right">
                                                    <input name="bail_fin" class="input" type="date" required>
                                                    <span class="icon is-small is-left"><i
                                                            class="fas fa-calendar"></i></span>
                                                    <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="field">
                                                <label class="label">Loyer mensuel (€)</label>
                                                <div class="control has-icons-left has-icons-right">
                                                    <input name="rent" class="input" type="number" placeholder="300" min="0" required>
                                                    <span class="icon is-small is-left"><i
                                                            class="fas fa-envelope"></i></span>
                                                    <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field is-grouped is-grouped-right">
                                        <p class="control">
                                            <button type="submit" class="button is-primary">
                                                Ajouter
                                            </button>
                                        </p>
                                        <p class="control">
                                            <a href="index.php" class="button is-light">
                                                Annuler
                                            </a>
                                        </p>
                                    </div>
                                </form>
                            </div>
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