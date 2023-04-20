<?php

session_start();
echo "out";
session_destroy();

header('location:/foram-project/index.php');
exit();

?>