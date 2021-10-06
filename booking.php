<?php
$jsonFile = file_get_contents('json/bookings.json');
$json = json_decode($jsonFile);
$output = "";
foreach ($json->bookings->booking as $booking){
    $dogs = "";
    for($i = 0; $i < count($booking->dogId); $i++){
        $dogs.= $booking->dogId[$i]. " ";
    }
    $output.="dogId : " . $dogs . "<br />";
    $output.="Name : " .$booking->name . "<br />";
    $output.="Number of hours : ".$booking->numHours. "<br />";
    $output.= "<br/>";
}
echo "</p>";
echo $output;

