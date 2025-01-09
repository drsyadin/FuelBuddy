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
    color: #5d5d5d;
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
 
</style>
<html>
    <head>
        <title>Feedback</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="contactus.css"> -->
    </head>
    <body>
    <?php include('navbar.php'); ?>
         <header>
            <nav>
                  <a href="Homepage.html"><img src="Logo.png" class="Logo"></a>  
                 
             </nav>
        </header>
 
                <div class="contactform">
                    <form method="post" action="">
                        <h2>Drop Your Review Here</h2>
                        <div class="inputbox">
                            <input type="text" name="name" required="required">
                            <span>Full Name</span>
                        </div>

                        <div class="inputbox">
                            <input type="email" name="email" required="required">
                            <span>Email</span>
                        </div>
                        

                        <div class="inputbox">
                            <input type="text" name="message"   required="required"> 
                            <span>Type your Message...</span>
                        </div>

                        <div class="inputbox">
                            <input type="submit" name="submit" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>



 
<?php
include('dbconnect.php');
if(isset($_POST['submit'])) 
{
    // Extracting data from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    $message = $_POST["message"];
     
 

    // SQL query to insert form data into the database
    $sql = " insert into  `feedback`(`name`, `email`,  `Message`) values  ('$name','$email',  '$message')";
   
    if(mysqli_query($con, $sql)) {
        echo '<script>alert("thank you for your feedback");</script>';
         
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

?>