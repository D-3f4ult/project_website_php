<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .profile-container {
            max-width: 500px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-image {
            border-radius: 50%;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .navbar {
            background-color: #007bff; /* Change the navbar color as per your requirement */
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">User Profile</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="home.php">home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="myorders.php">MY Orders</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="profile-container">
            <h1 class="text-center mb-4">User Profile</h1>
            <?php
            session_start();


            if (!isset($_SESSION["id"])) {

                header("Location: index.php");
                exit;
            }

            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "project";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $user_id = $_SESSION["id"]; 
            $sql = "SELECT * FROM users WHERE id = $user_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    $username = $row["username"];
                    $first_name = $row["firstname"];
                    $last_name = $row["lastname"];
                    $image = $row["photo_profile"];
            ?>
            <div class="text-center">
                <img class="profile-image" src="<?php echo $image; ?>" alt="User Image" width="150">
            </div>
            <div class="profile-info">
                <p><strong>Username:</strong> <?php echo $username; ?></p>
                <p><strong>First Name:</strong> <?php echo $first_name; ?></p>
                <p><strong>Last Name:</strong> <?php echo $last_name; ?></p>
            </div>
            <?php
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
