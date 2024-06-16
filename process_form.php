<?php
// Start session
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $country = $_POST['country'];

    $identifier = $_SESSION['username'];

    if (!empty($_FILES['photo']['name'])) {
        $photo_name = $_FILES['photo']['name'];
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        $photo_path = 'uploads/' . $photo_name; 
        if (move_uploaded_file($photo_tmp_name, $photo_path)) {

            $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', country='$country', photo_profile='$photo_path' WHERE username='$identifier'"; 
            if ($conn->query($sql) === TRUE) {
                echo "User information updated successfully";
               
                header("Location: home.php");
                exit(); 
            } else {
                echo "Error updating user information: " . $conn->error;
            }
        } else {
            echo "Error uploading photo.";
        }
    } else {

        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', country='$country' WHERE username='$identifier'";
        if ($conn->query($sql) === TRUE) {
            echo "User information updated successfully";
            
            header("Location: home.php");
            exit(); 
        } else {
            echo "Error updating user information: " . $conn->error;
        }
    }
}

$conn->close();
?>
