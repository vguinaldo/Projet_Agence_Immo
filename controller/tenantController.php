<?php
session_start();

include ('../models/tenantModel.php');

if (isset($_SESSION['email'])) {
    $_SESSION['aInfos'] = getTenant();
    header('Location: ../view/tenantView/index.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}