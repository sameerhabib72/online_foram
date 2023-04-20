<!doctype html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Thread</title>
</head>
<body>
<?php include 'parshial/header.php'; ?>

<!-- here stard jumbotron -->
<div class="container my-4">
<?php
include 'parshial/dbconnection.php';

    if(isset($_GET['category_id'])){
      $category_id =   $_GET['category_id'];

$sql= "SELECT * FROM `threadlist` WHERE thread_id='$category_id'";
$result =mysqli_query($connection, $sql);
while ($row =mysqli_fetch_assoc($result)) {
  
 
  $thread_id=$row['thread_id'];
  $title=$row['thread_title'];
  $description=$row['thread_description'];
  $thread_userid=$row['thread_userid'];
   $thread_id=$row['thread_id'];

  $sqli =" SELECT username FROM `signup` WHERE sno='$thread_userid'";
  $number=mysqli_query($connection, $sqli);
  $num =mysqli_fetch_assoc($number);




echo'<div class="jumbotron">
  <h1 class="display-4">'. $title .' </h1>
  <p class="lead">   '.$description.'</p>
  <hr class="my-2">
  <p>No Spam / Advertising / Self-promote in the forums.Do not post copyright-infringing material.Do not post “offensive” posts, links or images.Do not cross post questions.Do not PM users asking for help.Remain respectful of other members at all times..</p>
  <p class="lead">
    <p>Posted by: <b><i>'.$num['username'] .'</b></i></p>
  </p>
</div>';
}
}

/*<h1><b>Discussion:</b></h1>
*/
/* $thread_id=$row['thread_id'];*/
include 'parshial/dbconnection.php';
$method =$_SERVER['REQUEST_METHOD'];
if ($method=="POST") {
  $comment_create=$_POST['comment_create'];
  $sno=$_POST['sno']; 
  $thread_id=$_POST['thread_id'];
  $sql ="INSERT INTO `comment` ( `comment_create`, `thread_id`, `comment_by`, `dt`) VALUES ( '$comment_create',
   '$thread_id', '$sno', current_timestamp());";
  $result =mysqli_query($connection, $sql);
}

?>

<?php 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] =="true") {

echo'<!-- form to submit database  -->
<h1>Post a comment.</h1>
  <div class="col-md-5">
<form name="tip" id="myform" action='.$_SERVER['REQUEST_URI'].'" method="post">

  <!-- Textarea 2 rows height -->
<div class="form-group">
<div>
  <input type="hidden" name="thread_id" id="thread_id">
  </div>
  <label class="form-label" for="textAreaExample">Message</label>
   <textarea class="form-control" id="comment_create" name="comment_create" rows="4" required=""></textarea>
    <input type="hidden" name="sno" value="'. $_SESSION["sno"] .'">
 </div>
<div>
  <button class="btn btn-success" type="submit">Post</button>
</div>
  </form>
</div></div>';}
else{
  echo '<p role=" height ">first you login dan you start a discussion</p>';
}
?>


<!-- stard media object -->

<!-- this to display comment into database. -->

<div class="container">

<?php
include 'parshial/dbconnection.php';

$category_id = (isset($_GET['category_id']) ? $_GET['category_id'] : '');
$sql= "SELECT * FROM `comment` WHERE thread_id='$category_id'";
$result =mysqli_query($connection, $sql);
$noresult =true;
while ($row = mysqli_fetch_assoc($result)) {
  $noresult =false;

  $comment_time=$row['dt'];
  /*$comment_id=$row['thread_cat_id'];*/
  $comment_create=$row['comment_create'];
  $thread=$row['comment_by'];

   $sql2 ="SELECT username FROM `signup` WHERE sno='$thread'";
  $result2 =mysqli_query($connection, $sql2);
  $row2 =mysqli_fetch_assoc($result2);


  echo ' <div class="media mb-5">
  <img class="mr-3" src="image/userdefaultimage.jpg" width="43px" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-2 my-0">'.$row2['username'].' : <i class ="col-md-4">'.$comment_time.'</i></h5>
    '.$comment_create.'
  
  </div>
</div>';
}
if ($noresult) {
  echo '<div style=" height: 95%;" ><div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">NOT FOUND COMMENT.</h1>
    <p class="lead">Be The First Person TO Comment.</p>
  </div></div>
</div>';
}



?>
</div>

</div>

<!-- this is inset commen into database. -->


<!-- this link is footer linked -->

 <?php include 'parshial/footer.php' ?> 

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>