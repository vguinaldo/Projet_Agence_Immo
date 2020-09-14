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
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">
                                Ajouter un agent
                            </p>
                        </div>

                        <!-- Type & Catégorie -->
                        <div class="card-content">
                            <form action="../../controller/teamController.php" method="post">
                                <div class="columns">
                                    <div class="column">
                                        <div class="field">
                                            <label class="label">Type</label>
                                            <div class="control">
                                                <div class="select">
                                                    <select required>
                                                        <option></option>
                                                        <option>Select dropdown</option>
                                                        <option>With options</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <label class="label">Catégorie</label>
                                            <div class="control">
                                                <div class="select">
                                                    <select required>
                                                        <option></option>
                                                        <option>Select dropdown</option>
                                                        <option>With options</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Surface, nombre de pièces et prix -->
                                <div class="columns">
                                    <div class="column">
                                        <div class="field">
                                            <label class="label">Surface (m²)</label>
                                            <div class="control has-icons-left has-icons-right">
                                                <input name="surface" class="input" type="number" placeholder="50" min="20" required>
                                                <span class="icon is-small is-left"><i
                                                            class="fas fa-building"></i></span>
                                                <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <label class="label">Pièce(s)</label>
                                            <div class="control has-icons-left has-icons-right">
                                                <input name="piece" class="input" type="number" placeholder="Bidart" min="1" required>
                                                <span class="icon is-small is-left"><i
                                                            class="fas fa-bed"></i></span>
                                                <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <label class="label">Prix (€)</label>
                                            <div class="control has-icons-left has-icons-right">
                                                <input name="price" class="input" type="number" placeholder="50000" min="50000" required>
                                                <span class="icon is-small is-left"><i
                                                            class="fas fa-euro-sign"></i></span>
                                                <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Adresse postale -->
                                <div class="columns">
                                    <div class="column">
                                        <div class="field">
                                            <label class="label">Adresse postale</label>
                                            <div class="control has-icons-left has-icons-right">
                                                <input name="mailing_address" class="input" type="text" placeholder="92 allée Théodore Monod" required>
                                                <span class="icon is-small is-left"><i
                                                            class="fas fa-city"></i></span>
                                                <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Ville & Code postal -->
                                <div class="columns">
                                    <div class="column">
                                        <div class="field">
                                            <label class="label">Ville</label>
                                            <div class="control has-icons-left has-icons-right">
                                                <input name="city" class="input" type="text" placeholder="Bidart" required>
                                                <span class="icon is-small is-left"><i
                                                            class="fas fa-city"></i></span>
                                                <span class="icon is-small is-right"><i
                                                            class="fas fa-exclamation-triangle"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <label class="label">Code postal</label>
                                            <div class="control has-icons-left has-icons-right">
                                                <input name="postal_code" class="input" type="text" placeholder="64210" required>
                                                <span class="icon is-small is-left"><i
                                                            class="fas fa-phone"></i></span>
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