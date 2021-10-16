<?php
session_start();
if (!isset($_POST['bookingNumber'])) {
    header('Location: index.php');
    exit;
}
if (isset($_SESSION['editMessages'])) {
    unset($_SESSION['editMessages']);
}
if (isset($_SESSION['addMessages'])) {
    unset($_SESSION['addMessages']);
}
/* Get booking number information from form*/
$bookingNumber = $_POST['bookingNumber'] - 1;

$jsonFile = file_get_contents('json/bookings.json');
$json = json_decode($jsonFile);

/* Update bookings array by removing booking */
$arr = $json->bookings->booking;
unset($arr[$bookingNumber]);
$arr = array_values($arr);

/* Update bookings.json and return to admin page*/
$newBooking = array("booking" => $arr);
$bookings = array("bookings" => $newBooking);
$editedBookings = json_encode($bookings);
file_put_contents('json/bookings.json', $editedBookings);
header('Location: admin.php');
exit;
