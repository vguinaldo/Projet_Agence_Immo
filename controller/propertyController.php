<?php
session_start();

include ('../models/propertyModel.php');

if (isset($_SESSION['email'])) {
    $_SESSION['aInfos'] = getProperty();
    header('Location: ../view/propertyView/index.php');
    exit();
//} else {
//    header('Location: ../index.php');
//    exit();
}