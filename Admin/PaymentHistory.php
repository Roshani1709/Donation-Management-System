<?php ob_start() ?>
<?php 
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}
include('header.php');
?>

<?php
require "db.php";

// Define the number of results per page
$results_per_page = 5; // Adjust as needed

// Find out the total number of results stored in the database
$q = "SELECT COUNT(*) FROM tbldonation";
$res_count = mysqli_query($mysql, $q) or die("wrong in query" . mysqli_error($mysql));
$row_count = mysqli_fetch_row($res_count);
$nor = $row_count[0];

// Determine the total number of pages available
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
$q = "SELECT tdo.*,
            tc.Category_Name,
            td.Donor_Name,
            tr.Receiver_Name
        FROM tbldonation AS tdo
            INNER JOIN tblcategory AS tc
                ON tc.Category_id = tdo.Category_id
            INNER JOIN tbldonor AS td
                ON td.Donor_id = tdo.Donor_id
            INNER JOIN tblreceiver AS tr
                ON tr.Receiver_id = tdo.Receiver_id
        LIMIT " . $this_page_first_result . ',' . $results_per_page;

$res = mysqli_query($mysql, $q) or die("wrong in query" . mysqli_error($mysql));

if ($nor > 0) {
    echo "<div style='position: absolute; top: 0; left: 0; background-size: cover; z-index: -99;'>
        <video src='bg.mp4' autoplay muted loop style='width:100%; height:100vh;'></video>
    </div>";
    echo "<center><h2 style='margin-top:-700px; margin-left:290px; z-index:-1; font-size: 26px;color: white; font-weight: 900px;'>Payment History</h2></center>";
    
    $output = "<table align='center' border='2' cellpadding='14' style='width:70%; margin-top:30px; margin-left:460px;border: 3px solid white; padding:5px;background-color:rgba(19, 18, 18, 0.822);'>
        <tr style='color:white;'>
            <th>Donation ID</th>
            <th>Donor Name</th>
            <th>Category Name </th>
            <th>Payment ID </br> Payment Type</th>
            <th>Receiver Name </th>
            <th>Donation Date</th>
            <th>Status</th>
            <th>Payment Amount</th>
        </tr>";

    while ($r = mysqli_fetch_array($res)) {
        $output .= "<tr style='color:white;'>
            <td>{$r[0]}</td>
            <td>{$r[11]}</td>
            <td>{$r[10]} </td>
            <td>{$r[3]} </br> {$r[6]} </td>
            <td>{$r[12]} </td>
            <td>{$r[4]}</td>
            <td>{$r[5]}</td>
            <td>{$r[7]}</td>
        </tr>";
    }
    $output .= "</table>";

    echo $output;

    // Pagination logic
    echo "<div style='text-align:center; margin-top:20px;'>";
    echo "<div style='display: inline-block;'>";

    // Display pagination links
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            echo "<span style='font-weight:bold; color:white; padding: 10px;'>$i</span>";
        } else {
            echo "<a href='PaymentHistory.php?page=" . $i . "' style='color:white; font-weight:bold; text-decoration:none; padding: 10px;'>$i</a>";
        }
    }

    echo "</div>";
    echo "</div>";
} else {
    echo "<h2 style='color:white;'>No data found</h2>";
}
?>
