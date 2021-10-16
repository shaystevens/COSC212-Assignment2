<?php
/* Counts amount of bookings*/
$jsonFile = file_get_contents('json/bookings.json');
$json = json_decode($jsonFile);
$count = 0;
foreach ($json->bookings->booking as $booking) {
    $count++;
}
