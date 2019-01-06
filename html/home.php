  <?php
session_start();
unset($_SESSION["user_acc"]);

include_once('../database/database.php');
if(isset($_COOKIE['act'])&&isset($_COOKIE['word']))
{
   
$user=$_COOKIE['act'];
$pass=$_COOKIE['word'];
 
$res=$db->getCount('Select * From log_in Where user_name="'.$user.'" and pwd="'.$pass.'"',array());
    if($res ==1)
{
	 
    $_SESSION['user_acc']=$user;
     
    
    $q=$db->getRow('Select * From log_in Where user_name="'.$user.'" and pwd="'.$pass.'"',array());
    if($q['type']=='admin')
    {
       $_SESSION['org_name']=$q['اسم_الجمعيه'];
           header("location: admin_show.php");
        
    }
    else{
        $_SESSION['org_name']=$q['اسم_الجمعيه'];
    header("location: show.php");  
    }
}
   else
   {
       setcookie('act','',time()-5235123,'/');
        setcookie('word','',time()-5235123,'/');
        header("location: login.php");  
   }
}

?>




<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8" >
	<!-- IE Compatible -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<!-- First Mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>Home Page</title>
	<link rel="stylesheet" href="../css/bootstrap.css" >
	<link rel="stylesheet" href="../css/fontawesome.min.css" >
	<link rel="stylesheet" href="../css/home.css" >
	<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Tangerine"> <!-- change Tangerine to any type -->
	<!-- [if lt IE 9] >
		<script src="../js/html5shiv.min.js" ></script>
		<script src="../js/respond.min.js" ></script>
	<! [endif] -->
</head>

<body>

	<nav class="navbar navbar-default" role="navigation">
	  	<div class="container">
		  	<ul class="nav navbar-nav">
				<li><a class="myact" href="login.php">تسجيل الدخول</a></li>
		  	</ul>
		  	<div class="mynav" >
				<img src="../images/w2.PNG" >
			</div>
	  	</div>
	</nav>

	<div class="container main">

		<!-- This Admin object -->
		<div class="row">
            <?php 
                   
                $q='select * from الجمعيات where اسم_الجمعيه = "الرجاء"';
                $row=$db->getRow($q,array());
                
                $mail=$row['الايميل'];
                $phone=$row['رقم_الهاتف'];
                ?>
			<div class="col-xs-1" ></div>
			<div class="col-xs-10 admin">
				<h2 class="name"><?php echo $row['اسم_الجمعيه'];?></h2>
				<h3>المقر :<?php echo $row['العنوان'];?></h3>
				<h3><?php echo $row['الايميل'];?>: الايميل</h3>
				<h3>التليفون : <?php echo $row['رقم_الهاتف'];?></h3>
			</div>
			<div class="col-xs-1"></div>
		</div>

		 <?php
             $q='select * from الجمعيات where اسم_الجمعيه !="الرجاء"';
                $rows=$db->getRows($q,array());
            
            
            foreach($rows as $row)
            {
                echo '<div class="row"><div class="col-xs-1" ></div><div class="col-xs-10 show">';
                echo '<h3 class="name">'.$row['اسم_الجمعيه'].'</h3>';
                echo '<h4>االمقر :'.$row['العنوان'].'</h4>';
                echo '<h4>'.$row['الايميل'].':الاميل </h4>';
                 echo '<h4>التليفون : '.$row['رقم_الهاتف'].'</h4><div class="col-xs-1"></div></div></div>';
                
            }
             
            ?>

	<section class="footer">
        <div class="container">
            <div class="row">
                <div class=" col-xs-12 center-block" float="right" dir=rtl>
                    <h3> اتصل بنا</h3>
                     <ul><?php 
    $row=$db->getRow('select * from الجمعيات where اسم_الجمعيه ="الرجاء"',array());
    
    ?>
                              
                                <li>رقم التليفون : <?php echo $row['رقم_الهاتف'] ?></li>
								<li>الايميل:  <?php echo $row['الايميل'] ?></li>
	
                            </ul>
                </div>
            </div>
        </div>
    </section>

	<div class="copy-Right" >
		<div class="container">
			<h5>جميع الحقوق محفوظة لجمعية الرجاء &copy; 2018-2019</h5>
		</div>
	</div>

	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

</body>
</html>