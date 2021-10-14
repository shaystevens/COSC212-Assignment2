<body>
<main>
    <?php
    $jsonFile = file_get_contents('json/bookings.json');
    $json = json_decode($jsonFile);
    foreach ($json->bookings->booking as $booking){
        $name = $booking->name;
        $month = $booking->pickup->month;
        $year =  $booking->pickup->year;
        $time = $booking->pickup->time;
        $hours = $booking->numHours;

        for($i=0; $i<count($booking->dogId); $i++){
            $dog = $booking->dogId[$i];
            echo "<p>$dog</p>";
        }
        echo "<p>$name</p>";
        echo "<p>$month</p>";
        echo "<p>$year</p>";
        echo "<p>$time</p>";
        echo "<p>$hours</p>";
        echo "</br>";
    }
    unset($json->bookings->booking[0]);
    echo "<p>TEST 2</p>";
    foreach ($json->bookings->booking as $booking){
        $name = $booking->name;
        $month = $booking->pickup->month;
        $year =  $booking->pickup->year;
        $time = $booking->pickup->time;
        $hours = $booking->numHours;

        for($i=0; $i<count($booking->dogId); $i++){
            $dog = $booking->dogId[$i];
            echo "<p>$dog</p>";
        }
        echo "<p>$name</p>";
        echo "<p>$month</p>";
        echo "<p>$year</p>";
        echo "<p>$time</p>";
        echo "<p>$hours</p>";
        echo "</br>";
    }
    $jsonTest = json_encode($json);
    file_put_contents('json/bookings.json', $jsonTest);
    ?>
</main>
</body>