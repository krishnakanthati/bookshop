<?php
session_start();
// check if user is already logged in
if (isset($_SESSION['username'])) {
  header("location: home.php");
  exit;
}

require_once "config.php";

$username = $password = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $username = trim($_POST["username"]);
  $password = trim($_POST["password"]);
  $sql = "SELECT id, username, password FROM login WHERE username = ?";
  $stmt = mysqli_prepare($connect, $sql);
  mysqli_stmt_bind_param($stmt, "s", $param_username);
  $param_username = $username;

  // try to execute the statement
  if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
      mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

      if (mysqli_stmt_fetch($stmt)) {
        if (password_verify($password, $hashed_password)) {
          // combination of password and username is correct. Allow user to login.
          session_start();
          $_SESSION["username"] = $username;
          $_SESSION["id"] = $id;
          $_SESSION["loggedin"] = true;

          if ($username == 'admin') {
            // redirect user to admin page
            header("location: admin.php");
          } else {
            // redirect user to home page
            header("location: home.php");
          }
        }
      }
    }
  }
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

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">bookshop</a>
      <button class="navbar-toggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">

    <h3>Please Login Here:</h3>
    <hr>
    <form action="" method="post">
      <div class="mb-3 col-md-12">
        <label class="form-label">Username</label>
        <input required type="username" name="username" class="form-control" placeholder="Username">
      </div>
      <div class="mb-3 col-md-12">
        <label class="form-label">Password</label>
        <input required type="password" name="password" class="form-control" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary col-md-2">Submit</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>