<?php
include_once "config.php";
$cur = new AppInit();

  if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $imagename = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $title = $_POST['name'];
    $desc = $_POST['address'];
    $address = $_POST['desc'];

    $cur->add_service($title, $address, $desc, $imagename);

    $imagename;
  }else{
    echo "Somthing else is wrong";

  }


 ?>
