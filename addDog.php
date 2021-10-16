<?php
session_start();
if (!isset($_SESSION['admin'])){
    header('Location: index.php');
    exit;
}
if(isset($_SESSION['addMessages'])){
    unset($_SESSION['addMessages']);
}
include('privateFiles/validateFunctions.php');
$addMessages = array();
$dogId = $_POST['dogId'];
$dogName = $_POST['dogName'];
$dogType = $_POST['dogType'];
$dogSize = $_POST['dogSize'];
$description = $_POST['description'];
$price = $_POST['pricePerHour'];

checkDogId($dogId, $addMessages);
checkDogName($dogName, $addMessages);
checkDogType($dogType, $addMessages);
checkDogDescription($description, $addMessages);
checkPricePerHour($price, $addMessages);
if(count($addMessages) > 0){
    $_SESSION['addMessages'] = $addMessages;
    header('Location: admin.php');
    exit;
}

$animalsFile = file_get_contents('json/animals.json');
$animalsJson = json_decode($animalsFile);

$newDog = array("dogId" => $dogId, "dogName" => $dogName, "dogType" => $dogType,
"dogSize" => $dogSize, "description" => $description, "pricePerHour" => $price);

$animalsArray = $animalsJson->animals->dogs;
array_push($animalsArray, $newDog);
$dogs = array("dogs" => $animalsArray);
$animals = array("animals" => $dogs);
$newAnimals = json_encode($animals);
file_put_contents('json/animals.json', $newAnimals);
header('Location: admin.php');
exit;
