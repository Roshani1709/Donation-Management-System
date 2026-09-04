<?php ob_start() ?>
<?php
 ob_start();
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}
 if(isset($_GET['work_id'])){
 require 'db.php';
 $work_id=$_GET['work_id'];
 $q="delete from tblwork where work_id='$work_id'";
 if(mysqli_query($mysql,$q))
 header("location:work.php?dmsg=RECORD DELETED!!!!");
 else
 die("Deletion failed!!!".mysqli_error($mysql));
 }
 ?>