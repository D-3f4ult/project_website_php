<?php
session_start(); 

$servername = "localhost";
$username_db = "root"; 
$password_db = "";
$dbname = "project";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_input = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username_input'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $db_password = $row["password"]; 
        $is_blocked = $row["blocked"]; 
        $user_id = $row["id"]; 

        if (!$is_blocked) { 
            if ($password === $db_password) {
                $_SESSION["username"] = $row["username"];
                $_SESSION["id"] = $user_id; 
                
                $update_last_login_sql = "UPDATE users SET last_login = CURRENT_TIMESTAMP, is_online = TRUE, online_status = 'Online' WHERE username = '$username_input'";
                $conn->query($update_last_login_sql);
                
                if ($row["role"] === "admin") {
                    header("Location: admin.html");
                    exit;
                } else {
                    header("Location: home.php");
                    exit;
                }
            } else {
                header("Location: index.php?error=login_failed");
                exit;
            }
        } else {
            header("Location: index.php?error=user_blocked");
            exit;
        }
    } else {
        header("Location: index.php?error=username_not_found");
        exit;
    }
}

$conn->close();
?>
