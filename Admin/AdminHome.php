<?php ob_start() ?>
<?php
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}
$uname = isset($_GET['uname']) ? htmlspecialchars($_GET['uname']) : 'Admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Admin Dashboard</title>
    <style>
        .body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: white;
            height: 100vh;
            width: 100%;
            overflow: hidden;
        }
        .background-video video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            z-index: -99;
        }
        .container.main-content {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 8px;
            text-align: center;
            width: 50%;
            margin-left: 590px;
            margin-top: -550px;
            z-index: 1;
            position: relative;
        }

        .container h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #fff;
        }

        .container p {
            font-size: 1.2em;
            color: #ddd;
        }
    </style>
    <script>
        window.onload = function() {
            // Check for logout message in the URL
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('change')) {
                alert("Your password changed successfully.");
            }
        }
    </script>
</head>
<body>
    <div class="background-video">
        <video src="bg.mp4" autoplay muted loop></video>
    </div>

    <?php include('header.php'); ?>

    <div class="container main-content">
        <h2>Welcome to the Admin Dashboard, <?php echo $uname; ?></h2>
        <p>Here you can manage users, view reports, and adjust settings.</p>
    </div>
</body>
</html>
