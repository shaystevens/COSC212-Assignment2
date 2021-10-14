<?php
session_start();
if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
}
if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<!--Nick Meek 2015-->
<head>
    <meta charset="utf-8">
    <title>Muttley and Co.: Map</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="leaflet.css">
    <link rel="stylesheet" href="./js/jquery/jquery-ui.min.css">
    <script src="./js/jquery/jquery3.3.js"></script>
    <script src="./js/leaflet.js"></script>
    <script src="./js/map.js"></script>

</head>
<body>
<h1>Muttley & Co. Car Hire</h1>
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a>Map</a></li>
        <li><a href="adminLogin.php">Admin</a></li>
    </ul>
</nav>

<div id="map"></div>

</section>
</body>
</html>