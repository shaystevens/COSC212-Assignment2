<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}
if (isset($_SESSION['editMessages'])) {
    unset($_SESSION['editMessages']);
}
include('privateFiles/validateFunctions.php');
$editMessages = array();
$dogEditNum = $_POST['dogEditNumber'];
$dogName = $_POST['dogName'];
$dogType = $_POST['dogType'];
$dogSize = $_POST['dogSize'];
$description = $_POST['description'];
$price = $_POST['pricePerHour'];
checkDogName($dogName, $editMessages);
checkDogType($dogType, $editMessages);
checkDogDescription($description, $editMessages);
checkPricePerHour($price, $editMessages);
if (count($editMessages) > 0) {
    $_SESSION['editMessages'] = $editMessages;
    header('Location: admin.php');
    exit;
}

$animalsFile = file_get_contents('json/animals.json');
$animalsJson = json_decode($animalsFile);
$dogId = $animalsJson->animals->dogs[$dogEditNum]->dogId;

$dog = $animalsJson->animals->dogs[$dogEditNum];
$dog->dogName = $dogName;
$dog->dogType = $dogType;
$dog->dogSize = $dogSize;
$dog->description = $description;
$dog->pricePerHour = $price;

$newAnimals = json_encode($animalsJson);
file_put_contents('json/animals.json', $newAnimals);
header('Location: admin.php');
exit;