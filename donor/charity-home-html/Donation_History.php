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
    <?php
    // Donation_History.php
    require 'db.php';
    session_start();

    if (!isset($_SESSION['dname'])) {
        header("Location: login.php");
        exit();
    }

    $dname = $_SESSION['dname'];
    $records_per_page = 5; // Changed to 5 for better user experience

    $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $start_from = ($current_page - 1) * $records_per_page;

    // Get total records
    $total_records_query = "SELECT COUNT(*) FROM tbldonation d 
                JOIN tbldonor don ON d.Donor_id = don.Donor_id 
                WHERE don.Donor_Name = '$dname'";
    $total_records_result = mysqli_query($mysql, $total_records_query);

    // Check for errors in the total records query
    if (!$total_records_result) {
        die("Error in query: " . mysqli_error($mysql));
    }

    $total_records = mysqli_fetch_array($total_records_result)[0];
    $total_pages = ceil($total_records / $records_per_page);

    // Fetch records for the current page
    $query = "SELECT d.*, dn.Donor_Name, r.Receiver_Name, c.Category_Name
          FROM tbldonation d
          JOIN tblcategory c ON d.Category_id = c.Category_id
          JOIN tbldonor dn ON d.Donor_id = dn.Donor_id
          LEFT JOIN tblreceiver r ON r.Receiver_id = d.Receiver_id 
          WHERE dn.Donor_Name = '$dname'
          LIMIT $start_from, $records_per_page";

    $result = mysqli_query($mysql, $query);

    // Check for errors in the main query
    if (!$result) {
        die("Error in query: " . mysqli_error($mysql));
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='container mt-5'>";
        echo "<h2 style='margin-right:100px;'><b>Donation History </b></h2>";
        echo "<table class='table table-striped table-bordered mt-4' style='margin-top:20px;font-weight:600;
                font-size: 17px;'>";
        echo "
        <thead class='thead-dark'>
            <tr>
                <th>Donation ID</th>
                <th>Donor Name</th>
                <th>Category Name</th>
                <th>Receiver Name</th>
                <th>Donation Date</th>
                <th>Status</th>
                <th>Payment Type</th>
                <th>Payment Amount</th>
                <th>Bank Name</th>
                <th>Bank IFSC Code</th>
                <th>Description</th>
                <th>Download Recipt</th>
            </tr>
        </thead>
        <tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['Donation_id']}</td>
                <td>{$row['Donor_Name']}</td>
                <td>{$row['Category_Name']}</td>
                <td>" . ($row['Receiver_Name'] ? $row['Receiver_Name'] : 'N/A') . "</td>
                <td>{$row['Donation_Date']}</td>
                <td>{$row['Status']}</td>
                <td>{$row['Payment_Type']}</td>
                <td>{$row['Payment_Amount']}</td>
                <td>{$row['Bank_Name']}</td>
                <td>{$row['Bank_Ifsc_Code']}</td>
                <td>{$row['Description']}</td>
                <td><a href='Recipt.php?aid={$row['Donation_id']}'><img src='download.png' height='60px' width='60px' style='margin-left:32px;'></a></td>
              </tr>";
        }

        echo "</tbody></table>";

        // Pagination label
        echo "<div class='text-center mb-3'>";
        echo "<span>Showing " . ($start_from + 1) . " to " . min($start_from + $records_per_page, $total_records) . " of $total_records records</span>";
        echo "</div>";

        // Pagination controls
        echo "<div class='pagination justify-content-center mt-4'>";

        if ($current_page > 1) {
            echo "<a class='btn btn-primary' href='Donation_History.php?page=1'>First</a> ";
            echo "<a class='btn btn-secondary' href='Donation_History.php?page=" . ($current_page - 1) . "'>Previous</a> ";
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $current_page) {
                echo "<span class='btn btn-light disabled'>$i</span> ";
            } else {
                echo "<a class='btn btn-outline-primary' href='Donation_History.php?page=$i'>$i</a> ";
            }
        }

        if ($current_page < $total_pages) {
            echo "<a class='btn btn-secondary' href='Donation_History.php?page=" . ($current_page + 1) . "'>Next</a> ";
            echo "<a class='btn btn-primary' href='Donation_History.php?page=$total_pages'>Last</a>";
        }

        echo "</div><br>";
        echo "</div>";
    } else {
        echo "<div class='container mt-5'><h3 class='text-center'>No donation history found.</h3></div>";
    }
    ?>
</section>





        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="footer-charity-text">
                            <h2>HELP CHARITY</h2>
                            <p>Your generosity can transform lives. By supporting our charity, you help provide vital
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
                <p>Copyrig
                    ht @ 2017 <a href="#">kindness corner</a> | All Rights Reserved </p>
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