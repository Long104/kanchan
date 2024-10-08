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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy'])) {
// if (isset($_POST['buy'])) {
    $userId = $_SESSION['user_id']; // Assuming you store user ID in session
    $productId = $_POST['product_id'];

    $stmt = $connection->prepare("INSERT INTO purchases (user_id, product_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $userId, $productId);

    if ($stmt->execute()) {
      header("Location: " . $_SERVER['PHP_SELF']);
        echo "New record inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
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
    products.image AS product_image,
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
                                <input type="hidden" name="product_id" value="<?php echo $user_cart['id']; ?>">
                                <button type="submit" name="buy" class="btn btn-primary">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

    <div class="container mt-5">
        <h3 >purchases history</h3>
        <div class="flex flex-wrap flex-row justify-center">
            <?php while ($purchase = $purchases->fetch_assoc()) : ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <!-- <img src="<?php echo $purchase['image']; ?>" class="card-img-top" alt="<?php echo $purchase['name']; ?>"> -->
                        <!-- <div class="card-body"> -->
                            <!-- <h5 class="card-title"><?php echo $purchase['name']; ?></h5> -->
                            <h5 class="card-title"><?php echo $purchase['id']; ?></h5>
                            <!-- <p class="card-text">$<?php echo $purchase['price']; ?></p> -->
                            <!-- <form method="post" action=""> -->
                                <!-- <input type="hidden" name="product_id" value="<?php echo $purchase['id']; ?>"> -->
                            <!-- </form> -->
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
