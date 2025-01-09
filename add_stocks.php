<?php
include('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if form is submitted

    // Get input values
    $fuelType = mysqli_real_escape_string($con, $_POST['fuel_type']);
    $quantityToAdd = intval($_POST['quantity']);

    // Validate input
    if (empty($fuelType) || $quantityToAdd <= 0) {
        $error = "Invalid input. Please provide valid values.";
    } else {
        // Update the existing quantity
        $updateSql = "UPDATE stocks SET quantity = quantity + $quantityToAdd WHERE fuel_type = '$fuelType'";
        if (mysqli_query($con, $updateSql)) {
            $success = "Stocks added successfully.";
        } else {
            $error = "Error updating stocks: " . mysqli_error($con);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Add Stocks</title>
    <style>
        /* Add your styles here */
        .content {
            padding: 20px;
        }

        .form-container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
        }

        input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <?php include('fuelnavbar.php'); ?>

    <div class="content">
        <h1>Add Stocks</h1>

        <div class="form-container">
            <?php
            if (isset($error)) {
                echo '<p style="color: red;">' . $error . '</p>';
            } elseif (isset($success)) {
                echo '<p style="color: green;">' . $success . '</p>';
            }
            ?>

            <form method="post" action="">
                <label for="fuel_type">Fuel Type:</label>
                <input type="text" id="fuel_type" name="fuel_type" required>

                <label for="quantity">Quantity to Add:</label>
                <input type="number" id="quantity" name="quantity" required>

                <input type="submit" name="submit" value="Add Stocks">
            </form>
        </div>
    </div>

</body>

</html>

<?php
mysqli_close($con);
?>
