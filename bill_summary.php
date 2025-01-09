<?php
session_start();
include('dbconnect.php');
include("navbar.php");
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $pickup_location = mysqli_real_escape_string($con, $_POST['pickup_location']);
    $gps_address = mysqli_real_escape_string($con, $_POST['gps_address']);
    $pin_code = mysqli_real_escape_string($con, $_POST['pin_code']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $fuel_type = mysqli_real_escape_string($con, $_POST['fuel_type']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);

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

    // Check if customer_id is set in the session
    if (!isset($_SESSION['customer_id'])) {
        echo "Customer ID is not set in the session. Please log in.";
        exit;
    }

    $customer_id = $_SESSION['customer_id'];

    // SQL query to insert form data into the fuel_orders table
    $sql_fuel_orders = "INSERT INTO fuel_orders (name, pickup_location, gps_address, pin_code, contact, fuel_type, quantity, total_price) 
                        VALUES ('$name', '$pickup_location', '$gps_address', '$pin_code', '$contact', '$fuel_type', '$quantity', '$total_price')";

    if (mysqli_query($con, $sql_fuel_orders)) {
        // If the insertion into fuel_orders is successful, proceed to insert into orders table

        $order_id = mysqli_insert_id($con); // Get the last inserted ID from fuel_orders

        // SQL query to insert into orders table
        $sql_orders = "INSERT INTO `orders`(`order_id` , `customer_name`, `quantity`, `total_price`, `fuel_type` , `status`)
                        VALUES ('$order_id', '$name', '$quantity', '$total_price', '$fuel_type','0')";

        if (mysqli_query($con, $sql_orders)) {
            // Both insertions were successful
            echo '<div class="content">';
            echo '<h1>Bill Summary</h1>';
            echo '<p>Name: ' . $name . '</p>';
            echo '<p>Pickup Location: ' . $pickup_location . '</p>';
            echo '<p>Fuel Type: ' . $fuel_type . '</p>';
            echo '<p>Quantity: ' . $quantity . '</p>';
            echo '<p>Total Price: ₹' . $total_price . '</p>';
            echo '<form id="paymentForm" action="payment.php" method="post">';
            echo '<input type="hidden" name="total_price" value="' . $total_price . '">';
            echo '<button type="submit" name="pay_now">Pay Now</button>';
            echo '</form>';
            echo '</div>';
        } else {
            echo "Error: " . $sql_orders . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Error: " . $sql_fuel_orders . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    // Redirect to index.php if accessed directly without form submission
    header("Location: index.php");
    exit();
}
?>
