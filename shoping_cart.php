<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$error_messages = array(); 

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $query = "SELECT * FROM cart WHERE user_id='$user_id'";
    $result = mysqli_query($connection, $query);
} else {
    header("Location: index.php");
    exit;
}

$checkout_disabled = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_quantity'])) {
    foreach ($_POST['quantity'] as $product_id => $quantity) {
        if ($quantity >= 0) {
            // Check if the requested quantity exceeds available stock
            $check_query = "SELECT stock_quantity FROM products WHERE id='$product_id'";
            $check_result = mysqli_query($connection, $check_query);
            $row = mysqli_fetch_assoc($check_result);
            $available_quantity = $row['stock_quantity'];

            if ($quantity <= $available_quantity) {
                
                $update_query = "UPDATE cart SET quantity='$quantity' WHERE product_id='$product_id' AND user_id='$user_id'";
                mysqli_query($connection, $update_query);
            } else {
               
                $error_messages[] = "Insufficient stock for product with ID: $product_id. Available quantity: $available_quantity";
                $checkout_disabled = true; 
            }
        } else {

            $error_messages[] = "Invalid quantity for product with ID: $product_id. Quantity cannot be negative.";
            $checkout_disabled = true; 
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
    $product_id = $_POST['product_id'];
    
    $delete_query = "DELETE FROM cart WHERE product_id='$product_id' AND user_id='$user_id'";
    mysqli_query($connection, $delete_query);
    
    header("Location: ".$_SERVER['REQUEST_URI']);
    exit;
}

if (isset($_POST['checkout'])) {

    $query = "SELECT * FROM cart WHERE user_id='$user_id'";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $added_date = date('Y-m-d H:i:s');

        $insert_query = "INSERT INTO orders (user_id, product_id, quantity, added_date) VALUES ('$user_id', '$product_id', '$quantity', '$added_date')";
        mysqli_query($connection, $insert_query);

        $update_stock_query = "UPDATE products SET stock_quantity = stock_quantity - $quantity WHERE id = '$product_id'";
        mysqli_query($connection, $update_stock_query);
    }

    $clear_cart_query = "DELETE FROM cart WHERE user_id='$user_id'";
    mysqli_query($connection, $clear_cart_query);

    header("Location: confirmation.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/demo.css">
</head>
<body>
<header class="intro">
    <h1>Shopping Cart</h1>
    
    <div class="action">
        <a href="home.php" title="back to store and see the new products" class="btn back">Back to store</a>
    </div>
</header>

<main>
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Your Shopping Cart
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action=""> 
                        <table class="table table-image">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                            <tr>
                                                <td class="w-25">
                                                    <img src="<?php echo $row['product_image']; ?>" class="img-fluid img-thumbnail" alt="Product">
                                                </td>
                                                <td><?php echo $row['product_name']; ?></td>
                                                <td><?php echo $row['cost']; ?>$</td>
                                                <td class="qty">
                                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                                    <input type="number" class="form-control" name="quantity[<?php echo $row['product_id']; ?>]" value="<?php echo $row['quantity']; ?>">
                                                    <button type="submit" class="btn btn-primary btn-sm" name="update_quantity">Update</button>
                                                </td>
                                                <td><?php echo $row['cost'] * $row['quantity']; ?>$</td>
                                                <td>
                                                    <button type="submit" class="btn btn-danger btn-sm" name="delete_product">
                                                        <i class="fa fa-times"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No products found in the cart.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php

                            if (!empty($error_messages)) {
                                echo '<div class="container mt-3">';
                                echo '<div class="alert alert-danger" role="alert">';
                                echo '<ul>';
                                foreach ($error_messages as $error) {
                                    echo "<li>$error</li>";
                                }
                                echo '</ul>';
                                echo '</div>';
                                echo '</div>';
                            }
                        ?>
                    </form>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form method="post" action=""> 
                        <button type="submit" class="btn btn-success" name="checkout" <?php if($checkout_disabled) echo 'disabled'; ?>>Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script  src="./js/script.js"></script>
</body>
</html>
