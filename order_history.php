<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("Location: customer_login.php");
    exit();
}

include('dbconnect.php');

// Fetch order history for the logged-in customer
$customerId = $_SESSION['customer_id'];
$orderHistorySql = "SELECT * FROM orders WHERE customer_id = '$customerId'";
$orderHistoryResult = mysqli_query($con, $orderHistorySql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Order History</title>
    <!-- Add any additional styling if needed -->
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="content">
        <h1>Order History</h1>

        <?php
        if (mysqli_num_rows($orderHistoryResult) > 0) {
            // Display order history in a table
            echo '<table>';
            echo '<tr>';
            echo '<th>Order ID</th>';
            echo '<th>Delivery Boy</th>';
            echo '<th>Approval Status</th>';
            echo '<th>Delivery Status</th>';
            echo '</tr>';

            while ($row = mysqli_fetch_assoc($orderHistoryResult)) {
                echo '<tr>';
                echo '<td>' . $row['order_id'] . '</td>';
                echo '<td>' . $row['delivery_boy_id'] . '</td>';
                echo '<td>' . ($row['status'] == 1 ? 'Approved' : 'Pending') . '</td>';
                echo '<td>' . ($row['status'] == 2 ? 'Delivered' : 'Not Delivered') . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No order history available.</p>';
        }

        mysqli_close($con);
        ?>
    </div>
</body>

</html>
