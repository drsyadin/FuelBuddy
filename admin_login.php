<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Login</title>
    <style>
           body {
        background-image: url('admin.jpg');
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
        padding: 20px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 10px;
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
</head>

<body>
    <div class="form-container">
        <h1>Admin Login</h1>

        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>

</html>
<?php
include('dbconnect.php');
session_start();

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Your password hashing and validation logic should be implemented here
    // For simplicity, I'm using plain text for demonstration purposes

  // This is a simple demonstration, not recommended for real-world usage

    $sql = "SELECT * FROM admins WHERE username = '$username' ";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin_username'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}

mysqli_close($con);
?>
