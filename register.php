<?php
    require_once "config.php";

    $username = $email = $password = $name = "";
    $username_err = $email_err = $password_err = $name_err = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        // check if username is empty
        if (empty(trim($_POST["username"]))) {
            $username_err = "Username cannot be blank.";
        } else {
            $sql = "SELECT id FROM users WHERE username = ?";
            $stmt = mysqli_prepare($connect, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // set the value of param username
                $param_username = trim($_POST["username"]);

                // execute the satement
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $username_err = "This username is already taken.";
                    } else {
                        $username = trim($_POST["username"]);
                    }
                } else {
                    echo "Something went wrong.";
                }
            }
        }
        mysqli_stmt_close($stmt);



        // check for email
        if (empty(trim($_POST["email"]))) {
            $email_err = "Email cannot be blank.";
        } else {
            $email = trim($_POST["email"]);
        }

        // check for password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Password cannot be blank.";
        } elseif (strlen(trim($_POST["password"])) < 4) {
            $password_err = "Password cannot be less than 5 characters";
        } else {
            $password = trim($_POST["password"]);
        }

        // if no errors, insert into database
        if ( (empty($username_err)) && (empty($email_err)) && (empty($name_err)) ) {
            $sql = "INSERT INTO users (username, email, name) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($connect, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_name);

                // set these parameters
                $param_username = $username;
                $param_email = $email;
                $param_name = $name;

                // try to execute the query
                if (mysqli_stmt_execute($stmt)) {
                    header("location: login.php");
                } else {
                    echo "Something went wrong.";
                }
            }
            mysqli_stmt_close($stmt);
        }

        $sql = "INSERT INTO login (username, password) VALUES (?, ?)";
            $stmt = mysqli_prepare($connect, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                // set these parameters
                // $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                // try to execute the query
                if (mysqli_stmt_execute($stmt)) {
                    header("location: login.php");
                } else {
                    echo "Something went wrong.";
                }
            }
            mysqli_stmt_close($stmt);

        mysqli_close($connect);
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
  <body style="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">bookshop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">


    <h3>Please Register Here:</h3>
        <hr>
        <form action="" method="post">
            <div class="row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" name="name" id="inputName4" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Username</label>
                <input type="text" class="form-control" name="username" id="inputUsername4" placeholder="Username">
            </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
                </div>
            </div>
            <br>
            <div class="form-group col-md-12">
                <label for="inputAddress2">Address</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-6">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
                </div>
                <div class="form-group col-md-4">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" placeholder="City">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="ZIP Code">
                </div>
                <div class="form-group col-md-12">
                <br>
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone" placeholder="Phone Number">
                </div>
            </div>
            <br>
                <button type="submit" class="btn btn-primary col-md-2">Sign up</button>
        </form>
    
  </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
