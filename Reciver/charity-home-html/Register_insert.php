<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registeration of Donor</title>

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
</head>

<body>
    <section>
        <div class="container">
            <div class="row my-4 my-lg-5">
                <div class="col-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3 text-center"
                    style="margin:100px 300px; width: 800px; height: 100%;">
                    <p class="font-20 semi-font fables-main-text-color mt-4 mb-5" style="font-size:50px">Create a new
                        account</p><br><br>
                    <form method="post">
                        <div class="form-row form-group">
                            <div class="form-group">
                                <div class="input-icon">
                                    <input type="text"
                                        class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                                        placeholder="Enter Your Name" name="rname"
                                        style="height:30px; font-size:20px; font-weight:600;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <input type="email" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                                    placeholder="Email" name="email"
                                    style="height:30px; font-size:20px; font-weight:600;">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="input-icon">

                                <input type="password"
                                    class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                                    placeholder="Password" name="pass"
                                    style="height:30px; font-size:20px; font-weight:600;">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="input-icon">

                                <input type="text" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                                    placeholder="Enter Bank Name" name="bname"
                                    style="height:30px; font-size:20px; font-weight:600;">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">

                                <input type="text" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                                    placeholder="Enter Bank IFSC Code" name="bcode"
                                    style="height:30px; font-size:20px; font-weight:600;">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <input type="text" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                                    placeholder="Enter Security Question" name="quetion"
                                    style="height:30px; font-size:20px; font-weight:600;">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <input type="text" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"
                                    placeholder="Enter Security Answer" name="answer"
                                    style="height:30px; font-size:20px; font-weight:600;">
                            </div>
                        </div><br>
                        <button type="submit"
                            class="btn btn-block rounded-0 white-color fables-main-hover-background-color fables-second-background-color font-16 semi-font py-3"
                            name="Register" style="font-size:20px">Register Now</button><br>
                        <p class="fables-forth-text-color" style="font-size:20px">Already have an account ? <a
                                href="login.php"
                                class="font-16 semi-font fables-second-text-color underline fables-main-hover-color ml-2"
                                style="font-size:20px">Login</a></p>
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
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApW03tvAPTXWd1RHJBF2Up3iJMVu1wHi4&callback=JaMap"></script>
</body>

</html>
<?php
if (isset($_REQUEST["Register"])) {
    $rname = $_REQUEST["rname"];
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["pass"];
    $bname = $_REQUEST["bname"];
    $bcode = $_REQUEST["bcode"];
    $quetion = $_REQUEST["quetion"];
    $answer = $_REQUEST["answer"];

    // Include the database connection
    require "db.php";

    // SQL query
    $q = "INSERT INTO tblreceiver (Receiver_Name,Email,Password,Created_Date,Bank_Name,Bank_Ifsc_Code,Security_Question,Security_Answers)VALUES ('$rname', '$email', '$pass', null, '$bname', '$bcode', '$quetion', '$answer')";

    // Execute the query and check for errors
    if ($res = mysqli_query($mysql, $q)) {
        echo "<script>alert('Your Account Created successfully');</script>";
        header("Location: login.php");
        exit(); // Ensure that the script ends after redirection
    } else {
        die("Error in query: " . mysqli_error($mysql));
    }
}
?>