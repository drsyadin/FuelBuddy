<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    
    margin: 0;
    padding: 0;
}

nav{
    width: 103%;
    position: relative;
    /* top: -100;
    left: -90; */
    top:20;
    padding: 0% 2%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

nav .logo{
    width: 150px;
}

nav ul li{
    list-style: none;
    display: inline-block;
    margin-left: 40px;
}

nav ul li a{
  text-decoration: none;
  color: #566D7E;
  font-size: 17px;
}

nav ul li a:hover{
  color:cadetblue;
}
.navbar {
    background-color: #333;
    overflow: hidden;
}

.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 35px 16px;
    text-decoration: none;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
}

.content {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
}

p {
    color: #666;
}

</style>
<body>
    <!-- navbar.php -->
<div class="navbar">
<a href="cust_dashboard.php">Home</a>
    <a href="book_now.php">Book Now</a>
    <a href="pre_book.php">Pre Book</a>
    <!--<a href="order_history.php">Order History</a>-->
    <a href="settings.php">Account Settings</a>
    <a href="feedback.php">Feedback</a>
    <a href="Contact.php">Contact Us</a>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>