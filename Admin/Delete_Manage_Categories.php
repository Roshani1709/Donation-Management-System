<?php ob_start() ?>
<?php
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}

if(isset($_GET['Category_ID'])){
    $Category_ID=$_GET['Category_ID'];
    require 'db.php';    
    $q="delete from tblCategory where Category_ID='$Category_ID'";
    if(mysqli_query($mysql,$q))
        header("location:Manage_Categories.php");
    else
        die("Query Failed!!!!".mysqli_error($mysql));
}
?>