<?php
include "connect.php";

if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $query = " INSERT into images(name) values('".$name."')";
     mysqli_query($conn,$query);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);



  }

  
header("location:../Login/index.php");
 
}

 $sql = "select name from images where id=1";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      $image = $row['name'];
      $image_src = "upload/".$image;
?>

<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save name' name='but_upload'>
  
</form>

