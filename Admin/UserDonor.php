<?php ob_start(); ?>
<?php require('header.php'); ?>
<?php
require "db.php";
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}

// Define the number of results per page
$results_per_page = 5; // 5 records per page

// Find out the number of results stored in the database
$q = "SELECT * FROM tbldonor";
$res = mysqli_query($mysql, $q) or die("wrong in query".mysqli_error($mysql));
$nor = mysqli_num_rows($res);

// Determine the number of total pages available
$total_pages = ceil($nor / $results_per_page);

// Determine which page number visitor is currently on
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

// Determine the SQL LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page - 1) * $results_per_page;

// Retrieve the selected results from the database
$q = "SELECT * FROM tbldonor LIMIT " . $this_page_first_result . ',' . $results_per_page;
$res = mysqli_query($mysql, $q) or die("wrong in query".mysqli_error($mysql));

if ($nor > 0) {
    
    echo "<div style='position: absolute; top: 0; left: 0; background-size: cover; z-index: -99;'>
        <video src='bg.mp4' autoplay muted loop style='width:100%; height:100vh;'></video>
    </div>";
    echo "<center><h2 style='margin-top:-700px; margin-left:290px; z-index:-1; font-size: 26px;color: white; font-weight: 900px;'>User: Donor</h2></center>";
    $output = "<table align='center' border='2' style='width:1300px; margin-top:30px; margin-left:460px;border: 3px solid white; padding:5px;background-color:rgba(19, 18, 18, 0.822);'>
        <tr style='color:white;'>
            <th>Donor ID</th>
            <th>Donor Name</th>
            <th>Email <br><font style='color:blue'>Password</font></th>
            <th>Contact Number</th>
            <th>Date Joined</th>
            <th>Bank Name <br><font style='color:blue'> Bank IFSC Code</font></th>
            <th>Delete</th>
        </tr>";

    while ($r = mysqli_fetch_array($res)) {
        $output .= "<tr style='color:white;'>
            <td align='center'>{$r[0]}</td>
            <td align='center'>{$r[1]}</td>
            <td align='center'>{$r[2]}<br><font style='color:blue'>{$r[3]}</font></td>
            <td align='center'>{$r[4]}</td>
            <td align='center'>{$r[5]}</td>
            <td align='center'>{$r[6]}<br><font style='color:blue'>{$r[7]}</font></td>
            <td align='center'><a href='DeleteUser.php?idd={$r[0]}'><img src='delete.png' alt='Delete' style='height:40px; width:50px; margin-left:29px; border:none; border-radius:50%; ' /></a></td>
        </tr>";
    }
    $output .= "</table>";

    echo $output;

    // Display pagination links horizontally
    echo "<div style='text-align:center; margin-top:20px;'>";
    echo "<div style='display: inline-block;'>";

    // Pagination window logic to display pages
    $pagination_window = 3; // Show 3 pages at a time

    // Calculate the start and end pages to display
    $start_page = max(1, $page - 1);  // Always show at least 1 page before the current page
    $end_page = min($total_pages, $page + 1);  // Always show 1 page after the current page

    // Show "more" link if there are pages beyond the current window
    if ($start_page > 1) {
        echo "<a href='UserDonor.php?page=1' style='color:white; font-weight:bold; text-decoration:none; padding: 10px;'>1</a>";
        if ($start_page > 2) {
            echo "<span style='color:white; font-weight:bold; padding: 10px;'>...</span>";
        }
    }

    // Display the page numbers in the current window
    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $page) {
            echo "<span style='font-weight:bold; color:white; padding: 10px;'>$i</span>";
        } else {
            echo "<a href='UserDonor.php?page=" . $i . "' style='color:white; font-weight:bold; text-decoration:none; padding: 10px;'>$i</a>";
        }
    }

    // Show "more" link if there are pages beyond the current window
    if ($end_page < $total_pages) {
        if ($end_page < $total_pages - 1) {
            echo "<span style='color:white; font-weight:bold; padding: 10px;'>...</span>";
        }
        echo "<a href='UserDonor.php?page=$total_pages' style='color:white; font-weight:bold; text-decoration:none; padding: 10px;'>$total_pages</a>";
    }

    echo "</div>";
    echo "</div>";

} else {
    echo "<h2>No donor data found</h2>";
}
?>
