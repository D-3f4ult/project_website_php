<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT product_id, added_date FROM orders ORDER BY product_id DESC LIMIT 1 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $order_id = $row["product_id"];
    $order_date = $row["added_date"];
} else {

    $order_id = "No orders found";
    $order_date = "N/A";
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
            padding-top: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank you for your order!</h1>
        <p>Your order has been successfully placed.</p>
        <p>We've sent you an email confirmation with your order details.</p>
        <p>Order ID: <?php echo $order_id; ?></p>
        <p>Date: <?php echo $order_date; ?></p>
        <a href="home.php" class="btn">Back to Home</a>
    </div>

    <script>
        (function(d, s, id) {
            var js, botstarbjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://widget.botstar.com/embedded/your-botstarb-id.js?order_id=<?php echo $order_id; ?>&order_date=<?php echo $order_date; ?>"; // Replace "your-botstarb-id" with your actual BotStarb ID
            botstarbjs.parentNode.insertBefore(js, botstarbjs);
        }(document, 'script', 'botstarb-js'));
    </script>
</body>
</html>
