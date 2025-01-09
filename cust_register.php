<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Customer  Register</title>
</head>
<style>
    body {
        background-image: url('banner.png');
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
        <h1>Customer Register</h1>
        <form action=" " method="post">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required><br><br>

             
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
include('dbconnect.php');

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['full_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password =  $_POST['password'];

    // Validation
    $errors = [];

    // Validate name: Should contain only letters and spaces
    /*if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[] = "Invalid name. Only letters and spaces are allowed.";
    }*/

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate password: Minimum length of 6 characters
  //  if (strlen($_POST['password']) < 6) {
    //    $errors[] = "Password must be at least 6 characters long.";
   // }

    if (empty($errors)) {
        // Insert data into the database
        $sql = " INSERT INTO `customers`( `full_name`, `email`, `password`) VALUES ('$name', '$email', '$password')";

        if (mysqli_query($con, $sql)) {
            echo '<script>alert("Registration successful!"); window.location.href="cust_login.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo '<script>alert("' . $error . '"); window.location.href="cust_register.php";</script>';
        }
    }

    mysqli_close($con);
}
?>


