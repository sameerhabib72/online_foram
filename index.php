<!doctype html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Online Foram</title>
    <style>
.content {
  margin:0 auto;
  width: 50%;
}
</style>
</head>
<body class="content">
  <?php include 'parshial/header.php' ?>

  <!-- show error  -->
 
 

  <!-- stard slider -->
  <div class="form-control">
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://images.unsplash.com/photo-1503437313881-503a91226402?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fGNvZGV8ZW58MHx8MHx8&auto=format&fit=crop&w=5000&q=600" width="1500" height="440" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://images.unsplash.com/photo-1566837945700-30057527ade0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=5000&q=60" width="800" height="440" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100"  src="https://images.unsplash.com/photo-1534972195531-d756b9bfa9f2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGNvZGV8ZW58MHx8MHx8&auto=format&fit=crop&w=5000&q=60" width="1000" height="440" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   </div>
    <div class="container my-4">

   <!-- this is  card body -->
   <div class="container my-4">

   <h1 class="text-center my-1">Online Foram</h1>
    <!-- <div class="row center my-3 text-center" > --> 

    <!-- fetch all the category here -->
<!-- <div class="card-center">

   <div class="row center my-3 text-center" >  -->
<div class="row">
<?php 
include 'parshial/dbconnection.php';

$limit = 3;
 if (isset($_GET['page'])) {
  $page =$_GET['page'];
}else{
  $page = 1;
}

 $offset = ($page - 1) * $limit;

$sql = "SELECT * FROM `category` order by category_id desc limit {$offset},{$limit} ";
$result = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($result)) {

$catid=$row['category_id'];
$cat=$row['category_name'];
$description=$row['category_description'];
$image=$row['image'];

   echo '
    <div class="col-md-4 my-2">
<p><div class="card" style="width: 18rem;">
  <img src="'.$image.'"class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><a href ="thredlist.php?catid='.$catid.'">'.$cat.'</a></h5>
    <p class="card-text">'.substr($description,0, 120).'....</p>
    <a href="thredlist.php?catid='.$catid.'" class="btn btn-primary">Thred View</a>
  </div>
</div></p>
</div>
';
}
?>
</div>
<?php

$sqli="SELECT * FROM `category`";
$query=mysqli_query($connection , $sqli);

if (mysqli_num_rows($query) > 0) {
  $total_record = mysqli_num_rows($query);
 
  $total_pages = ceil($total_record / $limit);
echo '<nav aria-label="Page navigation example">';
echo '<ul class = "pagination justify-content-center">';
if ($page > 1) {
  echo '<li class="page-item ">
      <a class="page-link" href="index.php?page='.($page - 1).'" tabindex="-1">Previous</a>
    </li>';
 } 
  for ($i=1; $i <= $total_pages ; $i++) { 
    if ($i == $page) {
      $active = "active";
    }else{
      $active ="";
    }
    echo '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page='.$i.'">'.$i.'<span class="sr-only">(current)</a></li>';
  }

  if ($total_pages >$page) {
  echo '<li class="page-item">
      <a class="page-link" href="index.php?page='.($page + 1).'">Next</a>
    </li>';
  }

  echo '</nav>';
  echo '</ul>';
}
 ?>
</div></div>

<!-- footer linked here -->
<?php include 'parshial/footer.php' ?>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>