<?php
include('dbconnect.php'); // Include your database connection file

// Assuming you have a session variable storing the customer ID after login
$customer_id = $_SESSION['customer_id'];

// Retrieve order details from the database
$order_id = $_GET['order_id']; // Get order ID from the URL or session variable

$sql_order_details = "SELECT * FROM orders WHERE order_id = '$order_id' AND customer_id = '$customer_id'";
$result_order_details = mysqli_query($con, $sql_order_details);

if ($result_order_details && mysqli_num_rows($result_order_details) > 0) {
    $row_order = mysqli_fetch_assoc($result_order_details);

    // Retrieve delivery boy details based on the assigned delivery_boy_id
    $delivery_boy_id = $row_order['delivery_boy_id'];

    $sql_delivery_boy = "SELECT * FROM delivery_boys WHERE delivery_boy_id = '$delivery_boy_id'";
    $result_delivery_boy = mysqli_query($con, $sql_delivery_boy);

    if ($result_delivery_boy && mysqli_num_rows($result_delivery_boy) > 0) {
        $row_delivery_boy = mysqli_fetch_assoc($result_delivery_boy);

        // Display the delivery boy details
        echo '<h2>Delivery Boy Details</h2>';
        echo '<p>Name: ' . $row_delivery_boy['name'] . '</p>';
        echo '<p>Contact: ' . $row_delivery_boy['contact'] . '</p>';
        // Add more details as needed
    } else {
        echo '<p>No delivery boy assigned yet.</p>';
    }
} else {
    echo '<p>Order not found or not associated with the logged-in customer.</p>';
}

mysqli_close($con);
?>
