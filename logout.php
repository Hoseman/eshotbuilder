<?php
session_start();
session_destroy();
include_once('functions.php');
$url = "./login.php";
echo redirect($url);
?>