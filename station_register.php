<?php
include('dbconnect.php'); // Include your database connection script

if (isset($_POST['submit'])) {
    $station_name = mysqli_real_escape_string($con, $_POST['station_name']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password =  $_POST['password'] ;

    if (!preg_match('/^[0-9]{10}$/', $contact)) {
        echo '<div class="content">';
        echo '<p>Please enter a valid 10-digit phone number.</p>';
        echo '</div>';
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Add validation checks if needed

    // SQL query to insert fuel station data into the database
    $sql = "INSERT INTO fuel_stations (station_name, location, contact, username, password) 
            VALUES ('$station_name', '$location', '$contact', '$username', '$password')";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Fuel station registered successfully!"); window.location.href="station_login.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Fuel Station Registration</title>
</head>
<style>
     body {
        background-image: url('station.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .form-container {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f2f2f2;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .form-container {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: transparent;
        border: 1px solid #ccc;
        border-radius: 5px;
        backdrop-filter: blur(9px);
    }

    .form-container h1 {
        text-align: center;
    }

    .form-container form {
        display: flex;
        flex-direction: column;
    }

    .form-container label {
        margin-bottom: 10px;
    }

    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"] {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-container input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: bold;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    } 
</style>
<body>
    

    <div class="form-container">
        <h1>Fuel Station Registration</h1>
        <form action="station_register.php" method="post">
            <label for="station_name">Station Name:</label>
            <input type="text" id="station_name" name="station_name" required><br><br>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required><br><br>

            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" required><br><br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" name="submit" value="Register">
        </form>
    </div>
</body>

</html>
