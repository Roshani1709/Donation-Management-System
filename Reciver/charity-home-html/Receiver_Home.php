<?php
session_start();
if (!isset($_SESSION['rname'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha384-DyZv81X3Q6fG1ZT/cv4zr6zwTEfW0U4tQhOR6Yxg8wTcPLvl10gZ6MLi3Ab18Zm" crossorigin="anonymous">

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
    <title> About us</title>
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
                                <ul class="nav navbar-nav" style="margin-top:-120px">
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
                                            <i class="fas fa-user-circle">User</i> <!-- User icon -->
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
        <section class="carosal-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class=""><!--client owl-carousel owl-theme-->
                            <div class="item">
                                <div class="text" style="margin-top:-60px">
                                    <h3>SOMEONE NEED YOUR HELP</h3>
                                    <p>Your help can change others life and because of your support can change their
                                        dreams.<br> HOPE, SUPPORT, BELIVE, DONATE</p>
                                    <h5 class="white-button"><a href="Donate_Money.php">DONATE NOW</a></h5>
                                    <h5><a href="Contact_Me.php">CONTACT US</a></h5>
                                </div>
                            </div>
                            <!-- <div class="item">
                            <div class="text">
                                <h3>CHILDREN NEED YOUR HELP</h3>
                                <p>Same children do not studied just because they have not money</P>
                                <h5 class="white-button"><a href="Donate_Money.php">DONATE NOW</a></h5>
                                <h5><a href="Contact_Me.php">CONTACT US</a></h5>
                            </div>
                        </div>
                        <div class="item">
                            <div class="text">
                                <h3>SOMEONE NEED YOUR HELP</h3>
                                <p>Your help can change others life and because of your support can change their
                                    dreams.<br> HOPE, SUPPORT, BELIVE, DONATE</p>
                                <h5 class="white-button"><a href="Donate_Money.php">DONATE NOW</a></h5>
                                <h5><a href="Contact_Me.php">CONTACT US</a></h5>
                            </div>
                        </div>
                        <div class="item">
                            <div class="text">
                                <h3>CHILDREN NEED YOUR HELP</h3>
                                <p>Same children do not studied just because they have not money</P>
                                <h5 class="white-button"><a href="Donate_Money.php">DONATE NOW</a></h5>
                                <h5><a href="Contact_Me.php">CONTACT US</a></h5>
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="our_activity">
            <h2 align="center">OUR ACTIVITY</h2>
            <p align="center">"Pain itself, pain is the most important thing, but I give up on the great pain that makes
                me so great."</p>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="single-Promo">
                            <div class="promo-icon">
                                <i class="material-icons">near_me</i>
                            </div>
                            <h2 align="center"><a href="#">Fundraising</a></h2>
                            <p>Pain itself, sit down, is connected with the elite of advertising. But by the exercise of
                                time, they run into labor and pain greatly. For indeed, to reduce inconvenience, who..."
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="single-Promo">
                            <div class="promo-icon">
                                <i class="material-icons">favorite</i>
                            </div>
                            <h2 align="center"><a href="#">Volunteering</a></h2>
                            <p>Pain itself, sit down, is connected with the elite of advertising. But by the exercise of
                                time, they run into labor and pain greatly. For indeed, to reduce inconvenience, who..."
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="single-Promo">
                            <div class="promo-icon">
                                <i class="material-icons">dashboard</i>
                            </div>
                            <h2 align="center"><a href="#">Our Programs</a></h2>
                            <p>Pain itself, sit down, is connected with the elite of advertising. But by the exercise of
                                time, they run into labor and pain greatly. For indeed, to reduce inconvenience, who..."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section class="donate_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 for-padding">
                    <h4>URGENT CAUSE</h4>
                    <h3>Recent Environmental Disasters</h3>
                    <p>"Pain itself is important; it is pain that will give birth to some great pain, and the result will be followed by the pains of this pain, which will be released from labor and pain. For to do so is to engage in any exercise, but the labor of pain is to be carried out, unless the pain of some benefit is to be gained from it." </p>
                    <div class="progress-text">
                        <p class="progress-top">50%</p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                aria-valuemax="100" style="width:50%"></div>
                        </div>
                        <p class="progress-left">Raised: $1200</p>
                        <p class="progress-right">Goal: $2400</p>
                    </div>
                    <h2><a href="Donate_Money.php">DONATE NOW</a></h2>
                </div>
            </div>
        </div>
    </section> -->
        <section class="events_section_area">
            <h2 align="center">UPCOMING EVENTS</h2>
            <p align="center">"Pain itself is important, it is pain that will give birth to some great pleasure, and the
                result will be followed by the pains of this pain, which will be released from labor and pain.". </p>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="events_single">
                            <img src="img/events_single_one.jpg" alt="">
                            <p><span class="event_left"><i class="material-icons">access_time</i>1:00 pm - 3:00
                                    pm</span><span class="event_right"><i
                                        class="material-icons">location_on</i>California
                                    Street</span></p>
                            <div class="clear"></div>
                            <h3>Education For Children</h3>
                            <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h6>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="events_single">
                            <img src="img/events_single_two.jpg" alt="">
                            <p><span class="event_left"><i class="material-icons">access_time</i>1:00 pm - 3:00
                                    pm</span><span class="event_right"><i
                                        class="material-icons">location_on</i>California
                                    Street</span></p>
                            <h3>Education For Children</h3>
                            <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h6>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="events_single">
                            <img src="img/events_single_three.jpg" alt="">
                            <p><span class="event_left"><i class="material-icons">access_time</i>1:00 pm - 3:00
                                    pm</span><span class="event_right"><i
                                        class="material-icons">location_on</i>California
                                    Street</span></p>
                            <h3>Education For Children</h3>
                            <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- <div class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                    <div class="block">
                        <p><i class="material-icons">favorite</i></p>
                        <p class="counter-wrapper"><span class="fb"></span></p>
                        <p class="text-block">CAUSES</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                    <div class="block">
                        <p><i class="material-icons">language</i></p>
                        <p class="counter-wrapper"><span class="code"></span></p>
                        <p class="text-block">PLACES</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                    <div class="block">
                        <p><i class="material-icons">person_add</i></p>
                        <p class="counter-wrapper"><span class="bike"></span></p>
                        <p class="text-block">VOLUNTEERS</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 for-border">
                    <div class="block">
                        <p><i class="material-icons">people</i></p>
                        <p class="counter-wrapper"><span class="coffee"></span></p>
                        <p class="text-block">SAVED</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
        <sectio class="our_cuauses">
            <h2><b>OUR CAUSES</b></h2>
            <p align="center">"Pain itself is important, it is pain that gives rise to some great pleasure, and it will
                be followed by labor and pain." </p>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                         <div class=""><!--our_cuauses_single owl-carousel owl-theme -->
                            <?php
                            // File Name: View_Categories.php 
                            require 'db.php';
                            ?>

                            <link rel="stylesheet" href="../Include/bootstrap.min.css">
                            <style>
                                .card {
                                    transition: transform 0.2s;
                                    height: 100%;
                                    display: flex;
                                    flex-direction: column;
                                }

                                .card:hover {
                                    transform: scale(1.05);
                                }

                                .card-body {
                                    flex-grow: 1;
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: space-between;
                                }

                                .card-title {
                                    color: #05ce68;
                                    font-weight: 700;
                                    font-size: 25px;
                                    padding: 10px;
                                }

                                .card-text {
                                    font-weight: bold;
                                }

                                .btn-custom {
                                    background-color: #05ce68;
                                    color: #fff;
                                    width: 100%;
                                    text-align: center;
                                }

                                .container {
                                    margin-top: 20px;
                                    margin-bottom: 20px;
                                }

                                .col-md-4 {
                                    margin-bottom: 20px;
                                    padding: 0 20px;
                                }

                                .pagination {
                                    margin-left: 800px;
                                }
                            </style><br>

                            <?php
                            // Check if form data has been submitted to store in session
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['image']) && isset($_POST['details'])) {
                                // Store category data in the session
                                $_SESSION['category_name'] = $_POST['name'];
                                $_SESSION['category_image'] = $_POST['image'];
                                $_SESSION['category_details'] = $_POST['details'];

                                // Redirect to the donation page
                                header('Location: ADD_Donate_Money.php');
                                exit();
                            }

                            // Pagination setup
                            $limit = 6; // Number of categories per page
                            $page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Current page
                            $offset = ($page - 1) * $limit; // Calculate offset for SQL query
                            
                            // Fetch total categories count
                            $total_query = "SELECT COUNT(*) as total FROM tblcategory";
                            $total_result = mysqli_query($mysql, $total_query);
                            $total_row = mysqli_fetch_assoc($total_result);
                            $total_categories = $total_row['total'];

                            // Calculate total pages
                            $total_pages = ceil($total_categories / $limit);

                            // Fetch and display categories from the database
                            $q = "SELECT * FROM tblcategory LIMIT $limit OFFSET $offset";
                            $res = mysqli_query($mysql, $q) or die('Query Failed!!!' . mysqli_error($mysql));
                            $nor = mysqli_num_rows($res);

                            if ($nor > 0) {
                                echo "<div class='container'><div class='row g-3'>";
                                $counter = 0;
                                while ($r = mysqli_fetch_array($res)) {
                                    echo "<div class='col-md-4'>
                <div class='card' style='font-weight:400; font-size: 17px;'>
                    <img src='$r[3]' class='card-img-top' alt='$r[1]' height='400px'>
                    <div class='card-body'>
                        <h5 class='card-title'>$r[1]</h5>
                        <p class='card-text'>$r[2]</p>
                        <form method='POST'>
                            <input type='hidden' name='name' value='$r[1]'>
                            <input type='hidden' name='image' value='$r[3]'>
                            <input type='hidden' name='details' value='$r[2]'>
                            <button type='submit' class='btn btn-custom'>Donate Now</button>
                        </form>
                    </div>
                </div>
              </div>";
                                    //$counter++;
                                }
                                echo "</div></div>";

                                // Display pagination links
                                //echo "<nav aria-label='Page navigation'>
                //<ul class='pagination'>";
                               
                               for ($i = 1; $i <= $total_pages; $i++) {
                                    echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'>
                    <a class='page-link' href='View_Categories.php?page=$i'>$i</a>
                  </li>";
                                }
                                echo "</ul>
              </nav>";
                            } else {
                                echo "<p class='text-center'>No categories found.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <section class="letast_news">
                <h2 align="center">latest news</h2>
                <p align="center">"Pain itself is important, it is pain that gives rise to some great pleasure, and it
                    will be followed by labor and pain."</p>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single_news">
                                <img src="img/news_images_1.jpg" alt="">
                                <div class="texts">
                                    <p class="date"><a href="#">30 May, 2017</a></p>
                                    <h3>Wood Work Adds Value To <br> Your Property Five</h3>
                                    <p class="test">"Pain itself, because it is pain, is loved; but those who exercise
                                        it to obtain some benefit, no one rejects, dislikes, or avoids pleasure itself,
                                        because it is pleasure."</p>
                                    <h3><a href="#">READ MORE</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single_news">
                                <img src="img/news_images_2.jpg" alt="">
                                <div class="texts">
                                    <p class="date"><a href="#">5 June, 2018</a></p>
                                    <h3>Wood Work Adds Value To <br> Your Property Five</h3>
                                    <p class="test">Pain and discomfort may be endured if they bring about some benefit
                                        or relief in the end.. </p>
                                    <h3><a href="#">READ MORE</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single_news">
                                <img src="img/news_images_3.jpg" alt="">
                                <div class="texts">
                                    <p class="date"><a href="#">17 May, 2019</a></p>
                                    <h3>Food Need <br> Your Property Five</h3>
                                    <p class="test">People naturally avoid suffering, but they embrace challenges that
                                        lead to greater rewards </p>
                                    <h3><a href="#">READ MORE</a></h3>
                                </div>
                            </div>
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
                                <p>Your generosity can transform lives. By supporting our charity, you help provide
                                    vital
                                    resources like food, shelter, and education to those in need. Every donation, big or
                                    small, makes a lasting impact. Join us in creating a brighter future for everyone!
                                </p>
                                <hr>
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
                                            <li><a href="#"><i class="material-icons"></i>1 Street, derby, FL 2147,
                                                    USA</a>
                                            </li>
                                            <li><a href="#"><i class="material-icons"></i>kindnesscorner@gmail.com</a>
                                            </li>
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
    <script src="js/animationCounter.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/active.js"></script>


    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</body>

</html>