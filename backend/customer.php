<?php
include_once "config.php";
$cur = new AppInit();

  if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    echo $name.' '.$email;
    $cur->createuser($name, $email, $address, $phone, $password);

  }


 ?>
