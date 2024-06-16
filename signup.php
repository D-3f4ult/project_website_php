<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function isValidEmail($email) {
    return strpos($email, '@') !== false && strpos($email, '.') !== false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!isValidEmail($email)) {
        $_SESSION["signup_error_message"] = "Invalid email format.";
        header("Location: index.php?signup_error=invalid_email_format");
        exit;
    }

    $check_username_query = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = $conn->query($check_username_query);

    if ($check_username_result->num_rows > 0) {
        $_SESSION["signup_error_message"] = "Username already exists.";
        header("Location: index.php?signup_error=username_exists");
        exit; 
    }

    $check_email_query = "SELECT * FROM users WHERE email='$email'";
    $check_email_result = $conn->query($check_email_query);

    if ($check_email_result->num_rows > 0) {
        $_SESSION["signup_error_message"] = "Email already exists.";
        header("Location: index.php?signup_error=email_exists");
        exit; 
    }

    $insert_user_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($insert_user_query) === TRUE) {
        
        $user_id = $conn->insert_id;

        $_SESSION["username"] = $username;
        $_SESSION["id"] = $user_id;

        header("Location: profile_signup.html");
        exit;
    } else {
        $_SESSION["signup_error_message"] = "An error occurred during signup. Please try again later.";
        header("Location: index.php?signup_error=unknown_error");
        exit;
    }
}

$conn->close();
?>
