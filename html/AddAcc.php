
<?php
include_once('../database/database.php');
session_start();
 $query='select * from log_in where type="admin"';
$r=$db->getRow($query,array());
if(!isset($_SESSION['user_acc'])||!isset($_SESSION['org_name'])||$_SESSION['user_acc']!=$r['user_name'])
    {
         header("location: home.php");
    }
      $i=$db->getCount('select *from الجمعيات where اسم_الجمعيه ="'.$_POST['username'].'" and  المدير ="'.$_POST['manager'].'"',array());
       
           if($i>0)
           {
            redirect($_SERVER['HTTP_REFERER']);
           }
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
         if(isset($_POST['manager'])&&isset($_POST['username'])&&isset($_POST['location'])&&isset($_POST['charity_phone'])&&isset($_POST['charity_user'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])) 
         {
              if($_POST['password']!=NULL&&$_POST['manager']!=NULL&&$_POST['charity_user']!=NULL&&$_POST['username']!=NULL&&$_POST['location']!=NULL){
                  
             if($_POST['confirm_password']==$_POST['password']){
             $int2=$db->insertRow("Insert into الجمعيات values(?,?,?,?,?)",array($_POST['username'], $_POST['manager'], $_POST['charity_phone'], $_POST['location'], $_POST['email']));
                 
             $int=$db->insertRow("Insert into log_in values(?,?,'user',?)",array($_POST['charity_user'], $_POST['confirm_password'],$_POST['username']));
                 if($int>0&&$int2>0)
                 {
                    
                      $db->phpAlert('تم اضافة الجمعية و اسم المستخدم');
                      redirect($_SERVER['HTTP_REFERER']);
                 }
         }
             else
             {
                
                    $db->phpAlert('كلمات المرور غير متطابقة');
                 redirect($_SERVER['HTTP_REFERER']);
             }
   }}
       else
       {
    
            $db->phpAlert('عفوا لقد حدث خطأ');
             redirect($_SERVER['HTTP_REFERER']);
       }
   
   }
             
             
            
             



    

?>