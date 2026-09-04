
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
    <title> About us</title>
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
                                    <li><a href="view_Work.php">VIEW POST</a></li>
                                    <li><a href="Aboutus.php">ABOUT US</a></li>

                                    <!-- Dropdown for Create Account -->
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false">
                                            Create Account <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/TY_A_29/MiniProject/donor/charity-home-html/login.php">Create as Donor Account</a></li>
                                            <li><a href="/TY_A_29/MiniProject/Reciver/charity-home-html/login.php">Create as Reciver  Account</a></li>
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
    <div class="container" style="margin: 10px auto; width: 100%;">
        <div style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; padding: 20px;">
                <?php
                require "db.php";

                // Number of records to show per page
                $records_per_page = 9; // Adjust as needed
                $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($current_page - 1) * $records_per_page;

                // SQL query to fetch works with pagination
                $q = "SELECT * FROM tblwork LIMIT $offset, $records_per_page";
                $res = mysqli_query($mysql, $q);

                // Check if query returned results
                if (mysqli_num_rows($res) > 0) {
                    while ($r = mysqli_fetch_array($res)) {
                        $path = "image/" . $r[3];
                        echo "
                        <div class='card' style='
                            background-color: white; 
                            border-radius: 10px; 
                            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); 
                            width: calc(33.33% - 20px); 
                            text-align: center; 
                            padding: 20px; 
                            opacity: 0; 
                            transform: translateY(30px); 
                            transition: all 0.3s ease; 
                            overflow: hidden;
                        '>
                            <img src='$path' alt='work image' style='
                                width: 100%; 
                                height: 300px; 
                                object-fit: cover; 
                                border-radius: 8px; 
                                transition: transform 0.3s ease;
                            ' />
                            <div style='
                                font-weight: bold; 
                                margin-top: 10px; 
                                font-size: 18px; 
                                color: #333;
                            '>$r[1]</div>
                            <div style='
                                margin: 10px 0; 
                                font-size: 14px; 
                                color: #555;
                            '>$r[2]</div>
                            <div style='
                                margin-bottom: 10px; 
                                font-size: 16px; 
                                color: #333;
                            '>Amount: <span style='color: #28a745;'>$r[4]</span></div>
                        </div>";
                    }
                } else {
                    echo "<div style='text-align: center; width: 100%;'>No works found.</div>";
                }
                ?>
            </div>
        </div>

        <!-- Pagination -->
        <div style="text-align: center; margin-top: 20px;">
            <?php
            // Fetch total number of records for pagination
            $count_query = "SELECT COUNT(*) as total FROM tblwork";
            $count_res = mysqli_query($mysql, $count_query);
            $total_records = mysqli_fetch_assoc($count_res)['total'];
            $total_pages = ceil($total_records / $records_per_page); // Calculate total pages

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
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let delay = 0;

            // Animate each card on load
            $('.card').each(function() {
                $(this).delay(delay).animate({
                    opacity: 1,
                    top: '0px',
                    transform: 'translateY(0)'
                }, 800); // Animation duration
                delay += 300; // Delay for next card
            });

            // Hover effect for card animation
            $('.card').hover(
                function() {
                    $(this).css('box-shadow', '0 12px 24px rgba(0, 0, 0, 0.2)');
                    $(this).css('transform', 'scale(1.05) translateY(-10px)');
                    $(this).find('img').css('transform', 'scale(1.1)'); // Scale image on hover
                },
                function() {
                    $(this).css('box-shadow', '0 8px 16px rgba(0, 0, 0, 0.1)');
                    $(this).css('transform', 'scale(1) translateY(0)');
                    $(this).find('img').css('transform', 'scale(1)'); // Reset image scale
                }
            );

            // Animation when the card comes into the viewport
            $(window).scroll(function() {
                $('.card').each(function() {
                    if ($(this).is(':visible') && $(this).offset().top < $(window).scrollTop() + $(window).height() - 100) {
                        $(this).animate({
                            opacity: 1,
                            top: '0px',
                            transform: 'translateY(0)'
                        }, 800); // Animation duration
                    }
                });
            });
        });
    </script>
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