<?php
include_once "config.php";
$cur = new AppInit();
session_start();

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
      if(!isset($_SESSION["loggedin"])){
        header("Location: ../admin/index.php");
    }
   $cur->remove($_POST['product'], $_SESSION['email']);

  }


 ?>
