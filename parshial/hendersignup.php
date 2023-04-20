<!-- signup system to data into database -->

<?php

$show=false;
$showError=false;
$showAlert=false;

/*connection was data file*/
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD']  =="POST") {
  
   $username =$_POST['username'];
   $password =$_POST['password'];
  $cpassword =$_POST['conpassword'];
/*uniqe name */

   $uniqe ="SELECT * FROM `signup` WHERE username='$username'";
   $eixt =mysqli_query($connection, $uniqe);
     $eixtnum = mysqli_num_rows($eixt);
     if ($eixtnum >0) {
       $show=true;
      }else{

      if ($password == $cpassword) {
        /*insert data into database*/
       $hash = password_hash($password, PASSWORD_DEFAULT);
         $sql=  "INSERT INTO `signup` (`username`, `password`, `dt`) VALUES ( '$username', '$hash',  current_timestamp())";
        $result =mysqli_query($connection, $sql);
        
        if ($result) {
            $showAlert=true;

           header('location:/foram-project/index.php?signupsuccess=true');
           exit();

          } else {
            $showError=true;

          } 

      }
    
     
    }
  }








?>