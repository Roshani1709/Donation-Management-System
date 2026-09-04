<?php ob_start(); ?>
<?php 
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}

require 'db.php'; // Database connection

// Check if 'idd' (Donor ID) is set and delete from 'tbldonor'
if (isset($_REQUEST['idd'])) {
    $idd = $_REQUEST['idd'];

    // Prepare and execute the query
    $q1 = "DELETE FROM tbldonor WHERE Donor_id = $idd";
    $res1 = mysqli_query($mysql, $q1) or die("Error in query: " . mysqli_error($mysql));

    // Check if any rows were affected (deleted)
    if (mysqli_affected_rows($mysql) > 0) {
        echo "Donor deleted successfully";
        header("Location:UserDonor.php");
        exit();
    } else {
        echo "No donor found with the specified ID.";
    }
} 
// Check if 'dir' (Receiver ID) is set and delete from 'tblreceiver'
elseif (isset($_REQUEST['dir'])) {
    $idr = $_REQUEST['dir'];

    // Prepare and execute the query
    $q2 = "DELETE FROM tblreceiver WHERE Receiver_id = $idr";
    $res2 = mysqli_query($mysql, $q2) or die("Error in query: " . mysqli_error($mysql));

    // Check if any rows were affected (deleted)
    if (mysqli_affected_rows($mysql) > 0) {
        echo "Receiver deleted successfully";
        header("Location: UserReciver.php");
        exit();
    } else {
        echo "No receiver found with the specified ID.";
    }
} else {
    echo "No valid ID provided for deletion.";
}
?>
