<?php ob_start(); ?>
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
    <title>user feedback</title>
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
        <section>
    <div class="container" style="margin:70px auto; width: 100%; max-width: 500px;">
        <div class="row my-4 my-lg-5">
            <div class="col-12 text-center">
            <p style="font-size: 50px; margin-bottom: 30px; font-family: 'Arial, sans-serif'; font-weight: bold; color: #333; letter-spacing: 1.5px;">
                    Feedback
                </p>

                <form>
                    <div class="form-group">
                        <div class="input-icon">
                            <input type="text" 
                                   class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input" 
                                   placeholder="Username" 
                                   name="uname" 
                                   style="height: 50px; font-size: 20px; font-weight: 600;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-icon">
                            <input type="number" min="1" max="5" 
                                   class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input" 
                                   placeholder="Rating (1-5)" 
                                   name="rating" 
                                   style="height: 50px; font-size: 20px; font-weight: 600;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-icon">
                            <textarea class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input" 
                                      placeholder="Enter comments" 
                                      name="comments" 
                                      style="height: 100px; font-size: 20px; font-weight: 600;" required></textarea>
                        </div>
                    </div>

                    <button type="submit" 
        class="btn btn-block rounded-0 white-color font-16 semi-font py-3" 
        style="font-size: 20px; background-color: #05ce68;" 
        name="Submit">Submit</button>

                </form>
            </div>
        </div>
    </div>
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

<?php
// feedback.php
require 'db.php';
session_start();

// Check if 'dname' is present in the session
if (!isset($_SESSION['rname'])) {
    header("Location: login.php");
    exit();
}
$rname = $_SESSION['rname'];

// Fetch the Donor_id based on the donor's name
$query = "SELECT Receiver_id FROM tblreceiver WHERE Receiver_Name = '$rname'";
$result = mysqli_query($mysql, $query);

if (!$result) {
    die("Error fetching donor: " . mysqli_error($mysql));
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $rid = $row['Receiver_id'];

    // Check if the form was submitted
    if (isset($_REQUEST['Submit'])) {
        $ratting = $_REQUEST['ratting'];
        $commentsc = $_REQUEST['comments'];

        // Corrected INSERT query
        $query = "INSERT INTO tblfeedback VALUES (null,null, '$ratting', '$commentsc', Null,'$rid')";

        // Execute the query and handle errors
        if (mysqli_query($mysql, $query)) {
            // Success message
            echo "<script>alert('Thank you $rname for your feedback');</script>";
            header("refresh:3;url=Receiver_Home.php");
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
