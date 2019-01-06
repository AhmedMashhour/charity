
<?php
include_once('../database/database.php');
session_start();
    
if(!isset($_SESSION['user_acc'])||!isset($_SESSION['org_name']))
    {
         header("location: home.php");
    }
$query='select * from log_in where type="admin" and user_name="'.$_SESSION['user_acc'].'"';
$r=$db->getCount($query,array());
$nav='';
$add_cherity='';
if($r==1)
{
    $nav=' <li><a href="admin_show.php">الصفحة الرئيسية</a></li><li class=" adduser" id="addcharity" data-toggle="modal" data-target="#mymodel2"> <a href="#">اضافة حساب</a></li>';
    
    $add_cherity=' <div id="mymodel2" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content" id="popupadd">
  <div class="modal-header">
  <button class="close" data-dismiss="modal">&times;</button>
  <h3 class="modal-title text-center">اضافة جمعية</h3>
  </div>

   <form class="modal-body" id="form2_add" role="form" method="post"  action ="AddAcc.php">
    <div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" id="charity_name" name="username" class="classname" dir="auto" required>
            <span class="text-center" id="charityname_error_message"></span>
         </div>
		 <div class="col-md-3 col-xs-2">
            <label> اسم الجمعية<label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="manager" name="manager" dir="auto" required>
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>اسم مدير الجمعية </label></div>
        </div>
        </div>

        <div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="location" name="location" dir="auto" required>
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>المقر </label></div>
        </div>
        </div>

		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="tel" id="charity_phone" name="charity_phone" dir="auto" required>
             <span class="text-center" id="charity_phone_error_message"></span>
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>رقم التليفون </label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="email" name="email" dir="auto">
		   <span class="text-center" id="email_error_message"></span>
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>الايميل </label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="charity_user" name="charity_user" dir="auto" required>
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>اسم المستخدم </label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="password" name="password" dir="auto" required>
		   <span class="text-center" id="password_error_message"></span>
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>الرقم السري </label></div>
        </div>
        </div>
              
              <div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="confirm_password" name="confirm_password" dir="auto"  required >
		   <span class="text-center" id="password_error_message"></span>
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>تأكيد الرقم السري </label></div>
        </div>
        </div>
		
		<div class="modal-footer"></div>
  <div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12 center-block">

	<button type="reset" name="cancel" value="cancel" class="btn btn-danger btn2 text-center" id="cancel_charity" data-dismiss="modal">الغاء</button>
	<button type="submit" name="add" onclick="this.form.submit()" value="add" class="btn btn-primary btn1 text-center" id="add_charity" data-dismiss="modal">اضافة</button>
	
	</div>
	</div>
		
 </form>

  
  </div>

  </div>
  </div>';
}
else
{
     $nav=' <li><a href="show.php">الصفحة الرئيسية</a></li><li class=" adduser" id="addcharity" data-toggle="modal" data-target="#mymodel2">';
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
<link rel="stylesheet" href="../css/search.css" />
<link rel="stylesheet" href="../css/admin_show.css" />
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
        <?php echo $nav;?>
        <li class=" adduser" id="adduser" data-toggle="modal" data-target="#mymodel"> <a href="#">اضافة حالة</a></li>
		
        
		<li class="active"><a href="">جمعية <?php echo $_SESSION['org_name'];?></a></li>
		
	<li><a id="logout" href="logout.php">تسجيل الخروج</a></li>
	  </ul>
    </div>	
  </div>  
</nav>


<!-- start popup add user-->
  <div id="mymodel" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content" id="popupadd">
  <div class="modal-header">
  <button class="close" data-dismiss="modal">&times;</button>
  <h3 class="modal-title text-center"> اضافة حالة</h3>
  </div>

   <form class="modal-body" id="form_add" role="form"  method='post' action ="add_one.php">
    <div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" id="user_name" name="username" class="classname" dir="auto" required>
            <span class="text-center" id="username_error_message"></span>
         </div>
		 <div class="col-md-3 col-xs-2">
            <label> اسم الحالة رباعي<label></div>
        </div>
        </div>
              
              <div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="nat_num" name="nat_num" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>الرقم القومي</label></div>
        </div>
        </div>

        <div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="number" id="age" name="age" class="classephone" dir="auto">
             <span class="text-center" id="age_error_message"></span>
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>السن </label></div>
        </div>
        </div>

		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="qualified" name="qualified" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>المؤهل </label></div>
        </div>
        </div>
		 
		 <div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="tel" id="phone2" name="phone" class="classephone" dir="auto">
             <span class="text-center" id="phone2_error_message"></span>
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>رقم التليفون </label></div>
        </div>
        </div>
		
        <div class="form-group">
        <div class="row">
         <div class="col-md-8 col-xs-10">
           <input type="text" name="address" dir="auto"></div>
		   <div class="col-md-3 col-xs-2">
         <label>العنوان</label></div><br>
         </div>
        </div>
       

        <div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" id="status_name" name="status" dir="auto">
         </div>
		 <div class="col-md-3 col-xs-2">
            <label> الحالة الاجتماعية<label></div>
        </div>
        </div>

		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="work" name="work" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>العمل</label></div>
        </div>
        </div>
		

        <div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text"  id="childeren_number" name="familyN" dir="auto">
            <span class="text-center" id="family2_error_message"></span>
         </div>
		 <div class="col-md-3 col-xs-2">
            <label>عدد الابناء<label></div>
        </div>
        </div>
		
		<div id="childeren"></div>
		
		
		
		<div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" id="income" name="income" value="0" dir="auto">
         </div>
		 <div class="col-md-3 col-xs-2">
            <label>اجمالي الدخل<label></div>
        </div>
        </div>
		
		
       <!-- Start Tabel Of Add Income -->
	<div class="container">
	<table border="1px" id="income_table" class="table table-bordered table-striped ">
	<thead>
	   <tr>
		  <th class="text-center"><input type="hidden" id="num_incomes" value="1" name="num_incomes" dir="auto"></th>
	      <th class="text-center">مصدر الدخل</th>
		  <th class="text-center">المبلغ</th>
	   </tr>
	   </thead>
	   <tbody id="txt">
	    
        <tr>
		    <td class="text-center"><i id="income_icon" onclick="income_plus()" class="fas fa-plus-circle"></i></td>
            <td class="text-center"><input type="text" name="income1"></td>
            <td class="text-center"><input type="text" name="num_income1"></td>
        </tr>
	  </tbody>
    </table>
  </div>

		
		
		
		
		<div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" name="outcome" value="0" id="outcome" dir="auto">
         </div>
		 <div class="col-md-3 col-xs-2">
            <label> اجمالي المصروفات<label></div>
        </div>
        </div>
		
		
		  <!-- Start Tabel Of Add OutCome -->
	<div class="container">
	<table border="1px" id="outcome_table" class="table table-bordered table-striped ">
	<thead>
	   <tr>
		  <th class="text-center"><input type="hidden" id="num_outcomes" value="1" name="num_outcomes" dir="auto"></th>
	      <th class="text-center">نوع المصروف</th>
		  <th class="text-center">المبلغ</th>
	   </tr>
	   </thead>
	   <tbody id="txt">
	    
        <tr>
		    <td class="text-center"><i id="outcome_icon" onclick="outcome_plus()"  class="fas fa-plus-circle"></i></td>
            <td class="text-center"><input type="text" name="outcome1"></td>
            <td class="text-center"><input type="text" name="num_outcome1"></td>
        </tr>
	  </tbody>
    </table>
  </div>

		
		
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="date" id="date" name="date" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>تاريخ البحث </label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="kind" name="kind" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>نوع البحث </label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="researcher" name="researcher" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>القائم بالبحث</label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="guide" name="guide" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>دليل الحالة</label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="Quartermaster" name="Quartermaster" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>التموين </label></div>
        </div>
        </div>
		
		
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="building" name="building" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>السكن</label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="area" name="area" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>مساحة السكن </label></div>
        </div>
        </div>
		
		 <div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" id="help_kind2" name="help_kind2" dir="auto">
         </div>
		 <div class="col-md-3 col-xs-2">
            <label> نوع المساعدة المطلوبة<label></div>
        </div>
        </div>
		
		
		
		<div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" id="period" name="period" dir="auto">
         </div>
		 <div class="col-md-3 col-xs-2">
            <label> فترة الحالة<label></div>
        </div>
        </div>
		<div class="modal-footer"></div>
  <div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12 center-block">

	<button type="reset" name='cancel' value='cancel' class="btn btn-danger btn2 text-center" id="btn2" data-dismiss="modal">الغاء</button>
        
	<button type="submit" onclick="this.form.submit()" name="add_hala" value="add" class="btn btn-primary btn1 text-center" id="addbtn" data-dismiss="modal">اضافة</button>
	
	</div>
	</div>
   



 </form>


  </div>

  </div>
  </div>

  
  <?php
              echo $add_cherity;
              
              ?>



<form class="modal-body" id="form_search" action ="search.php" method = "post" role="form" dir=rtl>

  <div class="main">

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <label> اسم الحالة</label>
        <input type="radio" name="search" value="1">
      </div>
      <div class="col-sm-4"></div>
    </div>

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <label> الرقم القومى</label>
        <input type="radio" name="search" value="7">
      </div>
      <div class="col-sm-4"></div>
    </div> 
	
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <label>العنوان</label>
        <input type="radio" name="search" value="2" >
      </div>
      <div class="col-sm-4"></div>
    </div>

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <label>الحالة الاجتماعية</label>
        <input type="radio" name="search" value="3" >
      </div>
      <div class="col-sm-4"></div>
    </div>

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <label>عدد الأسرة</label>
        <input type="radio" name="search" value="4" >
      </div>
      <div class="col-sm-4"></div>
    </div>

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <label>الدخل الشهرى</label>
        <input type="radio" name="search"value="5"  >
      </div>
      <div class="col-sm-4"></div>
    </div>

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <label>المصاريف الشهرية</label>
        <input type="radio" name="search" value="6">
      </div>
      <div class="col-sm-4"></div>
    </div>

  </div>

  <input type="hidden" name="id" value="">


  <div class="row">
    <div class="col-xs-4 "></div>
    <div class="col-xs-4">
      <button type="submit" name="submit" value="search" class="btn btn-primary btn1 text-center" id="
        search" data-dismiss="modal">بحث
      </button>
      <input type="text" name="txtdata" >
    </div>
    <div class="col-xs-4"></div>
  </div>

</form>
<!-- Start Tabel -->

	<div class="container"  id="bigdiv">
	<table border="1px" id="tabledit" class="table table-bordered table-striped ">
	<thead>
	   <tr>
	      <th class="text-center">اسم الحالة</th>
		  <th class="text-center">رقم التليفون</th>
		  <th class="text-center">السن</th>
		  <th class="text-center">العنوان</th>
		  <th class="text-center">الحالة الاجتماعية</th>
		  <th class="text-center">العمل</th>
	   </tr>
	   </thead>
	   <tbody id="txt">
	    
    <!-- start loop -->
	<?php
	
	if((isset($_POST['submit'])) && (isset($_POST['txtdata']))&& (isset($_POST['search'])))
	{
		$tab='';
		$val=$_POST['search'];
		if($val==1)
		{
			$tab='الاسم';
		}
		else if($val==2)
		{
		    $tab='العنوان';
		}
		else if($val==3)
		{
			$tab='الحاله_الاجتماعيه';
		}
		else if($val==4)
		{
			$tab='عدد_الابناء';
		}
		else if($val==5)
		{
			$tab='اجمالى_الدخل';
		}
		else if($val==6)
		{
			$tab='اجمالى_المصروفات';
		}
		else if($val==7)
		{
			$tab='الرقم_القومى';
			$rows=$db->getRows('select * from الحاله  Where '.$tab.' = '.$_POST['txtdata'].' ',array());
		}
		if($val!=7)
		{
		$rows=$db->getRows('select * from الحاله  Where '.$tab.' = "'.$_POST['txtdata'].'" ',array());
		}
		foreach($rows as $row)
		{
	?>
    <tr> 
			<td class="text-center"><a href="info.php?id=<?php echo $row['الرقم_القومى'];?>&org=<?php echo  $row['اسم_الجمعيه_التى_اضافه_الحاله']; ?>" target="_blank"><?php echo $row['الاسم']; ?></a></td>
            <td class="text-center"><?php echo $row['رقم_الهاتف']; ?></td>
            <td class="text-center"><?php echo $row['السن']; ?></td>
			<td class="text-center"><?php echo $row['العنوان']; ?></td>
			<td class="text-center"><?php echo $row['الحاله_الاجتماعيه']; ?></td>
			<td class="text-center"><?php echo $row['العمل']; ?></td>
		
    </tr>
	<?php
	}
	}
	else
	 echo "من فضلك ادخل البيانات واختر نوع البحث";
	?>
	<!-- end loop -->	
	  </tbody>
    </table>
  </div>

<!-- start section footer -->
            <section class="footer">
                <div class="container">
                    <div class="row">
                        <div class=" col-xs-12 center-block" float="right" dir=rtl>
                               <h3> اتصل بنا</h3>
                             <ul><?php 
    $row=$db->getRow('select * from الجمعيات where اسم_الجمعيه ="'.$_SESSION['org_name'].'"',array());
    
    ?>
                              
                                <li>رقم التليفون : <?php echo $row['رقم_الهاتف'] ?></li>
								<li>الايميل:  <?php echo $row['الايميل'] ?></li>
	
                            </ul>
                      
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
<script src="../js/validation.js"></script>
<script src="../js/income.js"></script>
<script src="../js/outcome.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/child.js"></script>
<script src="../js/wow.min.js"></script>
<script>new WOW().init();</script>
</body>
</html>