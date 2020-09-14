<?php
session_start();

if (isset($_SESSION['email'])) {
    header('Location: ../view/homepageView/index.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}