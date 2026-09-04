
<?php
// File Name: Logout.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        // Ask the user if they want to log out
        function confirmLogout() {
            const isConfirmed = confirm("Do you want to log out?");
            if (isConfirmed) {
                // If confirmed, submit the form to log out
                document.getElementById("logoutForm").submit();
            } else {
                // If not confirmed, do nothing
                return false;
            }
        }
    </script>
</head>

<body onload="confirmLogout()">
    <form id="logoutForm" action="" method="post">
        <?php
        session_start(); // Start the session
        
        // Check if the session variable is set
        if (isset($_SESSION['Admin_Name'])) {
            // Unset all session variables

            session_destroy();
        
        header("Location:/TY_A_29/MiniProject/Guest/charity-home-html/Home.php?logout=success");
        exit();
        }
        ?>
    </form>
</body>

</html> 