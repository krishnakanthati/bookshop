<?php
require_once "config.php";
session_start();

$query = "INSERT INTO orders (username, total) VALUES (?, ?)";
$stmt = mysqli_prepare($connect, $query);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "si", $_SESSION['username'], $_SESSION['total']);
    // try to execute the query
    mysqli_stmt_execute($stmt);

    $name = $_SESSION['username'];
    $sel = "SELECT * FROM register WHERE username = '$name'";
    $que = mysqli_query($connect, $sel);
    $row = mysqli_fetch_array($que);
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
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
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
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <strong><br>
            <h1>Thank you <?php echo $row['name'] . ','; ?> for shopping with us.</h1>
            <br>
            <hr>
            <br>
            <h2>Your order will be delivered to your specified address, <em style="color: green"><?php echo $row['address'] . ','; ?></em> in two business days.</h2>
            <br>
            <h2>Further details will be provided to you on your email <em style="color: green"><?php echo $row['email'] ?></em> &</h2>
            <h2>Phone <em style="color: green"><?php echo $row['phone'] . '.' ?></em></h2>
            <br>
            <form action="home.php" class="inline">
                <button class="btn btn-primary col-md-2">Continue Shopping</button>
            </form>

            <hr>
            <strong>
                <p style="color: blue">Reach out to us at https://www.bookstore.com</p>
            </strong>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>