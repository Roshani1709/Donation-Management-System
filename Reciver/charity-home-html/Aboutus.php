<?php
require "db.php";
$q="select * from tbladmin ";
$res =mysqli_query($mysql,$q) or die("query failed".mysqli_error($mysql));
$r =mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fables">
    <meta name="author" content="Enterprise Development">
    <link rel="shortcut icon" href="assets/custom/images/shortcut.png">
    <title> About us</title>
     <!-- animate.css-->  
     <link href="assets/vendor/animate.css-master/animate.min.css" rel="stylesheet">
    <!-- Load Screen -->
    <link href="assets/vendor/loadscreen/css/spinkit.css" rel="stylesheet">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- Font Awesome 5 -->
    <link href="assets/vendor/fontawesome/css/fontawesome-all.min.css" rel="stylesheet">
    <!-- Fables Icons -->
    <link href="assets/custom/css/fables-icons.css" rel="stylesheet"> 
    <!-- portfolio filter gallery -->
    <link href="assets/vendor/portfolio-filter-gallery/portfolio-filter-gallery.css" rel="stylesheet">
    <!-- FANCY BOX -->
    <link href="assets/vendor/fancybox-master/jquery.fancybox.min.css" rel="stylesheet"> 
    <!-- RANGE SLIDER -->
    <link href="assets/vendor/range-slider/range-slider.css" rel="stylesheet">
    <!-- OWL CAROUSEL  --> 
    <link href="assets/vendor/owlcarousel/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/owlcarousel/owl.theme.default.min.css" rel="stylesheet">
    <!-- FABLES CUSTOM CSS FILE -->
    <link href="assets/custom/css/custom.css" rel="stylesheet">
    <!-- FABLES CUSTOM CSS RESPONSIVE FILE -->
    <link href="assets/custom/css/custom-responsive.css" rel="stylesheet">
    <link href="assets/custom/css/custom-responsive.css" rel="stylesheet">
</head>

<body>
<div class="wrapper">
        <header class="header">
            <section class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="contact">
                                <p><span class="phone"><a href="#">Phone:8180909898</a></span><span class="email"><a
                                            href="#">Email: kindnesscorner@gmail.com</a></span></p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section class="header-bottom">
                <div class="container" style="height:100px;">
                    <div class="row">
                        <div class="col-md-4 col-sm-5 col-xs-7">
                            <a href="#">
                                <div class="main-logo">
                                    <img src="img/main-logo.png" alt="">
                                    <h2>Kindness Corner</h2>
                                </div>
                            </a>
                        </div>
                        <div style="margin-left:-150px;">
                            <div class="menu">
                                <ul class="nav navbar-nav">
                                    <li class="active" style="margin-right: 15px;"><a href="Receiver_Home.php">HOME</a>
                                    </li>
                                    <li style="margin-right: 10px;"><a href="REQUEST_MONEY.php">REQUEST MONEY</a></li>
                                    <li style="margin-right: 10px;"><a href="Request_History.php">REQUEST HISTORY</a>
                                    </li>
                                    <li style="margin-right: 10px;"><a href="Feedback.php">FEEDBACK</a></li>
                                    <li style="margin-right: 10px;"><a href="Contact_Me.php">CONTACT US</a></li>
                                    <li><a href="Aboutus.php">ABOUT US</a></li>

                                    <!-- Dropdown for Create Account -->
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-user-circle"></i> <!-- User icon -->
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="UpdateUser_info.php" class="nav-item">Edit Profile</a></li>
                                            <li><a href="ChangePassword.php" class="nav-item">Change Password</a></li>
                                            <li><a href="Logout.php" class="nav-item">Log out</a></li>
                                        </ul>
                                    </li>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </header>
            <section style="font-size:20px">
        <div class="container" style="margin:70px 370px; width: 1000px; height: 1000px;"> 
        <div class="row mt-4 my-md-5 overflow-hidden">
            <div class="col-12 col-md-4 mb-4 mb-md-0 wow fadeInDown" data-wow-delay=".3s">
                <div class="border p-4">
                    <div class="row text-center text-lg-left">
                        <div class="col-12 col-lg-3 mb-3 mb-md-0">
                            <span class="fables-iconlamp-icon fables-second-text-color fa-3x"></span>
                        </div>
                        <div class="col-12 col-lg-9">
                            <h2 class="fables-second-text-color font-20 semi-font my-2 mb-lg-3 about-block-heading">We’re Creative</h2>
                            <div class="font-15 fables-forth-text-color">
                            We’re creative in crafting innovative solutions 
                            that inspire positive change and meaningful impact.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0 wow fadeInDown" data-wow-delay=".6s">
            <div class="border p-4">
                    <div class="row text-center text-lg-left">
                        <div class="col-12 col-lg-3 mb-3 mb-md-0">
                            <span class="fables-icongears-icon fables-second-text-color fa-3x"></span>
                        </div>
                        <div class="col-12 col-lg-9">
                           <h2 class="fables-second-text-color font-20 semi-font my-2 mb-lg-3 about-block-heading">Highly Customizable</h2>
                           <div class="font-15 fables-forth-text-color">
                           Our platform is highly customizable, allowing users to tailor their experience and support causes in ways that matter most to them.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0 wow fadeInDown" data-wow-delay=".9s">
               <div class="border p-4">
                    <div class="row text-center text-lg-left">
                        <div class="col-12 col-lg-3 mb-3 mb-md-0">
                            <span class="fables-iconheadset-icon fables-second-text-color fa-3x"></span>
                        </div>
                        <div class="col-12 col-lg-9">
                           <h2 class="fables-second-text-color font-20 semi-font my-2 mb-lg-3 about-block-heading">Efficient 24/7 support</h2>
                            <div class="font-15 fables-forth-text-color">
                            We provide efficient 24/7 support to ensure seamless assistance whenever needed.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div> 
       <div class="row overflow-hidden" style="margin-left:50px;margin-top : 100px;"> 
            <div class="col-12 col-md-6" >
                 <div class="image-container translate-effect-right" style="width: 500px;margin-left:-100px; height:700px">
                    <img src="assets/custom/images/mission-img.jpg" alt="Fables Template" class="img-fluid" >
                 </div>
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0"
                <span class="fables-iconrocket-icon fables-second-text-color fa-3x"></span>
                <h2 class="font-30 font-weight-bold fables-second-text-color my-4 d-inline-block d-lg-block wow fadeInRight" data-wow-duration="1.5s">Our Mission</h2>
                <div class="fables-vision-detail fables-forth-text-color wow fadeInRight" data-wow-duration="1.5s">
                Our mission is to empower individuals and organizations by providing a reliable platform for charitable giving. We aim to streamline the donation process, making it easy for anyone to support causes they are passionate about.<br>
                 Through transparency and accountability, we ensure that every contribution is used effectively to create real change. We are committed to fostering a sense of community and collaboration among donors, volunteers, and beneficiaries. By driving social impact, we hope to inspire more people to engage in philanthropy and make a difference in the world.
                </div>
            </div>
      </div>
        
    </div>
   
   
    
    <div class="container" style="margin-top:-300px"> 
       <div class="row overflow-hidden">
            <div class="col-12 col-md-6">
                <span class="fables-iconvision-icon fables-second-text-color fa-4x"></span>
                <h2 class="font-30 font-weight-bold fables-second-text-color my-4 wow fadeInLeft d-inline d-lg-block" data-wow-duration="1.5s">Our Vision</h2>
                <div class="fables-forth-text-color mt-4 wow fadeInLeft" data-wow-duration="1.5s">
                Our vision is to build a trusted and accessible platform where people can make a difference through their donations. 
                We aim to connect generous individuals with impactful causes, ensuring that every contribution reaches those who need it most.<br><br>
                Transparency and accountability are at the heart of our mission, fostering trust within our community of donors. By leveraging cutting-edge technology, we strive to make the donation process seamless and efficient. Together, we believe we can create a lasting positive impact on the world
                </div>
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0">
                <div class="image-container translate-effect-right">
                     <img src="assets/custom/images/vision-img.jpg" alt="Fables Template" class="img-fluid">
                </div>
               
            </div>
      </div> 
    </div>
    
    
    
    </div> 
<!-- /End page content -->
        </section>



        <footer class="footer">
            <div class="container">
                <div class="row" style="margin-top:50px">
                    <div class="col-md-4 col-sm-12">
                        <div class="footer-charity-text">
                            <h2>HELP CHARITY</h2>
                            <p>Your generosity can transform lives. By supporting our charity, you help provide vital resources like food, shelter, and education to those in need. Every donation, big or small, makes a lasting impact. Join us in creating a brighter future for everyone!</p>
                            <br>
                            <br>
                            <br><br>
                            <p><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <div class="footer-text one">
                                    <h3>MANAGED BY</h3>
                                    <ul>
                                        <li><a href="#"><i class="material-icons"></i> ROSHANI MALI</a></li>
                                        <li><a href="#"><i class="material-icons"></i> KRUTI MEHTA</a></li>
                                        <li><a href="#"><i class="material-icons"></i> NANDANI VAKODIKAR</a></li>
                                        <li><a href="#"><i class="material-icons"></i> JIYA PAREKH</a></li>
                                    </ul>
                                    
                                </div>
                                
                            </div>
                        
                            <div class="col-md-4 col-sm-4">
                                <div class="footer-text one">
                                    <h3>CONTACT US</h3>
                                    <ul>
                                        <li><a href="#"><i class="material-icons"></i>1 Street, derby, FL 2147, USA</a></li>
                                        <li><a href="#"><i class="material-icons"></i>kindnesscorner@gmail.com</a></li>
                                        <li><a href="#"><i class="material-icons"></i>+123456789</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <p>Copyright @ 2017 <a href="#">kindness corner</a> | All Rights Reserved </p>
            </div>
        </footer>
    </div>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/active.js"></script>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/vendor/loadscreen/js/ju-loading-screen.js"></script>
<script src="assets/vendor/timeline/jquery.timelify.js"></script>
<script src="assets/vendor/WOW-master/dist/wow.min.js"></script>
<script src="assets/vendor/popper/popper.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap-4-navbar.js"></script>
<script src="assets/vendor/jQuery.countdown-master/jquery.countdown.min.js"></script>
<script src="assets/vendor/owlcarousel/owl.carousel.min.js"></script>
<script src="assets/custom/js/custom.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApW03tvAPTXWd1RHJBF2Up3iJMVu1wHi4&callback=JaMap"></script>
</body>

</html>