<?php ob_start() ?>
<?php 
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title> 
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 2px solid #ddd;
            text-align: center;
        }
        th, td {
            padding: 15px;
        }
    </style>
</head>
<body>

    <?php
    require "db.php";

    // Define the number of results per page
    $results_per_page = 5; // Adjust as needed

    // Find out the total number of results stored in the database
    $q_count = "SELECT COUNT(*) FROM tblrequest_1";
    $res_count = mysqli_query($mysql, $q_count);
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
    $q = "SELECT rq.*, r.Receiver_Name, c.Category_Name 
          FROM tblrequest_1 AS rq
          INNER JOIN tblreceiver AS r ON rq.Receiver_id = r.Receiver_id
          INNER JOIN tblcategory AS c ON rq.Category_id = c.Category_id
          LIMIT " . $this_page_first_result . ',' . $results_per_page;
    
    $res = mysqli_query($mysql, $q);
    $nor = mysqli_num_rows($res);

    if ($nor > 0) {
        echo "<div style='position: absolute; top: 0; left: 0; background-size: cover; z-index: -99;'>
        <video src='bg.mp4' autoplay muted loop style='width:100%; height:100vh;'></video>
    </div>";
        echo "<center><h2 style='margin-top:-700px; margin-left:290px; z-index:-1; font-size: 26px;color: white; font-weight: 900px;'>Request History</h2></center>";
        echo "<table align='center' border='2' cellpadding='14' style='width:70%; margin-top:30px; margin-left:460px;border: 3px solid white; padding:5px;background-color:rgba(19, 18, 18, 0.822); color:white;'>";
        echo "<tr>
                <th>Receiver Name</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Bank Name</th>
                <th>Bank IFSC Code</th>
                <th>Payment Amount</th>
                <th>Request Date</th>
              </tr>";
        
        while ($r = mysqli_fetch_array($res)) {
            echo "<tr>
                    <td>{$r[8]}</td>
                    <td>{$r[9]}</td>
                    <td>{$r[3]}</td>
                    <td>{$r[4]}</td>
                    <td>{$r[5]}</td>
                    <td>{$r[6]}</td>
                    <td>{$r[7]}</td>
                  </tr>";
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
                echo "<a href='RequestHistory.php?page=" . $i . "' style='color:white; font-weight:bold; text-decoration:none; padding: 10px;'>$i</a>";
            }
        }

        echo "</div>";
        echo "</div>";

    } else {
        echo "<p>No requests found.</p>";
    }
    ?>
</body>
</html>
