<?php ob_start() ?>
        <?php
        session_start();

        require 'db.php';

        // Check if the database connection is successful
        if (!$mysql) {
            die("Database connection failed: " . mysqli_connect_error());
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adminName = $_POST['Admin_Name'];
            $password = $_POST['Password'];


            $sql = "SELECT * FROM tbladmin WHERE Admin_Name = '$adminName' AND Password = '$password'";
            $result = mysqli_query($mysql, $sql);

            if ($result && mysqli_num_rows($result) === 1) {

                $_SESSION['Admin_Name'] = $adminName;

                if (isset($_POST['remember'])) {
                    setcookie('admin_name', $adminName, time() + (15 * 24 * 60 * 60)); // 15 days
                    setcookie('password', $password, time() + (15 * 24 * 60 * 60));   // 15 days
                }

                header("Location: AdminHome.php?uname=" . urlencode($adminName)); // Redirect to admin dashboard
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        }
        ?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Login</title>
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
                    color: #333;
                    text-align: center;
                }

                .form-container input[type="text"],
                .form-container input[type="password"] {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 15px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    box-sizing: border-box;
                    font-size: 14px;
                }

                .form-container input[type="submit"] {
                    width: 100%;
                    padding: 10px;
                    background-color: transparent;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    font-size: 16px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                .form-container input[type="submit"]:hover {
                    background-color: lightgreen;
                }

                .error {
                    color: red;
                    text-align: center;
                    margin-bottom: 15px;
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
                <h2 style="color:white">Admin Login</h2>
                <?php if (isset($error)) {      
                    echo "<p class='error'>$error</p>";
                } ?>
                <form method="POST" action="">
                    <label for="Admin_Name">Username:</label>
                    <input type="text" id="Admin_Name" name="Admin_Name" required value="<?php if (isset($_COOKIE['admin_name'])) echo $_COOKIE['admin_name']; ?>">
                    <label for="Password">Password:</label>
                    <input type="password" id="Password" name="Password" required value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
                    <input type="checkbox" name="remember" id="remember">Remember Me
                    <input type="submit" value="Login">
                    <a href="AdminforgotPass.php?admin_name=<?php echo urlencode($_COOKIE['admin_name'] ?? ''); ?>"
                        class="fables-forth-text-color font-16 fables-second-hover-color underline mt-3 mb-4 m-lg-5 d-block"
                        style="font-size:20px">
                        Forgot Password?
                    </a>

                    <p class="fables-forth-text-color" style="font-size:20px">Dont have an account ? <a href="Register_insert.php" class="font-16 semi-font fables-second-text-color underline fables-main-hover-color ml-2" style="font-size:20px">Register</a></p>
                </form>
            </div>
        </body>

        </html>