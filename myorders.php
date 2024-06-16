<?php
// Start session
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php"); 
    exit(); 
}

$conn = mysqli_connect("localhost", "root", "", "project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['id'];

$query = "SELECT * FROM orders WHERE user_id = $user_id";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordered Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles */
        .card {
            min-height: 400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

                    $productid = $row['product_id'];
                    $user_id = $row['user_id'];
                    $quantity = $row['quantity'];

                    echo "<div class='col-md-4'>";
                    echo "<div class='card mb-4 box-shadow'>";
                    echo "<div class='card-body'>";
                    echo "<h2 class='card-title'>$productid</h2>";
                    echo "<p class='card-text'>Price: $user_id</p>";
                    echo "<p class='card-text'>Quantity: $quantity</p>";
                    echo "</div></div></div>";
                }
            } else {
                echo "No ordered products found for this user.";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
