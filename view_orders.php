<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>View Orders</title>
</head>
<style>
    /* Add your styling here */

.content {
    margin: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

</style>
<body>
    <?php include('adminnavbar.php'); ?>

    <div class="content">
        <h1>View All Orders</h1>

        <?php
        include('dbconnect.php');

        // Fetch all orders
        $ordersSql = "SELECT * FROM orders";
        $ordersResult = mysqli_query($con, $ordersSql);

        if (mysqli_num_rows($ordersResult) > 0) {
            echo '<table>';
            echo '<tr>';
            echo '<th>Order ID</th>';
            echo '<th>Customer Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Total Price</th>';
            echo '<th>Status</th>';
            echo '</tr>';

            while ($row = mysqli_fetch_assoc($ordersResult)) {
                echo '<tr>';
                echo '<td>' . $row['order_id'] . '</td>';
                echo '<td>' . $row['customer_name'] . '</td>';
                echo '<td>' . $row['quantity'] . '</td>';
                echo '<td>' . $row['total_price'] . '</td>';
                echo '<td>' . ($row['status'] == '0' ? 'Pending' : 'Approved') . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No orders available.</p>';
        }

        mysqli_close($con);
        ?>
    </div>
</body>

</html>
