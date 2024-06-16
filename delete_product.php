<?php

$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'project'; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_code = $_POST['product_code'];
$stock_quantity = $_POST['stock_quantity'];

$sql = "DELETE FROM products WHERE id = $product_id";

if ($conn->query($sql) === TRUE) {
    echo "Product deleted successfully";

    $sql_update_quantity = "UPDATE other_table SET quantity = quantity - $stock_quantity WHERE product_code = $product_code";
    $conn->query($sql_update_quantity);
} else {
    echo "Error deleting product: " . $conn->error;
}

$conn->close();
?>
