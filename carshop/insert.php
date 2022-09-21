<?php


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

// get values from the car form
$img =  $_REQUEST['img'];
$model =  $_REQUEST['model'];
$price =  $_REQUEST['price'];
$color =  $_REQUEST['color'];

// Create prepared statement
$stmt = $conn->prepare("INSERT INTO cars ( img, model, price, color) VALUES (?,?,?,?)");
$stmt->bind_param("ssis", $img, $model, $price, $color);

if ($stmt->execute()) {
    echo "yes";
    header("Location: http://localhost/carshop");
} else {
    echo "no";
}
$conn->close();
