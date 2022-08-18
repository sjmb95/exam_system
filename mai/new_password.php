<?php
    include "connection.php";
    if(!isset($_GET['code'])){
        exit("cannot find page");
    }
    $code=$_GET['code'];
    $getEmailQuery=mysqli_query($conn,"SELECT email FROM resetpassword WHERE code='$code'");
    if(mysqli_num_rows($getEmailQuery)==0)
    {
        exit("cannot find page");  
    }
      
    if(isset($_POST['submit'])){
         $password=$_POST['password'];
         $row=mysqli_fetch_array($getEmailQuery) ;
         $email=$row['email'];
         $query=mysqli_query($conn,"UPDATE user_info SET password='$password' WHERE email='$email'");
         if($query){
            
            $q=mysqli_query($conn,"DELETE FROM resetpassword WHERE code='$code'");
            // echo("Password updated successfully");
            header("location:login.php");
         }
        }
    

?>
<!doctype html>
<head>
    <title>Reset password</title>

</head>
<body>

<form method='POST'>

            <h3> Reset Password:</h3>
        </div>

        <!--Body---->
        <div class="md-form">
            <i class="fa fa-lock prefix"></i>
            <input type="password"  name='password'>
            <label> enter Your new password here</label>
        </div>
        <div >
            <button type="submit" name='submit'> click here to Reset</button>
            
    </div>
    </div>
</div>
    </form>

</body>
</html>