<?php 

$servername="localhost";
$username="root";
$password="";
$db_name="online_portal";

//create connections
$conn=new mysqli($servername,$username,$password,$db_name);

//check connection
if($conn->connect_error){
	die("connection failed:".$conn->connect_error);
}
else{
	echo"connected successfully";
}
?>

<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "online_portal"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}