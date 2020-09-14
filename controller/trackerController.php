<?php
session_start();

include ('../models/teamModel.php');

if (isset($_SESSION['email'])) {
    $_SESSION['aInfos'] = getTeam();
    header('Location: ../view/trackerView/index.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}