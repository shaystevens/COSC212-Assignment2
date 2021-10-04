<?php
$jsonFile = file_get_contents('json/bookings.json');
$json = json_decode($jsonFile);
$output = "";
foreach ($json->bookings->booking as $booking){
    $output.="dogId : " .$booking->dogId. "<br />";
    $output.="Name : " .$booking->name . "<br />";
    $output.="Number of hours : ".$booking->numHours. "<br />";
}
echo "<p>Test</p>";
echo $output;

