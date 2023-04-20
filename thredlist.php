<!DOCTYPE html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>ThreadList</title>

</head>
<body>
  
 <?php include 'parshial/dbconnection.php'; ?>
<?php include 'parshial/header.php'; ?>

<!-- here stard jumbotron -->

<?php
include 'parshial/dbconnection.php';


   $catid = (isset($_GET['catid']) ? $_GET['catid'] : '');
$sql= "SELECT * FROM `category` WHERE category_id='$catid'";
$result =mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  
 $category_id=$row['category_id'];
  $cat=$row['category_name'];
  $catdes=$row['category_description'];
  


echo'  <div class="container my-4">

<div class="jumbotron">
  <h1 class="display-4"> '.$cat.'</h1>
  <p class="lead">'. $catdes.' </p>
  <hr class="my-9">
  <p>No Spam / Advertising / Self-promote in the forums.Do not post copyright-infringing material.Do not post “offensive” posts, links or images.Do not cross post questions.Do not PM users asking for help.Remain respectful of other members at all times..</p>
  <p class="lead">
    <p >Posted by:<b><i>Sameer.</i> </b></p>
  </p>
  </div>';}
?>

<?php
$thread_title="";
$thread_description="";
$thread_cat_id="";
$thread_userid='';
  $method = $_SERVER['REQUEST_METHOD'];
  
  if ($method =="POST") {
    /*inser into thread into db,*/
    /*$id=$_POST['thread_cat_id'];*/
    $threadtitle=$_POST['thread_title'];
    $threaddes=$_POST['thread_description'];
    $sno =$_POST['sno'];
  $sql ="INSERT INTO `threadlist` ( `thread_title`, `thread_description`, `thread_cat_id`, `thread_userid`, `DateTime`) VALUES ('$threadtitle ', '$threaddes', '$category_id', '$sno',  current_timestamp())";
    $result =mysqli_query($connection, $sql);
    
  }
?>

<!-- form  -->
<h1>Aks a Question.</h1>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] =="true") {

echo '<form name="tip" id="myform" action=" '.$_SERVER['REQUEST_URI'].'" method="post">

<div class=" col-md-5">
<div class="form-group">
    <label for="Input">Title.</label>
    <input type="text" class="form-control" id="title" name="thread_title" required="" >
  </div>
  <!-- Textarea 2 rows height -->
<div class="form-group">
  <label class="form-label" for="textAreaExample">Message</label>
  <textarea class="form-control" id="description" name="thread_description" rows="4" required=""></textarea>
  <input type="hidden" name="sno" value="'. $_SESSION["sno"] .'">
</div>
<div>
  <button class="btn btn-primary" type="submit">Submit</button>
</div>
</div>
  </form>';
}
else{
  echo 'first you login dena you ask a question';
}
?>


<!-- stard media object -->
<h1>Browse Questions:</h1>
<?php
include 'parshial/dbconnection.php';

$limit = 3;

if (isset($_GET['page'])) {
  $page = $_GET['page'];
}else{
  $page =1;
}
$offset = ($page -1) * $limit; 

 $catid = (isset($_GET['catid']) ? $_GET['catid'] : '');
/*$sql=" SELECT * from `threadlist` order by thread_id  desc limit {$offset},{$limit}";*/
$sql= "SELECT * FROM `threadlist` WHERE thread_cat_id ='$catid'
order by thread_id  desc limit {$offset},{$limit}";
$result =mysqli_query($connection, $sql);
$noresult=true;
while ($row = mysqli_fetch_assoc($result)) {
  $noresult=false;
  $thread_cat_id=$row['thread_id'];
  $threadtitle=$row['thread_title'];
  $threaddes=$row['thread_description'];
  $dt=$row['DateTime'];
  $thread=$row['thread_userid'];
  
  $sql2 ="SELECT username FROM `signup` WHERE sno='$thread'";
  $result2 =mysqli_query($connection, $sql2);
  $row2 =mysqli_fetch_assoc($result2);


  echo '<div class="media">
   <img class="mr-3" src="image/userdefaultimage.jpg" width="43px" alt="Generic placeholder image">
  <div class="media-body">'.
    '<h5 class="mt-0"><a href="thread.php?category_id='.$thread_cat_id.'">'.$threadtitle.'</a></h5>
    <p>'.$threaddes.'</p></div>'.'<div class ="font-weight-bold my-0">Ask by: '.$row2['username'].' at '.$dt.'
  </div>'.
'</div>';
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
<!-- <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item" ><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav> -->

<?php 
  $catid = (isset($_GET['catid']) ? $_GET['catid'] : '');
 $sqli ="SELECT * FROM `threadlist` WHERE thread_cat_id ='$catid'";
 $query =mysqli_query($connection, $sqli);

 if (mysqli_num_rows($query)) {
   
   $total_record =mysqli_num_rows($query);
   $total_page =ceil($total_record / $limit);
   echo '<ul class="pagination justify-content-center">';
   if ($page > 1) {
     echo '<li class="page-item">
      <a class="page-link" href="thredlist.php?catid='.$catid.'&page='.($page - 1).'" tabindex="-1">Previous</a>
    </li>';
   }
   for ($i=1; $i <=$total_page ; $i++) { 
    if ($i == $page) {
      $active ='active';
    }else{
      $active ='';
    }
     
     echo'<li class="page-item '.$active.'" ><a class="page-link" href="thredlist.php?catid='.$catid.'&page='.$i.'">'.$i.'</a></li>';
   }
   if ($total_page > $page) {
     echo '<li class="page-item">
      <a class="page-link" href="thredlist.php?catid='.$catid.'&page='.($page + 1).'">Next</a>
    </li>';
   }
   echo '</ul>';
 }


?>
</div>
<!-- this link is footer linked -->

  <?php include 'parshial/footer.php' ?>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>