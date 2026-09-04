<?php ob_start() ?>
<?php 
    require 'header.php';
    session_start();
    if (!isset($_SESSION['Admin_Name'])) {
        die('User is not logged in');
    }

    require 'db.php';

    // Set number of records per page
    $records_per_page = 5;

    // Get current page number from URL, if not set, default to page 1
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }

    // Calculate the starting record based on current page
    $offset = ($current_page - 1) * $records_per_page;

    // Query to get total number of rows
    $total_query = "SELECT COUNT(*) as total FROM tblcontactus";
    $total_result = mysqli_query($mysql, $total_query);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_records = $total_row['total'];

    // Calculate total number of pages
    $total_pages = ceil($total_records / $records_per_page);

    // Modified query with LIMIT and OFFSET for pagination
    $q = "SELECT c.*, 
                 td.Donor_Name,    
                 tr.Receiver_id, 
                 tr.Receiver_Name,
                 ta.Admin_Name
          FROM tblcontactus AS c
          LEFT JOIN tblreceiver AS tr
          ON tr.Receiver_id = c.Receiver_id
          LEFT JOIN tbldonor AS td
          ON td.Donor_id = c.Donar_id
          LEFT JOIN tbladmin AS ta
          ON ta.Admin_id = c.Admin_id
          LIMIT $offset, $records_per_page;";

    $res = mysqli_query($mysql, $q) or die('Query Failed!!! ' . mysqli_error($mysql));
    $nor = mysqli_num_rows($res);

    if ($nor > 0) {
        echo "<div style='position: absolute; top: 0; left: 0; background-size: cover; z-index: -99;'>
                <video src='bg.mp4' autoplay muted loop style='width:100%; height:100vh;'></video>
              </div>";
        echo "<center style='margin-top:-700px; color:white; margin-left:400px'><h1>View Contact Us</h1></center>";
        echo "<table align='center' cellspacing='10' cellpadding='18' border='5' style='width:70%; margin-left:460px;border: 3px solid white; padding:5px;background-color:rgba(19, 18, 18, 0.822);color:white'>";
        echo "<tr>
                <th>Contact_id</th>
                <th>Admin_Name</th>
                <th>Donor_Name</th>
                <th>Receiver_Name</th>
                <th>Contact_Date</th>
              </tr>";

        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>
                    <td>{$r['Contact_id']}</td>
                    <td>{$r['Admin_Name']}</td>
                    <td>{$r['Donor_Name']}</td>
                    <td>{$r['Receiver_Name']}</td>
                    <td>{$r['Date']}</td>
                  </tr>";
        }

        echo "</table><br>";

        // Pagination links with styling
        echo "<div style='text-align:center; margin-top: 20px;'>";

        // Show "more" link if there are pages beyond the current window
        if ($current_page > 1) {
            echo "<a href='View_Contactus?page=1' style='color:white; font-weight:bold; text-decoration:none; margin: 0 5px;'>First</a> ";
        }

        // Display all page numbers
        for ($page = 1; $page <= $total_pages; $page++) {
            if ($page == $current_page) {
                echo "<span style='font-weight:bold; color:white; margin: 0 5px;'>$page</span>";
            } else {
                echo "<a href='View_Contactus?page=$page' style='color:white; font-weight:bold; text-decoration:none; margin: 0 5px;'>$page</a>";
            }
        }

        if ($current_page < $total_pages) {
            echo "<a href='View_Contactus?page=$total_pages' style='color:white; font-weight:bold; text-decoration:none; margin: 0 5px;'>Last</a>";
        }

        echo "</div>";
    } else {
        echo "<center><h1>No Feedback Available</h1></center>";
    }
?>
