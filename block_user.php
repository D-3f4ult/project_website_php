<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Block User admin</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET['id'])) {

        $userId = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = $userId";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            $userData = $result->fetch_assoc();
        } else {
            echo "User not found!";
        }
    } else {
        echo "User ID not provided!";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $blockStatus = $_POST['block_status']; 
        $blockSql = "UPDATE users SET blocked = '$blockStatus' WHERE id = $userId";

        if ($conn->query($blockSql) === TRUE) {

            header("Location: login.php");
            exit;
        } else {
            echo "Error blocking user: " . $conn->error;
        }
    }
    ?>

    <?php
    
    if ($userData) {
        echo "<h2>Block User: {$userData['username']}</h2>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='block_status' value='1'>";
        echo "<input type='submit' value='Block'>";
        echo "</form>";
    } else {
        echo "User not found!";
    }
    ?>
</body>

</html>
