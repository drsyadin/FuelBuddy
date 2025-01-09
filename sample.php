<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Card Payment</title>
</head>
<body>
<?php include("navbar.php"); ?>
    <div class="container">
        <h1>Card Payment</h1>
        <form action="" method="post">
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" required><br><br>

            <label for="expiry_date">Expiry Date (MM/YYYY):</label>
            <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required><br><br>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required><br><br>

            <button type="submit" name="submit">Pay Now</button>
        </form>
    </div>
</body>
</html>
<?php
include('dbconnect.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve card details from the form
    $cardNumber = $_POST['card_number'];
    $expiryDate = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];

    // Simple validation (you should implement more robust validation)
    if (validateCardDetails($cardNumber, $expiryDate, $cvv)) {
        // Dummy success response
        $paymentStatus = "success";
        if ($paymentStatus === "success") {
            echo "Payment successful. Thank you!";
        } else {
            echo "Payment failed. Please try again.";
        }
    } else {
        echo "Invalid card details. Please check and try again.";
    }
} else {
    // If the form is not submitted, redirect to the payment page
    //header("Location: card_payment.php");
    exit();
}

function validateCardDetails($cardNumber, $expiryDate, $cvv) {
    // Implement actual validation logic here
    // For simplicity, you can check if the fields are not empty
    return !empty($cardNumber) && !empty($expiryDate) && !empty($cvv);
}
?>


 