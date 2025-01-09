<?php
session_start();
include('dbconnect.php');

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM fuel_stations WHERE username='$username'";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        if ($row['status'] == 'Approved') {
            // Allow login
            $_SESSION['station_id'] = $row['station_id'];
            $_SESSION['station_name'] = $row['station_name'];

            // Redirect to the station dashboard
            header("Location: fuel_dashboard.php");
            exit();
        } elseif ($row['status'] == 'Pending') {
            echo '<script>alert("Fuel station approval is pending. Please wait for admin approval.");</script>';
        } else {
            echo '<script>alert("Invalid username or password. Please try again.");</script>';
        }
    } else {
        echo '<script>alert("Invalid username or password. Please try again.");</script>';
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
    <title>Fuel Station Login</title>
</head>
<style>
        body {
        background-image: url('station.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .form-container {
        width: 400px;
        padding: 20px;
        background-color: transparent;
        border: 1px solid #ccc;
        border-radius: 5px;
        backdrop-filter: blur(9px);
        text-align: center;
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
        <h1>Fuel Station Login</h1>
        <form action="station_login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>

</html>
