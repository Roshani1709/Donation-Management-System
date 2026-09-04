<?php include('header.php'); ?>
<?php
    ob_start();
session_start();
if (!isset($_SESSION['Admin_Name'])) {
    die('User is not logged in');
}
?>
<?php 
    if(isset($_REQUEST['dir'])){
        $dir = $_REQUEST['dir'];

        require 'db.php';
        $q = "SELECT * FROM tblreceiver WHERE Receiver_id = '$dir'";
        $res = mysqli_query($mysql, $q) or die("Something went wrong: ".mysqli_error($mysql));
        $r = mysqli_fetch_array($res);

        // Check if data is fetched properly
        if (!$r) {
            echo "<h2>No user found with Receiver ID: $dir</h2>";
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <form method="POST" action="">
        <table align="center" border="3">
            <tr>
                <td colspan="2" style="text-align:center;">
                    <h2>Edit Receiver Details</h2>
                </td>
            </tr>
            <tr>
                <td>Receiver ID</td>
                <td><input type="number" name="rid" value="<?php echo $r[0]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Enter Receiver Name</td>
                <td><input type="text" name="fname" value="<?php echo $r[1]; ?>"></td>
            </tr>
            <tr>
                <td>Enter Email</td>
                <td><input type="email" name="email" value="<?php echo $r[2]; ?>"></td>
            </tr>
            <tr>
                <td>Enter Password</td>
                <td><input type="password" name="pwd" value="<?php echo $r[3]; ?>"></td>
            </tr>
            <tr>
                <td>Enter Bank Name</td>
                <td><input type="text" name="bname" value="<?php echo $r[4]; ?>"></td>
            </tr>
            <tr>
                <td>Enter Date Of Joining</td>
                <td><input type="date" name="doj" value="<?php echo $r[5]; ?>"></td>
            </tr>
            <tr>
                <td>Enter Bank IFSC Code</td>
                <td><input type="text" name="bifsc" value="<?php echo $r[6]; ?>"></td>
            </tr>
            <tr>
                <td>Enter Bank Security Question</td>
                <td><input type="text" name="bsq" value="<?php echo $r[7]; ?>"></td>
            </tr>
            <tr>
                <td>Enter Bank Security Answers</td>
                <td><input type="text" name="bsa" value="<?php echo $r[8]; ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="update" value="Update" style="margin-left:150px;">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php 
    if(isset($_POST['update'])){
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $bname = $_POST['bname'];
        $doj = $_POST['doj'];
        $bifsc = $_POST['bifsc'];
        $bsq = $_POST['bsq'];
        $bsa = $_POST['bsa'];

        $q = "UPDATE tblreceiver SET 
              Receiver_name='$fname', 
              Email='$email', 
              Password='$pwd', 
              Bank_Name='$bname', 
              Date_Joined='$doj', 
              Bank_IFSC_Code='$bifsc', 
              Security_Question='$bsq', 
              Security_Answers='$bsa' 
              WHERE Receiver_id='$dir'";

        if(mysqli_query($mysql, $q)){
            header("location:ManageUser.php?umsg=Receiver information is edited");
        } else {
            die("Something went wrong: ".mysqli_error($mysql));
        }
    }
?>
<?php include('footer.php'); ?>
