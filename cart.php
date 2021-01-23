<?php
session_start();
require_once "config.php";

if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="cart.php"</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="cart.php"</script>';
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h3>My Cart:</h3>
        <hr>
        <form action="" method="cart.php?action=add&id=<?php echo $row["id"]; ?>">
            <div class="container" style="width:100%;">
                <div style="clear:both"></div>
                <h3>Order Details</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="40%">Item Name</th>
                            <th width="10%">Quantity</th>
                            <th width="20%">Price</th>
                            <th width="15%">Total</th>
                            <th width="5%">Action</th>
                        </tr>
                        <?php
                        if (!empty($_SESSION["shopping_cart"])) {
                            $total = 0;
                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                        ?>
                                <tr>
                                    <td><?php echo $values["item_name"]; ?></td>
                                    <td><?php echo $values["item_quantity"]; ?></td>
                                    <td>₹ <?php echo $values["item_price"]; ?></td>
                                    <td>₹ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                                    <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                                </tr>
                            <?php
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            }
                            ?>
                            <tr>
                                <td colspan="3" align="right">Total</td>
                                <td align="right">₹ <?php echo number_format($total, 2); ?></td>
                                <td></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>

                <?php

                if ($total) {
                    $sql = "INSERT INTO cart (id, username, item_name, price, quantity) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($connect, $sql);
                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "issii", $param_id, $param_username, $param_item_name, $param_price, $param_quantity);
                        // set parameters
                        $param_username = $_SESSION['username'];
                        $param_item_name = $values["item_name"];
                        $param_price = $values["item_price"];
                        $param_id = $values["item_id"];
                        $param_quantity = $values["item_quantity"];
                        $_SESSION["total"] = $total;
                        // try to execute the query
                        if (mysqli_stmt_execute($stmt)) {
                            echo "Book added to cart.";
                        } else {
                            echo "Book already in cart.";
                        }
                    }
                } else {
                    header("location: home.php");
                }
                ?>
            </div>
        </form>
        <form action="orders.php" method="post">
            <input type="submit" value="Place Order" class="btn btn-primary col-md-2">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>