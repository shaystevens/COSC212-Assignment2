<?php
session_start();
if (!isset($_POST['dogNumber'])) {
    header('Location: index.php');
    exit;
}
if (isset($_SESSION['editMessages'])) {
    unset($_SESSION['editMessages']);
}
if (isset($_SESSION['addMessages'])) {
    unset($_SESSION['addMessages']);
}
/* Get dog number from remove dog form */
$dogRemoveNumber = $_POST['dogNumber'];

/* Get animals and bookings files */
$jsonFile = file_get_contents('json/animals.json');
$json = json_decode($jsonFile);
$bookingFile = file_get_contents('json/bookings.json');
$bookingJson = json_decode($bookingFile);

/* Update animals file and if the dog id is booked cancel the booking */
$arr = $json->animals->dogs;
$dogIdNum = $arr[$dogRemoveNumber]->dogId;
unset($arr[$dogRemoveNumber]);
$arr = array_values($arr);
$bookingNum = -1;
$alteredBooking = $bookingJson->bookings->booking;
foreach ($bookingJson->bookings->booking as $booking) {
    $bookingNum++;
    foreach ($booking->dogId as $dogsBooked) {
        if (strcmp($dogsBooked, $dogIdNum) === 0) {
            unset($alteredBooking[$bookingNum]);
            $alteredBooking = array_values($alteredBooking);
            $bookingNum--;

        }
    }
}

/* Update json files and return to admin*/
$newBooking = array("booking" => $alteredBooking);
$bookings = array("bookings" => $newBooking);
$editedBookings = json_encode($bookings);
file_put_contents('json/bookings.json', $editedBookings);
$dogs = array("dogs" => $arr);
$animals = array("animals" => $dogs);
$editedAnimals = json_encode($animals);
file_put_contents('json/animals.json', $editedAnimals);
header('Location: admin.php');
exit;