<?php
$animalsFile = file_get_contents('json/animals.json');
$animalsJson = json_decode($animalsFile);
$dogCount = 0;
foreach ($animalsJson->animals->dogs as $dogs) {
    $dogCount++;
}