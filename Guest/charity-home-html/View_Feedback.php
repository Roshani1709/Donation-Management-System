
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
    <title> view feedback</title>
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
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="Home.php">HOME</a></li>
                                    <li><a href="View_Feedback.php">VIEW FEEDBACK</a></li>
                                    <li><a href="view_Work.php">VIEW WORK</a></li>
                                    <li><a href="Aboutus.php">ABOUT US</a></li>

                                    <!-- Dropdown for Create Account -->
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false">
                                            Create Account <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/TY_A_29/MiniProject/donor/charity-home-html/login.php">login as Donor Account</a></li>
                                            <li><a href="/TY_A_29/MiniProject/Reciver/charity-home-html/login.php">login as Reciver  Account</a></li>
                                            <li><a href="/TY_A_29/MiniProject/Admin/AdminLogin.php">login Admin Account</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </header>
        <section style="font-size: 20px;">
    <div class="container" style="margin: 70px auto; width: 100%; text-align: center;">
        <h2 style="margin-bottom: 20px; color: #007bff;">View Feedback</h2>
        <div class="card-container" style="
            display: flex;
            flex-direction: column; /* Stack cards vertically */
            align-items: center; /* Center align items in the container */
            gap: 20px;
            padding: 20px;
        ">
            <?php
            require "db.php";

            // Function to generate star rating
            function displayStars($rating) {
                $stars = '';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        $stars .= '★'; // Full star
                    } else {
                        $stars .= '☆'; // Empty star
                    }
                }
                return $stars;
            }

            // Number of records to show per page
            $records_per_page = 5;
            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($current_page - 1) * $records_per_page;

            // SQL query to fetch feedback from tblfeedback with pagination
            $q = "SELECT f.*, r.Receiver_Name, d.Donor_Name FROM tblfeedback AS f 
                  LEFT JOIN tblreceiver AS r ON f.Receiver_id = r.Receiver_id
                  LEFT JOIN tbldonor AS d ON f.Donor_id = d.Donor_id
                  LIMIT $offset, $records_per_page";

            $res = mysqli_query($mysql, $q);
            $nor = mysqli_num_rows($res);

            // Fetch total number of records for pagination
            $count_query = "SELECT COUNT(*) as total FROM tblfeedback";
            $count_res = mysqli_query($mysql, $count_query);
            $total_records = mysqli_fetch_assoc($count_res)['total'];
            $total_pages = ceil($total_records / $records_per_page); // Calculate total pages

            if ($nor > 0) {
                $counter = 0; // Counter to determine the card position
                while ($r = mysqli_fetch_array($res)) {
                    // Check for null values and set default placeholders
                    $receiverName = !empty($r['Receiver_Name']) ? $r['Receiver_Name'] : '--';
                    $donorName = !empty($r['Donor_Name']) ? $r['Donor_Name'] : '--';

                    // Use the counter to alternate the layout
                    $alignment = $counter % 2 === 0 ? 'left' : 'right';
                    $alignStyle = $alignment === 'left' ? "align-self: flex-start; margin-left: auto;" : "align-self: flex-end; margin-right: auto;";

                    echo "
                    <div class='card' style='
                        display: flex; 
                        background-color: #fff; 
                        border-radius: 10px; 
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
                        width: 900px; /* Full width within grid */
                        text-align: left; 
                        padding: 25px; 
                        transition: transform 0.3s ease, box-shadow 0.3s ease; 
                        min-height: 80px; 
                        opacity: 0; 
                        transform: translateY(20px);
                        $alignStyle /* Apply alignment style */
                    ' onmouseover=\"this.style.boxShadow='0 8px 16px rgba(0, 0, 0, 0.2)'; this.style.transform='scale(1.03)';\" onmouseout=\"this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.1)'; this.style.transform='scale(1)';\">
                        <img src='image/feedback.jpg' alt='Static Image' style='
                            width: 120px; 
                            height: 120px; 
                            object-fit: cover; 
                            border-radius: 50%; 
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
                            margin-right: 20px;
                        ' />
                        <div style='flex-grow: 1;'> <!-- Allow text div to grow -->
                            <div class='receiver-name' style='
                                font-size: 18px; 
                                font-weight: bold; 
                                margin-top: 10px; 
                                color: #333;
                            '>$receiverName</div>
                            <div class='donor-name' style='
                                font-size: 18px; 
                                font-weight: bold; 
                                color: #555;
                            '>$donorName</div>
                            <div class='feedback-rating' style='
                                font-size: 24px; 
                                margin: 10px 0;
                            '>" . displayStars($r['Rating']) . "</div>
                            <div class='feedback-comment' style='
                                font-size: 16px; 
                                color: #666; 
                                margin-bottom: 10px;
                            '>{$r['Comments']}</div>
                        </div>
                    </div>";
                    $counter++; // Increment counter
                }
            } else {
                echo "<p>No feedback available.</p>";
            }
            ?>
        </div>

        <!-- Pagination -->
        <div style="margin-top: 20px;">
            <?php
            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='?page=$i' style='
                    display: inline-block; 
                    margin: 0 5px; 
                    padding: 10px 15px; 
                    border: 1px solid #007bff; 
                    border-radius: 5px; 
                    color: #007bff; 
                    text-decoration: none;
                    transition: background-color 0.3s;
                ' onmouseover=\"this.style.backgroundColor='#e7f1ff';\" onmouseout=\"this.style.backgroundColor='transparent';\">$i</a>";
            }
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                let delay = 0;

                $('.card').each(function() {
                    $(this).delay(delay).animate({
                        opacity: 1,
                        transform: 'translateY(0)' // Move to original position
                    }, 900); // Animation duration
                    delay += 600; // Delay for next card
                });
            });
        </script>
    </div>
</section>







        <footer class="footer">
            <div class="container">
                <div class="row" style="margin-top:50px">
                    <div class="col-md-4 col-sm-12">
                        <div class="footer-charity-text">
                            <h2>HELP CHARITY</h2>
                            <p>Your generosity can transform lives. By supporting our charity, you help provide vital resources like food, shelter, and education to those in need. Every donation, big or small, makes a lasting impact. Join us in creating a brighter future for everyone!</p>
                            <br>
                            <br>
                            <br><br>
                            <p><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></p>
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
                                        <li><a href="#"><i class="material-icons"></i>1 Street, derby, FL 2147, USA</a></li>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApW03tvAPTXWd1RHJBF2Up3iJMVu1wHi4&callback=JaMap"></script>
</body>

</html>