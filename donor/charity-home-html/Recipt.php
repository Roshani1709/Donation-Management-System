<?php
require 'db.php';

if (!isset($_GET['aid'])) {
    die("No donation selected.");
}

$donation_id = $_GET['aid'];

// Fetch donation details based on Donation_id
$query = "SELECT d.*, dn.Donor_Name, r.Receiver_Name, c.Category_Name
          FROM tbldonation d
          JOIN tblcategory c ON d.Category_id = c.Category_id
          JOIN tbldonor dn ON d.Donor_id = dn.Donor_id
          LEFT JOIN tblreceiver r ON r.Receiver_id = d.Receiver_id
          WHERE d.Donation_id = $donation_id";
$result = mysqli_query($mysql, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("No record found for the given Donation ID.");
}

$donation = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            width: 60%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        .btn {
            background-color: lightgreen;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: green;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container">
    <h2>Donation Receipt</h2>
    <table>
        <tr>
            <th>Donation ID</th>
            <td><?php echo $donation['Donation_id']; ?></td>
        </tr>
        <tr>
            <th>Donor Name</th>
            <td><?php echo $donation['Donor_Name']; ?></td>
        </tr>
        <tr>
            <th>Category Name</th>
            <td><?php echo $donation['Category_Name']; ?></td>
        </tr>
        <tr>
            <th>Receiver Name</th>
            <td><?php echo ($donation['Receiver_Name']) ? $donation['Receiver_Name'] : 'N/A'; ?></td>
        </tr>
        <tr>
            <th>Donation Date</th>
            <td><?php echo $donation['Donation_Date']; ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo $donation['Status']; ?></td>
        </tr>
        <tr>
            <th>Payment Type</th>
            <td><?php echo $donation['Payment_Type']; ?></td>
        </tr>
        <tr>
            <th>Payment Amount</th>
            <td><?php echo $donation['Payment_Amount']; ?></td>
        </tr>
        <tr>
            <th>Bank Name</th>
            <td><?php echo $donation['Bank_Name']; ?></td>
        </tr>
        <tr>
            <th>Bank IFSC Code</th>
            <td><?php echo $donation['Bank_Ifsc_Code']; ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?php echo $donation['Description']; ?></td>
        </tr>
    </table>

    <!-- Download Receipt button with SweetAlert -->
    <a href="javascript:void(0);" class="btn" id="downloadBtn">Download Receipt</a>
</div>

<script>
    document.getElementById('downloadBtn').addEventListener('click', function () {
        var dname = '<?php echo $donation['Donor_Name']; ?>'; // Fetch the donor name

        // Trigger the download using JavaScript
        //window.location.href = 'downloadReceipt.php?aid=<?php echo $donation_id; ?>';

        // Show the SweetAlert notification after the download
        Swal.fire({
            title: 'Success!',
            text: 'Your donation receipt has been downloaded successfully, ' + dname + '!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            // On OK button click, navigate to Donation History page
            if (result.isConfirmed) {
                window.location.href = 'Donation_History.php';
            }
        });
    });
</script>

</body>
</html>
