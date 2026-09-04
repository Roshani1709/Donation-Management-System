<?php
require 'db.php';

$donorName = '';
$securityQuestion = '';
$storedAnswer = '';
$password = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if Donor Name was submitted, but Security Answer was not
    if (isset($_POST['Donor_Name']) && !isset($_POST['Security_Answer'])) {
        $donorName = $_POST['Donor_Name'];

        // Query to fetch the security question and answer
        $sql = "SELECT Security_Question, Security_Answers, Password FROM tbldonor WHERE Donor_Name = '$donorName'";
        $result = mysqli_query($mysql, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $securityQuestion = $row['Security_Question'];
            $storedAnswer = $row['Security_Answers'];
            $password = $row['Password'];
        } else {
            $error = "Donor not found.";
        }
    }
    
    // If Security Answer was submitted, check the answer
    if (isset($_POST['Security_Answer'])) {
        $donorName = $_POST['Donor_Name'];
        $userAnswer = $_POST['Security_Answer'];
        $storedAnswer = $_POST['storedAnswer']; // retrieve hidden value
        $password = $_POST['password']; // retrieve hidden value

        if ($storedAnswer === $userAnswer) {
            echo "<script>alert('Your password is: $password');
            window.location.href = 'login.php';
            </script>";
        } else {
            $error = "Incorrect security answer.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Include SweetAlert CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
            font-family: 'Roboto', sans-serif;
        }

        .form-container {
            width: 400px;
            padding: 30px;
            border-radius: 10px;
            background-color: rgba(19, 18, 18, 0.822);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form-container input[type="submit"] {
            background-color: transparent;
            color: #fff;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Forgot Password</h2>
        
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <!-- If the security question is available, show the form for the answer -->
        <?php if (!empty($securityQuestion)): ?>
            <form method="POST" action="">
                <input type="hidden" name="Donor_Name" value="<?php echo htmlspecialchars($donorName); ?>">
                <input type="hidden" name="storedAnswer" value="<?php echo htmlspecialchars($storedAnswer); ?>">
                <input type="hidden" name="password" value="<?php echo htmlspecialchars($password); ?>">
                
                <label for="Security_Question">Security Question:</label>
                <input type="text" id="Security_Question" name="Security_Question" value="<?php echo htmlspecialchars($securityQuestion); ?>" readonly>
                
                <label for="Security_Answer">Security Answer:</label>
                <input type="text" id="Security_Answer" name="Security_Answer" required>
                
                <input type="submit" value="Submit">
            </form>

        <!-- If no donor name was entered, show the form for donor name -->
        <?php else: ?>
            <form method="POST" action="">
                <label for="Donor_Name">Donor Name:</label>
                <input type="text" id="Donor_Name" name="Donor_Name" required>
                <input type="submit" value="Submit">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>