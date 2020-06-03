<?php
include_once "config.php";
$cur = new AppInit();

  if ($_SERVER['REQUEST_METHOD'] == "POST"){

    echo "This is working";

    $imagename = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $title = $_POST['name'];
    $desc = $_POST['desc'];
    $address = $_POST['address'];
    $price = $_POST['price'];

    $cur->add_drug($title, $desc, $address, $imagename, $price);

    // $imagename;
  }else{
    echo "Somthing else is wrong";

  }


 ?>
