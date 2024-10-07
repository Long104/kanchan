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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if the username already exists
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();


        if ($result->num_rows > 0) {
            $error = "Username is already taken.";
        } else {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insert user into the database
            $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("sss", $username, $hashed_password, $email);

            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    }
}
// $connection->close();
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Sign Up - KanchanK</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <header class="header_section innerpage_header">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="index.html">
          <span>KanchanK</span>
        </a>
      </nav>
    </div>
  </header>

  <section class="signup_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Sign Up</h2>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <form action=" " method="post">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required><br><br>
      </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>
