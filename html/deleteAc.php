

<?php
include_once('../database/database.php');
session_start();
 $query='select * from log_in where type="admin"';
$r=$db->getRow($query,array());
if(!isset($_SESSION['user_acc'])||!isset($_SESSION['org_name'])||$_SESSION['user_acc']!=$r['user_name'])
    {
         header("location: home.php");
    }
    
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
         if(isset($_POST['org_name'])&&isset($_POST['org_user']))  
         {
             $int=$db->deleteRow("DELETE FROM الجمعيات WHERE اسم_الجمعيه='".$_POST['org_name']."' and المدير='".$_POST['org_user']."'",array());
         }
       

   }
 header("location:".$_SERVER['HTTP_REFERER']);
?>