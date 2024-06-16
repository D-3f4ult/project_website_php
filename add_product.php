<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product admin</title>
    <style>
        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="admin.html" class="active">Admin Panel</a>
        <a href="view_products.php">View Products</a>
        <a href="add_product.php">Add New Product</a>
        <a href="index.php">log out</a>
    </div>

    <div class="container">
        <h2>Add Product</h2>

        <?php
        $msg = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["product-name"]) && !empty($_POST["product-price"]) && !empty($_POST["product-quantity"]) && isset($_FILES["product-image"])) {
                $productName = $_POST["product-name"];
                $productPrice = $_POST["product-price"];
                $productQuantity = $_POST["product-quantity"];
                $productColor = $_POST["product-color"];
                $productWeight = $_POST["product-weight"];
                $productDescription = $_POST["product-description"];

                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($_FILES["product-image"]["name"]);

                if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $targetFile)) {
                    $msg = "Image uploaded successfully";
                } else {
                    $msg = "There was a problem uploading image";
                }

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "INSERT INTO products (product_name, cost, stock_quantity, color, weight, description, image) 
                        VALUES ('" . $productName . "', '" . $productPrice . "', '" . $productQuantity . "', '" . $productColor . "', '" . $productWeight . "', '" . $productDescription . "', '" . $targetFile . "')";

                if ($conn->query($sql) === TRUE) {
                    echo "New product added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            } else {
                echo "All fields are required.";
            }
        }
        ?>


        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <label for="product-name">Product Name:</label><br>
            <input type="text" id="product-name" name="product-name" required><br>
            <label for="product-price">Product Price:</label><br>
            <input type="number" id="product-price" name="product-price" required><br>
            <label for="product-quantity">Product Quantity:</label><br>
            <input type="number" id="product-quantity" name="product-quantity" required><br>
            <label for="product-color">Product Color:</label><br>
            <input type="text" id="product-color" name="product-color"><br>
            <label for="product-weight">Product Weight:</label><br>
            <input type="text" id="product-weight" name="product-weight"><br>
            <label for="product-description">Product Description:</label><br>
            <textarea id="product-description" name="product-description"></textarea><br>
            <label for="product-image">Product Image:</label><br>
            <input type="file" id="product-image" name="product-image" required><br><br>
            <button type="submit">Add Product</button>
        </form>
    </div>

</body>

</html>
