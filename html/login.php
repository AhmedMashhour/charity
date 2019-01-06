
  
  <?php
include_once('../database/database.php');
if(isset($_COOKIE['act'])&&isset($_COOKIE['word']))
{
   
$user=$_COOKIE['act'];
$pass=$_COOKIE['word'];
 
$res=$db->getCount('Select * From log_in Where user_name="'.$user.'" and pwd="'.$pass.'"',array());
    if($res ==1)
{
	 session_start();
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
        header("location: home.php");  
   }
}
else if($_SERVER["REQUEST_METHOD"] == "POST") {
if((isset($_POST['submit'])))
{
$user=$_POST['username'];
$pass=$_POST['password'];

$res=$db->getCount('Select * From log_in Where user_name="'.$user.'" and pwd="'.$pass.'"',array());

if($res ==1)
{
    if($_POST['remember']==1)
    {
     setcookie('act',$user,time()+(3600*24*30),'/','localhost');
     setcookie('word',$pass,time()+(3600*24*30),'/','localhost');
    }
	 
    
    $q=$db->getRow('Select * From log_in Where user_name="'.$user.'" and pwd="'.$pass.'"',array());
    session_start();
    $_SESSION['user_acc']=$user;
     $_SESSION['org_name']=$q['اسم_الجمعيه'];
    if($q['type']=='admin')
    {
       
           header("location: admin_show.php");
        
    }
    else{
    header("location: show.php");  
    }
}
else
	$db->phpAlert('اسم المستخدم او رقم المرور خطأ');
}
    }
?>
  

<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>جمعيةالرجاء</title>
<link rel='stylesheet' href="../css/bootstrap.css" />
<link rel='stylesheet' href="../css/fontawesome-all.min.css" />
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/animate.css" />
<link rel="stylesheet" href="../css/hover.css" />
<script defer src="/static/fontawesome/fontawesome-all.js"></script>
</head>
<body>

<!-- start Navbar --> 
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="mynav">
				<img src="../images/w2.PNG" >
    </div>
  <div class="container">    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ournavbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    
    <div class="collapse navbar-collapse test" id="ournavbar">
      <ul class="nav navbar-nav navbar-right test2">
        <li><a href="home.php">الصفحة الرئيسية</a></li>
      </ul>
  
    </div>
	
  </div>
</nav>

  
  
   <div class="container">    
        <div id="loginbox" class="mainbox col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                      <div class="panel-heading">
                        <div class="panel-title">تسجيل الدخول</div>
                        <!--<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div> -->
                    </div>   

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" method="post"role="form" action="login.php">
                                    
                            <div class="input-group">
                                        
                                        <input type="text" id="login-username"  class="form-control" name="username" placeholder="اسم المستخدم" required>                                        
                            </div>                              
                            <div class="input-group">
                                        <input type="password" id="login-password" class="form-control" name="password" placeholder="الرقم السري" required>
                            </div>			
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> تذكرني
                                        </label>
                                      </div>
                            </div>
     
	                      <div class="input-group">
						   <button type="submit" class="btn btn-success text-center"id="submit_btn" name="submit" style="font-size:20px">تسجيل الدخول</button>
	                      </div>
	 
                        </form>     
                      </div>                     
                    </div>  
        </div>
     </div>
                                
     
  <!-- start section footer -->
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
                        <div class="icons">
<i class="fa fa-facebook-f text-center"> </i>

</div>
                        </div>

                    </div>
                </div>
            </section>
        <!-- end section footer -->
  
        <!-- Start Copy Right -->
		<section class="copy-Right">
		   <p> جميع الحقوق محفوظة لجمعية الرجاء &copy; 2018-2019</p>
		</section>

  

<script src="../js/jquery-1.12.4.min.js"></script> 
<script src="../js/bootstrap.min.js"></script>
<script src="../js/wow.min.js"></script>
<script>new WOW().init();</script>
</body>
</html>