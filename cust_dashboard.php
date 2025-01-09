<?php
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Customer Dashboard</title>
</head>
<style>
 
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

 
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.section{
    width: 100%;
    min-height: 100vh;
     
}

.container{
    width: 80%;
    display: block;
    margin: auto;
    padding-top: 100px;
}

.content-section{
    float: left;
    width: 55%;
}

.image-section{
    float: right;
    width: 40%;
}

.image-section img{
    width: 100%;
    height: auto;
    margin-top: 90px;
}

.content-section .title{
    text-transform: uppercase;
    font-size: 28px;
    margin-top: 90px;
}

.content-section .content h3{
    margin-top: 20px;
    color: #5d5d5d;
    font-size: 24px;
}

.content-section .content p{
    margin-top: 10px;
    font-family: sans-serif;
    font-size: 20px;
    line-height: 1.5;
}

.content-section .social{
    margin-top: 40px;
}

.content-section .social i{
    color: #a52a2a;
    font-size: 30px;
    padding: 0px 10px;
}

.content-section .social i:hover{
    color: #3d3d3d;
}

</style>
<body>
    <div class="navbar">
    <a href="cust_dashboard.php">Home</a>
        <a href="book_now.php">Book Now</a>
        <a href="pre_book.php">Pre Book</a>
        <a href="settings.php">Account Settings</a>
        <a href="feedback.php">Feedback</a>
        <a href="Contact.php">Contact Us</a>
        <a href="logout.php">Logout</a>
    </div>

    
   
        <nav>
            <!-- <img src="Logo.png" class="Logo"> -->
            <ul>
                
                  
            </ul>
        </nav> 
        <div class="section">
            <div class="container">
                <div class="content-section">
                    <div class="title">
                        <h1>About Us</h1>
                    </div>
                    <div class="content">
                        <h3>On-Road Fuel Delivery</h3>
                        <p>Today, on-demand apps have not only covered the entire market but also made customers accustomed to ordering their needs online easily while lounging at home. Such apps have entered varied industries, be it food, grocery, taxi, etc., and you can get anything only by simply tapping on your smartphone.</p>
                        <p>Along with all these, fuel delivery app development is not left untouched in this segment.Yes, you read it right. You can use on-demand fuel delivery apps and get the fuel delivered to your doorstep.</p>
                    </div>
                    <!-- <div class="social">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div> -->
                </div>
                <div class="image-section">
                    <img src="fueltruck.jpg">
                </div>
            </div>
        </div>
    
    </body>
</body>

</html>
