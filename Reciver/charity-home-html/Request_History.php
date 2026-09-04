<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request History</title>

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
    <title> Change Password</title>
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
            <div class="container" style="margin:50px 50px; width: 100%; height: 100%;">
            <?php
session_start();

// Check if session variable is set
if (!isset($_SESSION['rname'])) {
    header("Location: login.php");
    exit();
}

$rname = $_SESSION['rname']; // Correctly setting $rname from the session

require "db.php";

// Default values for pagination
$limit = 5; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($page - 1) * $limit; // Offset for SQL query

// SQL query with LIMIT and OFFSET for pagination
$q = "SELECT rq.*, r.Receiver_Name, c.Category_Name 
      FROM tblrequest_1 AS rq
      INNER JOIN tblreceiver AS r ON rq.Receiver_id = r.Receiver_id
      INNER JOIN tblcategory AS c ON rq.Category_id = c.Category_id
      WHERE r.Receiver_Name = '$rname'
      LIMIT $limit OFFSET $offset";

$res = mysqli_query($mysql, $q);

// Check if the query was successful
if (!$res) {
    die("Query failed: " . mysqli_error($mysql));
}

$nor = mysqli_num_rows($res);

if ($nor > 0) {
    // Table styling
    echo "<h2 style='margin-right:100px;margin-bottom:50px' align='Center'><b>Request History </b></h2>";
    echo "<table style='margin: auto; border-collapse: collapse; width: 80%;' border='2'>"; 
    echo "<tr style='background-color: #f2f2f2;'>
            <th style='padding: 10px; text-align: center;'>Receiver Name</th>
            <th style='padding: 10px; text-align: center;'>Category Name</th>
            <th style='padding: 10px; text-align: center;'>Description</th>
            <th style='padding: 10px; text-align: center;'>Bank Name</th>
            <th style='padding: 10px; text-align: center;'>Bank IFSC Code</th>
            <th style='padding: 10px; text-align: center;'>Payment Amount</th>
            <th style='padding: 10px; text-align: center;'>Request Date</th>
            <th style='padding: 10px; text-align: center;'>Cancle Request</th>
          </tr>";
    
    while ($r = mysqli_fetch_array($res)) {
        echo "<tr>
                <td style='padding: 10px; text-align: center;'>{$r['Receiver_Name']}</td>
                <td style='padding: 10px; text-align: center;'>{$r['Category_Name']}</td>
                <td style='padding: 10px; text-align: center;'>{$r['Description']}</td>
                <td style='padding: 10px; text-align: center;'>{$r['Bank_name']}</td>
                <td style='padding: 10px; text-align: center;'>{$r['Bank_Ifsc_Code']}</td>
                <td style='padding: 10px; text-align: center;'>{$r['Payment _Amount']}</td>
                <td style='padding: 10px; text-align: center;'>{$r['Request_Date']}</td>
                <td><a href='Delete_Request.php?aid={$r[0]}' style='color:red; font-size:20px;'><center>Cancle</center></a></td>
              </tr>";
    }
    echo "</table>"; 

    // Pagination
    $total_q = "SELECT COUNT(*) FROM tblrequest_1 AS rq
                INNER JOIN tblreceiver AS r ON rq.Receiver_id = r.Receiver_id
                INNER JOIN tblcategory AS c ON rq.Category_id = c.Category_id
                WHERE r.Receiver_Name = '$rname'";
    $total_res = mysqli_query($mysql, $total_q);
    $total_rows = mysqli_fetch_array($total_res)[0];
    $total_pages = ceil($total_rows / $limit);

    // Display pagination links with styling
    echo "<div style='text-align:center; margin-top: 20px;'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?page=$i' style='margin: 0 5px; text-decoration: none; color: blue;'>$i</a> ";
    }
    echo "</div>";
} else {
    echo "<p style='text-align: center;'>No requests found.</p>";
}

if(isset($_REQUEST['dmsg'])){
    echo "<script>alert('Money request cancle successfully.')</script>";
}
?>

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