
<?php
include 'connect.php';
?>

<?php
 if(isset($_POST['submit'])){

    //get post variable
     $question_no = $_POST['question_no'];
     $question_text = $_POST['question_text'];
     $correct_choice = $_POST['correct_choice'];

     $choices = array($_POST['choice1'], $_POST['choice2'], $_POST['choice3'], $_POST['choice4']);



     // question query
     $query = "INSERT INTO multiples (question_no, text)
                VALUES('$question_no','$question_text')";

    //run query
    
    $insert_row =  $conn -> query($query) or die($conn->error.__LINE__);

    //validate insertion

    if($insert_row){
        
        foreach($choices as $choice => $value){
            if($value!=''){
               if($correct_choice == $choice + 1){
                   $is_correct = 1;
               }else{
                   $is_correct = 0;
               }

               //choice query
               $query = "INSERT INTO choices (question_no, is_correct, text)
               VALUES('$question_no','$is_correct', '$value')";
              
              //run query
               $insert_row =  $conn -> query($query) or die($conn->error.__LINE__);

               //validate query
               if($insert_row){
                    continue;
                    

               }else{
                   die('Error :  ('.$conn->errno . ') '. $conn->error);
               }




            }
        
        }

        $msg = 'question has been added';
    }

   
      
 }

// get total questions


 
$query = "SELECT *   FROM  multiples";

/*  get result*/
$questions = $conn -> query($query) or die($conn->error.__LINE__);
$total = $questions->num_rows;
$next = $total + 1;
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

 
 

    <h1 class="text-center" >Quiz</h1>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <div class="container" Style="background-color:cornsilk">
        
       




      <div class ="container">
          <h1> Add a question</h1>
          
          <?php
            if(isset($msg)){
                echo '<p>'.$msg.'</p>';
            }
          
          ?>

          <form  action ="" method="post" >
          <p>  
              <label> question number</label>
              <input type="number" value= "<?php echo $next; ?>" name = "question_no" />
              
          </p>
          <p>  
              <label> question text</label>
              <input type="text" name = "question_text" />
              
          </p>
          <p>  
              <label> choice1</label>
              <input type="text" name = "choice1" />
              
          </p>
          <p>  
              <label> choice2</label>
              <input type="text" name = "choice2" />
              
          </p>
          <p>  
              <label> choice3</label>
              <input type="text" name = "choice3" />
              
          </p>
          <p>  
              <label> choice4</label>
              <input type="text" name = "choice4" />
              
          </p>
          <p>  
              <label> correct choice number</label>
              <input type="number" name = "correct_choice" />
              
          </p>
       
    
          <input type ="submit" name="submit" value="submit"/>
          </form>

      </div>  

      <a href = "../index.php"> back </a> 
  
    
   
 
    
</body>
</body>
</html>