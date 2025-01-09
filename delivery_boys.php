<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Delivery Boys</title>
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

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php include('fuelnavbar.php'); ?>

    <div class="content">
        <h1>Delivery Boys</h1>

        <?php
        include('dbconnect.php');

        // Fetch the list of delivery boys
        $deliveryBoySql = "SELECT * FROM delivery_boys";
        $deliveryBoyResult = mysqli_query($con, $deliveryBoySql);

        // Display delivery boys in a table
        if (mysqli_num_rows($deliveryBoyResult) > 0) {
            echo '<table>';
            echo '<tr>';
            echo '<th>Delivery Boy ID</th>';
            echo '<th>Delivery Boy Name</th>';
            echo '<th>Status</th>';
            echo '</tr>';

            while ($row = mysqli_fetch_assoc($deliveryBoyResult)) {
                echo '<tr>';
                echo '<td>' . $row['delivery_boy_id'] . '</td>';
                echo '<td>' . $row['delivery_boy_name'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No delivery boys found.</p>';
        }

        mysqli_close($con);
        ?>
    </div>
</body>

</html>
