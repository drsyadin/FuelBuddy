<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Fuel Delivery Management System</title>
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
            background-image: url('homecover.png');
            background-size: cover;
            background-repeat: no-repeat;
            text-align: center;
        }

        .content {
            padding: 16px;
        }

        h1, p {
            color: #fff; /* Set text color to white */
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
    <div class="content">
    <h1>Welcome to Fuel Delivery Management System</h1>
    <p>Explore our services for convenient fuel delivery.</p>
    <a href="cust_register.php" class="join-button">Join Us</a>

   <!-- <div class="content">
        <h1>Our Services</h1>

        <div class="service-card">
            <div class="service-title">Fuel Delivery at Your Doorstep</div>
            <div class="service-description">
                We provide convenient fuel delivery services right to your location. No need to visit a fuel station.
            </div>
        </div>

        <div class="service-card">
            <div class="service-title">Multiple Fuel Options</div>
            <div class="service-description">
                Choose from a variety of fuel options including gasoline, diesel, and more. We cater to your specific fuel needs.
            </div>
        </div>

        <div class="service-card">
            <div class="service-title">Secure and Timely Delivery</div>
            <div class="service-description">
                Our delivery services are secure, and we ensure timely delivery to meet your schedule.
            </div>
        </div> -->
</div>
</body>

</html>
