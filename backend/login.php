<?php
include_once "config.php";
$cur = new AppInit();

  if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // echo "Login attemp";
    $email = $_POST['email'];
    $password = $_POST['password'];
    //
    // echo ($email .' &nbsp; '.$password);
    $cur->Login($email, $password);

  }else{

    echo "Somethig is not right, getting a different request method". $_server['REQUEST_METHOD'];
  }



 ?>
