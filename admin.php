<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<!--Nick Meek 2015-->
<head>
    <meta charset="utf-8">
    <title>Doge Rentals: Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="leaflet.css">
    <link rel="stylesheet" href="./js/jquery/jquery-ui.min.css">
    <script src="./js/jquery/jquery3.3.js"></script>
    <style>
        th, td {
            padding: 3px 10px;
        }
    </style>
</head>

<body>
<h1>Doge Rentals</h1>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="map.php">Map</a></li>
            <li><a class="current">Admin</a></li>
        </ul>
    </nav>
</header>
<main style="height: 1600px">
    <?php
    include('privateFiles/countBookings.php');
    ?>
    <div id="adminTable"><?php
        if ($count > 0) {
            echo "<h3 style='text-align: center; font-size: 40px'>Bookings</h3>";
        } ?></div>
    <?php
    if ($count > 0) {
        echo "<h3 id='adminHeader'>Cancel Booking:</h3>";
        echo "<div class='centerForm'>";
        echo "<form id='cancelBookingForm' action='cancelBooking.php' method='POST'>";
        echo "<select id='bookingNumbers' name='bookingNumber'>";
        for ($i = 0; $i < $count; $i++) {
            $num = $i + 1;
            $bookingName = $json->bookings->booking[$i]->name;
            echo "<option value='$num'>$bookingName</option>";
        }
        echo "</select>";
        echo "<input type='submit' value='Cancel' style='cursor: pointer; margin-left: 20px'>";
        echo "</form>";
        echo "</div>";
        echo "<script src=\"./js/Admin.js\"></script>";
    } else {
        echo "<p style='color: white; text-align: center; font-size: 25px'>There are currently no bookings.</p>";
    }

    include('privateFiles/dogCount.php');
    if ($dogCount > 0) {
        echo "<h3 id='removeHeader'>Remove dog:</h3>";
        echo "<div class='centerForm'>";
        echo "<form id='removeDog' action='removeDog.php' method='POST'>";
        echo "<select id='dogNumber' name='dogNumber'>";
        for ($i = 0; $i < $dogCount; $i++) {
            $name = $animalsJson->animals->dogs[$i]->dogId;
            echo "<option value='$i'>$name</option>";
        }
        echo "</select>";
        echo "<input type='submit' value='Remove' style='cursor: pointer; margin-left: 20px'>";
        echo "</form>";
        echo "</div>";
    }
    ?>
    <h3 id="addDogHeader">Add dog:</h3>
    <div id="addDogForm">
        <div class='addEditForm'>
            <fieldset class="adminFieldSet">
                <form action="addDog.php" method="POST">
                    <label for="dogId">Dog Id:</label><br>
                    <input type="text" id='dogId' name="dogId" value="DW-00" maxlength="6">
                    <br><br>

                    <label for="dogName">Dog Name:</label><br>
                    <input type="text" id="dogName" name="dogName"><br>
                    <br>

                    <label for="dogType">Dog Type:</label><br>
                    <input type="text" id="dogType" name="dogType"><br>
                    <br>

                    <label for="dogSize">Dog Size:</label><br>
                    <select id="dogSize" name="dogSize">
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                        <option value="huge">Huge</option>
                    </select>
                    <br><br>

                    <label for="description">Description:</label><br>
                    <input type="text" id="description" name="description"><br>
                    <br>

                    <label for="pricePerHour">Price Per Hour:</label><br>
                    <input type="text" id="pricePerHour" name="pricePerHour"><br>
                    <br>
                    <input type="submit" value="Add">
                </form>
            </fieldset>
        </div>
    </div>
    <?php
    if (isset($_SESSION['addMessages'])) {
        $addErrorMessages = $_SESSION['addMessages'];
        for ($i = 0; $i < count($addErrorMessages); $i++) {
            echo "<p style='color: red; text-align: center;'>$addErrorMessages[$i]</p>";
        }
    }
    if ($dogCount > 0) {
        ?>
        <h3 id='editDogHeader'>Edit Dogs:</h3>
        <div id='dogEditForm'>
            <div class='addEditForm'>
                <fieldset class="adminFieldSet">
                    <form id='editDog' action='editDog.php' method='POST'>
                        <select id='dogEditNumber' name='dogEditNumber'>
                            <?php
                            for ($i = 0; $i < $dogCount; $i++) {
                                $name = $animalsJson->animals->dogs[$i]->dogId;
                                echo "<option value='$i'>$name</option>";
                            }
                            ?>
                        </select>
                        <br><br>
                        <label for="dogName">Dog Name:</label><br>
                        <input type="text" id="dogName" name="dogName"><br>
                        <br>

                        <label for="dogType">Dog Type:</label><br>
                        <input type="text" id="dogType" name="dogType"><br>
                        <br>

                        <label for="dogSize">Dog Size:</label><br>
                        <select id="dogSize" name="dogSize">
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                            <option value="huge">Huge</option>
                        </select>
                        <br><br>

                        <label for="description">Description:</label><br>
                        <input type="text" id="description" name="description"><br>
                        <br>

                        <label for="pricePerHour">Price Per Hour:</label><br>
                        <input type="text" id="pricePerHour" name="pricePerHour"><br>
                        <br>
                        <input type='submit' value='Edit'>
                    </form>
                </fieldset>
            </div>
        </div>
        <?php
        if (isset($_SESSION['editMessages'])) {
            $editErrorMessages = $_SESSION['editMessages'];
            for ($i = 0; $i < count($editErrorMessages); $i++) {
                echo "<p style='color: red; text-align: center;'>$editErrorMessages[$i]</p>";
            }
        }
    }
    ?>
</main>
</body>


