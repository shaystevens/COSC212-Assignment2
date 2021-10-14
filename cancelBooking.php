<?php
if(!isset($_POST['bookingNumber'])){
    header('Location: index.php');
    exit;
}
$bookingNumber = $_POST['bookingNumber'] - 1;
$jsonFile = file_get_contents('json/bookings.json');
$json = json_decode($jsonFile);
unset($json->bookings->booking[$bookingNumber]);
$newJson = json_encode($json);
file_put_contents('json/bookings.json', $newJson);
header('Location: admin.php');
exit;
