<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>UPI Payment</title>
</head>
<style>
    /* CSS for styling the QR code image container */
.qr-code-container {
    text-align: center;
    margin-top: 20px; /* Adjust the margin as needed */
}

/* CSS for styling the QR code image */
.qr-code-image {
    max-width: 28%;
    height: auto;
    border: 2px solid #333; /* Add a border for visibility */
    padding: 10px;
}
/* CSS for centering text */
.center-text {
    text-align: center;
    margin-top: 20px; /* Adjust the margin as needed */
}


</style>
<body>
    <?php include("navbar.php"); ?>
<div class="center-text">
    <h3>Scan the QR code using your UPI app to make the payment.</h3>
</div>

    <div class="container">
        
        <div class="qr-code-container">
    <img class="qr-code-image" src="qr.jpg" alt="QR Code">
</div>

         
    </div>
</body>
</html>
