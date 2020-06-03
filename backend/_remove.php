<?php
include_once "config.php";
$cur = new AppInit();
session_start();
    if(isset($_GET['product'])){
        echo $_GET['product'];
        $cur->_rem($_GET['product'], $_SESSION['email']);
    }else{
        header("Location: ../cart.php");
    }
?>
