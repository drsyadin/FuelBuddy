<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image:url('admin.jpg');
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .dashboard {
            display: flex;
            justify-content: space-around;
            margin: 20px;
        }

         
    .box {
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin: 20px; /* Add margin for spacing */
    }

    .box a {
        text-decoration: none;
        color: inherit;
    }

    /* Add more styles for a cleaner look */
    .box h2 {
        color: #333;
        margin-bottom: 15px;
    }

    .box p {
        color: #666;
        line-height: 1.6;
    }

    .box a.button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 15px;
        transition: background-color 0.3s ease;
    }

    .box a.button:hover {
        background-color: #45a049;
    }
 

    </style>
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include('adminnavbar.php'); ?>

    <div class="dashboard">
        <div class="box">
            <h2>
                <a href="cust_report.php" title="Click to view Customer Report">
                    Number of Customers
                </a>
            </h2>
            <?php
            include('dbconnect.php');
            $customerCountSql = "SELECT COUNT(*) as customer_count FROM customer_details";
            $customerCountResult = mysqli_query($con, $customerCountSql);
            $customerCount = mysqli_fetch_assoc($customerCountResult)['customer_count'];
            echo "<p>$customerCount</p>";
            mysqli_close($con);
            ?>
        </div>

        <div class="box">
            <h2>Number of Fuel Stations</h2>
            <?php
            include('dbconnect.php');
            $fuelStationCountSql = "SELECT COUNT(*) as fuel_station_count FROM fuel_stations WHERE status = 'Approved'";
            $fuelStationCountResult = mysqli_query($con, $fuelStationCountSql);
            $fuelStationCount = mysqli_fetch_assoc($fuelStationCountResult)['fuel_station_count'];
            echo "<p>$fuelStationCount</p>";
            mysqli_close($con);
            ?>
        </div>

        <div class="box">
            <h2>
                <a href="view_orders.php" title="view all orders">
                    Total Number of Orders
    </a>
</h2>
            <?php
            include('dbconnect.php');
            $orderCountSql = "SELECT COUNT(*) as order_count FROM orders";
            $orderCountResult = mysqli_query($con, $orderCountSql);
            $orderCount = mysqli_fetch_assoc($orderCountResult)['order_count'];
            echo "<p>$orderCount</p>";
            mysqli_close($con);
            ?>
        </div>
    </div>
</body>

</html>
