<?php
session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32)); // Generate a random token
}

    $server = "db";  
    $user = "myuser";       
    $password = "mypassword";  
    $database = "mydatabase";    

    $connection = new mysqli($server, $user, $password, $database);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT * FROM products ";
    $products = $connection->query($sql);
    // $fetchProducts = $connection->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
     if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die("Invalid CSRF token");
    }
    $productId = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];


    $sql = "INSERT INTO user_cart (product_id,name,price,image ) VALUES (?, ?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("isds", $productId, $name, $price, $image);  

    if ($stmt->execute()) {
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

 if (isset($cart[$productId])) {
        // If the product already exists, increase the quantity
        $cart[$productId]++;
    } else {
        // Otherwise, add it to the cart with quantity 1
        $cart[$productId] = 1;
    }

    $cart[] = $productId; 
    setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), "/"); // path set to / for the whole site
      header("Location: " . $_SERVER['PHP_SELF']);
        echo "New record inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    
}

    $connection->close();
?>





<!doctype html>
<html>
  <head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Site Metas -->
    <link rel="icon" href="products/logo.svg" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>KanchanK</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
  </head>

  <body>
    <!-- header section strats -->
    <header class="header_section innerpage_header">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <span> KanchanK </span>
          </a>
        <?php include "./component/menu.php" ?>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- shop section -->

    <section class="shop_section layout_padding">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>All Products</h2>
        </div>
        <div class="row">

            <?php while ($product = $products->fetch_assoc()) : ?>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
            <form method="post" action=" ">
              <a href="">
                <div class="img-box">
                  <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
                </div>
                <div class="detail-box">
                  <h6>
                    <?php echo $product['name']; ?>
                  </h6>
                  <h6>
                    Price
                    <span>
                      <br />
                            <?php echo $product['price']; ?>
                    </span>
                  </h6>
                </div>
              </a>
<!-- test -->
                          <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                            <input type="hidden" name="image" value="<?php echo $product['image']; ?>">
                          <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
<!-- test -->
              <!-- <button type="submit" name="<?php  echo $product['name'] ?>" style="width:100%;margin-left:auto; margin-right:auto;"> buy</button> -->
              <button type="submit" name="add_to_cart" style="width:100%;margin-left:auto; margin-right:auto;"> add to cart</button>
</form>
            </div>
          </div>
            <?php endwhile; ?>

        </div>
      </div>
    </section>

    <!-- end shop section -->

    <!-- info section -->
    <section class="info_section layout_padding2">
      <div class="container">
        <div class="row info_form_social_row">
          <!-- review section -->
          <div class="col-md-8 col-lg-9">
            <div class="info_form">
              <style>
                C .rating {
                  flex-direction: 1;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  width: 208px;
                  height: 40px;
                  margin: 0 auto;
                  padding: 40px 50px;
                  border: 1px solid #cccccc;
                  background: #f9f9f9;
                }

                .rating label {
                  float: right;
                  position: relative;
                  width: 90px;
                  height: 40px;
                  cursor: pointer;
                }

                .rating label:not(:first-of-type) {
                  padding-right: 2px;
                }

                .rating label:before {
                  content: "★";
                  font-size: 42px;
                  color: #cccccc;
                  line-height: 1;
                }

                .rating input {
                  display: none;
                }

                .rating input:checked ~ label:before,
                .rating:not(:checked) > label:hover:before,
                .rating:not(:checked) > label:hover ~ label:before {
                  color: #f9df4a;
                }

                .label {
                  font-size: 30px;
                  height: 50px;
                }

                form {
                  justify-content: space-between;
                }
              </style>

              <form id="myForm" action="">
                <div class="label">
                  <label for="">Rate Us!</label>
                </div>
                <div class="rating">
                  <input
                    type="radio"
                    id="star5"
                    name="rating"
                    value="5"
                  /><label for="star5"></label>
                  <input
                    type="radio"
                    id="star4"
                    name="rating"
                    value="4"
                  /><label for="star4"></label>
                  <input
                    type="radio"
                    id="star3"
                    name="rating"
                    value="3"
                  /><label for="star3"></label>
                  <input
                    type="radio"
                    id="star2"
                    name="rating"
                    value="2"
                  /><label for="star2"></label>
                  <input
                    type="radio"
                    id="star1"
                    name="rating"
                    value="1"
                  /><label for="star1"></label>
                </div>

                <button id="btnScrollToTop">
                  <i class="fa fa-arrow-up"></i>
                </button>
              </form>
            </div>
          </div>
          <script>
            var radioButtons = document.querySelectorAll(
              'input[name="rating"]',
            );
            radioButtons.forEach(function (radioButton) {
              radioButton.addEventListener("click", function () {
                setTimeout(function () {
                  window.location.href = "https://g.co/kgs/VBUEie";
                }, 500); //delay
              });
            });

            // Show the scroll-to-top button when scrolling down
            window.addEventListener("scroll", function () {
              var btnScrollToTop = document.getElementById("btnScrollToTop");
              if (window.pageYOffset > 200) {
                btnScrollToTop.style.display = "block";
              } else {
                btnScrollToTop.style.display = "none";
              }
            });

            // Scroll to top smoothly when the button is clicked
            document
              .getElementById("btnScrollToTop")
              .addEventListener("click", function (event) {
                event.preventDefault(); // Prevent form submission
                scrollToTop(0, 800);
              });

            function scrollToTop(to, duration) {
              const start = window.pageYOffset;
              const change = to - start;
              let currentTime = 0;
              const increment = 20;

              function animateScroll() {
                currentTime += increment;
                const val = easeInOutQuad(currentTime, start, change, duration);
                window.scrollTo(0, val);
                if (currentTime < duration) {
                  requestAnimationFrame(animateScroll);
                }
              }

              animateScroll();
            }

            // Easing function for smooth animation (quadratic easing in/out)
            function easeInOutQuad(t, b, c, d) {
              t /= d / 2;
              if (t < 1) return (c / 2) * t * t + b;
              t--;
              return (-c / 2) * (t * (t - 2) - 1) + b;
            }
          </script>
          <!-- end review section -->

          <div class="col-md-4 col-lg-3">
            <div class="social_box">
              <a href="https://web.facebook.com/kanchan.gulati">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="https://www.instagram.com/makeupbykanchankk">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="row info_main_row">
          <!-- <div class="col-md-6 col-lg-3"> -->
            <!-- <div class="info_links"> -->
              <!-- <h4>Menu</h4> -->
              <!-- <div class="info_links_menu"> -->
              <!--   <a href="index.html">Home</a> -->
              <!--   <a href="about.html">About</a> -->
              <!--   <a href="shop.html">Shop</a> -->
              <!--   <a href="blog.html">Blog</a> -->
              <!-- </div> -->
            <!-- </div> -->
          <!-- </div> -->
          <div class="col-md-6 col-lg-3">
            <div class="info_insta">
              <h4>QR Code</h4>
              <div class="insta_box">
                <div class="img-box">
                  <img src="pictures/QR code.jpeg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_detail">
              <h4>About Us</h4>
              <p class="mb-0">
                Passionate makeup artists, empowering beauty with personalized
                services, enhancing confidence and individual style.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h4>Contact Us</h4>
            <div class="info_contact">
              <a href="">
                <i class="fa fa-envelope"></i>
                <span> kanchanmua@hotmail.com </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end info_section -->

    <!-- footer section -->
    <footer class="footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href=""
            >Arjun <br />
            contact :+66-85-535-4562</a
          >
        </p>
      </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
  </body>
</html>
