<?php

$conn = mysqli_connect("localhost", "root", "", "project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM products ORDER BY cost DESC";
$result = mysqli_query($conn, $sql);

$products = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}

mysqli_close($conn);

return $products;
?>
