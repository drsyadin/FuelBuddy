<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Card Payment</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <?php include("navbar.php"); ?>
    <div class="container">
        <h1>Card Payment</h1>
        <form action="" method="post">
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" required>

            <label for="expiry_date">Expiry Date (MM/YYYY):</label>
            <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>

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
        // Display success message using JavaScript
        echo '<script>alert("Payment successful. Thank you!");</script>';
    } else {
        // Display failure message using JavaScript
        echo '<script>alert("Payment failed. Please try again.");</script>';
    }
} else {
    // Display invalid card details message using JavaScript
    echo '<script>alert("Invalid card details. Please check and try again.");</script>';
}
} else {
    // If the form is not submitted, redirect to the payment page
    // header("Location: card_payment.php");
    exit();
}

function validateCardDetails($cardNumber, $expiryDate, $cvv) {
    // Implement actual validation logic here
    // For simplicity, you can check if the fields are not empty
    return !empty($cardNumber) && !empty($expiryDate) && !empty($cvv);
}
?>
