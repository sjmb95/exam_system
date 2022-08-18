
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

        $sql = "UPDATE theory SET answer='$ans' WHERE question_no='$number' ";
        if($conn -> query($sql) === TRUE){
        //    echo "New record successfully inserted ";
        }
        else{
            echo "Error with your insertion ";
        }
    
   

    $query = "SELECT *  FROM  theory";
   
    /*  get result*/
    $results = $conn -> query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

    if($total==0){
        header("Location: ../index.php");
    
     }else if($number == $total){
        header("Location: theory_final.php");
       
        exit();
    }else{
        header("Location:theory.php?n=".$next); 
        
    }

   
}else if($_POST['grade']){


    $number = $_POST['number'];
    $score =$_POST['score'];
    
   
    

  $next = $number + 1;

     $sql = "UPDATE theory SET score='$score' WHERE question_no='$number' ";
     if($conn -> query($sql) === TRUE){
     //    echo "New record successfully inserted ";
     }
     else{
         echo "Error with your insertion ";
     }
 


 $query = "SELECT *  FROM  theory";

 /*  get result*/
 $results = $conn -> query($query) or die($mysqli->error.__LINE__);
 $total = $results->num_rows;

 
 if($total==0){
    header("Location: ../index.php");

 }else if($number == $total){
    header("Location: theory_final.php");
    
    exit();
}else{
    header("Location:theory_grading.php?n=".$next); 
    
}


    

}
 
 





?>