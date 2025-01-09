<?php
include('dbconnect.php');

// Check if the user is logged in and has the necessary role (fuel station owner)
// You need to implement your authentication logic here

// Fetch pending orders
$sql = "SELECT * FROM orders WHERE status = '0'";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Pending Orders</title>
</head>
<style>
    <style>
    .order-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .order-table th, .order-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .order-form {
        display: flex;
        gap: 5px;
        justify-content: center;
    }

    .approve-button, .decline-button {
        padding: 8px 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .decline-button {
        background-color: #f44336;
    }
</style>

</style>
<body>
    <?php include('fuelnavbar.php'); ?>

    <div class="content">
        <h1>Pending Orders</h1>

        <?php
if (mysqli_num_rows($result) > 0) {
    // Display the list of pending orders in a table with improved styling
    echo '<table class="order-table">';
    echo '<tr>';
    echo '<th>Order ID</th>';
    echo '<th>Customer</th>';
    echo '<th>Quantity</th>';
    echo '<th>Total Price</th>';
    echo '<th>Action</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['order_id'] . '</td>';
        echo '<td>' . $row['customer_name'] . '</td>';
        echo '<td>' . $row['quantity'] . '</td>';
        echo '<td>₹' . $row['total_price'] . '</td>';
        echo '<td>';
        echo '<form action="" method="post" class="order-form">';
        echo '<input type="hidden" name="order_id" value="' . $row['order_id'] . '">';
        echo '<button type="submit" name="approve" class="approve-button">Approve</button>';
        echo '<button type="submit" name="decline" class="decline-button">Decline</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<p>No pending orders</p>';
}
?>


    </div>
</body>

</html>

<?php
include('dbconnect.php');

// Check if the user is logged in and has the necessary role (fuel station owner)
// You need to implement your authentication logic here

if (isset($_POST['approve'])) {
    // Approve the order
    $order_id = mysqli_real_escape_string($con, $_POST['order_id']);

    // Update the status of the order to 'Approved'
    $update_status_sql = "UPDATE orders SET status = '1' WHERE order_id = '$order_id'";
    if (mysqli_query($con, $update_status_sql)) {
        echo "Order approved successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
} elseif (isset($_POST['decline'])) {
    // Decline the order
    $order_id = mysqli_real_escape_string($con, $_POST['order_id']);

    // Move the order to declined_orders table
    $move_sql = "INSERT INTO declined_orders (customer_name, quantity, total_price)
                 SELECT customer_name, quantity, total_price
                 FROM orders 
                 WHERE order_id = '$order_id'";

    if (mysqli_query($con, $move_sql)) {
        // Update the status of the order to 'Declined'
        $update_status_sql = "UPDATE orders SET status = '2' WHERE order_id = '$order_id'";
        if (mysqli_query($con, $update_status_sql)) {
            echo "Order declined successfully";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
        echo "Error moving record: " . mysqli_error($con);
    }
} else {
    // Invalid request
    echo " ";
}

mysqli_close($con);
?>
