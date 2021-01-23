<?php
require_once "config.php";
session_start();

if (isset($_POST['upload'])) {
  $file = $_FILES['image']['name'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];

  $query = "INSERT INTO admin (image, name, price, stock) VALUES ('$file', '$name', $price, $stock)";
  $res = mysqli_query($connect, $query);
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>bookshop</title>
</head>

<body style="background-color:pink;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">bookshop</a>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
          <?php
          $name = $_SESSION['username'];
          $sel = "SELECT * FROM register WHERE username = '$name'";
          $que = mysqli_query($connect, $sel);
          $row = mysqli_fetch_array($que);
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              My Account
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"><?php echo $row['name']; ?></a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Welcome <?php echo $row['name'] . '!'; ?></a>
          </li>
      </div>
    </div>
  </nav>
  <div class="container mt-3">
    <h3>Insert Books:</h3>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
          <input type="file" name="image" class="form-control col-md-3" value="">
          <br>
          <div class="row">
            <div class="form-group col-md-8">
              <input type="text" maxlength="30" class="form-control" name="name" placeholder="Name of BOOK">
            </div>
            <div class="form-group col-md-2">
              <input type="number" min="100" class="form-control" name="price" placeholder="Price in ₹">
            </div>
            <div class="form-group col-md-2">
              <input type="number" min="0" class="form-control" name="stock" placeholder="Stock">
            </div>
          </div>
          <div class="form-group col-md-12">
            <input type="submit" name="upload" value="upload" class="btn btn-primary my-4 col-md-12">
          </div>

        </form>
      </div>


      <?php
      $sel = "SELECT * FROM admin";
      $que = mysqli_query($connect, $sel);

      if (mysqli_num_rows($que) > 0) {
        while ($row = mysqli_fetch_array($que)) {
      ?>
          <div class="col-md-3" style="padding: 10px;">
            <div class="card" style="padding: 2px;">
              <img class="card-img-top" src="<?php echo 'books/' . $row['image'] ?>" style="width: 100%; height: 19rem;">
              <div class="card-body">
                <div class="text-center"><strong><?php echo $row['name']; ?></strong></div>
                <div class="text-center text-success"><strong>₹<?php echo $row['price']; ?></strong></div>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>