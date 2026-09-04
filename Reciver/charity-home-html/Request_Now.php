<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Now</title>

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
    <title> Request now</title>
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
    <div class="container" style="margin-top: 20px; max-width: 800px;">
        <?php
        // File Name: Receiver_Money.php  
        require 'db.php';
        session_start();
        if (!isset($_SESSION['rname'])) {
            header("Location: login.php");
            exit();
        }

        $rname = $_SESSION['rname'];
        $query = "SELECT Receiver_id, Receiver_Name, Bank_Name, Bank_Ifsc_Code FROM tblreceiver WHERE Receiver_Name = '$rname' LIMIT 1";
        $res = mysqli_query($mysql, $query) or die("Failed to retrieve Receiver data.");
        $reciever = mysqli_fetch_assoc($res);
        if (!$reciever) {
            die("Receiver not found.");
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

        if (isset($_POST['requsert'])) {
            $Receiver_name = $reciever['Receiver_Name'];
            $description = $_POST['description'];
            $payment_amount = $_POST['payment_amount'];
            $bank_name = $reciever['Bank_Name'];
            $bank_ifsc_code = $reciever['Bank_Ifsc_Code'];
            $Receiver_id = $reciever['Receiver_id'];

            $category_query = "SELECT Category_id FROM tblcategory WHERE Category_Name = '$selected_category_name' LIMIT 1";
            $category_res = mysqli_query($mysql, $category_query) or die("Failed to retrieve category.");
            $category_row = mysqli_fetch_assoc($category_res);
            if (!$category_row) {
                die("Category not found.");
            }
            $category_id = $category_row['Category_id'];

            $insert_query = "INSERT INTO tblrequest_1 VALUES (null,'$Receiver_id', '$category_id', '$description', '$bank_name', '$bank_ifsc_code', '$payment_amount', CURRENT_TIMESTAMP)";

            if (mysqli_query($mysql, $insert_query)) {
                // Use JavaScript for the alert and then redirect
                echo "<script>
                alert('$rname, thank you for your request. We will try to fulfill it soon.');
                setTimeout(function() {
                    window.location.href = 'Request_History.php';
                }, 1000); 
              </script>";
                exit(); // Exit after echoing the script to prevent further execution
            } else {
                die("Error: " . mysqli_error($mysql));
            }
        }
        ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white text-center">
                        <h2 style="font-size: 5rem;">Request Money</h2>
                    </div>
                    <div class="card-body" style="margin-top:30px">
                        <form method="POST">
                            <div class="form-group row mb-4">
                                <label class="col-sm-4 col-form-label font-weight-bold" style="font-size: 2rem;">Receiver Name</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $reciever['Receiver_Name']; ?>" style="font-size: 1.5rem;">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-sm-4 col-form-label font-weight-bold" style="font-size: 2rem;">Category Name</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $selected_category_name; ?>" style="font-size: 1.5rem;">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-sm-4 col-form-label font-weight-bold" style="font-size: 2rem;">Description</label>
                                <div class="col-sm-8">
                                    <textarea name="description" id="description" class="form-control" rows="4" style="font-size: 1.5rem; padding: 15px;"><?php echo $description; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-sm-4 col-form-label font-weight-bold" style="font-size: 2rem;">Bank Name</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $reciever['Bank_Name']; ?>" style="font-size: 1.5rem;">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-sm-4 col-form-label font-weight-bold" style="font-size: 2rem;">Bank IFSC Code</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $reciever['Bank_Ifsc_Code']; ?>" style="font-size: 1.5rem;">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-sm-4 col-form-label font-weight-bold" style="font-size: 2rem;">Payment Amount</label>
                                <div class="col-sm-8">
                                    <input type="number" name="payment_amount" class="form-control" placeholder="Enter Amount" required style="font-size: 1.5rem; padding: 15px;">
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" name="requsert" value="Request" class="btn btn-success btn-lg" style="font-size: 1.5rem; padding: 15px 30px;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer" style="margin-top:40px">
            <div class="container" >
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