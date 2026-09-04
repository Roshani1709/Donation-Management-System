<?php ob_start() ?>
<?php
require "header.php";
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    width: 800px;
    height: 490px;
    margin: -650px 650px;
}

table {
    width: 100%;
    border: 4px solid;
    border-color: white;
    height: 390px;
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
    width: 400px;
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
</style>
</head>
<body>
<div class="background-video">
        <video src="bg.mp4" autoplay muted loop></video>
    </div>
<form action="" method="post">    
<center><h1>Add Categories Page</h1></center>
<table align=center cellspacing=5 cellpadding=5 border=5>    
    <tr>
        <td>Category Name</td>
        <td><input type="text" name="cname"  required></td>
    </tr>
    <tr>
        <td>Description</td>
        <td>
            <textarea name="description" cols=20 rows=5 required style="width:400px "></textarea>
        </td>
    </tr>
    <tr>
        <td>Image</td>
        <td>
            <textarea name="img" cols=20 rows=5 required style="width:400px "></textarea>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="Add" name="add"></td>
    </tr>
</table>
</form>
<?php
    if(isset($_REQUEST['add'])) {        
        $cname=$_REQUEST['cname'];
        $description=$_REQUEST['description'];  
        $img = $_POST['img'];          
        require 'db.php';        
        $q="Insert into tblCategory values (null, '$cname', '$description','$img')";
        if(mysqli_query($mysql,$q))
            header("location:Manage_Categories.php?");
        else
            die("Query Failed!!!".mysqli_error($mysql));
    }
?>