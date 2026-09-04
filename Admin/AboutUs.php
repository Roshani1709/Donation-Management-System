<?php ob_start() ?>
<?php
require "header.php";
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Money Donation</title>
    <link rel="stylesheet" href="main.css">
    <style>
        /* Basic styling */
        body {
            font-family: 'Verdana', Geneva, sans-serif;
            margin: 0;
            padding: 0;
        }

        .nav {
            width: 350px; /* Increased width of the panel */
            background-color: rgba(19, 18, 18, 0.822);
        
            height: 100vh;
            padding: 0;
        }

        .nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            color: white;
            padding: 15px 20px; /* Increased padding for better spacing */
            display: flex;
            justify-content: center; /* Center the content horizontally */
            align-items: center;
            text-decoration: none;
            font-weight: bold; /* Bold font for all links */
            font-size: 18px; /* Slightly larger font */
        }

        .nav a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .nav-item:hover {
            background-color: #444;
        }

        .nav-item i {
            margin-right: 10px; /* Spacing between icon and text */
        }

        .tree-view {
            display: none;
            list-style-type: none;
            padding-left: 0; /* Remove indentation */
        }

        .tree-view li {
            padding: 5px 0;
            text-align: center; /* Center sub-items (Donor, Receiver) */
        }

        .tree-view a {
            color: #ccc;
            text-decoration: none;
            font-weight: bold; /* Bold font for sub-items */
        }

        .tree-view a:hover {
            text-decoration: underline;
        }

        /* Logo and stylish text */
        .logo-section {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #222; /* Dark background for the logo section */
        }

        .logo-section img {
            width: 50px; /* Adjust logo size */
            height: 50px; /* Keep it square */
            margin-right: 15px; /* Space between logo and text */
        }

        .logo-text {
            color: #fff;
            font-size: 22px;
            font-family: 'Cursive', sans-serif; /* Stylish font for the text */
            font-weight: bold;
        }

        /* Stylish hover effect for logo text */
        .logo-text:hover {
            color: #ffcc00; /* Stylish hover color */
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        /*Container for the image and text */
        .header-container{
            background-color: rgba(19, 18, 18, 0.822);
            text-align: center;
            width:60%;
            height: 80%;
            margin: -690px 560px;
            color: white;
        }
        .content{
            color: white;
        }
    </style>
</head>
<body>
    <div style='position: absolute; top: 0; left: 0;  ackground-size: cover; z-index: -99;'>
        <video src='bg.mp4' autoplay muted loop style='width:100%; height:100vh;'></video>
    </div>

    <!-- Container for the image and text -->
    <div class="header-container" >
        <div class="header-text">
            <h1>About Us</h1>
            <p>We are a non-profit organization dedicated to supporting various causes through crowdfunding and donations. Our mission is to connect generous donors with impactful projects, ensuring that every contribution makes a difference.</p>
        </div>

    <!-- Content Section -->
    <div class="content">
        <h2>Our Mission</h2>
        <p>Our mission is to empower individuals and communities by providing financial support to those in need. We aim to create a transparent platform where donors can easily contribute and track their impact.</p>

        <h2>Why Donate?</h2>
        <p>Donations help us fund a variety of projects, including education, healthcare, and community development initiatives. Your support enables us to reach more people and create lasting change.</p>
        
        <h2>Our Values</h2>
        <ul>
            <li>Transparency: We provide clear and detailed reports on how donations are used.</li>
            <li>Integrity: We ensure that all donations are allocated responsibly and effectively.</li>
            <li>Compassion: We care deeply about the causes we support and the people we help.</li>
        </ul>
    </div>
    </div>
</body>
</html>
