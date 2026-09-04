<?php ob_start() ?>
<?php
 ob_start();
session_start();
if (!isset($_SESSION['rname'])) {
    header("Location: login.php");
    exit();
}
 if(isset($_GET['aid'])){
 require 'db.php';
 $Request_id =$_GET['aid'];
 $q="delete from tblrequest_1 where Request_id ='$Request_id '";
 if(mysqli_query($mysql,$q))
 header("location:Request_History.php?dmsg=RECORD DELETED!!!!");
 else
 die("Deletion failed!!!".mysqli_error($mysql));
 }
 ?>