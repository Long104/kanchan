<?php
session_start();

 if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


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
//
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy'])) {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['buy'])) {
    $userId = $_SESSION['user_id']; // Assuming you store user ID in session
    $productId = $_POST['product_id'];

    $stmt = $connection->prepare("INSERT INTO purchases (user_id, product_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $userId, $productId);

    if ($stmt->execute()) {
        $purchases = isset($_COOKIE['purchases']) ? json_decode($_COOKIE['purchases'], true) : [];
if (isset($purchases[$productId])) {
        $purchases[$productId]++;
    } else {
        $purchases[$productId] = 1;
    }
        $purchases[] = $productId; 
        setcookie('purchases', json_encode($purchases), time() + (30 * 24 * 60 * 60), "/"); // path set to / for the whole site
      header("Location: " . $_SERVER['PHP_SELF']);
        echo "New record inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $productId = $_POST['product_id'];

    $stmt = $connection->prepare("DELETE FROM user_cart WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
  $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    // Check if the product is in the cart
    if (isset($cart[$productId])) {
        // Reduce the quantity by 1
        $cart[$productId]--;

        // If the quantity reaches 0, remove the product from the cart
        if ($cart[$productId] <= 0) {
            unset($cart[$productId]);
        }
    }
    // Save the updated cart back to the cookie
    setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), "/");

      header("Location: " . $_SERVER['PHP_SELF']);
        echo "Record deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

if (isset($_POST['clear_purchase'])) {
    $productId = $_POST['product_id'];

    $stmt = $connection->prepare("DELETE FROM purchases WHERE id = ?");
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {

 $purchases = isset($_COOKIE['purchases']) ? json_decode($_COOKIE['purchases'], true) : [];

    // Check if the product is in the purchase history
    if (isset($purchases[$productId])) {
        // Reduce the quantity by 1
        $purchases[$productId]--;

        // If the quantity reaches 0, remove the product from the purchases
        if ($purchases[$productId] <= 0) {
            unset($purchases[$productId]);
        }
    }

    // Save the updated purchases back to the cookie
    setcookie('purchases', json_encode($purchases), time() + (30 * 24 * 60 * 60), "/");


      header("Location: " . $_SERVER['PHP_SELF']);
        echo "Record deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

if (isset($_POST['clear_all'])) {
    $stmt = $connection->prepare("DELETE FROM purchases");

    if ($stmt->execute()) {
 setcookie('purchases', '', time() - 3600, "/");
      header("Location: " . $_SERVER['PHP_SELF']);
        echo "Record deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();


}
// }
}

// Fetch products
$sql = "SELECT * FROM user_cart";

$result = $connection->query($sql);
// $sql_purchase = "SELECT * FROM purchases";
// $purchases = $connection->query($sql_purchase);
$sql_purchase = "
SELECT 
    purchases.id AS purchase_id,
    purchases.user_id,
    products.id AS product_id,
    products.name AS product_name,
    products.price AS product_price,
    products.image AS product_image
FROM 
    purchases
INNER JOIN 
    products ON purchases.product_id = products.id
WHERE 
    purchases.user_id = ?
";



$stmt = $connection->prepare($sql_purchase);
if ($stmt === false) {
    die("MySQL prepare statement failed: " . $connection->error);
}
$stmt->bind_param("i", $_SESSION['user_id']); // Bind the user's ID
$stmt->execute();
$purchases = $stmt->get_result();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <script defer src="/_vercel/insights/script.js"></script>
</head>

<body>

  <header class="header_section innerpage_header">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="index.php">
          <span>KanchanK</span>
        </a>
<?php include './component/menu.php'; ?>
      </nav>
    </div>
  </header>

    <div class="container mt-5">
        <h2><?php echo $_SESSION['username'] ?></h2>
        <h3>product in your cart</h3>
        <div class="row">
            <?php while ($user_cart = $result->fetch_assoc()) : ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $user_cart['image']; ?>" class="card-img-top" alt="<?php echo $user_cart['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $user_cart['name']; ?></h5>
                            <p class="card-text">$<?php echo $user_cart['price']; ?></p>
                            <form method="post" action="">
                                <input type="hidden" name="id" value="<?php echo $user_cart['id']; ?>">
                                <input type="hidden" name="product_id" value="<?php echo $user_cart['product_id']; ?>">
                                <button type="submit" name="buy" class="btn btn-primary">Buy</button>
                                <button type="submit" name="delete" class="btn btn-primary">delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

    <div class="container mt-5">
<div class="flex justify-between pb-4">
        <h3 >purchases history</h3>

          <form method="post" action="">
        <input type="hidden" name="product_id" value="<?php echo $purchase['purchase_id']; ?>" />
         <!-- <input type="hidden" name="product_id" value="hello" /> -->
        <button type="submit" name="clear_all" class="btn btn-primary ">clear all</button>
                            </form>
</div>
        <div class="flex flex-wrap flex-row justify-center">
            <?php while ($purchase = $purchases->fetch_assoc()) : ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $purchase['product_image']; ?>" class="card-img-top" alt="<?php echo $purchase['product_name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $purchase['product_name']; ?></h5>
                            <p class="card-text">$<?php echo $purchase['product_price']; ?></p>
                            <form method="post" action="">
                            <input type="hidden" name="product_id" value="<?php echo $purchase['purchase_id']; ?>" />
                            <!-- <input type="hidden" name="product_id" value="hello" /> -->
                                <button type="submit" name="clear_purchase" class="btn btn-primary">clear</button>
                            </form>
                        </div>
                        </div>
                    </div>
            <?php endwhile; ?>
                </div>
        </div>
    </div>
</body>
 <script src="https://cdn.tailwindcss.com"></script>
  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>

</html>
