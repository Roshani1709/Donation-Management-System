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
    <title>Donation history</title>
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
    <body class="wrapper">
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
            <?php
            // File Name: Add_Donate_Money.php 
            require 'db.php';
            session_start();
            if (!isset($_SESSION['dname'])) {
                header("Location: login.php");
                exit();
            }

            $dname = $_SESSION['dname'];
            $query = "SELECT Donor_id, Donor_Name, Bank_Name, Bank_Ifsc_Code FROM tbldonor WHERE Donor_Name = '$dname' LIMIT 1";
            $res = mysqli_query($mysql, $query) or die("Failed to retrieve donor data.");
            $donor = mysqli_fetch_assoc($res);
            if (!$donor) {
                die("Donor not found.");
            }

            $selected_category_name = '';
            $description = '';
            if (isset($_SESSION['category_name'])) {
                $selected_category_name = $_SESSION['category_name'];

                // Fetching the category name and description from the category table
                $category_query = "SELECT Category_Name, Description FROM tblcategory WHERE Category_Name = '$selected_category_name' LIMIT 1";
                $category_res = mysqli_query($mysql, $category_query) or die("Failed to retrieve category details.");
                $category_row = mysqli_fetch_assoc($category_res);

                if ($category_row) {
                    $selected_category_name = $category_row['Category_Name'];
                    $description = $category_row['Description'];
                } else {
                    die("Category not found.");
                }
            }

            if (isset($_POST['donate'])) {
                $donor_name = $donor['Donor_Name'];
                $description = $_POST['description'];
                $status = 'Success';
                $payment_type = 'online';
                $payment_amount = $_POST['payment_amount'];
                $bank_name = $donor['Bank_Name'];
                $bank_ifsc_code = $donor['Bank_Ifsc_Code'];
                $donor_id = $donor['Donor_id'];

                $category_query = "SELECT Category_id FROM tblcategory WHERE Category_Name = '$selected_category_name' LIMIT 1";
                $category_res = mysqli_query($mysql, $category_query) or die("Failed to retrieve category.");
                $category_row = mysqli_fetch_assoc($category_res);
                if (!$category_row) {
                    die("Category not found.");
                }
                $category_id = $category_row['Category_id'];

                $insert_query = "INSERT INTO tbldonation VALUES (null,'$donor_id','$category_id',null ,CURRENT_TIMESTAMP,'$status','$payment_type', '$payment_amount','$bank_name', '$bank_ifsc_code','$description')";
                if (mysqli_query($mysql, $insert_query)) {
                    // Show SweetAlert after successful donation
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                    echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Donation Complete!',
                text: 'Thank you for your donation of $payment_amount!',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'Donation_History.php'; // Redirect to donation history
                }
            });
        </script>";
                    exit();
                } else {
                    die("Error: " . mysqli_error($mysql));
                }
            }
            ?>
            <style>
                body {
                    background-color: #f8f9fa;
                }

                .container {
                    margin-top: 30px;
                }

                .form-title {
                    text-align: center;
                    margin-bottom: 20px;
                }

                .table {
                    background-color: #fff;
                    border-radius: 5px;
                    overflow: hidden;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    font-weight:700;
                    font-size: 20px;
                }

                th,
                td {
                    padding: 15px;
                    text-align: left;
                }

                .btn-custom {
                    background-color: lightgreen;
                    color: white;
                    font-weight: bold;
                }
            </style>
            <div class="container">
                <h2 align="center"style="font-size: 50px; margin-bottom: 30px; font-family: 'Arial, sans-serif'; font-weight: bold; color: #333; text-transform: uppercase; letter-spacing: 1.5px;"><b>Donate Now </b></h2>
                <form method="POST" style="margin-top:30px">
                    <div class="table-responsive" style="width:800px;margin-left:300px;">
                        <table class="table table-bordered">
                            <tr>
                                <td>Donor Name</td>
                                <td><?php echo $donor['Donor_Name']; ?></td>
                            </tr>
                            <tr>
                                <td>Category Name</td>
                                <td><?php echo $selected_category_name; ?></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><textarea name="description" id="description" cols="30" rows="5"
                                        required><?php echo $description; ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Payment Type</td>
                                <td>Online</td>
                            </tr>
                            <tr>
                                <td>Bank Name</td>
                                <td><?php echo $donor['Bank_Name']; ?></td>
                            </tr>
                            <tr>
                                <td>Bank IFSC Code</td>
                                <td><?php echo $donor['Bank_Ifsc_Code']; ?></td>
                            </tr>
                            <tr>
                                <td>Payment Amount</td>
                                <td><input type="number" name="payment_amount" placeholder="Enter Amount" required
                                        min="1"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="donate" value="Donate" class="btn btn-custom" style="margin-left:380px">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
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
</bod>

</html>