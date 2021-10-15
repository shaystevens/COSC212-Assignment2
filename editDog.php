<?php
session_start();
if (!isset($_SESSION['admin'])){
    header('Location: index.php');
    exit;
}

$dogEditNum = $_POST['dogEditNumber'];
$dogName = $_POST['dogName'];
$dogType = $_POST['dogType'];
$dogSize = $_POST['dogSize'];
$description = $_POST['description'];
$price = $_POST['pricePerHour'];

$animalsFile = file_get_contents('json/animals.json');
$animalsJson = json_decode($animalsFile);
$dogId = $animalsJson->animals->dogs[$dogEditNum]->dogId;

$editedDog = array("dogId" => $dogId, "dogName" => $dogName, "dogType" => $dogType,
    "dogSize" => $dogSize, "description" => $description, "pricePerHour" => $price);

$animalsArray = $animalsJson->animals->dogs;
unset($animalsArray[$dogEditNum]);
$animalsArray = array_values($animalsArray);
array_push($animalsArray, $editedDog);

$dogs = array("dogs" => $animalsArray);
$animals = array("animals" => $dogs);
$newAnimals = json_encode($animals);
file_put_contents('json/animals.json', $newAnimals);
header('Location: admin.php');
exit;
