<?php
include('dbconnect.php');
session_start();

 

// Fetch the list of pending fuel station registrations
$sql = "SELECT * FROM fuel_stations WHERE status = 'Pending'";
$result = mysqli_query($con, $sql);

if (isset($_POST['approve'])) {
    $station_id = mysqli_real_escape_string($con, $_POST['station_id']);

    // Update the status of the fuel station to 'Approved'
    $updateSql = "UPDATE fuel_stations SET status = 'Approved' WHERE station_id = '$station_id'";
    
    if (mysqli_query($con, $updateSql)) {
        echo "<script>alert('Fuel station approved successfully');</script>";
    } else {
        echo "<script>alert('Error approving fuel station: " . mysqli_error($con) . "');</script>";
    }

    // Redirect back to approve_fuel_stations.php
    echo "<script>window.location.href='approve_fuel_stations.php';</script>";
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Approve Fuel Stations</title>
</head>
<style>
    <style>
    .content {
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 20px;
    }

    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    form {
        display: flex;
        justify-content: center;
    }

    input[type="hidden"],
    button {
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }

    button:hover {
        background-color: #45a049;
    }

    p {
        color: #333;
        text-align: center;
    }
</style>

</style>
<body>
    <?php include('adminnavbar.php'); ?>

    <div class="content">
        <h1>Approve Fuel Stations</h1>

        <?php
        if (mysqli_num_rows($result) > 0) {
            echo '<table>';
            echo '<tr>';
            echo '<th>Fuel Station ID</th>';
            echo '<th>Fuel Station Name</th>';
            echo '<th>Location</th>';
            echo '<th>Action</th>';
            echo '</tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['station_id'] . '</td>';
                echo '<td>' . $row['station_name'] . '</td>';
                echo '<td>' . $row['location'] . '</td>';
                echo '<td>
                        <form method="post" action="">
                            <input type="hidden" name="station_id" value="' . $row['station_id'] . '">
                            <button type="submit" name="approve">Approve</button>
                        </form>
                    </td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No pending fuel station registrations.</p>';
        }
        ?>
    </div>
</body>

</html>
