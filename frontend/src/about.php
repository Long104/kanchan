


<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
          <span>
            KanchanK
          </span>
        </a>

        <?php include "./component/menu.php" ?>

      </nav>
    </div>
  </header>
  <!-- end header section -->

  <!-- about section -->

  <section class="about_section  layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="pictures/2.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              We are a passionate team of makeup artists dedicated to providing top-notch makeup services. With years of experience in the industry, we strive to create stunning looks that enhance natural beauty.
              <br> Our goal is to empower individuals to feel confident and express their unique style through the art of makeup.
            </p>
            <a href="https://www.instagram.com/direct/t/17842970165104419">
              Book Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row info_form_social_row">
  <!-- review section -->
 <div class="col-md-8 col-lg-9">
   <div class="info_form">
     <style>
  C
  .rating {
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

  .label{
    font-size: 30px;
    height: 50px;
  }

  form{
    justify-content: space-between;
  }

  </style>

  <form id="myForm" action="">
  <div class="label">
    <label for="">Rate Us!</label>
  </div>
  <div class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
  </div>

  <button id="btnScrollToTop">
  <i class="fa fa-arrow-up" ></i>
  </button>
  
  </form>
  </div> </div>
  <script>
    var radioButtons = document.querySelectorAll('input[name="rating"]');
    radioButtons.forEach(function(radioButton) {
      radioButton.addEventListener('click', function() {
        setTimeout(function() {
          window.location.href = 'https://g.co/kgs/VBUEie';
        }, 500);  //delay
      });
    });
  
  // Show the scroll-to-top button when scrolling down
  window.addEventListener("scroll", function() {
    var btnScrollToTop = document.getElementById("btnScrollToTop");
    if (window.pageYOffset > 200) {
      btnScrollToTop.style.display = "block";
    } else {
      btnScrollToTop.style.display = "none";
    }
  });
  
  // Scroll to top smoothly when the button is clicked
  document.getElementById("btnScrollToTop").addEventListener("click", function(event) {
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
    if (t < 1) return c / 2 * t * t + b;
    t--;
    return -c / 2 * (t * (t - 2) - 1) + b;
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
        <div class="col-md-6 col-lg-3">
          <div class="info_links">
            <h4>
              Menu
            </h4>
            <div class="info_links_menu">
              <a href="index.html">Home</a>
              <a href="about.html">About</a>
              <a href="shop.html">Shop</a>
              <a href="blog.html">Blog</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="info_insta">
            <h4>
              QR Code
            </h4>
            <div class="insta_box">
              <div class="img-box">
                <img src="pictures/QR code.jpeg" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="info_detail">
            <h4>
              About Us
            </h4>
            <p class="mb-0">
              Passionate makeup artists, empowering beauty with personalized services, enhancing confidence and individual style.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <h4>
            Contact Us
          </h4>
          <div class="info_contact">
            <a href="">
              <i class="fa fa-envelope"></i>
              <span>
                kanchanmua@hotmail.com
              </span>
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
        <a href="">Arjun <br>
        contact :+66-85-535-4562</a>
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
