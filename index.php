<?php
require("./manager/assets/config.php");
if (session_status() === PHP_SESSION_NONE){session_start();}

if (isset($_COOKIE['CookRef'])) {
$Refnum= $_COOKIE['CookRef'];
// $cookRef =(!isset($_COOKIE['CookRef']))?setCookie('CookRef', $Refnum, time()+2592000, '/' ):"";
$_SESSION['CPSID']=$Refnum;

}
else {
$Refnum= "CPSID".time();
$_SESSION['CPSID']=$Refnum;
$cookRef =(!isset($_COOKIE['CookRef']))?setCookie('CookRef', $Refnum, time()+2592000, '/' ):"";
}
?>

<!doctype html>
<html lang="zxx">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/flaticon.css">
<link rel="stylesheet" href="assets/css/animate.min.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/boxicons.min.css">
<link rel="stylesheet" href="assets/css/meanmenu.min.css">
<link rel="stylesheet" href="assets/css/nice-select.min.css">
<link rel="stylesheet" href="assets/css/fancybox.min.css">
<link rel="stylesheet" href="assets/css/rangeSlider.min.css">
<link rel="stylesheet" href="assets/css/magnific-popup.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<title>CHEGS PHARMACY LIMITED | HOME </title>
<link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>
<body>

<div class="top-header">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-7">
<ul class="top-header-contact-info">
<li><i class='bx bx-phone-call'></i> <a href="tel:+2347087694448">(+234) 708 769 4448</a></li>
<li><i class='bx bx-map'></i> <a href="#" target="_blank">No. 21 Igweze street Kwata, Awka. Anambra. NG.</a></li>
</ul>
</div>
<div class="col-lg-6 col-md-5">
<ul class="top-header-menu">
<li><a href="profile-authentication.html">My Account</a></li>
</ul>
</div>
</div>
</div>
</div>


<div class="navbar-area">
<div class="drodo-responsive-nav">
<div class="container">
<div class="drodo-responsive-menu">
<div class="logo">
<a href="index-4.html">
<img src="assets/img/logo.png" alt="logo">
</a>
</div>
</div>
</div>
</div>
<div class="drodo-nav">
<div class="container">
<nav class="navbar navbar-expand-md navbar-light">
<a class="navbar-brand" href="index-4.html">
<img src="assets/img/logo.png" alt="logo">
</a>
<div class="collapse navbar-collapse mean-menu">
<ul class="navbar-nav">
<li class="nav-item"><a href="./" class="nav-link active">Home</a></li>
<li class="nav-item"><a href="products.html" class="nav-link">Shop</a></li>
<li class="nav-item"><a href="about.html" class="nav-link">About Us</a></li>
<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
<li class="nav-item"><a href="blog.html" class="nav-link">Our Blog</a></li>
</ul>
<div class="others-option">
<div class="option-item">
<div class="wishlist-btn">
<a href="#" data-toggle="modal" data-target="#shoppingWishlistModal"><i class='bx bx-heart'></i></a>
</div>
</div>
<div class="option-item">
<div class="cart-btn">
<a href="#" data-toggle="modal" data-target="#shoppingCartModal" class="CaRT"><i class='bx bx-shopping-bag'></i><b class="cartNumber"></b></a>
</div>
</div>
<div class="option-item">
<div class="search-btn-box">
<i class="search-btn bx bx-search-alt"></i>
</div>
</div>
</div>
</div>
</nav>
</div>
</div>
</div>


<div class="search-overlay">
<div class="d-table">
<div class="d-table-cell">
<div class="search-overlay-layer"></div>
<div class="search-overlay-layer"></div>
<div class="search-overlay-layer"></div>
<div class="search-overlay-close">
<span class="search-overlay-close-line"></span>
<span class="search-overlay-close-line"></span>
</div>
<div class="search-overlay-form">
<form>
<input type="text" class="input-search" placeholder="Search here...">
<button type="submit"><i class='bx bx-search-alt'></i></button>
</form>
</div>
</div>
</div>
</div>


<section class="main-banner-with-categories">
<div class="container">
<div class="row">

<!-- <div class="col-lg-3 col-md-12">
    <div class="megamenu-container">
    <div class="megamenu-title">
    Categories
    </div>
    <div class="megamenu-category">
    <ul class="nav">
    <li class="nav-item">
    <a href="#" class="nav-link">Accessories <i class="flaticon-next"></i></a>
    <ul class="dropdown-menu megamenu">
    <li class="row align-items-center">
    <div class="col-lg-4 col-sm-6">
    <h3>Accessories I</h3>
    <ul class="megamenu-nav">
    <li><a href="#">EKG/ECG Machines</a></li>
    <li><a href="#">Surgical Tables</a></li>
    <li><a href="#">Blanket Warmers</a></li>
    <li><a href="#">Electrosurgical Units</a></li>
    <li><a href="#">Surgical Lights</a></li>
    </ul>
    </div>
    <div class="col-lg-4 col-sm-6">
    <h3>Accessories II</h3>
    <ul class="megamenu-nav">
    <li><a href="#">Stretchers</a></li>
    <li><a href="#">Defibrillators</a></li>
    <li><a href="#">Anesthesia Machines</a></li>
    <li><a href="#">Patient Monitors</a></li>
    <li><a href="#">Sterilizers</a></li>
    </ul>
    </div>
    <div class="col-lg-4 col-sm-6">
    <div class="custom-media">
    <a href="#" class="d-block"><img src="assets/img/menu-img1.jpg" alt="image"></a>
    </div>
    </div>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">Pharmacy <i class="flaticon-next"></i></a>
    <ul class="dropdown-menu megamenu">
    <li class="row align-items-center">
    <div class="col-lg-4 col-sm-6">
    <h3>Pharmacy 01</h3>
    <ul class="megamenu-nav">
    <li><a href="#">Acetaminophen</a></li>
    <li><a href="#">Adderall</a></li>
    <li><a href="#">Amitriptyline</a></li>
    <li><a href="#">Amlodipine</a></li>
    <li><a href="#">Amoxicillin</a></li>
    </ul>
    </div>
    <div class="col-lg-4 col-sm-6">
    <h3>Pharmacy 02</h3>
    <ul class="megamenu-nav">
    <li><a href="#">Cephalexin</a></li>
    <li><a href="#">Ciprofloxacin</a></li>
    <li><a href="#">Citalopram</a></li>
    <li><a href="#">Clindamycin</a></li>
    <li><a href="#">Clonazepam</a></li>
    </ul>
    </div>
    <div class="col-lg-4 col-sm-6">
    <h3>Pharmacy 03</h3>
    <ul class="megamenu-nav">
    <li><a href="#">Ativan</a></li>
    <li><a href="#">Atorvastatin</a></li>
    <li><a href="#">Azithromycin</a></li>
    <li><a href="#">Benzonatate</a></li>
    <li><a href="#">Brilinta</a></li>
    </ul>
    </div>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">Health & Nutrition <i class="flaticon-next"></i></a>
    <ul class="dropdown-menu megamenu">
    <li class="row align-items-center">
    <div class="col-lg-4 col-sm-6">
    <h3>Health Drinks</h3>
    <ul class="megamenu-nav">
    <li><a href="#">Children</a></li>
    <li><a href="#">Diabetic Drinks</a></li>
    <li><a href="#">Glucose Powder</a></li>
    <li><a href="#">Men & Women</a></li>
    </ul>
    </div>
    <div class="col-lg-4 col-sm-6">
    <h3>Breakfast Cereals</h3>
    <ul class="megamenu-nav">
    <li><a href="#">Cereal Basics</a></li>
    <li><a href="#">Sugar & Carbs</a></li>
    <li><a href="#">Misleading Claims</a></li>
    <li><a href="#">Better Breakfasts</a></li>
    </ul>
    </div>
    <div class="col-lg-4 col-sm-6">
    <h3>Management</h3>
    <ul class="megamenu-nav">
    <li><a href="#">Ativan</a></li>
    <li><a href="#">Azithromycin</a></li>
    <li><a href="#">Benzonatate</a></li>
    <li><a href="#">Brilinta</a></li>
    </ul>
    </div>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">Personal Equipment <i class="flaticon-next"></i></a>
    <ul class="dropdown-menu">
    <li class="nav-item"><a href="#" class="nav-link">Cosmetic</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Microscope</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Hearing Aid</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Metal Stethoscope</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Medical Glass</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Isometric</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Mask</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Blood Pressure</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Face Mask</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Gloves</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Sanitizer</a></li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">Diagnostic Sets</a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">Microscope</a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">Needle & Syringes</a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">OT Therapy</a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">First Aid</a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">Transport</a>
    </li>
    </ul>
    </div>
    </div>
</div> -->

<div class="col-lg-12 col-md-12">
<div class="home-slides-three owl-carousel owl-theme">
<div class="banner-area" style="background-image:url(assets/img/main-banner1.jpg)">
<div class="banner-content">
<span class="sub-title">Premium Quality</span>
 <h1>Metal <br>Stethoscope</h1>
<p>The stethoscope is an acoustic medical device, which is used to measure heartbeats.</p>
<div class="btn-box">
<div class="d-flex align-items-center">
<a href="#" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
</div>
</div>
</div>
</div>
<div class="banner-area" style="background-image:url(assets/img/main-banner2.jpg)">
<div class="banner-content">
<span class="sub-title">Premium Quality</span>
<h1>Covid19 <br><span>2020</span> Sanitizer</h1>
<p>The stethoscope is an acoustic medical device, which is used to measure heartbeats.</p>
<div class="btn-box">
<div class="d-flex align-items-center">
<a href="#" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="categories-banner-area pt-70 pb-40">
    <div class="container">
    <div class="section-title">
    <h2>Categories</h2>
    </div>

    <div class="row">
    <div class="col-lg-5 col-md-12">
    <div class="categories-box">
    <img src="assets/img/banner-categories/banner-categories-img5.jpg" alt="image">
    <div class="content">
    <h3>Drugs Collection!</h3>
    </div>
    <a href="products.php" class="link-btn"></a>
    </div>
    </div>
    <div class="col-lg-7 col-md-12">

    <div class="row">
    <?php
$query = mysqli_query($con,"SELECT * FROM categories ORDER BY RAND() LIMIT 0,6");
while ($row = mysqli_fetch_assoc($query)) {
  extract($row);
  // $query = mysqli_query($con,"SELECT * FROM images WHERE category= '$texty'&& thumbnail='yes'");
  //  $row = mysqli_fetch_assoc($query); 
  // $thumbnail= $row['imagepath'];
echo
"    <div class='col-lg-4 col-sm-4 col-md-4'>
    <div class='single-categories-box'>
    <img src='$logo' alt='image'>
    <h3>$texty</h3>
    <a href='./products.php?cat=$texty' class='link-btn'></a>
    </div>
    </div>";
}
?>
    </div>

    </div>
    </div>
    </div>
</section>


<section class="products-area pb-40">
<div class="container">
<div class="section-title">
<h2>New Arrivals</h2>
</div>
<div class="products-slides owl-carousel owl-theme">

<?php

$query = mysqli_query($con,"SELECT * FROM products WHERE isnew='yes'ORDER BY RAND() LIMIT 0,5 ");
while ($row = mysqli_fetch_assoc($query)) {
  extract($row);


echo "
<div class='single-products-box'>
<div class='image'>
<a href='#' data-toggle='modal' data-target='#productsQuickView' data-id='$id' class='d-block'><img src='$imagepath' alt='image'></a>
<div class='new'>New</div>

<div class='buttons-list'>
<ul>
<li>
<div class='cart-btn'>
<a href='javascript:void(0)' class='addToCart' forcart='$imageid'>
<i class='bx bxs-cart-add'></i>
<span class='tooltip-label'>Add to Cart</span>
</a>
</div>
</li>
<li>
<div class='wishlist-btn'>
<a href='#'>
<i class='bx bx-heart'></i>
<span class='tooltip-label'>Add to Wishlist</span>
</a>
</div>
</li>
<li>
<div class='quick-view-btn'>
<a href='#' data-toggle='modal' data-target='#productsQuickView' data-id='$id'>
<i class='bx bx-search-alt'></i>
<span class='tooltip-label'>Quick View</span>
</a>
</div>
</li>
</ul>
</div>
</div>
<div class='content'>
<h3><a href='product_details.html?PID=$imageid'>$title</a></h3>
<div class='price'>
<span class='new-price'>&#8358;$price</span>
</div>
</div>
</div>";

}


?>



</div>
</div>
</section>


<section class="products-area pb-40">
<div class="container">
<div class="section-title">
<h2>Deal Of The Week up to 50% OFF</h2>
</div>
<div class="products-slides owl-carousel owl-theme">

    <?php

    $query = mysqli_query($con,"SELECT * FROM products WHERE dprice < price ORDER BY RAND() LIMIT 0,5 ");
    while ($row = mysqli_fetch_assoc($query)) {
    extract($row);


    echo "
    <div class='single-products-box'>
    <div class='image'>
    <a href='#' data-toggle='modal' data-target='#productsQuickView' data-id='$id' class='d-block'><img src='$imagepath' alt='image'></a>
    <div class='new'>New</div>

    <div class='buttons-list'>
    <ul>
    <li>
    <div class='cart-btn'>
    <a href='javascript:void(0)' class='addToCart' forcart='$imageid'>
    <i class='bx bxs-cart-add'></i>
    <span class='tooltip-label'>Add to Cart</span>
    </a>
    </div>
    </li>
    <li>
    <div class='wishlist-btn'>
    <a href='#'>
    <i class='bx bx-heart'></i>
    <span class='tooltip-label'>Add to Wishlist</span>
    </a>
    </div>
    </li>
    <li>
    <div class='quick-view-btn'>
    <a href='#' data-toggle='modal' data-target='#productsQuickView' data-id='$id'>
    <i class='bx bx-search-alt'></i>
    <span class='tooltip-label'>Quick View</span>
    </a>
    </div>
    </li>
    </ul>
    </div>
    </div>
    <div class='content'>
    <h3><a href='product_details.html?PID=$imageid'>$title</a></h3>
    <div class='price'>
    <span class='new-price'>&#8358;$price</span>
    </div>
    </div>
    </div>";

    }


    ?>

</div>
</div>
</section>


<section class="products-area pb-40">
<div class="container">
<div class="section-title">
<h2>Best Selling</h2>
</div>
<div class="products-slides owl-carousel owl-theme">

    <?php

    $query = mysqli_query($con,"SELECT * FROM products WHERE featured='yes'ORDER BY RAND() LIMIT 0,5 ");
    while ($row = mysqli_fetch_assoc($query)) {
    extract($row);


    echo "
    <div class='single-products-box'>
    <div class='image'>
    <a href='#' data-toggle='modal' data-target='#productsQuickView' data-id='$id' class='d-block'><img src='$imagepath' alt='image'></a>
    <div class='new'>New</div>

    <div class='buttons-list'>
    <ul>
    <li>
    <div class='cart-btn'>
    <a href='javascript:void(0)' class='addToCart' forcart='$imageid'>
    <i class='bx bxs-cart-add'></i>
    <span class='tooltip-label'>Add to Cart</span>
    </a>
    </div>
    </li>
    <li>
    <div class='wishlist-btn'>
    <a href='#'>
    <i class='bx bx-heart'></i>
    <span class='tooltip-label'>Add to Wishlist</span>
    </a>
    </div>
    </li>
    <li>
    <div class='quick-view-btn'>
    <a href='#' data-toggle='modal' data-target='#productsQuickView' data-id='$id'>
    <i class='bx bx-search-alt'></i>
    <span class='tooltip-label'>Quick View</span>
    </a>
    </div>
    </li>
    </ul>
    </div>
    </div>
    <div class='content'>
    <h3><a href='product_details.html?PID=$imageid'>$title</a></h3>
    <div class='price'>
    <span class='new-price'>&#8358;$price</span>
    </div>
    </div>
    </div>";

    }


    ?>



</div>

</div>
</section>


<?php
$query2 = mysqli_query($con,"SELECT *  FROM adshow WHERE placement='row' ORDER BY RAND() LIMIT 0,2 ");
if (mysqli_num_rows($query2) > 0) {

echo "<section class='banner-categories-area pb-40'>
<div class='container'>
<div class='row'>
";
while ($row = mysqli_fetch_assoc($query2)) {
        extract($row);
       // $oldprice= ($dprice<$price)?"<span class='old-price'>₦$price</span>":"";
       echo"

<div class='col-lg-6 col-md-6'>
<div class='single-banner-categories-box'>
<img src='$image' alt='image'>
<div class='content'>
<span class='sub-title'>$tag</span>
<h3><a href='product_details.html?PID=$product_id'>$title</a></h3>
<div class='btn-box'>
<div class='d-flex align-items-center'>
<a href='product_details.html?PID=$product_id' class='default-btn'><i class='flaticon-trolley'></i> Shop Now</a>".
// <span class='price'>&#8358;$dprice</span>
"</div>
</div>
</div>
</div>
</div>";}
echo 
"</div>
</div>
</section>
";
}
?>



<section class="blog-area pb-40">
<div class="container">
<div class="section-title">
<h2>Our Blog</h2>
</div>
<div class="row">
<div class="col-lg-4 col-md-6">
<div class="single-blog-post">
<div class="post-image">
<a href="#" class="d-block"><img src="assets/img/blog/blog-img1.jpg" alt="image"></a>
</div>
<div class="post-content">
<h3><a href="#">A researcher is conducting research on coronavirus in the lab</a></h3>
<ul class="post-meta align-items-center d-flex">
<li>
<div class="flex align-items-center">
<img src="assets/img/user1.jpg" alt="image">
<a href="#">Nathan Oritz</a>
</div>
</li>
<li>06-06-2020</li>
</ul>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6">
<div class="single-blog-post">
<div class="post-image">
<a href="#" class="d-block"><img src="assets/img/blog/blog-img2.jpg" alt="image"></a>
</div>
<div class="post-content">
<h3><a href="#">You have to wash your hands for 20 seconds to keep yourself free</a></h3>
<ul class="post-meta align-items-center d-flex">
<li>
<div class="flex align-items-center">
<img src="assets/img/user2.jpg" alt="image">
<a href="#">Randy Osborne</a>
</div>
</li>
<li>05-06-2020</li>
</ul>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
<div class="single-blog-post">
<div class="post-image">
<a href="#" class="d-block"><img src="assets/img/blog/blog-img3.jpg" alt="image"></a>
</div>
<div class="post-content">
<h3><a href="#">It is very important to wear proper clothing to keep yourself free</a></h3>
<ul class="post-meta align-items-center d-flex">
<li>
<div class="flex align-items-center">
<img src="assets/img/user3.jpg" alt="image">
<a href="#">Patricia Marcus</a>
</div>
</li>
<li>04-06-2020</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="facility-area bg-f7f8fa pt-70 pb-40">
<div class="container">
<div class="row">
<div class="col-lg-3 col-sm-6 col-md-3 col-6">
<div class="single-facility-box">
<div class="icon">
<i class="flaticon-free-shipping"></i>
</div>
<h3>Free Shipping</h3>
<p>Free shipping world wide</p>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-md-3 col-6">
<div class="single-facility-box">
<div class="icon">
<i class="flaticon-headset"></i>
</div>
<h3>Support 24/7</h3>
<p>Contact us 24 hours a day</p>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-md-3 col-6">
<div class="single-facility-box">
<div class="icon">
<i class="flaticon-secure-payment"></i>
</div>
<h3>Secure Payments</h3>
<p>100% payment protection</p>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-md-3 col-6">
<div class="single-facility-box">
<div class="icon">
<i class="flaticon-return-box"></i>
</div>
<h3>Easy Return</h3>
<p>Simple returns policy</p>
</div>
</div>
</div>
</div>
</section>


<footer class="footer-area">
<div class="container">
<div class="row">
<div class="col-lg-3 col-sm-6 col-md-6">
<div class="single-footer-widget">
<a href="#" class="logo d-inline-block"><img src="assets/img/logo.png" alt="image"></a>
<ul class="footer-contact-info">
<li><span>Phone:</span> <a href="tel:+2347087694448">(+234) 708 769 4448</a></li>
<li><span>Email:</span> <a href="mailto:hello@chegspharmstore.com.ng">hello@chegspharmstore.com.ng</a></li>
<li><span>Address:</span> <a href="#" target="_blank">No. 21 Igweze street Kwata, Awka. Anambra. NG.</a></li>
</ul>
<ul class="social">
<li><a href="https://fb.com/chegspharm" target="_blank"><i class='bx bxl-facebook-square'></i></a></li>
<li><a href="https://twitter.com/chegsp" target="_blank"><i class="bx bxl-twitter"></i></a></li>
<li><a href="https://www.instagram.com/chegs_pharmacy" target="_blank"><i class='bx bxl-instagram-alt'></i></a></li>
<li><a href="https://wa.me/message/R2SJILWJGGQ3M1" target="_blank"><i class='bx bxl-whatsapp-square'></i></a></li>

</ul>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-md-6">
<div class="single-footer-widget">
<h3>Information</h3>
<ul class="link-list">
<li><a href="about.html">About Us</a></li>
<li><a href="contact.html">Contact Us</a></li>
<li><a href="privacy-policy.html">Privacy Policy</a></li>
<li><a href="terms-of-service.html">Terms & Conditions</a></li>
<li><a href="customer-service.html">Delivery Information</a></li>
<li><a href="customer-service.html">Orders and Delivery</a></li>
</ul>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-md-6">
<div class="single-footer-widget">
<h3>Customer Care</h3>
<ul class="link-list">
<li><a href="faq.html">Help & FAQs</a></li>
<li><a href="profile-authentication.html">My Account</a></li>
<li><a href="cart.html">Order History</a></li>
<li><a href="cart.html">Wishlist</a></li>
<li><a href="contact.html">Newsletter</a></li>
<li><a href="purchase-guide.html">Purchasing Policy</a></li>
</ul>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-md-6">
<div class="single-footer-widget">
<h3>Newsletter</h3>
<p>Sign up for our mailing list to get the latest updates & offers.</p>
<form class="newsletter-form" data-toggle="validator">
<input type="text" class="input-newsletter" placeholder="Enter your email address" name="EMAIL" required autocomplete="off">
<button type="submit" class="default-btn">Subscribe Now</button>
<div id="validator-newsletter" class="form-result"></div>
</form>
</div>
</div>
</div>
</div>
<div class="footer-bottom-area">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6">
<p>Copyright <i class='bx bx-copyright'></i><script>document.write(new Date().getFullYear());</script> By <a href="https://thednsoft.com" target="_blank">DNsoft</a></p>
</div>
<div class="col-lg-6 col-md-6">
<div class="payment-types">
<ul class="d-flex align-items-center justify-content-end">
<li>We accept payment via:</li>
<li><a href="#" target="_blank"><img src="assets/img/payment-types/visa.png" alt="image"></a></li>
<li><a href="#" target="_blank"><img src="assets/img/payment-types/mastercard.png" alt="image"></a></li>
<li><a href="#" target="_blank"><img src="assets/img/payment-types/paypal.png" alt="image"></a></li>
<li><a href="#" target="_blank"><img src="assets/img/payment-types/descpver.png" alt="image"></a></li>
<li><a href="#" target="_blank"><img src="assets/img/payment-types/american-express.png" alt="image"></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</footer>

<div class='modal fade productsQuickView' id='productsQuickView' tabindex='-1' role='dialog' aria-hidden='true'>
<div class='modal-dialog modal-dialog-centered' role='document'>
<div class='modal-content'>
<div id="content"></div>
</div>
</div>
</div>


<div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div id="contentCart"></div>

</div>
</div>
</div> 


<div class="modal right fade shoppingWishlistModal" id="shoppingWishlistModal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true"><i class='bx bx-x'></i></span>
</button>
<div class="modal-body">
<h3>My Wishlist (3)</h3>
<div class="products-cart-content">
<div class="products-cart d-flex align-items-center">
<div class="products-image">
<a href="#"><img src="assets/img/products/products-img1.jpg" alt="image"></a>
</div>
<div class="products-content">
<h3><a href="#">Coronavirus Face Mask</a></h3>
<div class="products-price">
<span>1</span>
<span>x</span>
<span class="price">$39.00</span>
</div>
</div>
<a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
</div>
<div class="products-cart d-flex align-items-center">
<div class="products-image">
<a href="#"><img src="assets/img/products/products-img2.jpg" alt="image"></a>
</div>
<div class="products-content">
<h3><a href="#">Protective Gloves</a></h3>
<div class="products-price">
<span>1</span>
<span>x</span>
<span class="price">$99.00</span>
</div>
</div>
<a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
</div>
<div class="products-cart d-flex align-items-center">
<div class="products-image">
<a href="#"><img src="assets/img/products/products-img3.jpg" alt="image"></a>
</div>
<div class="products-content">
<h3><a href="#">Infrared Thermometer Gun</a></h3>
<div class="products-price">
<span>1</span>
<span>x</span>
<span class="price">$90.00</span>
</div>
</div>
<a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
</div>
</div>
<div class="products-cart-subtotal">
<span>Subtotal</span>
<span class="subtotal">$228.00</span>
</div>
<div class="products-cart-btn">
<a href="#" class="default-btn">View Shopping Cart</a>
</div>
</div>
</div>
</div>
</div>

<div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-notify.js"></script>
<script src="assets/js/magnific-popup.min.js"></script>
<script src="assets/js/fancybox.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/owl.carousel2.thumbs.min.js"></script>
<script src="assets/js/meanmenu.min.js"></script>
<script src="assets/js/nice-select.min.js"></script>
<script src="assets/js/rangeSlider.min.js"></script>
<script src="assets/js/sticky-sidebar.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/form-validator.min.js"></script>
<script src="assets/js/contact-form-script.js"></script>
<script src="assets/js/ajaxchimp.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>