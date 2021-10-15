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
<?php
include('privateFiles/countBookings.php');
if($count > 0){
    echo "<h3>Cancel Booking:</h3>";
    echo "<form id='cancelBookingForm' action='cancelBooking.php' method='POST'>";
    echo "<select id='bookingNumbers' name='bookingNumber'>";
    for($i=0; $i < $count; $i++){
        $num = $i + 1;
        echo "<option value='$num'>$num</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='Cancel'>";
    echo "</form>";
    echo "<script src=\"./js/Admin.js\"></script>";
}else{
    echo "<p>There are currently no bookings.</p>";
}

include('privateFiles/dogCount.php');
if($dogCount > 0){
    echo "<h3>Remove dog:</h3>";
    echo "<form id='removeDog' action='removeDog.php' method='POST'>";
    echo "<select id='dogNumber' name='dogNumber'>";
    for($i=0; $i < $dogCount; $i++){
        $name = $animalsJson->animals->dogs[$i]->dogId;
        echo "<option value='$i'>$name</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='Remove'>";
    echo "</form>";
}
?>
</body>

