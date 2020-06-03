<?php
  include_once "config.php";
  $cur = new AppInit();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $s = $_POST['search'];
  header("Location: ../results.php?search=".$s);
}


 ?>
