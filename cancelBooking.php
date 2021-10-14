<?php
if(!isset($_POST['bookingNumber'])){
    header('Location: index.php');
    exit;
}
$bookingNumber = $_POST['bookingNumber'] - 1;
$jsonFile = file_get_contents('json/bookings.json');
$json = json_decode($jsonFile);
$arr = $json->bookings->booking;
unset($arr[$bookingNumber]);
$arr = array_values($arr);
$newBooking = array("booking" => $arr);
$bookings = array ("bookings" => $newBooking);
$editedBookings = json_encode($bookings);
file_put_contents('json/bookings.json', $editedBookings);
header('Location: admin.php');
exit;
