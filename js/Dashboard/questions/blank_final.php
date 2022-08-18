

<?php
include 'connect.php';
?>
<?php session_start(); ?>

<?php

$query = "SELECT  *  FROM  fill_in_blanks";
$score=0;  
    /*  get result*/
    $results = $conn -> query($query) or die($conn->error.__LINE__);
    $total = $results->num_rows;

for($i=1;$i<= $total; $i++){
$query = "SELECT  *   FROM  fill_in_blanks
WHERE id =$i"; 



/*  get result*/
$result = $conn -> query($query) or die($conn->error.__LINE__);

$question = $result -> fetch_assoc();
$score= $score + $question['score'] ;
}



$query = "SELECT *  FROM  results";
   
/*  get result*/
$results = $conn -> query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;

for($i=1; $i < $total;$i++){

  $sql = "UPDATE results SET fill_in_blanks='$score' WHERE username='$_SESSION['username']' ";
if($conn -> query($sql) === TRUE){
//    echo "New record successfully inserted ";
}
else{
    echo "Error with your insertion ";

}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <title>QUIZ</title>
   
  </head>
  <body>  

 


    <h1 class="text-center" >QUIZ/h1>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <div class="container" Style="background-color:cornsilk">

   
  




      <div class ="container">
         
      <p> congratulations youve finished</p>
          <p> your final score is : <?php echo $score; ?></p>
          
          <a href = "../index.php"> back </a> 
      

      </div>  

   
  

   
 
    
</body>
</body>
</html>