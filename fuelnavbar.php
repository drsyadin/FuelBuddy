<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Add this to your styles.css file or within the <style> tag in your HTML */
.navbar {
    background-color: #333;
    overflow: hidden;
}

.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 30px 16px;
    text-decoration: none;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
}

/* Optional: Add some spacing between navbar links */
.navbar a:not(:first-child) {
    margin-left: 15px;
}

</style>
<body>
    <!-- Navbar -->
<div class="navbar">
    <a href="fuel_dashboard.php">Home</a>
    <a href="order.php">Pending Orders</a>
    <a href="assign_boys.php">Delivery Boys</a>
    <a href="add_boys.php">Add Delivery Boys </a>
    <a href="add_stocks.php"> Add Stocks</a>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>