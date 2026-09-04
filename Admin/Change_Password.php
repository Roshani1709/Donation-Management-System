<?php ob_start() ?>
<?php
require 'header.php';
session_start();

require 'db.php';

// Check if session variable is set
if (!isset($_SESSION['Admin_Name'])) {
    die("No user is logged in.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Admin_Name = $_SESSION['Admin_Name'];
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        $error = "New password and confirm password do not match.";
    } else {
        // Check if the old password is correct
        $sql = "SELECT * FROM tbladmin WHERE Admin_Name = '$Admin_Name' AND Password = '$oldPassword'";
        $result = mysqli_query($mysql, $sql);

        if (mysqli_num_rows($result) == 1) {
            // Old password is correct, update to the new password
            $updateSql = "UPDATE tbladmin SET Password = '$newPassword' WHERE Admin_Name = '$Admin_Name'";
            if (mysqli_query($mysql, $updateSql)) {
                // Password changed successfully
                echo '<script>alert("Password changed successfully.");</script>';

                // Redirect to the login page
                header("Location: AdminHome.php?change=success"); 
                exit();
            } else {
                $error = "Failed to change password. Please try again.";
            }
        } else {
            $error = "Invalid old password.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <style>
        .form-container {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #800080;
            border-radius: 8px;
            background-color:rgba(19, 18, 18, 0.822) ;
            margin-top:-700px;
            height:500px;
            color:white;
            font-size:20px;
        }
        .form-container input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            height:50px
        }
        .form-container input[type="submit"] {
            background-color:transparent;
            color: black;
            padding: 10px;
            border: none;
            border-radius: 4px;
            border: 3px solid;
            border-color: white;
            font-size: 25px;
            color: white;
            font-weight: 900px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color:  #28a745;
            color: white;
        }
        .error {
            color: red;
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
    <div class="form-container">
        <center><h2>Change Password</h2></center>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form method="POST" action="">
            <label for="old_password">Old Password:</label>
            <input type="password" id="old_password" name="old_password" required>
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <input type="submit" value="Change Password">
        </form>
    </div>
</body>
</html>