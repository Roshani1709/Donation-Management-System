<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <title>Admin Panel</title>
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
    </style>
</head>
<body>
<div class="container">
    <nav class="nav">
      <ul>
        <!-- Logo and Text -->
        <li class="logo-section">
          <img src="logo1.jpeg" alt="Logo">
          <span class="logo-text">Kindness Corner</span>
        </li>
        <br>
        <!--<center><h3 style="color:white">Welcome <?php echo "{$uname}";?>..</h3></center>-->

        <li><a href="AdminHome.php" class="nav-item">
          <i class="fas fa-home"></i>
          <span>Home</span>
        </a></li>
        
        <li class="manage-user" style="margin-top: -20px;">
          <a href="javascript:void(0)" class="nav-item">
            <i class="fas fa-user"></i>
            <span>Manage User</span>
          </a>
          <ul class="tree-view">
            <li style="margin-top:-30px"><a href="UserDonor.php" class="nav-item">Donor</a></li>
            <li style="margin-top:-30px"><a href="UserReciver.php" class="nav-item">Receiver</a></li>
          </ul>
        </li>

        <li style="margin-top: -20px;"><a href="work.php" class="nav-item">
          <i class="fas fa-briefcase"></i>
          <span>Manage Work</span>
        </a></li>
        
        <li style="margin-top: -20px;"><a href="Manage_Categories.php" class="nav-item">
          <i class="fas fa-chart-bar"></i>
          <span>Manage Categories</span>
        </a></li>
        
        <li class="payment-history" style="margin-top: -20px;">
          <a href="javascript:void(0)" class="nav-item">
            <i class="fas fa-money-bill"></i>
            <span>Payment History</span>
          </a>
          <ul class="tree-view">
            <li style="margin-top:-30px"><a href="PaymentHistory.php" class="nav-item">Payment History</a></li>
            <li style="margin-top:-30px"><a href="RequestHistory.php" class="nav-item">Request History</a></li>
          </ul>
        </li>

        <li style="margin-top: -20px;"><a href="View_Contactus.php" class="nav-item">
          <i class="fas fa-info-circle"></i>
          <span>View Contact us</span>
        </a></li>

        <li style="margin-top: -20px;"><a href="AboutUs.php" class="nav-item">
          <i class="fas fa-info-circle"></i>
          <span>About Us</span>
        </a></li>
        
        <li style="margin-top: -20px;"><a href="View_Feedback.php" class="nav-item">
          <i class="fas fa-comments"></i>
          <span>View Feedback</span>
        </a></li>
        
        <!-- Admin section with Change Password and Logout links -->
        <li class="admin-settings" style="margin-top: -20px;">
          <a href="javascript:void(0)" class="nav-item">
            <i class="fas fa-user-circle"></i>
            <span>Admin</span>
          </a>
          <ul class="tree-view">
            <li style="margin-top:-30px"><a href="Change_Password.php" class="nav-item">Change Password</a></li>
            <li style="margin-top:-30px"><a href="Logout.php" class="nav-item">Log out</a></li>
          </ul>
        </li>
      </ul>
    </nav>
</div>

<script>
    // Toggle the tree view for "Manage User"
    document.querySelector('.manage-user a').addEventListener('click', function() {
        var treeView = document.querySelector('.manage-user .tree-view');
        treeView.style.display = (treeView.style.display === 'block') ? 'none' : 'block';
    });
    document.querySelector('.payment-history a').addEventListener('click', function() {
        var treeView = document.querySelector('.payment-history .tree-view');
        treeView.style.display = (treeView.style.display === 'block') ? 'none' : 'block';
    });

    // Toggle the tree view for "Admin"
    document.querySelector('.admin-settings a').addEventListener('click', function() {
        var treeView = document.querySelector('.admin-settings .tree-view');
        treeView.style.display = (treeView.style.display === 'block') ? 'none' : 'block';
    });
</script>
</body>
</html>
