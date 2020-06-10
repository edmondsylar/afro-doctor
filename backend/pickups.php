<?php
include_once "config.php";
$cur = new AppInit();

  if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $imagename = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $loc = $_POST['location'];
    $num = $_POST['number'];
    $dire = $_POST['desc'];

    $cur->add_location($loc, $num, $dire, $imagename);
  }else{
    echo "Somthing else is wrong";

  }


 ?>
