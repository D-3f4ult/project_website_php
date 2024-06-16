<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #f8f9fa;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 4px;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="admin.html">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="view_products.php">View Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_product.php">Add New Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit_prod.php">Edit Product</a>
                </li>
                
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>View Products</h1>

        <?php

        $host = 'localhost';
        $username = 'root'; 
        $password = ''; 
        $database = 'project'; 

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_POST['delete_quantity'])) {
            $product_id = $_POST['product_id'];
            $quantity_to_delete = $_POST['quantity_to_delete'];
            
            $sql_update_quantity = "UPDATE products SET stock_quantity = stock_quantity - $quantity_to_delete WHERE id = $product_id";
            if ($conn->query($sql_update_quantity) === TRUE) {
                echo "Quantity of Product with ID: $product_id reduced by $quantity_to_delete successfully.<br>";
            } else {
                echo "Error updating quantity: " . $conn->error . "<br>";
            }
        }

        if(isset($_POST['delete_product'])) {
            $product_id = $_POST['product_id'];
            
            $sql_delete_product = "DELETE FROM products WHERE id = $product_id";
            if ($conn->query($sql_delete_product) === TRUE) {
                echo "Product with ID: $product_id deleted successfully.<br>";
            } else {
                echo "Error deleting product: " . $conn->error . "<br>";
            }
        }

        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        ?>

        <div class='table-responsive'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Cost</th>
                        <th>Color</th>
                        <th>Description</th>
                        <th>Weight</th>
                        <th>Image</th>
                        <th>Stock Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["product_code"] . "</td>
                                    <td>" . $row["product_name"] . "</td>
                                    <td>$" . $row["cost"] . "</td>
                                    <td>" . $row["color"] . "</td>
                                    <td>" . $row["description"] . "</td>
                                    <td>" . $row["weight"] . "</td>
                                    <td><img src='" . $row["image"] . "' alt='Product Image'></td>
                                    <td>" . $row["stock_quantity"] . "</td>
                                    <td class='action-buttons'>
                                        <form method='post' action=''>
                                            <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                                            <input type='number' name='quantity_to_delete' min='1' max='" . $row["stock_quantity"] . "'>
                                            <button type='submit' name='delete_quantity' class='btn btn-warning'>Delete Quantity</button>
                                        </form>
                                        <form method='get' action='edit_prod.php'>
                                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                                            <button type='submit' name='edit_product' class='btn btn-primary'>Edit Product</button>
                                        </form>
                                        <form method='post' action=''>
                                            <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                                            <button type='submit' name='delete_product' class='btn btn-danger'>Delete Product</button>
                                        </form>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No products found</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
