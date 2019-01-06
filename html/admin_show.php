
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
              
              

       if(isset($_POST['delete_id']))     
       {
           
           $int=$db->deleteRow("DELETE FROM الحاله WHERE الرقم_القومى='".$_POST['delete_id']."' and اسم_الجمعيه_التى_اضافه_الحاله='".$_POST['organization']."'",array());
          
           if($int==0)
           {
               $db->phpAlert("لم يتم الحذف حاول مرة اخري");
           }
           
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
        <li><a href="admin_show.php"><?php  echo $_SESSION['user_acc'];?></a></li>
	    <li class=" adduser" id="adduser" data-toggle="modal" data-target="#mymodel"> <a href="#">اضافة حالة</a></li>
		<li class=" adduser" id="addcharity" data-toggle="modal" data-target="#mymodel2"> <a href="#">اضافة حساب</a></li>
          	
        <li><a href="search.php">بحث</a></li>
		<li class="active"><a href="">جمعية <?php echo $_SESSION['org_name'];?></a></li>
          <li><a href="edit_charity.php">تعديل الحساب</a></li>
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
		
		<div id="childeren">
		    
		</div>
		
		
		
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

  

      
<!-- start popup add charity-->
  <div id="mymodel2" class="modal fade" role="dialog">
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

	<button type="reset" name='cancel' value='cancel' class="btn btn-danger btn2 text-center" id="cancel_charity" data-dismiss="modal">الغاء</button>
	<button type="submit" name="add" onclick="this.form.submit()" value="add" class="btn btn-primary btn1 text-center" id="add_charity" data-dismiss="modal">اضافة</button>
	
	</div>
	</div>
		
 </form>


     
  </div>

  </div>
  </div>

<!-- end add charity -->



<!-- Start Tabel Of All Users -->

	<div class="container"  id="bigdiv">
	<table border="1px" id="tabledit" class="table table-bordered table-striped ">
	<thead>
	    <tr>
          <th class="text-center">الرقم القومي</th>
	      <th class="text-center">اسم الحالة</th>
		  <th class="text-center">رقم الهاتف</th>
		  <th class="text-center">العنوان</th>
		  <th class="text-center">نوع المساعدة المطلوبة</th>
		  <th class="text-center">السن</th>
		  <th class="text-center">العمل</th>
          <th class="text-center">عدد الجمعيات التي اضافت الحالة</th>
		  <th class="text-center">تعديل</th>
		  <th class="text-center">حذف</th>
	   </tr>
	   </thead>
	   <tbody id="txt">
	    
    <!-- start loop -->
     <?php
           $query='select * from الحاله where اسم_الجمعيه_التى_اضافه_الحاله = "'.$_SESSION["org_name"].'"';
           $rows=$db->getRows($query,array());
          
           
    foreach($rows as $row)
    {
        $i=$db->getCount('select *from الحاله where الرقم_القومى ="'.$row['الرقم_القومى'].'"',array());
            echo '<tr>
            <td class="text-center">'.$row['الرقم_القومى'].'</td>
			<td class="text-center"><a href="info.php?id='.$row['الرقم_القومى'].'&org='.$_SESSION["org_name"].'" target="_blank">'.$row['الاسم'].'</a></td>
			<td class="text-center">'.$row['رقم_الهاتف'].'</td>
            <td class="text-center">'.$row['العنوان'].'</td>
            <td class="text-center">'.$row['نوع_المساعده_المطلوبه'].'</td>
			<td class="text-center">'.$row['السن'].'</td>
			<td class="text-center">'.$row['العمل'].'</td><td class="text-center">'.$i.'</td>
        <td><button class="btn btn-primary btn3 center-block" id="edit_userrr" data-toggle="modal" onclick="getdata(&#39;edit.php?id='.$row['الرقم_القومى'].'&org='.$_SESSION["org_name"].'&#39;)"  data-target="#edit_user">تعديل </button> </td>
		<td><button class="btn btn-danger btn4 center-block" id="delete_user" data-toggle="modal" onclick="cpyid( &#39;'.$row['الرقم_القومى'].'&#39;,&#39;'.$row['اسم_الجمعيه_التى_اضافه_الحاله'].'&#39;)" data-target="#delete_modal">حذف</button></td></tr>';
    }
           
    ?>
	<!-- end loop -->	
	  </tbody>
    </table>
  </div>


  
  <!--popup edit user-->
     <div id="edit_user" class="modal fade" role="dialog">
         
      </div>
     <!--popup delete-->
      <div class="modal fade" id="delete_modal" role="dialog">
        <div class="modal-dialog">

          <div class="modal-content" id="popupdelete">
            <div class="modal-header">
              <button type="button"  class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">هل انت متاكد؟</h4>

            </div>
            <div class="modal-body">
             <strong style="color:red;">
                 سوف تقوم بحذف كل البيانات لهذه الحالة 
             </strong>
            </div>
            <div class="modal-footer">

              <form class="form-horizontal" action = "" method = "post">
                <input type="hidden" name="delete_id" id="delete_id" value="">
                  <input type="hidden" name="organization" id="organization" value="">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="this.form.submit()">نعم</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
              </form>
            </div>
          </div>

        </div></div>


	
	<!-- start popup delete charity-->
  <div id="delete_charity" class="modal fade" role="dialog">
  <div class="modal-dialog">

          <div class="modal-content" id="popupdelete">
            <div class="modal-header">
              <button type="button"  class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">هل انت متاكد؟</h4>

            </div>
            <div class="modal-body">
             <strong style="color:red;">
                سوف تقوم بحذف هذه الجمعية من الموقع
             </strong>
            </div>
            <div class="modal-footer">
              <form class="form-horizontal" action = "deleteAc.php" method = "post">
                  
                <input type="hidden" name="org_name" id="org_name" value="">
                   <input type="hidden" name="org_user" id="org_user" value="">
                  
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="this.form.submit()">نعم</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
              </form>
            </div>
          </div>

        </div>
      </div>


<!-- end delete charity -->




<!-- start admins table -->

   <!-- Start Tabel -->

	<div class="container"  id="bigdiv">
	<table border="1px" id="tabledit" class="table table-bordered table-striped ">
	<thead>
	   <tr>
          <th class="text-center"></th>
	      <th class="text-center">اسم الجمعية</th>
		  <th class="text-center">المقر</th>
		  <th class="text-center">رقم التليفون</th>
		  <th class="text-center">الايميل</th>
		  <th class="text-center">حذف</th>
	   </tr>
	   </thead>
	   <tbody id="txt">
	    
    <!-- start loop -->
   <?php
           $query='select * from الجمعيات where اسم_الجمعيه !="الرجاء"';
           $rows=$db->getRows($query,array());
           $n=1;
    foreach($rows as $row){
            echo '<tr>
            <td class="text-center">'.$n.'</td>
			<td class="text-center">'.$row['اسم_الجمعيه'].'</td>
			<td class="text-center">'.$row['العنوان'].'</td>
            <td class="text-center">'.$row['رقم_الهاتف'].'</td>
            <td class="text-center">'.$row['الايميل'].'</td>
        
		<td><button class="btn btn-danger btn4 center-block adduser" id="delete_char" data-toggle="modal" onclick="cpy_org( &#39;'.$row['اسم_الجمعيه'].'&#39;,&#39;'.$row['المدير'].'&#39;)" data-target="#delete_charity">حذف </button></td>
    </tr>';
	$n++;
    }
    
              ?>
	<!-- end loop -->	
	  </tbody>
    </table>
  </div>
  <!-- end admins table -->
  

<!-- Start Tabel Users -->

	<div class="container"  id="bigdiv3">
	<table border="1px" id=""  class="table table-bordered table-striped ">
	<thead>
	   <tr>
          <th class="text-center">الرقم القومي</th>
	      <th class="text-center">اسم الحالة</th>
		  <th class="text-center">رقم الهاتف</th>
		  <th class="text-center">العنوان</th>
		  <th class="text-center">نوع المساعدة المطلوبة</th>
		  <th class="text-center">السن</th>
		  <th class="text-center">العمل</th>
          <th class="text-center">عدد الجمعيات التي اضافت الحالة</th>
		  
	   </tr>
	   </thead>
	   <tbody id="txt">
	    
    <!-- start loop -->
     <?php
           $query='select * from الحاله where اسم_الجمعيه_التى_اضافه_الحاله != "'.$_SESSION["org_name"].'"';
           $rows=$db->getRows($query,array());
           
           
    foreach($rows as $row)
    {
        $i=$db->getCount('select *from الحاله where الرقم_القومى ="'.$row['الرقم_القومى'].'"',array());
            echo '<tr>
            <td class="text-center">'.$row['الرقم_القومى'].'</td>
			<td class="text-center"><a href="info.php?id='.$row['الرقم_القومى'].'&org='.$row['اسم_الجمعيه_التى_اضافه_الحاله'].'" target="_blank">'.$row['الاسم'].'</a></td>
			<td class="text-center">'.$row['رقم_الهاتف'].'</td>
            <td class="text-center">'.$row['العنوان'].'</td>
            <td class="text-center">'.$row['نوع_المساعده_المطلوبه'].'</td>
			<td class="text-center">'.$row['السن'].'</td>
			<td class="text-center">'.$row['العمل'].'</td><td class="text-center">'.$i.'</td>
        </tr>';
    }
           
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
  <script>
      function cpy_org(org_name,user_name)
      {
          document.getElementById('org_name').value=org_name;
          document.getElementById('org_user').value=user_name;

      }
              function cpyid(x,org)
      {
          document.getElementById('organization').value=org;
          document.getElementById('delete_id').value=x;
          
      }
              function income_plus()
      {
           document.getElementById('num_incomes').value=parseInt(document.getElementById('num_incomes').value)+1;
      }
       function income_plus2()
      {
           document.getElementById('num_incomes2').value=parseInt(document.getElementById('num_incomes2').value)+1;
                   
	var num=$("#num_incomes2").val();
	$("#edit_income_table").append("<tr> <td></td> <td><input type='text' name ='income"+num+"'></td> <td><input type='text' name ='num_income"+num+"'></td> </tr>");
      }
              function outcome_plus()
      {
          document.getElementById('num_outcomes').value=parseInt(document.getElementById('num_outcomes').value)+1;
      }
        function outcome_plus2()
      {
          document.getElementById('num_outcomes2').value=parseInt(document.getElementById('num_outcomes2').value)+1;
          var num=$("#num_outcomes2").val();
	$("#edit_outcome_table").append("<tr> <td></td><td><input type='text' name='outcome"+num+"'></td> <td><input type='text' name='num_outcome"+num+"'></td> </tr>");
      }
      
      
      
      ////////////////////////////
      
      function son_change(){
          var x=parseInt(document.getElementById('old_num_child_edit').value);
		
 var num=$("#child_edit").val();
 var i;
if(num - x > 0)
{
 
 for(i=x+1;i<=(parseInt(num));i++)
 {
	 
  $("#child_table2").append("<tr><td class='text-center'>" + i +"</td><td class='text-center'><input type='text' name='username" + i +"' ></td><td class='text-center'><input type='text' name='national"+i+"'></td><td class='text-center'><input type='radio' name='nam"+i+"' value='ذكر'><span style='display:inline-block;margin-top:30px;color:black;'>ذكر </span><br><input type='radio' name='nam"+ i +"' value='انثي'style='margin-right: -15px;'><span style='display:inline-block;margin-top:5px;color:black;'>انثي</span></td><td class='text-center'><input type='text' name='age"+i+"'></td><td class='text-center'><input type='text' name='income_ch"+i+"'></td></tr>");
 }
 
 }
   document.getElementById('old_num_child_edit').value=num;       
}

              
  function show_content(str)
      {
          document.getElementById('edit_user').innerHTML=str;
		    $("#edit_user").modal('show');
      }
 function getdata(page)
   {
     var data;
     if(window.XMLHttpRequest)
         data=new XMLHttpRequest();
     else 
         alert('errorrrrrrrrrrrrr');
     data.onreadystatechange=function()
     {
         if(data.readyState==4&&data.status==200)
             {
                 show_content(data.responseText);
             }
     }
			data.open("get",page,true);
       data.send(); 
		  }
    
 
         
  

          
</script>
  
  
  
  

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