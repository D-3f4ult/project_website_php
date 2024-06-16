<?php
session_start();

if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    if(isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];

        $conn = mysqli_connect("localhost", "root", "", "project");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT id, product_name, image, color, cost, stock_quantity FROM products WHERE id = $product_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $product_id = $row['id'];
            $product_name = $row['product_name'];
            $product_image = $row['image'];
            $product_quantity = $row['stock_quantity'];

            if ($product_quantity > 0) { 
                $quantity = 1; 

                $sql_insert = "INSERT INTO cart (user_id, product_id, product_name, product_image, color, cost, quantity) 
                               VALUES ('$user_id', '$product_id', '$product_name', '$product_image', '{$row['color']}', '{$row['cost']}', $quantity)";

                if (mysqli_query($conn, $sql_insert)) {
                    header("Location: home.php");
                    exit();
                } else {
                    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                }
            } else {
                $_SESSION['cart_message'] = "Product quantity is 0, cannot add to cart.";
                header("Location: home.php");
                exit();
            }
        } else {
            echo "No product found with ID: $product_id";
        }

        mysqli_close($conn);
    } else {
        header("Location: index.php");
        exit(); 
    }
} else {
    echo "Product ID is not provided";
}
?>
