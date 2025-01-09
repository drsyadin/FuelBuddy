<!DOCTYPE html>
<html>
<head>
    <title>Bank Payment</title>
    <link rel="stylesheet" type="text/css" href="styler8.css">
</head>
<body>
    <div class="container">
        <h2>Bank Payment Details</h2>
        <form action="bill.php" method="post">
            <label for="expiry_date">Expiry Date (MM/YY):</label>
            <input type="text" id="expiry_date" name="expiry_date" required placeholder="MM/YY">
            
            <label for="last_4_digits">Last 4 Digits of Card:</label>
            <input type="text" id="last_4_digits" name="last_4_digits" required placeholder="XXXX">
            
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required placeholder="XXX">
            
            <button type="submit">Submit Payment</button>
        </form>
    </div>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lhrs";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$expiry_date = isset($_POST['expiry_date']) ? $_POST['expiry_date'] : '';
$last_4_digits = isset($_POST['last_4_digits']) ? $_POST['last_4_digits'] : '';
$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';


$sql = "INSERT INTO bankdetails (expiry_date, last_4_digits, cvv) VALUES (?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sss", $expiry_date, $last_4_digits, $cvv);

    if ($stmt->execute()) {
        
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}


$conn->close();
?>

