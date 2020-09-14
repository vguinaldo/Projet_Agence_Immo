<?php
session_start();

include('../models/teamModel.php');

if (isset($_SESSION['email'])) {
    $_SESSION['aInfos'] = getTeam();
    $_SESSION['aAgences'] = getAgence();

    if ($_POST['firstname'] && $_POST['lastname'] && $_POST['salaire'] && $_POST['agence'] && $_POST['email'] && $_POST['phone']) {
        $aTeams['firstname'] = $_POST['firstname'];
        $aTeams['lastname'] = $_POST['lastname'];
        $aTeams['salaire'] = $_POST['salaire'];
        $aTeams['agence'] = $_POST['agence'];
        $aTeams['email'] = $_POST['email'];
        $aTeams['phone'] = $_POST['phone'];

        setTeam($aTeams);
    }

    header('Location: ../view/teamView/index.php');

    exit();
} else {
    header('Location: ../index.php');
    exit();
}


?>