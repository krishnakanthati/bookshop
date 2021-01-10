<?php
require_once "config.php";
session_start();

$query = "INSERT INTO orders (username, total) VALUES (?, ?)";
$stmt = mysqli_prepare($connect, $query);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "si", $_SESSION['username'], $_SESSION['total']);

    // try to execute the query
    if (mysqli_stmt_execute($stmt)) {
        echo "Thanks for shopping with us.";
    } else {
        echo "Something went wrong.";
    }
}
