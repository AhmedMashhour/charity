<?php
session_start();
unset($_SESSION["user_acc"]);
unset($_SESSION["org_name"]);
setcookie('act','',time()-5235123,'/');
setcookie('word','',time()-5235123,'/');
header("location:home.php");
?>