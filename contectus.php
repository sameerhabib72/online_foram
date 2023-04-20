<!doctype html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  

    <title>Contact Us</title>
    <style>
    .text_area {
    height:150px;
    min-height:150px;
    max-height:150px;
    border-radius:0;
    }
 
    
  </style>
</head>
<body >
  <!-- this header linked -->
<?php include 'parshial/header.php'; ?>

<!-- inset data into database -->
<!--  -->
<?php 
$showAlert=false;

include 'parshial/dbconnection.php';
$method =$_SERVER['REQUEST_METHOD'];


if ($method =="POST") {
  
  $firstname =$_POST['firstname'];
  $lastname =$_POST['lastname'];
  $email =$_POST['email'];
  $phoneno =$_POST['phoneno'];
  $textarea =$_POST['textarea'];

  if ($firstname != $lastname) {
    
     $sql ="INSERT INTO `contact's` ( `firstname`, `lastname`, `email`, `phone`, `texts`, `dt`) VALUES ( '$firstname', '$lastname', '$email', '$phoneno', '$textarea', current_timestamp())";
     $result =mysqli_query($connection, $sql);

     if ($result) {     
     
      $showAlert=true;     
     }
  }
  else{
    echo "firstname and lastname not mach";
  }

}








 ?>

<div class="card bg-dark text-white">
  <img src="https://images.unsplash.com/photo-1622044680480-f67647ae1497?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fGhlYWRlciUyMGltYWdlc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=5000&q=600 " width="100" height="240" class="card-img" alt="...">
  <div class="card-img-overlay" id="">
    <h2 class="card-title">Contact Us</h2>
   <!--  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text">Last updated 3 mins ago</p>
  </div> -->
</div>

<center>
              <form class=" form-control" id="content us" action="/foram-project/contectus.php"  method="post">
                  
    <h1> Send Us your question:</h1>
  <div class="row">
    <div class=" col-md-2 col-lg-12">
<div class="col-md-5 ">
   <div class="form-group my-4">
    <input type="firstname" name="firstname" class="form-control"  placeholder="Your first name" required="">
  </div>
</div>

 <div class="col-md-5">
  <div class="form-group my-4">
    <input type="lastname" name="lastname" class="form-control" id="lastname" placeholder="Your last name" required="">
  </div>
</div>


 <div class=" col-md-5 ">
  <div class="form-group ">
    <input type="email" class="form-control" id="emailHelpl" name="email" aria-describedby="emailHelp" placeholder="Your email" required="">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
</div>

<div class="form-group col-md-5">
  <div class="form-group ">
    <input type="mobilenumber" name="phoneno" class="form-control" id="InputPassword1" placeholder=" Your mobile* example:0311213421 " required="">
  </div>
</div>


<div class="col-md-5 ">
  <div class="form-group ">
     <textarea class="form-control text_area" id="validationTextarea" rows="2" cols="2" name="textarea" placeholder="Required example textarea" required></textarea>
  </div>
</div>
</div>
</div>

  <!-- <div class="form-group form-check ">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1" name="check">Check me out</label>
  </div> -->
    

<div class="form-group col-md-5 mb-5"><button type="submit" class="btn btn-primary btn-lg btn-block  "  >Submit</button>

</div>

</form>
</center>
<!-- this footer linked  -->



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <?php include 'parshial/footer.php' ?>
  </body>
</html>
  
