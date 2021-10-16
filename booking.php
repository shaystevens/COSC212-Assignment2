<?php
//Obtain bookings file
$jsonFile = file_get_contents('json/bookings.json');
$json = json_decode($jsonFile);

//Get posted booking information
$dogs = $_POST['dog'];
$hours = $_POST['numHours'];
$time = $_POST['pickupTime'];
$date = $_POST['arriveDatepicker'];
$name = $_POST['renterName'];

//Make sure bookings.php can only be accessed when the form is submitted
if ($dogs == "" || $hours == "" || $time == "" || $date == "" || $name == "") {
    header('Location: index.php');
    exit;
}

//Add booking info into array
$dateArray = explode("/", $date);
$pickup = array("day" => $dateArray[1], "month" => $dateArray[0], "year" => $dateArray[2], "time" => $time);
$bookingInfo = array("dogId" => $dogs, "name" => $name, "pickup" => $pickup, "numHours" => $hours);

//Add the new booking information to the json file
foreach ($json->bookings as $arr) {
    array_push($arr, $bookingInfo);
    $newBooking = array("booking" => $arr);
    $bookings = array("bookings" => $newBooking);
    $jsonBooking = json_encode($bookings);
    file_put_contents('json/bookings.json', $jsonBooking);
}
header('Location: index.php');
exit;

