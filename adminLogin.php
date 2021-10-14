<!DOCTYPE html>
<html lang="en">
<!--Nick Meek 2015-->
<head>
    <meta charset="utf-8">
    <title>Muttley & Co. Mutt Hire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Muttley & Co. Mutt Hire</h1>
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="map.php">Map</a></li>
        <li><a>Admin</a></li>
    </ul>
</nav>
<main>
    <div style="text-align: center">
        <h3>Please log in to access admin page</h3>
        <form id="adminLogin" action="adminLoginValidation.php" method="POST">
            <p>
                <label for="username">Username: </label>
                <input type="text" id="username" name="username">
            </p>
            <p>
                <label for="password">Password: </label>
                <input type="text" id="password" name="password">
            </p>
            <p>
                <input type="submit">
            </p>
        </form>
        <?php
        session_start();
        if(isset($_SESSION['error'])){
            $error = $_SESSION['error'];
            echo "<p>$error</p>";
        }
        ?>
    </div>
</main>