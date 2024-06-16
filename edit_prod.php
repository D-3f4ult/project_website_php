<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit and Update Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

    <div class="container">
        <h1 class="mb-4">Edit and Update Product</h1>

        <?php
        $host = 'localhost'; 
        $username = 'root'; 
        $password = ''; 
        $database = 'project'; 

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $id = isset($_GET['id']) ? $_GET['id'] : 0; 
        $id = (int)$id; 
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $product_code = $_POST['product_code'];
                $product_name = $_POST['product_name'];
                $cost = ($_POST['cost']); 
                $color = $_POST['color'];
                $description = $_POST['description'];
                $weight = ($_POST['weight']); 
                $image = $_POST['image'];
                $stock_quantity = ($_POST['stock_quantity']); 

                $update_sql = "UPDATE products SET 
                        product_code='$product_code', 
                        product_name='$product_name', 
                        cost=$cost, 
                        color='$color', 
                        description='$description', 
                        weight=$weight, 
                        image='$image', 
                        stock_quantity=$stock_quantity 
                        WHERE id=$id";

                if ($conn->query($update_sql) === TRUE) {
                    echo "<div class='alert alert-success' role='alert'>Product updated successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error updating product: " . $conn->error . "</div>";
                }
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>No product found with ID: $id</div>";
        }
        ?>

        <?php if ($result && $result->num_rows > 0): ?>
            <form method="post">
                <div class="form-group">
                    <label for="product_code">Product Code</label>
                    <input type="text" class="form-control" id="product_code" name="product_code" value="<?php echo $row['product_code']; ?>">
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $row['product_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="text" class="form-control" id="cost" name="cost" value="<?php echo ($row['cost']); ?>">
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" class="form-control" id="color" name="color" value="<?php echo $row['color']; ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="text" class="form-control" id="weight" name="weight" value="<?php echo ($row['weight']); ?>">
                </div>
                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="text" class="form-control" id="image" name="image" value="<?php echo $row['image']; ?>">
                </div>
                <div class="form-group">
                    <label for="stock_quantity">Stock Quantity</label>
                    <input type="text" class="form-control" id="stock_quantity" name="stock_quantity" value="<?php echo ($row['stock_quantity']); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        <?php endif; ?>

        <?php $conn->close(); ?>
    </div>
</body>
</html>
