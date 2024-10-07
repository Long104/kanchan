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

// Handle purchase
if (isset($_POST['buy'])) {
    $userId = $_SESSION['user_id']; // Assuming you store user ID in session
    $productId = $_POST['product_id'];

    $stmt = $connection->prepare("INSERT INTO purchases (user_id, product_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $stmt->close();
}

// Fetch products
$sql = "SELECT * FROM products";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Your Profile</h2>
        <h3>Available Products</h3>
        <div class="row">
            <?php while ($product = $result->fetch_assoc()) : ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text">$<?php echo $product['price']; ?></p>
                            <form method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <button type="submit" name="buy" class="btn btn-primary">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>
