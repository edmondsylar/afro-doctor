<?php
include_once "config.php";
$cur = new AppInit();
session_start();

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
      if(!isset($_SESSION["loggedin"])){
        header("Location: ../admin/index.php");
    }
   $cur->add($_POST['product'], $_POST['price'], $_SESSION['email']);

  }


 ?>
