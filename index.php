<?php
session_start();
if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
}
?>
<!DOCTYPE html>
<html lang="en">
<!--Nick Meek 2015-->
<head>
    <meta charset="utf-8">
    <title>Muttley & Co. Mutt Hire</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./js/jquery/jquery-ui.min.css">
    <script src="./js/jquery/jquery3.3.js"></script>
    <script src="./js/jquery/jquery-ui.js"></script>
    <script src="js/Dogs.js"></script>
    <script src="js/Booking.js"></script>
    <script src="js/ShowReviews.js"></script>

</head>
<body>
<h1>Muttley & Co. Mutt Hire</h1>
<nav>
    <ul>
        <li><a>Home</a></li>
        <li><a href="map.php">Map</a></li>
        <li><a href="adminLogin.php">Admin</a></li>
    </ul>
</nav>
<form id="bookingForm" method="POST" action="booking.php">
    <div id="bookingData">
        <section id="siteList">
            <fieldset>
                <legend>Our Lovely Dogs</legend>
                <ul id="dogsLst"></ul>
            </fieldset>
        </section>

        <section id="selectDates">
            <p>Date: <input type="text" id="arriveDatepicker" name="arriveDatepicker">
            <hr>
            Time: <input type="time" id="pickupTime" name="pickupTime">
            <hr>
            Hours: <input id="numHours" type="number" max="12" name="numHours">

            <div id="dateErrors"></div>

            <fieldset>
                <legend>Your Details</legend>
                <ul>
                    <li><label>Name: <input type="text" id="renterName" name="renterName"> </label></li>
                </ul>
            </fieldset>
            <input type="submit" id="makeBooking" value="Book Selected Dog(s)">
        </section>
</form>

<section id="dogPreviewPane"></section>
</div>

<div id="reviews">
    <h2>Reviews</h2>
</div>
</section>
</body>
</html>
