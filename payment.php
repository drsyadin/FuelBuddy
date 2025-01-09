<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Payment Form</title>
</head>
<style>
    /* Add your styles here */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

</style>
<body>
<?php include("navbar.php"); ?>
    <div class="container">
        <h1>Select Payment Method</h1>
        <form action="" method="post">
            <label for="payment_method">Select Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="card">Card</option>
                <option value="upi">UPI</option>
                <option value="ondelivery">On Delivery</option>
            </select>
            <br><br>
            <button type="submit" name="submit">Proceed to Pay</button>
        </form>
    </div>
</body>
</html>
<?php
ob_start(); // Start output buffering

  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';

    switch ($payment_method) {
        case 'card':
            // Display card payment popup
            header("Location: card_payment.php");
            exit();
        case 'upi':
            // Display UPI payment popup
            header("Location: upi_payment.php");
            exit();
        case 'ondelivery':
            // Display on delivery message
            echo '<script>alert("Please pay the right amount on delivery.");</script>';
            break;
        default:
            // Invalid payment method
            echo "";//'<script>alert("Invalid payment method.");</script>';
    }
}
?>

