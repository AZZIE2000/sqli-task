<?php

use function PHPSTORM_META\type;

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "car_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = (int)$_REQUEST['carid'];
$img =  $_REQUEST['carpic'];
$model =  $_REQUEST['carmodel'];
$price =  (int)$_REQUEST['carprice'];
$color =  $_REQUEST['carcolor'];
$sql = "UPDATE cars SET img='$img', model='$model', price='$price', color='$color' WHERE carid=$id";


if ($conn->query($sql) === TRUE) {
    header("Location: http://localhost/carshop");
    echo gettype($price);
    echo "<br>";
    echo $id;
    echo "<br>";
    echo $price;
    echo "<br>";
    echo $color;
    echo "<br>";
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
