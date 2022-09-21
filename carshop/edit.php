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
// $sql = "UPDATE cars SET img='$img' model='$model' price='$price' color='$color' WHERE carid=$id";

$sqlimg = "UPDATE cars SET img = $img  WHERE carid = $id";
$sqlm = "UPDATE cars SET  model='$model' WHERE carid = $id";
$sqlp = "UPDATE cars SET  price='$price'  WHERE carid = $id";
$sqlc = "UPDATE cars SET  color='$color' WHERE carid = $id";
$conn->query($sqlimg);
$conn->query($sqlm);
$conn->query($sqlp);
$conn->query($sqlc);
// if ($conn->query($sql1) === TRUE and $conn->query($sql2) === TRUE and $conn->query($sql3) === TRUE and $conn->query($sql4) === TRUE) {
//     // header("Location: http://localhost/carshop");
//     echo gettype($price);
//     echo "<br>";
//     echo $id;
//     echo "<br>";
//     echo $price;
//     echo "<br>";
//     echo $color;
//     echo "<br>";
//     echo "Record updated successfully";
// } else {
//     echo "Error updating record: " . $conn->error;
// }

$conn->close();
