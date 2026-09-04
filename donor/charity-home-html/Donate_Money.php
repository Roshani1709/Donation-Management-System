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
    // File Name: Donate_Money.php
    require 'db.php';
    session_start();

    // Ensure donor is logged in
    if (!isset($_SESSION['dname'])) {
        header("Location: login.php");
        exit();
    }

    $dname = $_SESSION['dname'];

    // Fetch the Donor ID based on the session name
    $donor_query = "SELECT Donor_id FROM tbldonor WHERE Donor_Name = '$dname'";
    $donor_result = mysqli_query($mysql, $donor_query);
    $donor = mysqli_fetch_assoc($donor_result);
    $donor_id = $donor['Donor_id'];

    // Process donation if confirmed
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['request_id'])) {
        $request_id = $_POST['request_id'];

        // Fetch the request details
        $query = "SELECT * FROM tblrequest_1 WHERE Request_id = '$request_id'";
        $result = mysqli_query($mysql, $query);
        $request = mysqli_fetch_assoc($result);

        if ($request) {
            $reciever_id = $request['Receiver_id'];
            $category_id = $request['Category_id'];
            $payment_amount = $request['Payment _Amount'];
            $bank_name = $request['Bank_name'];
            $bank_ifsc_code = $request['Bank_Ifsc_Code'];
            $description = $request['Description'];

            // Insert into tbldonation (specifying columns)
            $donor_query = "INSERT INTO tbldonation VALUES (null,'$donor_id', '$category_id','$reciever_id',null, 'success', 'online', '$payment_amount', '$bank_name', '$bank_ifsc_code', '$description')";

            if (mysqli_query($mysql, $donor_query)) {
                // Delete the request after successful donation
                $delete_query = "DELETE FROM tblrequest_1 WHERE Request_id = '$request_id'";
                if (mysqli_query($mysql, $delete_query)) {
                    // Donation successful, show message and redirect
                    $_SESSION['message'] = "Thank you for your donation, " . $dname . "!";
                    header("Location: donation_history.php"); // PHP redirection
                    exit();
                } else {
                    echo "<div class='alert alert-danger text-center'>There was an error deleting the request. Please try again.</div>";
                }
            } else {
                // Print the error message
                echo "<div class='alert alert-danger text-center'>There was an error processing your donation: " . mysqli_error($mysql) . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>Invalid request. Please try again.</div>";
        }
    }
    ?>

    <?php
    // Fetch all records from tblrequest
    $query = "SELECT r.*, c.Category_Name, rec.Receiver_Name 
              FROM tblrequest_1 r
              JOIN tblreceiver rec ON r.Receiver_id = rec.Receiver_id
              JOIN tblcategory c ON r.Category_id = c.Category_id";
    $result = mysqli_query($mysql, $query);

    // Check if the query executed successfully
    if (!$result) {
        die("Query failed: " . mysqli_error($mysql)); // This will output the error
    }

    // Display all donation requests
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='container mt-5'>";
        echo "<h2 style='margin-left:200px'><b>Available Donation Requests</b></h2>";
        echo "<table class='table table-bordered table-striped mt-4' style='margin-top:20px;font-weight:600;
                    font-size: 17px;'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Request ID</th>
                        <th>Receiver Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Bank Name</th>
                        <th>Bank IFSC Code</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['Request_id'] . "</td>
                    <td>" . $row['Receiver_Name'] . "</td>
                    <td>" . $row['Category_Name'] . "</td>
                    <td>" . $row['Description'] . "</td>
                    <td>" . $row['Bank_name'] . "</td>
                    <td>" . $row['Bank_Ifsc_Code'] . "</td>
                    <td>₹" . $row['Payment _Amount'] . "</td>
                    <td>" . $row['Request_Date'] . "</td>
                    <td>
                        <form method='POST' id='donate_form_" . $row['Request_id'] . "' onsubmit='return confirmDonation(" . $row['Request_id'] . ")'>
                            <input type='hidden' name='request_id' value='" . $row['Request_id'] . "'>
                            <input type='submit' class='btn btn-success' value='Donate'>
                        </form>
                    </td>
                </tr>";
        }
        echo "</tbody></table>";
        echo "</div>"; // Close container
    } else {
        echo "<div class='alert alert-warning text-center'>No requests available at this time.</div>";
    }
    ?>

    <script>
        // JavaScript to display the confirmation alert
        function confirmDonation(requestId) {
            var confirmAction = confirm("Are you sure you want to donate to this request?");
            if (confirmAction) {
                document.getElementById('donate_form_' + requestId).submit(); // Submit the form if confirmed
            }
            return false; // Prevent form submission until confirmed
        }
    </script>
</section>




        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="footer-charity-text">
                            <h2>HELP CHARITY</h2>
                            <p>Your generosity can transform lives. By supporting our charity, you help provide
                                vital
                                resources like food, shelter, and education to those in need. Every donation,
                                big or
                                small, makes a lasting impact. Join us in creating a brighter future for
                                everyone!</p>
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
                                        <li><a href="#"><i class="material-icons"></i> NANDANI VAKODIKAR</a>
                                        </li>
                                        <li><a href="#"><i class="material-icons"></i> JIYA PAREKH</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="footer-text one">
                                    <h3>CONTACT US</h3>
                                    <ul>
                                        <li><a href="#"><i class="material-icons"></i>1 Street, derby, FL 2147,
                                                USA</a>
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