<?php



$id = (int)$_POST['del'];
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['del'])) {
    del($id);
}
function del($id)
{
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

    // sql to delete a record
    $sql = "DELETE FROM cars WHERE carid= $id ";

    if ($conn->query($sql) === TRUE) {
        header("Location: http://localhost/carshop");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
