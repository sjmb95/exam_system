<?php
include "connect.php";

if(isset($_POST['submit'])){
    echo "ADDED";
    $questions = $_POST["questions"];

    $sql = "INSERT INTO theory ( `question_text`) VALUES( '$questions')";
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
    <title>Theory</title>
</head>
<body>
   
<form action="" method="post">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Set Questions for Theory</h5>
            <textarea name="questions"></textarea>
            <div class="card-body">
                <button name="submit" type="submit" class="btn btn-outline-primary">Submit</button>
            </div>
        </div>
    </div>
</form>

<a href = "../index.php"> back </a> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

<!-- <form action="" method="post">
            Name
            <input type="text" name= "questions" value= "<?php echo $_POST ["questions"]; ?> ">
         
            <input type="submit" name= "submit" value="submit">
        </form> -->