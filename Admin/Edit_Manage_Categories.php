<?php ob_start() ?>
<?php 
require "header.php";
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}

    if(isset($_REQUEST['aid'])) { // Fix the key in $_GET
        require 'db.php';
        $Category_ID = $_REQUEST['aid'];
        $q = "SELECT * FROM tblcategory WHERE Category_ID='$Category_ID'";
        $res = mysqli_query($mysql, $q) or die("Failed!!!");
        $a = mysqli_fetch_array(result: $res);
    }
?>
<!DOCTYPE html>
<html lang=”en”>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Work</title>
    <style>
        /* Basic form styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color:white;
}

form {
    background-color:rgba(19, 18, 18, 0.822);
    padding: 20px;
    border-radius: 10px;
    border: 7px solid;
    border-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 600px;
    height: 550px;
    margin: -650px 650px;
}

table {
    width: 600px;
    border: 4px solid;
    border-color: white;
    height: 450px;
    border-collapse: collapse;
}

table td {
    padding: 10px;
    border: 3px solid;
    border-color: white;

}

table tr:nth-child(odd) {
    background-color: transparent;
    border: 3px solid;
    border-color: white;
}

label {
    font-weight: bold;
    display: block;
    font-size: 15px;
    color: white;
    font-weight: 900px;
}

input[type="text"], input[type="number"], input[type="file"] {
    width: 100%;
    padding: 8px;
    border: 1px solid white;
    background-color: transparent;
    border-radius: 4px;
    border: 3px solid;
    border-color: white;
    box-sizing: border-box;
    font-size: 17px;
    color: white;
    font-weight: 900px;
}

input[type="submit"] {
    background-color:transparent;
    color: black;
    padding: 10px;
    border: none;
    border-radius: 4px;
    border: 3px solid;
    border-color: white;
    font-size: 15px;
    color: white;
    font-weight: 900px;
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    background-color:  #28a745;
    color: white;
}

b {
    color: green;
    display: block;
    text-align: center;
    margin-top: 20px;
    font-size: 26px;
    color: white;
    font-weight: 900px;
}

.background-video video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            z-index: -99;
}
    </style>
    </head>
<body>
<div class="background-video">
        <video src="bg.mp4" autoplay muted loop></video>
    </div>
<form action="" method="post">    
<center><h1>UODATE CATEGORIES </h1></center>
<table align=center cellspacing=10 cellpadding=10 border=5>    
    <tr>
        <td>Category Name</td>
        <td><input type="text" name="cname" value=<?php echo $a['Category_Name'];?> ></td>
    </tr>
    <tr>
        <td>Description</td>
        <td>
            <textarea name="description" cols=50 rows=5><?php echo $a[2]; ?></textarea>
        </td>
    </tr>
    <tr>
        <td>Image</td>
        <td>
            <textarea name="img" cols=50 rows=5><?php echo $a[3]; ?></textarea>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="Update" name="update"></td>
    </tr>
</table>
</form>

<?php
    if(isset($_REQUEST['update'])){ 
        $cname = $_REQUEST['cname'];
        $description = $_REQUEST['description'];  
        $img = $_REQUEST['img'];       
        require 'db.php';        
        $q = "UPDATE tblCategory SET Category_Name='$cname', Description='$description' ,image='$img' WHERE Category_ID='$Category_ID'";
        if(mysqli_query($mysql, $q)) {
            header("location:Manage_Categories.php");
        } else {
            die("Query Failed!!!".mysqli_error($mysql));
        }
    }
?>