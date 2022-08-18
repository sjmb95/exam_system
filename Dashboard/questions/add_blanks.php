<?php
include "connect.php";

if(isset($_POST['submit'])){
    echo "added";
    $sentence1 = $_POST["sentence1"];
    $sentence2 = $_POST["sentence2"];
    $sql = "INSERT INTO fill_in_blanks ( sentence1, sentence2) VALUES( '$sentence1','$sentence2')";
    if($conn -> query($sql) === TRUE){
    //    echo "New record successfully inserted ";
    }
    else{
        echo "Error with your insertion ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>blanks</title>
</head>
<body>
<div class='container' Style="background-color:cornsilk">
<h5 class="card-title">Set fill in blank questions</h5>


<form action="" method="post"  >

        
            
            <div class="row ">
            <div class = "col-md-1.5">
            <textarea name="sentence1"></textarea> </textarea>
           </div>
           <div class = "col-md-1.2" Style="vertical-allign: text-bottom;" >
            __________________
           </div>
           <div class = "col-md-9.3">
           <textarea name="sentence2"></textarea>
           </div>
          </div> 
           
            <div class="card-body">
                <button name="submit" type="submit" class="btn btn-outline-primary">Submit</button>
            </div>
        
            
</form>

<a href = "../index.php"> back </a> 

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
