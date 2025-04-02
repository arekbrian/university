<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BUBT ANNEX</title>
    <link rel="icon" type="image/x-icon" href="assets/img/rf_sis.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "db.php"; ?>
<?php 

if (!isset($_SESSION['teach_id'])) {
    header("Location: ../teacher/teacher_login.php" ); 
}

 ?>