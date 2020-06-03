<?php
include_once "config.php";
$cur = new AppInit();
session_start();
$cur->empty_cart($_SESSION['email']);

?>
