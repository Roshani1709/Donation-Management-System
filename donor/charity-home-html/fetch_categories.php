<section>
    <?php
    // File Name: Categories.php 
    require 'db.php';
    session_start();
    if (!isset($_SESSION['dname'])) {
        header("Location: login.php");
        exit();
    }
    ?>

    <link rel="stylesheet" href="../Include/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .card {
            transition: transform 0.2s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title {
            font-size: 1.25rem;
            color: #D5006D;
            font-weight: bold;
        }

        .card-text {
            font-weight: bold;
        }

        .btn-custom {
            background-color: #D5006D;
            color: #fff;
            width: 100%;
            text-align: center;
        }

        .container {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .col-md-4 {
            margin-bottom: 20px;
            padding: 0 20px;
        }
    </style>

    <div class="container">
        <input type="text" id="search" class="form-control" placeholder="Search categories..." onkeyup="searchCategories()">
    </div><br>

    <div class="container">
        <div class="row g-3" id="categoryContainer">
            <!-- Category cards will be dynamically loaded here -->
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Load all categories on page load
            loadCategories('');

            // Function to load categories via AJAX
            function loadCategories(query) {
                $.ajax({
                    url: 'fetch_categories.php',  // The PHP file that handles the query
                    type: 'POST',
                    data: { search: query },
                    success: function (response) {
                        $('#categoryContainer').html(response);  // Update the category container with the result
                    }
                });
            }

            // Trigger search on keyup
            function searchCategories() {
                let query = $('#search').val();
                loadCategories(query);  // Call AJAX function with the search query
            }

            window.searchCategories = searchCategories;
        });
    </script>
</section>



<?php
require 'db.php';

// Get the search query from the AJAX request
$searchQuery = isset($_POST['search']) ? mysqli_real_escape_string($mysql, $_POST['search']) : '';

// Modify the query to include the search condition
if ($searchQuery != '') {
    $q = "SELECT * FROM tblcategory WHERE Category_Name LIKE '%$searchQuery%'";
} else {
    $q = "SELECT * FROM tblcategory";
}

$res = mysqli_query($mysql, $q) or die('Query Failed!!!' . mysqli_error($mysql));
$nor = mysqli_num_rows($res);

if ($nor > 0) {
    $counter = 0;
    while ($r = mysqli_fetch_array($res)) {
        echo "<div class='col-md-4'>
                <div class='card'>
                    <img src='$r[3]' class='card-img-top' alt='$r[1]' height='200px'>
                    <div class='card-body'>
                        <h5 class='card-title'>$r[1]</h5>
                        <p class='card-text'>$r[2]</p>
                        <form method='POST' action='ADD_Donate_Money.php'>
                            <input type='hidden' name='name' value='$r[1]'>
                            <input type='hidden' name='image' value='$r[3]'>
                            <input type='hidden' name='details' value='$r[2]'>
                            <button type='submit' class='btn btn-custom'>Donate Now</button>
                        </form>
                    </div>
                </div>
              </div>";
        $counter++;
        if ($counter % 3 == 0) {
            echo "</div><br><div class='row g-3'>";
        }
    }
} else {
    echo "<p class='text-center'>No categories found.</p>";
}
?>
