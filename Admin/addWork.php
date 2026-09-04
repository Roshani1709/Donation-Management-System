<?php ob_start() ?>
<?php
require "header.php";
// if (!isset($_SESSION['Email'])) {
//     die("No user is logged in.");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Work information</title>
    <style>
        /* Basic form styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

form {
    background-color:rgba(19, 18, 18, 0.822);
    padding: 20px;
    border-radius: 10px;
    border: 7px solid;
    border-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 600px;
    height: 450px;
    margin: -650px 650px;
}

table {
    width: 100%;
    border: 4px solid;
    border-color: white;
    height: 100%;
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

    <form action="" method="post" enctype="multipart/form-data">
        <table align="center" cellpadding="10" cellspacing="10" border="2" >
            <tr align="center">
                <td colspan=2> <b>ADD WORK</b></td>
            </tr>
            <tr>
                <td><label for="title">Title</label></td>
                <td><input type="text" name="title" id="title"></td>
            </tr>
            <tr>
            <td><label for="desc">Description</label></td>
            <td><input type="text" name="desc" id="desc"></td>
            </tr>
            <tr>
                <td><label for="image"> Add Image</label></td>
                <td><input type="file" name="image" id="image"></td>
            </tr>
            <tr>
                <td><label for="amount">Amount</label></td>
                <td><input type="number" name="amount" id="amount"></td>
            </tr>
            <tr>
                <td colspan=2> <input type="submit" value="Add" name="add"></td>
                
            </tr>
        </table>
    </form>
</body>
</html>
<?php  
if(isset($_REQUEST['add'])) {
    $title = $_REQUEST['title'];
    $desc = $_REQUEST['desc'];
    $image = $_FILES['image']['name'];
    $location = $_FILES['image']['tmp_name'];
    $amount = $_REQUEST['amount'];
    require "db.php";
    
    // Insert into database
    $query = "INSERT INTO tblwork VALUES (null, '$title', '$desc', '$image', '$amount')";
    
    if (mysqli_query($mysql, $query)) {
        // Move uploaded file
        if (move_uploaded_file($location, to: "image/" . $image)) {
            echo "<b> Thanks for Adding the work</b>";
            header("location:work.php");
        } else {
            echo "<b> Failed to upload the image</b>";
        }
    } else {
        die("Something went wrong!!! " . mysqli_error($mysql));
    }
}
?>