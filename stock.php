<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Fuel Station Dashboard</title>
    <style>
        /* Add your styles here */
        .content {
            padding: 20px;
        }

        .fuel-container {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <?php include('fuelnavbar.php'); ?>

    <div class="content">
        <h1>Fuel Quantity Management</h1>
        <?php displayFuelContainer('Petrol'); ?>
        <?php displayFuelContainer('Diesel'); ?>
    </div>

</body>

</html>

<?php
include('dbconnect.php');

function getFuelQuantity($fuelType)
{
    global $con;

    $sql = "SELECT quantity FROM stocks WHERE fuel_type = '$fuelType'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['quantity'];
    } else {
        return 'Error: ' . mysqli_error($con);
    }
}

function displayFuelContainer($fuelType)
{
    $quantity = getFuelQuantity($fuelType);

    echo '<div class="fuel-container">';
    echo "<p>Fuel Type: $fuelType</p>";
    echo "<p>Current Quantity: $quantity liters</p>";
    echo '</div>';
}

// Usage example
$petrolQuantity = getFuelQuantity('Petrol');
$dieselQuantity = getFuelQuantity('Diesel');

echo "Petrol Quantity: $petrolQuantity liters<br>";
echo "Diesel Quantity: $dieselQuantity liters";

mysqli_close($con);
?>
