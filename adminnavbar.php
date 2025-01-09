<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
/* Reset some default styles */
body, ul {
    margin: 0;
    padding: 0;
}

/* Style the navbar */
.navbar {
    background-color: #333;
    overflow: hidden;
}

/* Style the navbar links */
.navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

.navbar li {
    float: left;
}

.navbar a {
    display: block;
    color: white;
    text-align: center;
    padding: 30px ;
    text-decoration: none;
}

/* Change color on hover */
.navbar a:hover {
    background-color: #ddd;
    color: black;
}
</style>
<body>
<nav class="navbar">
    <ul>
        <li><a href="admin_dashboard.php">Home</a></li>
        <li><a href="approve_fuel_stations.php">Approve Fuel Stations</a></li>
        <li><a href="view_orders.php">View All Orders</a></li>
        <li><a href="order_report.php">View Reports</a></li>
        <li><a href="feedback_report.php">View Feedbacks</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>


</body>
</html>