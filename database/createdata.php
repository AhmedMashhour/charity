<?php
include_once('database.php');
$r = $db->myExec(file_get_contents('Datab.sql'));
if($r !== false)
  echo  "Data are added successfully!<br/>";
  else
 echo  "Error.<br/>";
 ?>