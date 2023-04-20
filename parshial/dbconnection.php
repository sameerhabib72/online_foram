<?php  

$servername="localhost";
$username="root";
$password="";
$databasename="forum";

$connection = mysqli_connect($servername, $username, $password, $databasename);

 if ($connection) {
 	//echo "connection success";
 }
 else{
 	echo "connection not success";
 }
?>