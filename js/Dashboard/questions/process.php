<?php
include 'connect.php';
?>
<?php
session_start();

?>
<?php
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
    
}

if($_POST){
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number + 1;

    $query = "SELECT *   FROM  multiples";
   
    /*  get result*/
    $results = $conn -> query($query) or die($conn->error.__LINE__);
    $total = $results->num_rows;

  

    // get correct choice

$query = "SELECT * FROM choices
         WHERE question_no=$number AND is_correct=1";

$result = $conn -> query($query) or die($conn->error.__LINE__);

// get row

$row = $result->fetch_assoc();

// set right choice

$correct_choice = $row['id'];

// comparism

if($selected_choice == $correct_choice){
    $_SESSION['score']++;

}

echo $selected_choice;
echo $correct_choice;
echo $_SESSION['score'];

if($total==0){
    header("Location: ../index.php");

 }else if($number == $total){
    header("Location: final.php");
   
    exit();
}else{
    header("Location: multiple.php?n=".$next); 
    
}






}

?>