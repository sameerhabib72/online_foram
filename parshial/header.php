<?php
session_start();

 echo'<link rel="stylesheet" type="text/css" href="foram-project/parshial/style.css" widht="43px" >';
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><h2 style="color:red"> Online Foram</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="
        aboutus.php">About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Top Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        include 'dbconnection.php';
          $sql="SELECT category_name, category_id FROM `category` LIMIT 6";
          $category=mysqli_query($connection, $sql);
          while ($row =mysqli_fetch_assoc($category)){
          echo '<a class="dropdown-item" href="/foram-project/thredlist.php?catid='.$row['category_id'].'"> '.$row['category_name'].'</a>';
        }
       echo' </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="contectus.php">Content</a>
      </li>
    </ul>
<div class="d-grid gap-2 d-md-block">
    <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success mr-sm-2"  type="submit">Search</button>

</form></div>';
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] =="true") {

echo'<a href="/foram-project/parshial/logOut.php"  type="button" class="btn btn-success btn-sm mr-sm-2 text-color-light">
  LogOut
</a>';}else{
     echo' <button type="button" class="btn btn-success btn-sm mr-sm-2" data-toggle="modal" data-target="#loginModal">
  Login
</button>
       <button type="button" class="btn btn-success btn-sm mr-sm-2" data-toggle="modal" data-target="#SignupModal">
  SignUp
</button>';}
   
    echo'</div>
  </div>
</nav>';
 
  include 'signup.php ';
  include 'login.php';
 
  if (isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
    echo '<div class="alert alert-success" my-0 role="alert">
  Your New Account created successfuly!
</div>';
  }
  if (isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true") {
    echo '<div class="alert alert-success my-0" role="alert">
  You Login successfuly!
</div>';
  }

?>
