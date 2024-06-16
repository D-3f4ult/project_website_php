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

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    $updateSql = "UPDATE users SET username='$username', email='$email', password='$password', role='$role', firstname='$firstname', lastname='$lastname' WHERE id=$userId";

    if ($conn->query($updateSql) === TRUE) {
        echo "User details updated successfully!";
    } else {
        echo "Error updating user details: " . $conn->error;
    }

    if(isset($_POST['block_user'])) {

        $blockSql = "UPDATE users SET blocked = 1 WHERE id = $userId";

        if ($conn->query($blockSql) === TRUE) {
            echo "User blocked successfully!";
        } else {
            echo "Error blocking user: " . $conn->error;
        }
    }

    if(isset($_POST['unblock_user'])) {

        $unblockSql = "UPDATE users SET blocked = 0 WHERE id = $userId";

        if ($conn->query($unblockSql) === TRUE) {
            echo "User unblocked successfully!";
        } else {
            echo "Error unblocking user: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit User</h1>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $userData['username']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $userData['email']; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $userData['password']; ?>">
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $userData['role']; ?>">
            </div>
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $userData['firstname']; ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $userData['lastname']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <?php
            if ($userData['blocked'] == 1) {
                echo '<button type="submit" class="btn btn-success" name="unblock_user">Unblock User</button>';
            } else {
                echo '<button type="submit" class="btn btn-danger" name="block_user">Block User</button>';
            }
            ?>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
