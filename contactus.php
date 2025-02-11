
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.contact{
    position: relative;
    min-height: 100vh;
    top: 20;
    padding: 50px 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-bottom: 0;
    
}

.contact .content
{
    max-width: 800px;
    text-align: center;
    /* margin-top: 100; */
}

.contact .content h2{
    font-size: 36px;
    font-weight: 800;
}

.contact .content p{
    font-weight: 600;
     
}

.container{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
}

.container .contactinfo{
    width: 50%;
    display: flex;
    flex-direction: column;
}

.container .contactinfo .box{
    position: relative;
    padding: 20px 0;
    display: flex;
}

.container .contactinfo .box .icon{
    min-width: 60px;
    height: 60px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 22px;
}

.container .contactinfo .box .text{
    display: flex;
    margin-left: 20px;
    font-size: 16px;
    flex-direction: column;
    font-weight: 300;
}

.container .contactinfo .box .text h3{
    font-weight: 700;
}

.contactform{
    width: 40%;
    padding: 40px;
    background: #fff;
}

.contactform h2{
    font-size: 30px;
    font-weight: 600;
}

.contactform .inputbox{
    position: relative;
    width: 100%;
    margin-top: 10px;
}

.contactform .inputbox input,
.contactform .inputbox textarea{
    width: 100%;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    border: none;
    border-bottom: 2px solid #333;
    outline: none;
    resize: none;
}

.contactform .inputbox span{
    position: absolute;
    left: 0;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    pointer-events: none;
    transition: 0.5s;
    color: #666;
}

.contactform .inputbox input:focus ~ span,
.contactform .inputbox input:valid ~ span,
.contactform .inputbox textarea:focus ~ span,
.contactform .inputbox textarea:valid ~ span{
    color: #e91e63;
    font-size: 12px;
    transform: translateY(-20px);
}

.contactform .inputbox input[type="submit"]{
    width: 100px;
    background: #333;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px;
    font-size: 18px;
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
<html>
    <head>
        <title>Contact Us</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="contactus.css"> -->
    </head>
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
        <section class="contact">
            <div class="content">
                <h2>Contact Us</h2>
                <p>We would love to respond to your queries. Feel free to get in touch with us.</p>
            </div>
            <div class="container">
                <div class="contactinfo">
                    <div class="box">
                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>abcd road,<br>Kalamassery,Kerala,<br>680568</p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>+91 9846903270</p>
                        </div>
                    </div>


                    <div class="box">
                        <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>fueldemand@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="contactform">
                    <form>
                        <h2>Send Message</h2>
                        <div class="inputbox">
                            <input type="text" name="" required="required">
                            <span>Full Name</span>
                        </div>

                        <div class="inputbox">
                            <input type="email" name="" required="required">
                            <span>Email</span>
                        </div>

                        <div class="inputbox">
                            <textarea required="required"></textarea>
                            <span>Type your Message...</span>
                        </div>

                        <div class="inputbox">
                            <input type="submit" name="" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>