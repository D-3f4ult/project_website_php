<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">User Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.html">admin pandel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_products.php">view product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_product.php">add product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Manage Users</h1>
        <div class="row mt-4">
            <div class="col-md-12">
                <h2>User Details</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Last Login</th>
                            <th>Is Online</th>
                            <th>Online Status</th>
                            <th>Edit</th>
                            <th>Block</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "project";

                        $conn = new mysqli($servername, $username, $password, $database);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM users";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["username"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["password"] . "</td>";
                                echo "<td>" . $row["role"] . "</td>";
                                echo "<td>" . $row["firstname"] . "</td>";
                                echo "<td>" . $row["lastname"] . "</td>";
                                echo "<td>" . $row["last_login"] . "</td>";
                                echo "<td>" . ($row["is_online"] ? "Yes" : "No") . "</td>";
                                echo "<td>" . $row["online_status"] . "</td>";
                                echo "<td><a href='edit_user.php?id=" . $row["id"] . "' class='btn btn-primary'>Edit</a></td>";
                                echo "<td><a href='block_user.php?id=" . $row["id"] . "' class='btn btn-danger'>Block</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12'>No users found</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
