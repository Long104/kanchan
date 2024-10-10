<?php
session_start();

// if (!isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit();
// }
?>


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
  <script defer src="/_vercel/insights/script.js"></script>
</head>

<body>
  <script defer src="/_vercel/insights/script.js"></script>
  <!-- header section strats -->
  <header class="header_section">
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

  <!-- slider section -->
  <section class="slider_section position-relative">
    <div class="slider_bg_box">
      <img src="pictures\3.jpg" alt="">
    </div>
    <div class="slider_bg"></div>
    <div class="container">
      <div class="col-md-9 col-lg-8">
        <div class="detail-box">
          <h1>
            Best Make-up
            <br> in Bangkok
          </h1>
          <p>
            Timeless and Natural Make-Up in Thailand. We are proffessional team of experienced makeupartist and hairstyling.
          </p>
          <div>
            <a href="https://www.instagram.com/direct/t/17842970165104419" class="slider-link">
              Book Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end slider section -->

  <!-- about section -->

  <section class="about_section  ">
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
            <a href="about.php">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- offer section -->

  <section class="offer_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 px-0">
          <div class="box offer-box1">
            <img src="pictures/4.jpg" alt="">
            <div class="detail-box">
              <h2>
                Pre-Wedding Make-Up
              </h2>
            </div>
          </div>
        </div>
        <div class="col-md-5 px-0">
          <div class="box offer-box2"> <!--700x310-->
            <img src="pictures/6.jpg" alt="">
            <div class="detail-box">
              <h2>
                Mehandi Vibes
              </h2>
            </div>
          </div>
          <div class="box offer-box3"> <!--700x310-->
            <img src="pictures/7.jpg" alt="">
            <div class="detail-box">
              <h2>
                Wedding Pheres
              </h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->

  <!-- blog section -->

  <section class="blog_section ">
    <div class="container">
      <div class="heading_container">
        <h2>
          Latest From Blog
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="pictures/Labeeba.jpeg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Labeeba, a stunning bride
              </h5>
              <p>
                The Quintessential Bride exudes perfection in every detail, from her flawless gown to the meticulously arranged decorations. Her wedding day is a true masterpiece of elegance and beauty.
                <br>
                <br>
              </p>
              <a href="about.html">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="pictures/Amie.jpeg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Graceful & Stunning Anmmie
              </h5>
              <p>
                Anmmie, the embodiment of grace and beauty, captivates all with her stunning presence. Every step she takes radiates elegance, leaving a lasting impression on all who have the privilege of witnessing her.
              </p>
              <a href="about.html">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end blog section -->

      <!-- process section -->

      <style>
        .detail-box h4{
            font-size: 60px;
            text-align: center;
        }

        .blog_section .box .detail-box1 {
          margin-top: 10px;
          padding: 25px;
        }
        
        @media (min-width: 992px) {
            .detail-box1{
                height: 400px;
            }
        }
    </style>

    <section class="blog_section ">
        <div class="container">
          <br>
          <br>
          <br>
          <div class="heading_container">
            <h2>
                Our Step-by-Step Bridal Makeup Process
            </h2>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="box">
                  <div class="detail-box1">
                    <h4>#First</h4>
                    <h5 class="consultation-heading" style="font-size: 1.5em;"> <!-- Increased the font size of the heading -->
                      Consultation
                    </h5>
                    <ul>
                      <li>We start with a free makeup consultation over email, or Messenger.</li>
                      <li>I would like you to have a reference pic for makeup & hairstyles so that will help us to excute your desired look.</li>
                      <li>We shall than work which look will look best on your features.</li>
                      <li>Pre makeup Skincare will be recommended to be done daily to give your a glow on your big day.</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box">
                  <div class="detail-box1">
                    <h4>#Second</h4>
                    <h5 class="consultation-heading" style="font-size: 1.5em;"> <!-- Increased the font size of the heading -->
                        Trial Makeup
                    </h5>
                    <ul>
                      <li>We can schedule you for a trial before your wedding day. To work with reference and what will look good in real.</li>
                      <li>We work on 2 to 3 makeup looks and hairstyles.
                      </li>
                      <li>For local clients trial can be scheduled as per your convenience.
                      </li>
                      <li>We see how the style we designed for you looks.
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box">
                  <div class="detail-box1">
                    <h4>#Third</h4>
                    <h5 class="consultation-heading" style="font-size: 1.5em;"> <!-- Increased the font size of the heading -->
                        Finalize Your Look
                    </h5>
                    <ul>
                      <li>We collect and incorporate your feedback from your Trial Makeup session.
                    </li>
                      <li>We make any required adjustments to your style.
                    </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box">
                  <div class="detail-box1">
                    <h4>#Fourth</h4>
                    <h5 class="consultation-heading" style="font-size: 1.5em;"> <!-- Increased the font size of the heading -->
                        Your Wedding Day— The Ceremony
                    </h5>
                    <ul>
                      <li>We will come to your hotel, your wedding venue, or anywhere else you are getting ready for your ceremony.
                    </li>
                      <li>We will do everything we can to fit into what’s going on, to adapt to any scheduling changes, and to make sure everyone is comfortable.
                    </li>
                    <li>Depending on your needs, we will either touch up your makeup prior to your reception, or give you a completely new look
                    </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row mx-auto">
                <div class="box">
                </div>
              </div>
          </div>
        </div>
      </section>
      <br>
      <br>
    
      <!-- end process section -->

  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Testimonial
        </h2>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="pictures/pranutan.jpeg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                        Pranuntan: Bollywood Actress
                      </h6>
                    </div>
                    <p>
                      Kanchan is such a wonderful person.. she’s so organised, patient and so so good at her work! It was such joy to work with her.. she understands exactly what you want and also gives her inputs which really worked for me! And the best thing is that she’s so quick, kind and helpful. Thanks so much K! ♥️ totally totally recommend! ✨🌸🥳
                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                  <br>
                  <br>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/15.jpeg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                        Hansini Singh
                      </h6>
                    </div>
                    <p>
                      If you're looking for a makeup artist whom you could put your blind faith in, the search ends with Kanchan.
                      Being an event organizer myself, I had no time to put much thought into my vision for the big day's look but Kanchan made it a point to get me there - she checked in with me prior to the event on a regular basis, and did a fabulous job and reminding me of the fact that I'm the bride while doing even better at making me truely feel like one too!
                      Needless to say that I got tired of thanking people for all the compliments by the end of the night!!
                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/16.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                        Geetu Jethwani
                      </h6>
                    </div>
                    <p>
                      If I could give 10 stars or even more I would!!
                      My wedding planner introduced me to Kanchan after I didnt like 5 MUA! I tried Kanchan once and LOVED my make up! I had 6 functions and 6 AMAZING different looks for each!! 
                      I'm extremely picky and my husband hates me in make up, but with Kanchan OMG we BOTH LOVED IT!!! 
                      If you're getting married or engaged or having any function, I cannot recommend Kanchan enough!!
                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

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
