<?php
session_start(); 

if(isset($_SESSION['id'])) {

    $userId = $_SESSION['id']; // Change 'id' to 'uid'

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $update_last_login_sql = "UPDATE users SET is_online = 0, online_status = 'Offline' WHERE id = '$userId'";

    if ($conn->query($update_last_login_sql) === TRUE) {
        session_unset(); 
        session_destroy(); 
        
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating user status: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
