<?php
session_start();
if (!isset($_SESSION['admin'])){
    header('Location: index.php');
    exit;
}
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<!--Nick Meek 2015-->
<head>
    <meta charset="utf-8">
    <title>Muttley and Co.: Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="leaflet.css">
    <link rel="stylesheet" href="./js/jquery/jquery-ui.min.css">
    <script src="./js/jquery/jquery3.3.js"></script>
    <script src="./js/Admin.js"></script>
    <style>
        th, td {
            padding: 3px 10px;
        }
    </style>
</head>

<body>
<h1>Muttley & Co. Car Hire</h1>
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="map.php">Map</a></li>
        <li><a>Admin</a></li>
    </ul>
</nav>
<main>

</main>
</body>

