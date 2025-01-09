<?php require('dbconnect.php'); ?>
<style>
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
    font-size: 21px;
}

.content-section .content p{
    margin-top: 10px;
    font-family: sans-serif;
    font-size: 17px;
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

nav{
    width: 100%;
    position: absolute;
    top: 50;
    /* left: 90; */
    padding: 0% 2%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

nav .logo{
    width: 390px;
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

</style>
<html>
    <head>
        <title>About Us</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <link rel="stylesheet" href="aboutstyle.css">
    </head>
    <style>
         body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            overflow: hidden;
            background-color:  #30475e;
            padding: 30px;
            text-align: center;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar .dropdown {
            display: inline-block;
        }
        .dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

        .navbar .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
        }

        .navbar .dropdown:hover .dropdown-content {
            display: block;
        }

        .navbar .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .navbar .dropdown-content a:hover {
            background-color: #ddd;
        }

        .navbar a.join-button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .content {
            padding: 16px;
        }

        h1, p {
            text-align: center;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            
            background-size: cover;
            background-repeat: no-repeat;
            text-align: center;
        }

        .content {
            padding: 16px;
        }

        

        a.join-button {
            display: inline-block;
            padding: 14px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px; /* Add margin to the top */
        }

        a.join-button:hover {
            background-color: #45a049;
        }

        /* Add styles for the logo */
        .navbar img {
            max-height: 50px; /* Adjust the height as needed */
            margin-right: 10px;}
            .service-card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .service-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: #000000;
        }

        .service-description {
            color: #000000;
        }
    </style>
    <body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="aboutus.php">About Us</a>
        <a href="contactus.php">Contact</a>
        <div class="dropdown">
            <button class="dropbtn">Customer
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="cust_login.php">Login</a>
                <a href="cust_register.php">Register</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Fuel Station
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="station_login.php">Login</a>
                <a href="station_register.php">Register</a>
            </div>
        </div>
        <a href="admin_login.php">Admin Login</a>
    </div>
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
</html>