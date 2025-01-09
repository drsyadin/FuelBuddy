<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Order Reports</title>
</head>

<body>
    <?php include('adminnavbar.php'); ?>

    <div class="content">
        <h1>Order Reports</h1>

        <?php
        include('dbconnect.php');

        // Fetch order report by fuel type
        $orderReportFuelTypeSql = "SELECT fuel_type, SUM(quantity) as total_quantity, COUNT(*) as order_count FROM orders GROUP BY fuel_type";
        $orderReportFuelTypeResult = mysqli_query($con, $orderReportFuelTypeSql);

        // Fetch order report by customer name
        $orderReportCustomerSql = "SELECT customer_name, SUM(quantity) as total_quantity, COUNT(*) as order_count FROM orders GROUP BY customer_name";
        $orderReportCustomerResult = mysqli_query($con, $orderReportCustomerSql);

        if (!$orderReportFuelTypeResult || !$orderReportCustomerResult) {
            echo "Error: " . mysqli_error($con);
        } else {
            // Display order report by fuel type
            if (mysqli_num_rows($orderReportFuelTypeResult) > 0) {
                echo '<h2>By Fuel Type</h2>';
                echo '<table>';
                echo '<tr>';
                echo '<th>Fuel Type</th>';
                echo '<th>Total Quantity</th>';
                echo '<th>Order Count</th>';
                echo '</tr>';

                while ($row = mysqli_fetch_assoc($orderReportFuelTypeResult)) {
                    echo '<tr>';
                    echo '<td>' . $row['fuel_type'] . '</td>';
                    echo '<td>' . $row['total_quantity'] . '</td>';
                    echo '<td>' . $row['order_count'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
                echo '<br>';
                echo '<form action="download_order_report.php" method="post">';
                echo '<input type="hidden" name="report_type" value="fuel_type">';
                echo '<button type="submit" name="download" value="1">Download CSV</button>';
                echo '</form>';
            } else {
                echo '<p>No order report by fuel type available.</p>';
            }

            // Display order report by customer name
            if (mysqli_num_rows($orderReportCustomerResult) > 0) {
                echo '<h2>By Customer Name</h2>';
                echo '<table>';
                echo '<tr>';
                echo '<th>Customer Name</th>';
                echo '<th>Total Quantity</th>';
                echo '<th>Order Count</th>';
                echo '</tr>';

                while ($row = mysqli_fetch_assoc($orderReportCustomerResult)) {
                    echo '<tr>';
                    echo '<td>' . $row['customer_name'] . '</td>';
                    echo '<td>' . $row['total_quantity'] . '</td>';
                    echo '<td>' . $row['order_count'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
                echo '<br>';
                echo '<form action="download_order_report.php" method="post">';
                echo '<input type="hidden" name="report_type" value="customer_name">';
                echo '<button type="submit" name="download" value="1">Download CSV</button>';
                echo '</form>';
            } else {
                echo '<p>No order report by customer name available.</p>';
            }
        }

        mysqli_close($con);
        ?>
    </div>
</body>

</html>
