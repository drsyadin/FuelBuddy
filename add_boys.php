<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Add Delivery Boy</title>
   <style>
    .content {
  text-align: center;
}

h1 {
  margin-bottom: 20px;
}

.delivery-boy-form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

label {
  margin-bottom: 10px;
}

input[type="text"] {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 300px;
  margin-bottom: 10px;
}

button {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
</style>

</head>

<body>
    <?php include('fuelnavbar.php'); ?>
    <div class="content">
    <h1 style="text-align: center; margin-bottom: 20px;">Add Delivery Boy</h1>

    <form method="post" action="" class="delivery-boy-form">
        <label for="delivery_boy_name">Delivery Boy Name:</label>
        <input type="text" name="delivery_boy_name" required>

        <label for="delivery_boy_contact">Delivery Boy Contact:</label>
        <input type="text" name="delivery_boy_contact" required>

        <button type="submit" name="add_delivery_boy" class="add-button">Add Delivery Boy</button>
    </form>
</div>

</body>

</html>
<?php
include('dbconnect.php');
session_start();

if (!isset($_SESSION['station_id'])) {
    header("Location: station_login.php");
    exit();
}

if (isset($_POST['add_delivery_boy'])) {
    $delivery_boy_name = mysqli_real_escape_string($con, $_POST['delivery_boy_name']);
    $status = 'Available'; // By default, the new delivery boy is set to 'Available'

    $sql = "INSERT INTO delivery_boys (delivery_boy_name, status) VALUES ('$delivery_boy_name', '$status')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Delivery boy added successfully');</script>";
    } else {
        echo "<script>alert('Error adding delivery boy: " . mysqli_error($con) . "');</script>";
    }

    echo "<script>window.location.href='fuel_dashboard.php';</script>";
}

mysqli_close($con);
?>
