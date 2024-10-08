
<?php 

if (isset($_SESSION['username'])) {
    echo '
        <div class="custom_menu-btn">
            <button onclick="openNav()">
                <span class="s-1"> </span>
                <span class="s-2"> </span>
                <span class="s-3"> </span>
            </button>
            <div id="myNav" class="overlay">
                <div class="overlay-content">
                    <a href="index.php">Home</a>
                    <a href="shop.php">Shop</a>
                    <a href="profile.php">profile</a>
                    <a href="process.php">process</a>
                    <a href="blog.php">Blog</a>
                    <a href="about.php">About</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    ';
} else {
    echo '
        <div class="custom_menu-btn">
            <button onclick="openNav()">
                <span class="s-1"> </span>
                <span class="s-2"> </span>
                <span class="s-3"> </span>
            </button>
            <div id="myNav" class="overlay">
                <div class="overlay-content">
                    <a href="index.php">Home</a>
                    <a href="shop.php">Shop</a>
                    <a href="profile.php">profile</a>
                    <a href="process.php">process</a>
                    <a href="blog.php">Blog</a>
                    <a href="about.php">About</a>
                    <a href="login.php">Login</a>
                </div>
            </div>
        </div>
    ';
}

// echo '
//             <div class="" id="">
//                 <div class="custom_menu-btn">
//                     <button onclick="openNav()">
//                         <span class="s-1"> </span>
//                         <span class="s-2"> </span>
//                         <span class="s-3"> </span>
//                     </button>
//                     <div id="myNav" class="overlay">
//                         <div class="overlay-content">
//                             <a href="index.php">Home</a>
//                             <a href="shop.php">Shop</a>
//                             <a href="profile.php">profile</a>
//                             <a href="process.php">process</a>
//                             <a href="blog.php">Blog</a>
//                             <a href="about.php">About</a>
//                             <a href="login.php">Login</a>
//                         </div>
//                     </div>
//                 </div>
//             </div>
// ';

?>
