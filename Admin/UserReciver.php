<?php ob_start(); ?>
<?php include('header.php'); ?>
<?php
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}
require "db.php";

// Define the number of results per page
$results_per_page = 5; // 5 records per page

// Find out the number of results stored in the database
$q1 = "SELECT * FROM tblreceiver";
$res1 = mysqli_query($mysql, $q1) or die("wrong in query".mysqli_error($mysql));
$nor1 = mysqli_num_rows($res1);

// Determine the total number of pages available
$total_pages = ceil($nor1 / $results_per_page);

// Determine which page number visitor is currently on
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

// Determine the SQL LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page - 1) * $results_per_page;

// Retrieve the selected results from the database
$q1 = "SELECT * FROM tblreceiver LIMIT " . $this_page_first_result . ',' . $results_per_page;
$res1 = mysqli_query($mysql, $q1) or die("wrong in query".mysqli_error($mysql));

if ($nor1 > 0) {
    echo "<div style='position: absolute; top: 0; left: 0;  background-size: cover; z-index: -99;'>
        <video src='bg.mp4' autoplay muted loop style='width:100%; height:100vh;'></video>
    </div>";
    echo "<center><h2 style='margin-top:-700px; margin-left:290px; z-index:-1;font-size: 26px;color: white; font-weight: 900px;'>User: Receiver</h2></center>";
    $output1 = "<table align='center' border='2' style='width:70%; margin-top:30px; margin-left:460px;color:white;border: 3px solid white; padding:5px;background-color:rgba(19, 18, 18, 0.822);'>
        <tr style='color:white;'>
            <th>Receiver ID</th>
            <th>Receiver Name</th>
            <th>Email <br><font style='color:blue;'>Password</font></th>
            <th>Date Joined</th> 
            <th>Bank Name <br><font style='color:blue;'> Bank IFSC Code</font></th>
            <th>Delete</th>
        </tr>";

    while ($r1 = mysqli_fetch_array($res1)) {
        $output1 .= "<tr style='color:white;'>
            <td align='center'>{$r1[0]}</td>
            <td align='center'>{$r1[1]}</td>
            <td align='center'>{$r1[2]}<br><font style='color:blue'>{$r1[3]}</font></td>
            <td align='center'>{$r1[4]}</td>
            <td align='center'>{$r1[5]}<br><font style='color:blue'>{$r1[6]}</font></td>
            <td align='center'><a href='MiniProject/DeleteUser.php?idr={$r1[0]}'><img src='delete.png' alt='Delete' style='height:40px; width:50px; margin-left:29px; border:none; border-radius:50%;' /></a></td>
        </tr>";
    }
    $output1 .= "</table>";

    echo $output1;

    // Pagination logic
    echo "<div style='text-align:center; margin-top:20px;'>";
    echo "<div style='display: inline-block;'>";

    // Show pagination links
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            echo "<span style='font-weight:bold; color:white; padding: 10px;'>$i</span>";
        } else {
            echo "<a href='ReceiverPage.php?page=" . $i . "' style='color:white; font-weight:bold; text-decoration:none; padding: 10px;'>$i</a>";
        }
    }
    
    echo "</div>";
    echo "</div>";
} else {
    echo "<h2>No receiver data found</h2>";
}
?>
