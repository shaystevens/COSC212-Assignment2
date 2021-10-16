<?php
session_start();
if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
}
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
if (isset($_SESSION['editMessages'])) {
    unset($_SESSION['editMessages']);
}
if (isset($_SESSION['addMessages'])) {
    unset($_SESSION['addMessages']);
}
?>
<!DOCTYPE html>
<html lang="en">
<!--Shay Stevens 2021-->
<head>
    <meta charset="utf-8">
    <title>Doge Rentals: Map</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="leaflet.css">
    <link rel="stylesheet" href="./js/jquery/jquery-ui.min.css">
    <script src="./js/jquery/jquery3.3.js"></script>
    <script src="./js/leaflet.js"></script>
    <script src="./js/map.js"></script>

</head>
<body>
<h1>Doge Rentals</h1>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a class="current">Map</a></li>
            <li><a href="adminLogin.php">Admin</a></li>
        </ul>
    </nav>
</header>
<main>
    <h3>Map</h3>
    <div id="map"></div>
</main>

</section>
</body>
</html>