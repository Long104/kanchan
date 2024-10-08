<?php
session_start();

// Database connection
$server = "db";  
$user = "myuser";
$password = "mypassword";
$database = "mydatabase";

$connection = new mysqli($server, $user, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch all purchases
$sql = "SELECT p.id, p.purchase_date, pr.name AS product_name, u.username
        FROM purchases p
        JOIN products pr ON p.product_id = pr.id
        JOIN users u ON p.user_id = u.id";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Admin Dashboard</h2>
        <h3>Purchases</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Purchase Date</th>
                </tr>
            </thead>
            <tbody>
                <!-- <?php while ($purchase = $result->fetch_assoc()) : ?> -->
                    <tr>
                        <td><?php echo $purchase['id']; ?></td>
                        <td><?php echo $purchase['username']; ?></td>
                        <td><?php echo $purchase['product_name']; ?></td>
                        <td><?php echo $purchase['purchase_date']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

