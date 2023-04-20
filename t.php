<!doctype html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Contect Us</title>
</head>
<body>
<?php include 'parshial/header.php'; ?>

<!-- here stard jumbotron -->

<?php
include 'parshial/dbconnection.php';

$catid=$_GET['catid'];
$sql= "SELECT * FROM `category` WHERE category_id=$catid";
$result =mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  
 
  $cat=$row['category_name'];
  $catdes=$row['category_description'];
}

?>
 

<div class="jumbotron">
  <h1 class="display-4">WELLCOME TO <?php echo $cat ;?> </h1>
  <p class="lead"><?php echo $catdes ;?></p>
  <hr class="my-9">
  <p>No Spam / Advertising / Self-promote in the forums.Do not post copyright-infringing material.Do not post “offensive” posts, links or images.Do not cross post questions.Do not PM users asking for help.Remain respectful of other members at all times..</p>
  <p class="lead">
    <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>
<!-- form  -->


<from action="<?php echo $_SERVER[REQUEST_URI] ?>" method="post" >

<h1>Aks a Question.</h1>
<div class=" col-md-5">
<div class="form-group">
    <label for="Input">Title.</label>
    <input type="text" class="form-control" id="Input" name="thread_title"  required="">
  </div>
  <!-- Textarea 2 rows height -->
<div class="form-group">
  <label class="form-label" for="textAreaExample">Message</label>
  <textarea class="form-control" id="textAreaExample1" name="thread_description" rows="4"></textarea>
  
</div>
<div>
  <button class="btn btn-primary" type="submit">Login</button>
</div>
</div>
  </from>

<?php
  $method=$_SERVER['REQUEST_METHOD'];
  if ($method=="POST") {
    ///inser into thread into db,
    
    $thread_title=$_POST['thread_title'];
    $thread_description=$_POST['thread_description'];

    $sql ="INSERT INTO `threadlist` (`thread_title`, `thread_description`, `thread_cat_id`, `thread_userid`, `DateTime`) VALUES ('$thread_title', '$thread_descripyion', '$thread_cat_id', '0', current_timestamp())";
    $result =mysqli_query($connection, $sql);
    
  }
?>


<!-- stard media object -->
<h1>Browse Questions:</h1>
<?php
include 'parshial/dbconnection.php';

$catid=$_GET['catid'];
$sql= "SELECT * FROM `threadlist` WHERE thread_id=$catid";
$result =mysqli_query($connection, $sql);
$noresult=true;
while ($row = mysqli_fetch_assoc($result)) {
  $noresult=false;
  $threadcatid=$row['thread_cat_id'];
  $threadtitle=$row['thread_title'];
  $threaddes=$row['thread_description'];

  echo '<div class="media">
  <img class="mr-3" src="image/userdefaultimage.jpg" width="43px" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0"><a href="thread.php?category_id='.$threadcatid.'">'.$threadtitle.'</a></h5>
    '.$threaddes.'
  </div>
</div>';
}

if ($noresult) {
  echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">NOT RESULT FOUND..</h1>
    <p class="lead">BE THE FIRST PERSON TO AKS A QUESTION.</p>
  </div>
</div> ';
}
?>

<!-- this link is footer linked -->

  <?php include 'parshial/footer.php' ?>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>