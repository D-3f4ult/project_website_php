<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      padding: 20px;
    }

    .wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    .outer {
      position: relative;
      background: #fff;
      height: 350px;
      width: 550px;
      overflow: hidden;
      display: flex;
      align-items: center;
    }

    .content {
      position: absolute;
      left: 20px;
      z-index: 3;
    }

    h1 {
      color: #111;
      font-size: 24px;
      margin-bottom: 10px;
    }

    p {
      width: 280px;
      font-size: 14px;
      line-height: 1.4;
      color: #333;
      margin-bottom: 20px;
    }

    .button {
      margin-top: 10px;
    }

    .button a {
      display: inline-block;
      overflow: hidden;
      position: relative;
      font-size: 14px;
      color: #111;
      text-decoration: none;
      padding: 10px 15px;
      border: 1px solid #aaa;
      font-weight: bold;
    }

    .button a:hover {
      background-color: #333;
      color: #fff;
    }

    img {
      position: absolute;
      top: 0;
      right: 0;
      width: 300px;
      height: 100%;
    }

    .footer {
      position: absolute;
      bottom: 0;
      right: 0;
      font-size: 12px;
      color: #999;
    }
  </style>
</head>

<body>

  <?php
  
  $servername = "localhost"; 
  $username = "root"; 
  $dbname = "project"; 
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT product_name, cost, description, image FROM products"; 
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $productName = $row["product_name"];
      $cost = $row["cost"];
      $description = $row["description"];
      $imageURL = $row["image"];
  ?>
      <div class="wrapper">
        <div class="outer">
          <div class="content">
            <h1><?php echo $productName; ?></h1>
            <p><?php echo $description; ?></p>
            <div class="button">
              <a href="#"><?php echo $cost; ?></a><a class="cart-btn" href="#"><i class="cart-icon ion-bag"></i>ADD TO CART</a>
            </div>
          </div>
          <img src="<?php echo $imageURL; ?>" alt="Product Image">
        </div>
        <p class="footer">Based on the Silk UI Kit - DesignModo Market</p>
      </div>
  <?php
    }
  } else {
    echo "No products found";
  }
  $conn->close();
  ?>

</body>

</html>
