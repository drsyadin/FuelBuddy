<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Assign Delivery Boy</title>
</head>
<style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .content {
            background-color: #fff;
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select, table {
            width: 100%;
            margin-bottom: 15px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }

        p {
            color: #333;
        }

        .error-message {
            color: #f00;
        }
</style>

<body>
    <?php include('fuelnavbar.php'); ?>

    <div class="content">
        <h1>Assign Delivery Boy to Approved Order</h1>

        <?php
        include('dbconnect.php');

        // Fetch the list of available delivery boys
        $deliveryBoySql = "SELECT * FROM delivery_boys WHERE status = 'Available'";
        $deliveryBoyResult = mysqli_query($con, $deliveryBoySql);

        // Display available delivery boys in a table
        if (mysqli_num_rows($deliveryBoyResult) > 0) {
            echo '<form method="post" action="">';
            echo '<label for="order_id">Select Order:</label>';
            echo '<select name="order_id" required>';
            
            // Fetch the list of approved orders
            $approvedOrdersSql = "SELECT * FROM orders WHERE status = '1'";
            $approvedOrdersResult = mysqli_query($con, $approvedOrdersSql);

            while ($row = mysqli_fetch_assoc($approvedOrdersResult)) {
                echo "<option value='" . $row['order_id'] . "'>" . $row['order_id'] . " - " . $row['customer_name'] . "</option>";
            }

            echo '</select>';
            echo '<br>';
            echo '<label for="delivery_boy_id">Select Delivery Boy:</label>';
            echo '<table>';
            echo '<tr>';
            echo '<th>Delivery Boy ID</th>';
            echo '<th>Delivery Boy Name</th>';
            echo '<th>Action</th>';
            echo '</tr>';

            while ($row = mysqli_fetch_assoc($deliveryBoyResult)) {
                echo '<tr>';
                echo '<td>' . $row['delivery_boy_id'] . '</td>';
                echo '<td>' . $row['delivery_boy_name'] . '</td>';
                echo '<td><input type="radio" name="delivery_boy_id" value="' . $row['delivery_boy_id'] . '" required></td>';
                echo '</tr>';
            }

            echo '</table>';
            echo '<br>';
            echo '<button type="submit" name="assign_delivery_boy">Assign Delivery Boy</button>';
            echo '</form>';
        } else {
            echo '<p>No available delivery boys.</p>';
        }

        mysqli_close($con);
        ?>
    </div>
</body>

</html>
<?php
include('dbconnect.php');
session_start();

if (!isset($_SESSION['station_id'])) {
    header("Location: fuelstation_login.php");
    exit();
}

if (isset($_POST['assign_delivery_boy'])) {
    $order_id = mysqli_real_escape_string($con, $_POST['order_id']);
    $delivery_boy_id = mysqli_real_escape_string($con, $_POST['delivery_boy_id']);

    // Update the order with the assigned delivery boy
    $updateOrderSql = "UPDATE orders SET delivery_boy_id = '$delivery_boy_id', status = '2' WHERE order_id = '$order_id'";

    if (mysqli_query($con, $updateOrderSql)) {
        // Update the status of the assigned delivery boy
        $updateDeliveryBoySql = "UPDATE delivery_boys SET status = 'Assigned' WHERE delivery_boy_id = '$delivery_boy_id'";
        mysqli_query($con, $updateDeliveryBoySql);

        // Display success message
        echo "<script>alert('Order assigned to delivery boy successfully');</script>";
    } else {
        // Display error message
        echo "<script>alert('Error assigning delivery boy: " . mysqli_error($con) . "');</script>";
    }

    // Redirect back to assign_boys.php
    echo "<script>window.location.href='assign_boys.php';</script>";
}

mysqli_close($con);
?>
