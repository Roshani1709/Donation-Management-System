<?php
// File Name: Login.php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donar login</title>

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
    <section>
        <div class="container" style="margin:200px 430px; width: 100%; height: 100%;">
            <div class="row my-4 my-lg-5">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
                    <p class="font-20 semi-font fables-main-text-color mt-4 mb-4 mb-lg-5" style="font-size:50px">Sign In As Donar </p>
                    </br>
                    <form style="height:90px;">
                        <div class="form-group">
                            <div class="input-icon">
                                <input type="text" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input" placeholder="Enter User Name" name="dname" style="height:50px; font-size:20px; font-weight:600;" value="<?php if (isset($_COOKIE['donor_name'])) echo $_COOKIE['donor_name']; ?>">
                            </div>

                        </div> 
                        <div class="form-group">
                            <div class="input-icon">

                                <input type="password" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input" placeholder="Enter Password" name="pwd" style="height:50px; font-size:20px; font-weight:600;" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
                            </div>
                            <div class="form-group">
                                <div>
                                    <input type="checkbox" name="remember" id="remember">Remember Me

                                </div>


                            </div>
                            <button type="submit" class="btn btn-block rounded-0 white-color fables-main-hover-background-color fables-second-background-color font-16 semi-font py-3" style="font-size:20px" name="login">Sign in</button><br><br>
                            <a href="Forgotpassword.php" class="fables-forth-text-color font-16 fables-second-hover-color underline mt-3 mb-4 m-lg-5 d-block" style="font-size:20px">Forgot Password ?</a><br><br>
                            <p class="fables-forth-text-color" style="font-size:20px">Dont have an account ? <a href="Register_insert.php" class="font-16 semi-font fables-second-text-color underline fables-main-hover-color ml-2" style="font-size:20px">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
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

<?php

if (isset($_REQUEST['login'])) {
    $dname = $_REQUEST['dname'];
    $pwd = $_REQUEST['pwd'];
    require "db.php";
    $q = "SELECT * FROM  tbldonor WHERE Donor_Name = '$dname' AND Password = '$pwd'";
    $res = mysqli_query($mysql, $q);
    $r = mysqli_num_rows($res);
    if ($r > 0) {
        if (isset($_REQUEST['remember'])) {
            setcookie('donor_name', $dname, time() + 15 * 24 * 60 * 60);
            setcookie('password', $pwd, time() + 15 * 24 * 60 * 60);
        }

        $_SESSION['dname'] = $dname;
        header("Location: Doner_Home.php");
        exit();
    } else {
        die("<script>alert('Invalid username or password');</script>");
    }
}
?>  