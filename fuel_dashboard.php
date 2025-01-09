<?php
include('dbconnect.php');
session_start();

// Check if the user is logged in as a fuel station
if (!isset($_SESSION['station_id'])) {
    header("Location: fuel_login.php");
    exit();
}

// Retrieve the current stock for both fuel types
$sql = "SELECT * FROM stocks";
$result = mysqli_query($con, $sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
    exit(); // Add exit to stop execution if there's an error
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Fuel Station Dashboard</title>
</head>
<style>
    
        /* Add any additional styling here */
        .content {
            display: flex;
            justify-content: space-between;
        }

        .stock-container {
            width: 48%; /* Adjust as needed */
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Fuel Station Dashboard</title>
    <style>
       <style>
    .content {
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .stock-container {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .stock-container p {
        margin: 0;
        font-size: 16px;
    }

    .stock-container p:first-child {
        font-weight: bold;
    }
</style>
    </style>
</head>

<body>

    <?php include('fuelnavbar.php'); ?>

    <div class="content">
         
    </div>

    <div class="content">
        <h1>Current Stocks</h1>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="stock-container">';
            echo '<p>Fuel Type: ' . $row['fuel_type'] . '</p>';
            echo '<p>Quantity: ' . $row['quantity'] . '</p>';
            echo '</div>';
        }
        ?>

    </div>
</body>

</html>
