<?php
include_once "config.php";
$cur = new AppInit();

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
      $email = $_POST['email'];
      $name = $_POST['names'];
      $password = $_POST['password'];

      $cur->register($email, $name, $password);

  }else{

    echo "Somethig is not right, getting a different request method". $_server['REQUEST_METHOD'];
  }



 ?>
