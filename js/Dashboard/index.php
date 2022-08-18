<?php
session_start();
include "connect.php";


 $infoSql = "SELECT Reg_no, firstname, lastname, username,level,email FROM user_info WHERE username='$_SESSION[username]'";
 
 if ($result = $conn->query($infoSql)) {
  while ($row = $result->fetch_assoc()) {

    $reg_no=$row['Reg_no'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $username=$row['username'];
    $level=$row['level'];
    $email=$row['email'];
  }
}
?>


<!DOCTYPE html>
<html>
<title>Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">


<link href="https://fonts.googleapis.com/css?family=Raleway:400,900i" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<script src="https://kit.fontawesome.com/3bc6acfd32.js" crossorigin="anonymous"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">
  <form method="post">

<!--calender-->
  <div class="container" style="margin-top: 10px;">
    <div id="day"></div>
    <div id="date"></div>
  </div>

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><img src="nile.png" style="width:40px; height:40px;"></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px; margin-bottom: 150px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src=" " class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
     <!-- echo  <span>"Welcome,". <strong> $_SESSION['Username'];</strong></span><br> -->
    <h4> <?php echo "Welcome ". $_SESSION['username'];?></h4>     

      
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <i class="fa fa-bars" aria-hidden="true"></i>Dashboard
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <div class="dropdown">
  <button class="w3-bar-item w3-button w3-padding " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Exam
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="questions/theory.php?n=1">Theory</a>
    <a class="dropdown-item" href="questions/blanks.php?n=1">fill in the blamk</a>
    <a class="dropdown-item" href="questions/multiple.php?n=1">multiple choice</a>
  </div>
</div>

<div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <div class="dropdown">
  <button class="w3-bar-item w3-button w3-padding " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Create Exam
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="questions/add_theory.php">Theory</a>
    <a class="dropdown-item" href="questions/add_blanks.php">fill in the blamk</a>
    <a class="dropdown-item" href="questions/add_multiples.php">multiple choice</a>
  </div>
</div>

<div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <div class="dropdown">
  <button class="w3-bar-item w3-button w3-padding " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    My Quizzes
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="questions/add_theory.php"> edit/add Theory</a>
    <a class="dropdown-item" href="questions/add_blanks.php"> edit/add fill in the blamk</a>
    <a class="dropdown-item" href="questions/add_multiples.php"> edi/addt multiple choice</a>
    <a class="dropdown-item" href="questions/theory_grading.php">Grade Theory</a>
    <a class="dropdown-item" href="questions/blank_grading.php"> Grade fill in the blamk</a>

   
    <form method="post" action="questions/delete.php">

    <input class="dropdown-item " type="submit" id="del_multiples" name="del_multiples" value="delete multiple choice"/>
    
    
    <input class="dropdown-item " type="submit" id="del_blankss" name="del_blanks" value="delete fill in blanks"/>
    
   

    
    <input class="dropdown-item" type="submit" id="del_theory" name="del_theory" value="delete theory"/>
</form>

<form method="post" action="questions/invites.php">

<input class="dropdown-item " type="submit" id="mail_multiples" name="mail_multiples" value="mail multiple choice"/>


<input class="dropdown-item " type="submit" id="mail_blankss" name="mail_blanks" value="mail fill in blanks"/>




<input class="dropdown-item" type="submit" id="mail_theory" name="mail_theory" value="mail theory"/>
</form>
  

  </div>
</div>

    <a href="excel/index.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-id-card"></i> Export Student Grades</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fas fa-id-card"></i> Update Profile</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-sign-out-alt"><input type="submit" name="logout" value="logout"></i> Logout</a>

  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
      <div style="text-align: center; margin-top: 70px;"> <img src="images.png">
        <!-- <?php 
         $qyery=mysqli_query($conn,"SELECT * FROM images WHERE id='$_SESSION[Reg_no]'");
         if($query)
         {
           if(mysqli_num_rows($query)>0){
            $row=mysqli_fetch_array($query);
            $image = $row['photo'];
            $image_src = "upload/" . $image;
           }
         }
        ?> -->
        <p><strong> <?php echo  $firstname .$lastname ?> </strong></p>
        <!-- <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Status</a> -->
      </div>
<div class="body_dash" style="width:60%; margin-left:450px; margin-top:20px;">
<table class="table table-bordered">
  
  <tbody>
    <tr>
      <th scope="row">Student ID</th>
      <td><?php echo $reg_no?></td>
    </tr>
  </tbody>
  <tbody>
    <tr>
      <th scope="row">Username</th>
      <td><?php echo $username?></td>
    </tr>
  </tbody>
  <tbody>
    <tr>
      <th scope="row">Level</th>
      <td><?php echo $level?></td>
    </tr>
  </tbody>
  <tbody>
    <tr>
      <th scope="row">Email</th>
      <td><?php echo  $email?></td>
    </tr>
  </tbody>
  
</table>
</div>

<!-- Java script for the calender -->
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="calender.js"></script>

 </form>
</body>
</html>
