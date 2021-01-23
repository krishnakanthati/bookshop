<?php
require_once "config.php";
session_start();

$query = "INSERT INTO orders (username, total) VALUES (?, ?)";
$stmt = mysqli_prepare($connect, $query);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "si", $_SESSION['username'], $_SESSION['total']);

    // try to execute the query
    mysqli_stmt_execute($stmt);
}

$name = $_SESSION["username"];
$sql = "SELECT 'id' FROM registers WHERE username='$name' limit 1";
$result = mysqli_query($connect, $sql);
// echo $result;
if ($result !== false) {
    $value = mysqli_fetch_field($result);
    echo 'gf';
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
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            My Account
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><?php echo ucfirst($_SESSION['username']) . '!'; ?></a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Welcome <?php echo ucfirst($_SESSION['username']) . '!'; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <strong>
            <h1>Thank you <?php echo ucfirst($_SESSION['username']) . ','; ?> for shopping with us.</h1>
        </strong><br>
        <strong>
            <h2 style="color: green;">&emsp; Please Visit Again.</h2>
        </strong>
        <hr>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>