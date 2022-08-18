
<?php
include 'connect.php';

?>
<?php

session_start();



?>
<?php


if($_POST['submit']){
    $number = $_POST['number'];
       $ans =$_POST['ans'];
       
  
 
     $next = $number + 1;

        $sql = "UPDATE fill_in_blanks SET answer='$ans' WHERE id='$number' ";
        if($conn -> query($sql) === TRUE){
        //    echo "New record successfully inserted ";
        }
        else{
            echo "Error with your insertion ";
        }
    
   

    $query = "SELECT *  FROM  fill_in_blanks";
   
    /*  get result*/
    $results = $conn -> query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

    if($total==0){
        header("Location: ../index.php");
    
     }else if($number == $total){
        header("Location: blank_final.php");
       
        exit();
    }else{
        header("Location:blanks.php?n=".$next); 
        
    }

   
}else if($_POST['grade']){


    $number = $_POST['number'];
    $score =$_POST['score'];
    
   
    

  $next = $number + 1;

     $sql = "UPDATE fill_in_blanks SET score='$score' WHERE id='$number' ";
     if($conn -> query($sql) === TRUE){
     //    echo "New record successfully inserted ";
     }
     else{
         echo "Error with your insertion ";
     }
 


 $query = "SELECT *  FROM  fill_in_blanks";

 /*  get result*/
 $results = $conn -> query($query) or die($mysqli->error.__LINE__);
 $total = $results->num_rows;


 if($total==0){
    header("Location: ../index.php");

 }else if($number == $total){
    header("Location: blank_final.php");
    
    exit();
}else{
    header("Location:blank_grading.php?n=".$next); 
    
}


    

}
 
 





?>