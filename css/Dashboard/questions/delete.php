<?php
session_start();
include "connect.php";
// include "../signup/index.php";

// $infoSql = "SELECT ID, firstname, lastname, username,level,email FROM user_info WHERE username=$_SESSION['username'] ";
// $result = $conn->query($infoSql);

// if(isset($_POST["logout"]))
//    {
//     if(!empty($_SESSION["login"]))
//     {
//       $_SESSION['Username'] = '';
//       session_unset();
//       session_destroy();
//      // header("index.php");
//     }
//     header("location:index.php");
//    }
//  $someSql="SELECT ID, Fname, Lname FROM `general` WHERE ID = 2";


// deleting quizes

if(isset($_POST['del_multiples'])){

 
    $query= "TRUNCATE TABLE multiples";

    $res =  $conn -> query($query) or die($mysqli->error.__LINE__);

    
    $query= "TRUNCATE TABLE choices";

    $res =  $conn -> query($query) or die($mysqli->error.__LINE__);

    echo "deleted multiple choice";

}else if(isset($_POST['del_theory'])){


 
  $query= "TRUNCATE TABLE theory";

  $res =  $conn -> query($query) or die($mysqli->error.__LINE__);


  echo "deleted theory";
  
}else if(isset($_POST['del_blanks'])){


    $query= "TRUNCATE TABLE fill_in_blanks";

    $res =  $conn -> query($query) or die($mysqli->error.__LINE__);
    echo "deleted fill in blanks";

}    
    header("Location: ../index.php");

?>