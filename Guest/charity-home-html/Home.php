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
    <script>
        window.onload = function() {
            // Check for logout message in the URL
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('logout')) {
                alert("You logged out successfully.");
            }
        }
    </script>
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
                                            <li><a href="/TY_A_29/MiniProject/donor/charity-home-html/login.php">Login as Donor Account</a></li>
                                            <li><a href="/TY_A_29/MiniProject/Reciver/charity-home-html/login.php">Login as Reciver Account</a></li>
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
        <section class="carosal-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="client owl-carousel owl-theme">
                        <div class="item">
                            <div class="text">
                                <h3>SOMEONE NEED YOUR HELP</h3>
                                <p>Your help can change others life and because of your support can change their
                                    dreams.<br> HOPE, SUPPORT, BELIVE, DONATE</p>
                                <h5 class="white-button"><a href="#">DONATE NOW</a></h5>
                                <h5><a href="#">CONTACT US</a></h5>
                            </div>
                        </div>
                        <div class="item">
                            <div class="text">
                                <h3>CHILDREN NEED YOUR HELP</h3>
                                <p>Same children do not studied just because they have not money</P>
                                <h5 class="white-button"><a href="#">DONATE NOW</a></h5>
                                <h5><a href="#">CONTACT US</a></h5>
                            </div>
                        </div>
                        <div class="item">
                            <div class="text">
                                <h3>SOMEONE NEED YOUR HELP</h3>
                                <p>Your help can change others life and because of your support can change their
                                    dreams.<br> HOPE, SUPPORT, BELIVE, DONATE</p>
                                <h5 class="white-button"><a href="#">DONATE NOW</a></h5>
                                <h5><a href="#">CONTACT US</a></h5>
                            </div>
                        </div>
                        <div class="item">
                            <div class="text">
                                <h3>CHILDREN NEED YOUR HELP</h3>
                                <p>Same children do not studied just because they have not money</P>
                                <h5 class="white-button"><a href="#">DONATE NOW</a></h5>
                                <h5><a href="#">CONTACT US</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_activity">
        <h2 align="center">OUR ACTIVITY</h2>
        <p align="center">"Pain itself, pain is the most important thing, but I give up on the great pain that makes me so great."</p>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="single-Promo">
                        <div class="promo-icon">
                            <i class="material-icons">near_me</i>
                        </div>
                        <h2 align="center"><a href="#">Fundraising</a></h2>
                        <p>Pain itself, sit down, is connected with the elite of advertising. But by the exercise of time, they run into labor and pain greatly. For indeed, to reduce inconvenience, who..."</p>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="single-Promo">
                        <div class="promo-icon">
                            <i class="material-icons">favorite</i>
                        </div>
                        <h2 align="center"><a href="#">Volunteering</a></h2>
                        <p>Pain itself, sit down, is connected with the elite of advertising. But by the exercise of time, they run into labor and pain greatly. For indeed, to reduce inconvenience, who..." </p>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="single-Promo">
                        <div class="promo-icon">
                            <i class="material-icons">dashboard</i>
                        </div>
                        <h2 align="center"><a href="#">Our Programs</a></h2>
                        <p>Pain itself, sit down, is connected with the elite of advertising. But by the exercise of time, they run into labor and pain greatly. For indeed, to reduce inconvenience, who..."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="donate_section">
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
                    <h2><a href="#">DONATE NOW</a></h2>
                </div>
            </div>
        </div>
    </section>
    <section class="events_section_area">
        <h2 align="center">UPCOMING EVENTS</h2>
        <p align="center">"Pain itself is important, it is pain that will give birth to some great pleasure, and the result will be followed by the pains of this pain, which will be released from labor and pain.". </p>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="events_single">
                        <img src="img/events_single_one.jpg" alt="">
                        <p><span class="event_left"><i class="material-icons">access_time</i>1:00 pm - 3:00
                                pm</span><span class="event_right"><i class="material-icons">location_on</i>California
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
                                pm</span><span class="event_right"><i class="material-icons">location_on</i>California
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
                                pm</span><span class="event_right"><i class="material-icons">location_on</i>California
                                Street</span></p>
                        <h3>Education For Children</h3>
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="block-wrapper">
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
    </div>
    <section class="our_cuauses">
        <h2>OUR CAUSES</h2>
        <p align="center">"Pain itself is important, it is pain that gives rise to some great pleasure, and it will be followed by labor and pain." </p>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="our_cuauses_single owl-carousel owl-theme">
                        <div class="item">
                            <img src="img/our_cuauses_one.jpg" alt="">
                            <div class="for_padding">
                                <h2>FUTURES FOR CHILDREN</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minima</p>
                                <div class="progress-text">
                                    <p class="progress-top">50%</p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100" style="width:50%"></div>
                                    </div>
                                    <p class="progress-left">Raised: <span>$1200</span></p>
                                    <p class="progress-right">Goal: <span>$2400</span></p>
                                </div>
                                <h2 class="borderes"><a href="#">DONATE NOW</a></h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/our_cuauses_two.jpg" alt="">
                            <div class="for_padding">
                                <h2>FUTURES FOR CHILDREN</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minima</p>
                                <div class="progress-text">
                                    <p class="progress-top">50%</p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100" style="width:50%"></div>
                                    </div>
                                    <p class="progress-left">Raised: <span>$1200</span></p>
                                    <p class="progress-right">Goal: <span>$2400</span></p>
                                </div>
                                <h2 class="borderes"><a href="#">DONATE NOW</a></h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/our_cuauses_three.jpg" alt="">
                            <div class="for_padding">
                                <h2>FUTURES FOR CHILDREN</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minima</p>
                                <div class="progress-text">
                                    <p class="progress-top">50%</p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100" style="width:50%"></div>
                                    </div>
                                    <p class="progress-left">Raised: <span>$1200</span></p>
                                    <p class="progress-right">Goal: <span>$2400</span></p>
                                </div>
                                <h2 class="borderes"><a href="#">DONATE NOW</a></h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/our_cuauses_three.jpg" alt="">
                            <div class="for_padding">
                                <h2>FUTURES FOR CHILDREN</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minima</p>
                                <div class="progress-text">
                                    <p class="progress-top">50%</p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100" style="width:50%"></div>
                                    </div>
                                    <p class="progress-left">Raised: <span>$1200</span></p>
                                    <p class="progress-right">Goal: <span>$2400</span></p>
                                </div>
                                <h2 class="borderes"><a href="#">DONATE NOW</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="letast_news">
        <h2 align="center">latest news</h2>
        <p align="center">"Pain itself is important, it is pain that gives rise to some great pleasure, and it will be followed by labor and pain."</p>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single_news">
                        <img src="img/news_images_1.jpg" alt="">
                        <div class="texts">
                            <p class="date"><a href="#">30 May, 2017</a></p>
                            <h3>Wood Work Adds Value To <br> Your Property Five</h3>
                            <p class="test">"Pain itself, because it is pain, is loved; but those who exercise it to obtain some benefit, no one rejects, dislikes, or avoids pleasure itself, because it is pleasure."</p>
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
                            <p class="test">Pain and discomfort may be endured if they bring about some benefit or relief in the end.. </p>
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
                            <p class="test">People naturally avoid suffering, but they embrace challenges that lead to greater rewards </p>
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
                            <p>Your generosity can transform lives. By supporting our charity, you help provide vital
                                resources like food, shelter, and education to those in need. Every donation, big or
                                small, makes a lasting impact. Join us in creating a brighter future for everyone!</p>
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
        function showSweetAlert() {
            Swal.fire({
                title: 'Success!',
                text: 'SweetAlert is working.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    </script>
</body>

</html>