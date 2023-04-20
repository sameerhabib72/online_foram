<!doctype html lang="en">
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
<div class="my-4">

<h1> Search Result For: <?php echo $_GET['search'] ?></h1>

<?php 
include 'parshial/dbconnection.php';

/*$sam=$_GET['search'];*/
$sam = (isset($_GET['search']) ? $_GET['search'] : '');
$sql3 = "SELECT * FROM `threadlist` WHERE thread_title='$sam' ";
$search=mysqli_query($connection, $sql3);
$noresult=true;
while ($row =mysqli_fetch_assoc($search)) {
$noresult=false;

$thread_title =$row['thread_title'];
$thread_desc =$row['thread_description'];
$threadid=$row['thread_id'];

$url="thread.php?categoryid=$threadid ";


echo ' <div class="media my-4">
  <img class="mr-2 " src="image/userdefaultimage.jpg" width="30px" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class=""><a href="'.$url.'"><i class ="">'.$thread_title.'</i></a></h5>
    <p class=" ">'.$thread_desc.'</p> </div></div>';

}
if ($noresult) {
    echo '<div style=" height: 95%;" ><div class="jumbotron jumbotron-fluid  col-mb-5">
  <div class="container">
    <h1 class="display-4">NOT FOUND Result.</h1>
    <p class="lead">Suggestion:
            <ul>

                 <li>Make sure that all words are spelled correctly.</li>
                 <li>Try different keywords.</li>
                 <li>Try more general keywords.</li>
            </ul>
     </p>
  </div></div>
</div>';
}


?>
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



















