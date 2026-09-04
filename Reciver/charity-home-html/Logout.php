<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Ask the user if they want to log out using SweetAlert
        function confirmLogout() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to log out?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, log me out!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form to log out
                    document.getElementById("logoutForm").submit();
                } else {
                    // If not confirmed, redirect to Donor_Home page
                    window.location.href = "Receiver_Home.php";
                }
            });
        }

        // Function to show a success message after logout
        function showLogoutSuccess() {
            Swal.fire({
                title: 'Logged Out!',
                text: 'You have been successfully logged out.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '/TY_A_29/MiniProject/Guest/charity-home-html/Home.php';
            });
        }
    </script>
</head>
<body onload="confirmLogout()">

    <form id="logoutForm" action="" method="post">
        <input type="hidden" name="logoutForm" value="1">
        <?php
        // Handle logout on form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logoutForm'])) {
            // Destroy session to log out the user
            session_destroy();
            // Trigger the JavaScript function to show SweetAlert success message
            echo '<script>showLogoutSuccess();</script>';
            exit();
        }
        ?>
    </form>

</body>
</html>
