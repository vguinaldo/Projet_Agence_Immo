<?php
session_start();

include('../models/ownerModel.php');

if (isset($_SESSION['email'])) {
    $_SESSION['aInfos'] = getOwners();

    header('Location: ../view/ownerView/index.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}