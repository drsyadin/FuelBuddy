<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Customer Login</title>
</head>
 
<style>
    body {
        background-image: url('banner.png');
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
        <h1>Customer Login</h1>
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" name="submit" value="Login">
        </form>
    </div>

</body>

</html>
<?php
session_start();
include('dbconnect.php'); // Include your database connection code here

if (isset($_POST['submit'])) {
    $email =  $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customers WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0 ) {
        $_SESSION['customer_id'] = $row['customer_id'];
        $_SESSION['customer_name'] = $row['name'];
        header("Location: cust_dashboard.php"); // Redirect to customer dashboard page after successful login
    } else {
        echo '<script>alert("Invalid email or password"); window.location.href="cust_login.php";</script>';
    }
}

mysqli_close($con);
?>
