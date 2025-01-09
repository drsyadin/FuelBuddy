<?php
include('dbconnect.php'); // Include your database connection file

// Initialize variables to store user input
$customerName = $email = $phone = $address = '';
$errorMessage = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize input data
    $customerName = mysqli_real_escape_string($con, $_POST['customer_name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? mysqli_real_escape_string($con, $_POST['email']) : '';
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    // Check if required fields are not empty
    if (empty($customerName) || empty($email) || empty($phone) || empty($address)) {
        $errorMessage = 'All fields are required.';
    } else {
        // Insert data into the customer_details table
        $insertSql = "INSERT INTO customer_details (customer_name, email, phone, address) VALUES ('$customerName', '$email', '$phone', '$address')";
        if (mysqli_query($con, $insertSql)) {
            // Data inserted successfully
            echo '<script>alert("Account details updated successfully.");</script>';
        } else {
            // Error in SQL query
            $errorMessage = 'Error: ' . mysqli_error($con);
        }
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
    <title>Account Settings</title>
</head>
<style>
    /* Apply general styles to the form */
form {
  width: 400px;
  margin: 0 auto;
}

/* Style the labels */
label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

/* Style the input fields */
input[type="text"],
input[type="email"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

/* Style the submit button */
button[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

</style>
<body>
    <?php include('navbar.php'); ?>

    <div class="content">
        <h1>Account Settings</h1>

        <form method="post" action="">
            <label for="customer_name">Customer Name:</label>
            <input type="text" name="customer_name" value="<?php echo htmlspecialchars($customerName); ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>

            <label for="address">Address:</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" required>

            <button type="submit">Update Account</button>
        </form>

        <div class="error-message"><?php echo $errorMessage; ?></div>
    </div>
</body>

</html>
