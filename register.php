<?php
require_once "config.php";

$name = $username = $email = $password = $address = $state = $city = $zip = $phone = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $sql = "SELECT id FROM register WHERE username = ?";
    $stmt = mysqli_prepare($connect, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        // set the value for param_username
        $param_username = trim($_POST["username"]);

        // execute the satement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                echo "This username is already taken.";
            } else {
                $username = trim($_POST["username"]);
            }
        } else {
            echo "Something went wrong.";
        }
    }
    mysqli_stmt_close($stmt);

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $address = trim($_POST["address"]);
    $password = trim($_POST["password"]);
    $state = trim($_POST["state"]);
    $city = trim($_POST["city"]);
    $zip = trim($_POST["zip"]);
    $phone = trim($_POST["phone"]);

    // if no errors, insert into database
    if ($username != "") {
        $sql = "INSERT INTO register (name, username, email, address, state, city, zip, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connect, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssssii", $param_name, $param_username, $param_email, $param_address, $param_state, $param_city, $param_zip, $param_phone);

            // set parameters
            $param_name = $name;
            $param_username = $username;
            $param_email = $email;
            $param_address = $address;
            $param_state = $state;
            $param_city = $city;
            $param_zip = $zip;
            $param_phone = $phone;

            // try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else {
                echo "Something went wrong.";
            }
        }
    }

    $sql = "INSERT INTO login (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // set parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // try to execute the query
        if (mysqli_stmt_execute($stmt)) {
            header("location: login.php");
        } else {
            echo "Something went wrongs.";
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

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">bookshop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            My Account
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><?php echo ucfirst($_SESSION['username']) . '!'; ?></a></li>
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
                    <input required type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Username</label>
                    <input required type="text" class="form-control" name="username" placeholder="Username">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input required type="email" class="form-control" name="email" placeholder="Email">
                    <div class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input required type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <br>
            <div class="form-group col-md-12">
                <label for="inputAddress2">Address</label>
                <input required name="address" type="text" class="form-control" placeholder="Apartment, studio, or floor">
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputState">State</label>
                    <select name="state" id="state" class="form-control">
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option selected value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="city">City</label>
                    <input required name="city" type="text" class="form-control" placeholder="City">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input required name="zip" type="text" class="form-control" placeholder="ZIP Code">
                </div>
                <div class="form-group col-md-12"><br>
                    <label for="phone">Phone</label>
                    <input required name="phone" type="tel" class="form-control" placeholder="Phone Number">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary col-md-2">Sign up</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>