<?php
session_start();
// Add authentication check here if needed
?>

<?php
include('dbconnect.php');

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $pickup_location = mysqli_real_escape_string($con, $_POST['pickup_location']);
    $gps_address = mysqli_real_escape_string($con, $_POST['gps_address']);
    $pin_code = mysqli_real_escape_string($con, $_POST['pin_code']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $fuel_type = mysqli_real_escape_string($con, $_POST['fuel_type']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $date = mysqli_real_escape_string($con, $_POST['prebook_date']);

    // Validate phone number
    if (!preg_match('/^[0-9]{10}$/', $contact)) {
        echo '<div class="content">';
        echo '<p>Please enter a valid 10-digit phone number.</p>';
        echo '</div>';
        exit;
    }

    // Assuming you have an array of fuel prices fetched from the database
    $fuelPrices = [
        'Petrol' => 107, // Replace with actual prices from the database
        'Diesel' => 96
    ];

    // Calculate the total price based on the selected fuel type and quantity
    $fuel_price = $fuelPrices[$fuel_type];
    $total_price = $quantity * $fuel_price;

    // SQL query to insert form data into the fuel_orders table
    $sql_fuel_orders = "INSERT INTO prebook_orders (name, pickup_location, gps_address, pin_code, contact, fuel_type, quantity, prebook_date, total_price) 
                        VALUES ('$name', '$pickup_location', '$gps_address', '$pin_code', '$contact', '$fuel_type', '$quantity', '$date', '$total_price')";

    if (mysqli_query($con, $sql_fuel_orders)) {
        // If the insertion into fuel_orders is successful, proceed to insert into orders table
        $order_id = mysqli_insert_id($con); // Get the last inserted ID from fuel_orders

        // SQL query to insert into orders table
        $sql_orders = "INSERT INTO `orders`(`order_id`, `customer_name`, `quantity`, `total_price`, `fuel_type`, `status`)
                        VALUES ('$order_id', '$name', '$quantity', '$total_price', '$fuel_type', '0')";

        if (mysqli_query($con, $sql_orders)) {
            // Redirect to the bill_summary page with the order_id
            header("Location: bill_summary.php?order_id=$order_id");
            exit;
        } else {
            echo "Error: " . $sql_orders . "<br>" . mysqli_error($con);
        }

        mysqli_close($con);
    } else {
        echo "Error: " . $sql_fuel_orders . "<br>" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Book Now</title>
    <script>
        function getCurrentLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            document.getElementById("pickup_location").value = position.coords.latitude + ", " + position.coords.longitude;
        }
    </script>
</head>
<style>
    .content {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f2f2f2;
        border-radius: 5px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        display: grid;
        gap: 10px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    select,
    input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button[type="button"],
    input[type="submit"] {
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="button"]:hover,
    input[type="submit"]:hover {
        background-color: #555;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
    }

    /* Styling the select element */
    select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        width: 200px;
    }

    /* Styling the options */
    option {
        padding: 5px;
    }
</style>

<body>
    <?php include('navbar.php'); ?>

    <div class="content">
        <h1>Book Now</h1>
        <form action="bill_summary.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="pickup_location">Pickup Location:</label>
            <input type="text" id="pickup_location" name="pickup_location" required>
            <button type="button" onclick="getCurrentLocation()">Get Current Location</button><br><br>

            <label for="gps_address">Address:</label>
            <input type="text" id="gps_address" name="gps_address" required><br><br>

            <label for="pin_code">Pin Code:</label>
            <input type="text" id="pin_code" name="pin_code" required><br><br>

            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" required><br><br>

            <label for="fuel_type">Type of Fuel:</label>
            <select id="fuel_type" name="fuel_type">
                <option value="option">--Option--</option>
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
            </select><br><br>

            <label for="quantity">Quantity:</label>
            <input type="text" id="quantity" name="quantity" required><br><br>
            <label for="prebook_date">Prebook Date:</label>
            <input type="date" id="prebook_date" name="prebook_date" required><br><br>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>
