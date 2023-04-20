<?php
$showError=false;

include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] =="POST") {
  
  $username =$_POST['username'];
  $password =$_POST['password'];

  $sql ="SELECT * FROM `signup` WHERE username ='$username'";
  $result =mysqli_query($connection, $sql);

  $row =mysqli_num_rows($result);

  if ($row==1) {
    while ($row=mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['password'])) {
        $showAlert=true;
session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['username']=$username;

            header('location:/foram-project/index.php?loginsuccess=true');

exit();
      }else{
        echo "password don't verify";
        
      }header('location:/foram-project/index.php?loginsuccess=false&error=$showError');
    }
  }
}

?>