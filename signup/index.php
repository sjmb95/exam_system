<?php 
include "connect.php";

if(isset($_POST['submit'])){
$fname=$_POST["firstname"];
$lname=$_POST["lastname"];
//$reg_no=$_POST["Reg_no"];
$level=$_POST["level"];
$email=$_POST["email"];
$user=$_POST["username"];
$pass=$_POST["password"];


$info="INSERT INTO user_info(firstname,lastname,level,email,username,password) VALUES('$fname','$lname','$level','$email','$user','$pass')";

 if($conn->query($info)===TRUE) {
    echo "New record created successfully";
}

else {
    echo "NOT successfully";
}

$info="INSERT INTO results(username,firstname,lastname) VALUES('$user','$fname','$lname')";

 if($conn->query($info)===TRUE) {
    echo "New record created successfully";

}

else {
    
    echo "NOT successfully";
}

header("Location: photo.php");

}


 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <form method="post" action="">
    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="firstname" id="name" placeholder="Firstname"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="lastname" id="name" placeholder="Lastname"/>
                        </div>

                       <!-- <div class="form-group">
                            <input type="text" class="form-input" name="Reg_no" id="name" placeholder="Registration Number(students only)"/>
                        </div>-->
                        <div class="form-group">
                            <input type="text" class="form-input" name="level" id="name" placeholder="Level(students only)"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="email" id="name" placeholder="email(name@gmail.com)"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="name" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <!-- <div class="signup-w3ls">
                            <div class="signup-agile1">
                               <form action="#" method="post">
                                  <div class="form-control">
                                       <label class="header">Profile Photo:</label>
                                        <input id="image" type="file" name="photo" placeholder="Photo" required="capture">
                                   </div>
                                   <form method="post" action="" enctype='multipart/form-data'>
                                  <input type='file' name='file' />
                                 <input type='submit' value='Save name' name='but_upload'>
                                </form>
                               </form>
                            </div>
                        </div> -->
                        
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                        
                        <!-- <div class="form-group">
                            <input type="submit" name="submit"/>
                        </div> -->
                        
                    <p class="loginhere">
                        Have already an account ? <a href="../Login/index.html" class="loginhere-link">Login here</a>
                    </p>
                </div>
                <center>
               <!-- <div >
                	<h5 ><a href="photo.<?php  ?>" style="color: black">click here to upload your photo after submitting</a></h5>
            </div></center>-->
        </section>

    </div>
    </form>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>