<?php
session_start();
if (isset($_SESSION['editMessages'])) {
    unset($_SESSION['editMessages']);
}
if (isset($_SESSION['addMessages'])) {
    unset($_SESSION['addMessages']);
}
?>
<!DOCTYPE html>
<html lang="en">
<!--Nick Meek 2015-->
<head>
    <meta charset="utf-8">
    <title>Doge Rentals: login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Doge Rentals</h1>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="map.php">Map</a></li>
            <li><a class="current">Admin</a></li>
        </ul>
    </nav>
</header>
<main>
    <div style="text-align: center">
        <h3>Please log on to access admin page</h3>
        <form id="adminLogin" action="adminLoginValidation.php" method="POST">
            <p>
                <label for="username" class="loginLabel">Username: </label><br>
                <input type="text" id="username" name="username" size="30">
            </p>
            <p>
                <label for="password" class="loginLabel">Password: </label><br>
                <input style="margin-left: 3px" type="password" id="password" size="30" name="password">
            </p>
            <p>
                <input type="submit" style="margin-right: 155px; width: 65px; cursor: pointer; margin-bottom: 100px"
                       value="Login">
            </p>
        </form>
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            echo "<p id='loginError'>$error</p>";
        }
        ?>
    </div>
</main>