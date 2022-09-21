<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1 class="header">Add New Car</h1>
  <form class="container add" action="insert.php" method="post">
    <p>
      <label for="img">Car Image:</label><br>
      <input class="form-control" required type="link" name="img" id="img" />
    </p>
    <p>
      <label for="model">Car Model:</label><br>
      <input class="form-control" required type="text" name="model" id="model" />
    </p>
    <p>
      <label for="price">Car price:</label><br>
      <input class="form-control" required type="number" name="price" id="price" />
    </p>
    <p>
      <label for="color">Car Color:</label><br>
      <input class="form-control" required type="text" name="color" id="color" />
    </p>
    <input class="addbtn" type="submit" value="ADD" />
  </form>
  <hr>
  <div class="cards">
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
    $sql = "SELECT carid, img, model, price, color FROM cars";
    $result = $conn->query($sql);
    $cars = $result->fetch_all(MYSQLI_ASSOC); ?>
    <div class="container">
      <div class=" row row-cols-1 row-cols-md-3 g-2  p-4 m-4 ">
        <?php foreach ($cars as $car) { ?>
          <div class="col conn ">
            <div class="card h-100  ">
              <img style="object-fit: cover; height:150px" src="<?php echo $car["img"]; ?>" class="card-img-top  " alt="...">
              <div class="card-body">
                <h5 class="card-title">Model: <?php echo $car["model"]; ?></h5>
                <h5 class="card-title">Color: <?php echo $car["color"]; ?></h5>
                <h5 class="card-title">Price: <?php echo $car["price"]; ?> $ / day</h5>
                <form action="del.php" method="post">
                  <input class="dell" type="submit" name="del" value="<?php echo $car["carid"]; ?>" />
                </form>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $car["carid"]; ?>">
                  Edit
                </button>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop<?php echo $car["carid"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="edit.php">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Car Image:</label>
                            <input value="<?php echo $car["img"]; ?>" name="carpic" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Car Model:</label>
                            <input value="<?php echo $car["model"]; ?>" name="carmodel" type="text" class="form-control" id="exampleInputPassword1">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Car Price:</label>
                            <input value="<?php echo $car["price"]; ?>" name="carprice" type="text" class="form-control" id="exampleInputPassword1">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Car Color:</label>
                            <input value="<?php echo $car["color"]; ?>" name="carcolor" type="text" class="form-control" id="exampleInputPassword1">
                          </div>
                          <input hidden value="<?php echo $car["carid"]; ?>" name="carid" type="text" class="form-control" id="exampleInputPassword1">

                          <input type="submit">
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>
      </div>
    </div>


  </div>
  <hr>
  <p>https://h.top4top.io/p_2455ura1a1.jpg</p><br>
  <p>https://i.top4top.io/p_24554nk9l2.jpg</p><br>
  <p>https://j.top4top.io/p_24553dfzo3.jpg</p>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>