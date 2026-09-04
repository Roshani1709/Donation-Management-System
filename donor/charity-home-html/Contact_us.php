<?php
// File Name: Contact_Me.php
require 'db.php';
session_start();

// Check if 'dname', 'aid', and 'aname' are present in the URL (using GET)
if (!isset($_GET['dname']) || !isset($_GET['aid']) || !isset($_GET['aname'])) {
    header("Location: login.php");
    exit();
}

// Retrieve values from the URL (using GET)
$aname = $_GET['aname'];
$dname = $_GET['dname'];
$aid = $_GET['aid'];

// Fetch the Donor_id based on the donor's name
$donor_query = "SELECT Donor_id FROM tbldonor WHERE Donor_Name = '$dname'";
$donor_result = mysqli_query($mysql, $donor_query);

if (!$donor_result) {
    die("Error fetching donor: " . mysqli_error($mysql));
}

if (mysqli_num_rows($donor_result) > 0) {
    $donor_row = mysqli_fetch_assoc($donor_result);
    $did = $donor_row['Donor_id'];

    // Check if the form was submitted
    if (isset($_REQUEST['contact_me'])) {

        // Corrected column name from 'Donar_id' to 'Donor_id'
        $query = "INSERT INTO tblcontactus VALUES (null,'$aid', '$did',null,null)";

        // Execute the query and handle errors
        if (mysqli_query($mysql, $query)) {
            // Success message
            echo "<script>alert('Thank you $dname for reaching out! Admin $aname will contact you soon.');</script>";
            header("refresh:3;url=Doner_Home.php");
            exit();
        } else {
            // Error handling with detailed message
            echo "<h1>Error</h1>";
            echo "<p>There was an error processing your request. Please try again later.</p>";
            echo "Error: " . mysqli_error($mysql); // Debugging the SQL error
        }
    }
} else {
    echo "<h1>Error</h1>";
    echo "<p>Donor not found in the database.</p>";
}

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
    <title> Contact Us</title>
    <!-- animate.css-->
    <link href="assets/vendor/animate.css-master/animate.min.css" rel="stylesheet">
    <!-- Load Screen -->
    <link href="assets/vendor/loadscreen/css/spinkit.css" rel="stylesheet">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
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
    <!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="menu">
                            <ul class="nav navbar-nav" style="margin-right:-300px">
                                    <li class="active" style="margin-right: 5px;"><a href="Doner_Home.php">HOME</a>
                                    </li>
                                    <li style="margin-right: 5px;"><a href="Categories.php">CATEGORIES</a></li>
                                    <li style="margin-right: 5px;"><a href="Donation_History.php">DONATION HISTORY</a>
                                    </li>
                                    <li style="margin-right: 5px;"><a href="Donate_Money.php">DONATE NOW</a></li>
                                    <li style="margin-right: 5px;"><a href="Feedback.php">FEEDBACK</a></li>
                                    <li style="margin-right: 5px;"><a href="Contact_Me.php">CONTACT US</a></li>
                                    <li><a href="Aboutus.php">ABOUT US</a></li>

                                    <!-- Dropdown for Create Account -->
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-user-circle">User</i> <!-- User icon -->
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="UpdateUser_info.php" class="nav-item">Edit Profile</a></li>
                                            <li><a href="ChangePassword.php" class="nav-item">Change Password</a></li>
                                            <li><a href="Logout.php" class="nav-item">Log out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <section>
            <div id="ju-loading-screen">
                <div class="sk-double-bounce">
                    <div class="sk-child sk-double-bounce1"></div>
                    <div class="sk-child sk-double-bounce2"></div>
                </div>
            </div>

            <!-- Start page content -->
            <div class="container" style="margin:60px 150px; width: 100%; height: 100%; ">
                <p class="font-40 font-weight-bold fables-main-text-color text-center"
                    style="margin-left:-280px; font-weight:700;font-family: 'Arial, sans-serif'; ">Contact Us</p>
                <div class="row overflow-hidden">
                    <div class="col-12 col-md-10 offset-md-1 mt-5">
                        <div class="row" style="padding:10px;  margin-top:70px; margin-bottom:70px;">
                            <div class="col-12 col-sm-6 col-md-4 text-center mb-5 mb-md-0 wow fadeInDown"
                                data-wow-delay=".5s">
                                <span
                                    class="fables-iconmap-icon fa-3x fables-main-text-color fables-second-hover-color"></span>
                                <h2 class="font-16 semi-font fables-main-text-color my-3">Address Information</h2>
                                <p class="font-14 fables-forth-text-color">
                                    123, Shanti Nagar,MG Road,Bangalore, Karnataka - 560001,India</p>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 text-center mb-5 mb-md-0 wow fadeInDown"
                                data-wow-delay=".8s">
                                <span
                                    class="fables-iconphone fa-3x fables-main-text-color fables-second-hover-color"></span>
                                <h2 class="font-16 semi-font fables-main-text-color my-3">Mail & Phone number</h2>
                                <p class="font-14 fables-forth-text-color">admin@yourwebsite.com.</p>
                                <p class="font-14 fables-forth-text-color">+890 789 678 6834</p>

                            </div>
                            <div class="col-12 col-sm-6 col-md-4 text-center mb-5 mb-md-0 wow fadeInDown"
                                data-wow-delay="1.1s">
                                <span
                                    class="fables-iconshare-icon fa-3x fables-main-text-color fables-second-hover-color"></span>
                                <h2 class="font-16 semi-font fables-main-text-color my-3">Stay In Touch</h2>
                                <ul class="nav fables-contact-social-links" style="display:flex;">
                                    <li><a href="#" target="_blank"><i
                                                class="fab fa-facebook-f fables-forth-text-color fa-fw"></i></a></li>
                                    <li><a href="#" target="_blank"><i
                                                class="fab fa-instagram fables-forth-text-color  fa-fw"></i></a></li>
                                    <li><a href="#" target="_blank"><i
                                                class="fab fa-twitter fables-forth-text-color    fa-fw"></i></a></li>
                                    <li><a href="#" target="_blank"><i
                                                class="fab fa-linkedin fables-forth-text-color   fa-fw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-0 mb-5 my-md-5"
                            style="margin-bottom:90px; margin-left:-30px; font-size:20px; font-weight:700;">

                            <p class="mt-3 fables-forth-text-color  text-center">For any questions, issues, or feedback,
                                feel free to reach out to our admin team.You can contact us via email at
                                admin@yourwebsite.com.</br>We’re available to assist you during our support hours,
                                Monday to Friday, 9:00 AM to 6:00 PM. </p>

                        </div>


                    </div>
                </div>

                <div class="row mb-4 mb-md-5 overflow-hidden" style="margin: 0 auto; max-width: 1200px;">
    <!-- Contact Admin Section -->
    <div class="col-12 col-lg-6" style="animation: fadeInLeft 1s ease-in-out;">
        <!-- Header -->
        <h3 class="text-center" style="font-size: 36px; font-weight: 700; font-family: 'Poppins', sans-serif; color: #05ce68; letter-spacing: 1px;">
            Contact Admin
        </h3>

        <!-- Donor Details -->
        <div class="donor-details" style="margin-top: 30px; padding: 20px; border: 2px solid #ddd; border-radius: 12px; background-color: #fff; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
            <h2 style="font-size: 22px; font-family: 'Poppins', sans-serif; color: #333;">
                Donor Name: 
                <span style="color: #05ce68;"><?php echo htmlspecialchars($dname); ?></span>
            </h2>
            <h2 style="font-size: 22px; font-family: 'Poppins', sans-serif; color: #333; margin-top: 15px;">
                Admin Name: 
                <span style="color: #05ce68;"><?php echo htmlspecialchars($aname); ?></span>
            </h2>
            <h2 style="font-size: 22px; font-family: 'Poppins', sans-serif; color: #333; margin-top: 15px;">
                Donor ID: 
                <span style="color: #05ce68;"><?php echo htmlspecialchars($did); ?></span>
            </h2>
        </div>

        <!-- Contact Form -->
        <form method="POST" style="margin-top: 30px;">
            <!-- Hidden fields -->
            <input type="hidden" name="name" value="<?php echo htmlspecialchars($aname); ?>">
            <input type="hidden" name="donor_name" value="<?php echo htmlspecialchars($dname); ?>">

            <!-- Submit Button -->
            <div class="form-group" style="text-align: center;">
                <button type="submit" name="contact_me" class="btn" style="padding: 12px 30px; font-size: 18px; font-weight: 600; background-color: #05ce68; color: white; border-radius: 8px; border: none; transition: background-color 0.3s ease;">
                    Contact Me
                </button>
            </div>
        </form>
    </div>

    <!-- Map Section -->
    <div class="col-12 col-lg-6" style="animation: fadeInRight 1s ease-in-out; margin-top: 30px;">
        <div id="map" data-lng="31.248848" data-lat="29.966324" data-icon="assets/custom/images/map-marker.png"
             data-zom="12" style="width: 100%; height: 420px; border-radius: 12px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        </div>
    </div>
</div>

<!-- Responsive Media Queries -->
<style>
    @media screen and (max-width: 767px) {
        .donor-details {
            padding: 15px;
            font-size: 18px;
        }
        h3 {
            font-size: 30px;
        }
        h2 {
            font-size: 20px;
        }
        button {
            width: 100%;
            font-size: 16px;
        }
    }

    @media screen and (min-width: 768px) and (max-width: 991px) {
        .donor-details {
            padding: 18px;
            font-size: 20px;
        }
        h3 {
            font-size: 34px;
        }
        button {
            padding: 12px 25px;
            font-size: 17px;
        }
    }

    @media screen and (min-width: 992px) {
        .donor-details {
            padding: 20px;
            font-size: 22px;
        }
        h3 {
            font-size: 36px;
        }
        button {
            padding: 12px 30px;
            font-size: 18px;
        }
    }
</style>

        </section>



        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="footer-charity-text">
                            <h2>HELP CHARITY</h2>
                            <p>Your generosity can transform lives. By supporting our charity, you help provide vital
                                resources like food, shelter, and education to those in need. Every donation, big or
                                small, makes a lasting impact. Join us in creating a brighter future for everyone!</p>
                            <br>
                            <br>
                            <br><br>
                            <p><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-behance" aria-hidden="true"></i></a><a href="#"><i
                                        class="fa fa-dribbble" aria-hidden="true"></i></a></p>
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
                                        <li><a href="#"><i class="material-icons"></i>1 Street, derby, FL 2147, USA</a>
                                        </li>
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
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApW03tvAPTXWd1RHJBF2Up3iJMVu1wHi4&callback=JaMap"></script>
</body>

</html>