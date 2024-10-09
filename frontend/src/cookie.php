<?php

session_start();

// Database connection
$server = "db";  
$user = "myuser";
$password = "mypassword";
$database = "mydatabase";




$connection = new mysqli($server, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetching cart items from cookie
$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

// Fetching purchase items from cookie
$purchases = isset($_COOKIE['purchases']) ? json_decode($_COOKIE['purchases'], true) : [];

// Displaying cart items
if (!empty($cart)) {
    echo "<h3>Your Cart Items:</h3>";
    foreach ($cart as $productId) {
        // Fetch product details from database using productId
        $productQuery = $connection->prepare("SELECT * FROM products WHERE id = ?");
        $productQuery->bind_param("i", $productId);
        $productQuery->execute();
        $result = $productQuery->get_result();
        while ($product = $result->fetch_assoc()) {
            echo "<p>Product Name: " . $product['name'] . " - Price: $" . $product['price'] . "</p>";
        }
        $productQuery->close();
    }
}

// Displaying purchased items
if (!empty($purchases)) {
    echo "<h3>Your Purchases:</h3>";
    foreach ($purchases as $productId) {
        // Fetch purchase details from database using productId
        $purchaseQuery = $connection->prepare("SELECT * FROM products WHERE id = ?");
        $purchaseQuery->bind_param("i", $productId);
        $purchaseQuery->execute();
        $result = $purchaseQuery->get_result();
        while ($purchase = $result->fetch_assoc()) {
            echo "<p>Purchased Product Name: " . $purchase['name'] . " - Price: $" . $purchase['price'] . "</p>";
        }
        $purchaseQuery->close();
    }
}

?>


<!-- <!DOCTYPE html> -->
<!-- <html lang="en"> -->
<!--   <head> -->
<!--     <meta charset="UTF-8"> -->
<!--     <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<!--     <title></title> -->
<!--     <link href="css/style.css" rel="stylesheet"> -->
<!--   </head> -->
<!--   <body> -->
<!---->
<!--   </body> -->
<!-- </html> -->
