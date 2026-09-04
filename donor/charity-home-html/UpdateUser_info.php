<?php
ob_start();
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
    <title> Update user info</title>
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
                                            aria-haspopup="true" aria-expaunded="false">,
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

        <?php 
// Edit_Manage_Profile.php 
require 'db.php'; 
session_start();

if (!isset($_SESSION['dname'])) {
    header("Location: login.php");
    exit();
}
?>
<?php 
$dname = $_SESSION['dname'];

if(isset($dname)) {
    $q = "SELECT * FROM tbldonor WHERE Donor_Name='$dname'";
    $res = mysqli_query($mysql, $q) or die("Failed!!!" . mysqli_error($mysql)); 
    $r = mysqli_fetch_array($res);       
}
?>
<div class="container" style="margin:30px 430px; width: 100%; height: 400px;">
<div class="row my-4 my-lg-5">
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
        <p class="font-20 semi-font fables-main-text-color mt-4 mb-4 mb-lg-5" style="font-size: 50px; font-weight: bold;">Update Profile</p>
        
        <form style="background-color: #f8f9fa; border-radius: 10px; padding: 30px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <div class="form-group">
                <div class="input-icon">
                    <input type="text"
                        class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                        placeholder="User Name" name="dname" value="<?php echo htmlspecialchars($r['Donor_Name']); ?>"
                        style="height: 50px; font-size: 20px; font-weight: 600;" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon">
                    <input type="email"
                        class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                        name="email" placeholder="Email"
                        style="height: 50px; font-size: 20px; font-weight: 600;"
                        value="<?php echo htmlspecialchars($r['Email']); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon">
                    <input type="text"
                        class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                        name="pno" placeholder="Phone Number"
                        style="height: 50px; font-size: 20px; font-weight: 600;"
                        value="<?php echo htmlspecialchars($r['Contact_Number']); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon">
                    <input type="text"
                        class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                        name="bname" placeholder="Bank Name"
                        style="height: 50px; font-size: 20px; font-weight: 600;"
                        value="<?php echo htmlspecialchars($r['Bank_Name']); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon">
                    <input type="text"
                        class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                        name="bcode" placeholder="Bank IFSC Code"
                        style="height: 50px; font-size: 20px; font-weight: 600;"
                        value="<?php echo htmlspecialchars($r['Bank_Ifsc_Code']); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon">
                    <input type="text"
                        class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                        name="qus" placeholder="Security Question"
                        style="height: 50px; font-size: 20px; font-weight: 600;"
                        value="<?php echo htmlspecialchars($r['Security_Question']); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon">
                    <input type="text"
                        class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                        name="ans" placeholder="Security Answer"
                        style="height: 50px; font-size: 20px; font-weight: 600;"
                        value="<?php echo htmlspecialchars($r['Security_Answers']); ?>" required>
                </div>
            </div>
            <button type="submit"
                class="btn btn-block rounded-0 white-color font-16 semi-font py-3"
                style="font-size: 20px; background-color: #5cb85c; border: none; color: white; transition: background-color 0.3s;"
                name="update">Submit</button>
        </form>
    </div>
</div>

<?php 
if (isset($_REQUEST['update'])) {
    // Fetching form values
    $dname_new = $_REQUEST['dname'];
    $email = $_REQUEST['email'];
    $pno = $_REQUEST['pno'];
    $bname = $_REQUEST['bname'];
    $bcode = $_REQUEST['bcode'];
    $qus = $_REQUEST['qus'];
    $ans = $_REQUEST['ans'];

    $q = "UPDATE tbldonor 
                 SET Donor_Name='$dname_new', Email='$email', Contact_Number='$pno',
                     Bank_Name='$bname', Bank_Ifsc_Code='$bcode', Security_Question='$qus', Security_Answers='$ans'
                 WHERE Donor_Name='$dname'";

            
           
    if (mysqli_query($mysql, $q)) {
        $_SESSION['dname'] = $dname_new;
        echo "<script>alert('$dname your profile edit sucessfully');</script>";
            header("Doner_Home.php");;

    } else {
        echo "Error updating profile: " . mysqli_error($mysql);
    }
}
?>
        </section>



        <footer class="footer" style="margin-top:300px">
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
