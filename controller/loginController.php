<?php
session_start();
require('config.php');

if (isset($_POST) && !empty($_POST['email']) && !empty($_POST['pwd'])) {
    if ($dbConn = oci_connect($user, $pwd, $dbConnStr)) {
        $req = "SELECT adresse_mail, mdp FROM agent";

        $stmt = oci_parse($dbConn, $req);
        if (!oci_execute($stmt)) {
            $err = oci_error($stmt);
            trigger_error('Query failed: ' . $err['message'], E_USER_ERROR);
        }

        $aMail = array();
        $aPwd = array();
        while (oci_fetch($stmt)) {
            $aMail[] = oci_result($stmt, 'ADRESSE_MAIL');
            $aPwd[] = oci_result($stmt, 'MDP');
        }

        if (in_array($_POST['email'], $aMail) && in_array($_POST['pwd'], $aPwd)) {
            header('Location: ../view/homepageView/index.php');
            $_SESSION['email'] = $_POST['email'];
            exit();
        } else {
            header('Location: ../index.php');
            echo "Adresse mail et/ou mot de passe incorrect";
            exit();
        }

        oci_free_statement($stmt);
        oci_close($dbConn);
    } else {
        $err = oci_error();
        trigger_error('Could not establish a connection ' . $err['message'], E_USER_ERROR);
    }
}
?>
