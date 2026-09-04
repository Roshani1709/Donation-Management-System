<?php
ob_start();
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
    <title>Work Details</title>
</head>

<body style='width:100%; height:100%;'>
    <div style='position: absolute; top: 0; left: 0; background-size: cover; z-index: -99;'>
        <video src='bg.mp4' autoplay muted loop style='width:100%; height:100vh;'></video>
    </div>
    <center>
        <a href="addWork.php" style='margin-top:-700px; margin-left:890px; z-index:-1; font-size: 26px; color: white; font-weight: bold; '>
            <u>Add New work</u>
        </a>
    </center>

    <?php
    require 'db.php';

    // Define the number of results per page
    $results_per_page = 5; // Adjust as needed

    // Find out the number of results stored in the database
    $q = "SELECT * FROM tblwork";
    $res = mysqli_query($mysql, $q) or die("Query Failed!!!" . mysqli_error($mysql));
    $nor = mysqli_num_rows($res);

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
    $q = "SELECT * FROM tblwork LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $res = mysqli_query($mysql, $q) or die("Query Failed!!!" . mysqli_error($mysql));

    if ($nor > 0) {
        echo "<table border='5' cellspacing='5' cellpadding='5' style='width:70%; margin-left:460px; background-color:rgba(19, 18, 18, 0.822); color:white;'>";
        echo "<tr style='background-color:rgba(19, 18, 18, 0.822);'>
            
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Amount</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>";

        while ($r = mysqli_fetch_array($res)) {
            echo "<tr>
                
                <td>$r[1]</td>
                <td>$r[2]</td>
                <td>$r[3]</td>
                <td>$r[4]</td>
                <td><a href='editWork.php?work_id=$r[0]' class='action-link'><img src='edit.jpg' height='20px' width='20px' style='margin-left:32px;'></a></td>
                <td><a href='deleteWork.php?work_id=$r[0]' class='action-link delete-link'><img src='delete.png' height='20px' width='20px' style='margin-left:32px; border:none; border-radius:50%;'></a></td>            </tr>";
        }
        echo "</table>";

        // Pagination logic
        echo "<div style='text-align:center; margin-top:20px;'>";
        echo "<div style='display: inline-block;'>";

        // Display pagination links
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                echo "<span style='font-weight:bold; color:white; padding: 10px;'>$i</span>";
            } else {
                echo "<a href='work.php?page=" . $i . "' style='color:white; font-weight:bold; text-decoration:none; padding: 10px;'>$i</a>";
            }
        }

        echo "</div>";
        echo "</div>";
    } else {
        if (isset($_REQUEST['imsg'])) {
            echo "<p class='message success'>" . $_REQUEST['imsg'] . "</p>";
        }
        if (isset($_REQUEST['umsg'])) {
            echo "<p class='message success'>" . $_REQUEST['umsg'] . "</p>";
        }
        if (isset($_REQUEST['dmsg'])) {
            echo "<p class='message error'>" . $_REQUEST['dmsg'] . "</p>";
        }
    }
    ?>
</body>

</html>
