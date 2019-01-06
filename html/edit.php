<?php
  include_once('../database/database.php');
  
	  $row=$db->getRow('select * from الحاله where الرقم_القومى ="'.$_GET['id'].'" and  اسم_الجمعيه_التى_اضافه_الحاله ="'.$_GET['org'].'"',array());
      
      
      $chs=$db->getRows('select * from الابناء where الرقم_القومى_للاب ="'.$row['الرقم_القومى'].'"',array());
      
      
      $incs=$db->getRows('select * from الدخل  Where الرقم_القومى ="'.$_GET['id'].'" ',array());
      
      $outs=$db->getRows('select * from المصروفات  Where الرقم_القومى ="'.$_GET['id'].'" ',array());
      $incomes_num=1;
      $incomes='<tr><td class="text-center"><i id="edit_income_icon"  onclick="income_plus2()" class="fas fa-plus-circle"></i></td>';
      foreach($incs as $inc)
      {
          if($incomes_num>1)
          {
              $incomes=$incomes.'<tr><td></td>';
          }
          $incomes=$incomes.'<td class="text-center"><input type="text"  name="income'.$incomes_num.'" value="'.$inc['المصدر'].'"></td>
            <td class="text-center"><input type="text"  name="num_income'.$incomes_num.'" value="'.$inc['المبلغ'].'"></td></tr>';
          $incomes_num=$incomes_num+1;
      }
      
      $outcomes_num=1;
      $outcomes='<tr><td class="text-center"><i id="edit_outcome_icon" onclick="outcome_plus2()" class="fas fa-plus-circle"></i></td>';
      foreach($outs as $out)
      {
           if($outcomes_num>1)
          {
              $outcomes=$outcomes.'<tr><td></td>';
          }
          $outcomes=$outcomes.'<td class="text-center"><input type="text"  name="outcome'.$outcomes_num.'" value="'.$out['النوع'].'"></td>
            <td class="text-center"><input type="text" name="num_outcome'.$outcomes_num.'" value="'.$out['المبلغ'].'"></td>
        </tr>';
           $outcomes_num=$outcomes_num+1;
      }
 $chil='';

    $chil=$chil."<table border=1 id='child_table2' class='table table-bordered table-striped '><thead><tr><th class='text-center'></th><th class='text-center'>الاسم</th><th class='text-center'>الرقم القومي</th><th class='text-center'>النوع</th><th class='text-center'>السن</th><th class='text-center'>الدخل</th></tr></thead><tbody id='txt'>";

     
      $t=0;
      foreach($chs as $ch)
      {
          $x='';$y='';
          if($ch['النوع']=='ذكر')
          {
              $x='checked';$y='';
          }
          else if($ch['النوع']=='انثي')
          {
              $x='';$y='checked';
          }
          $chil=$chil.'<tr><td class="text-center">'.($t+1).'</td><td class="text-center"><input type="text" name="username'.($t+1).'" value="'.$ch['الاسم'].'" ></td><td class="text-center"><input type="text" name="national'.($t+1).'" value="'.$ch['الرقم_القومى_للابن'].'" ></td><td class="text-center"><input type="radio" name="nam'.($t+1).'" value="ذكر" '.$x.'><span  style="display:inline-blockmargin-top:30px;color:black;">ذكر </span><br><input type="radio" name="nam'.($t+1).'" value="انثي" '.$y.'  style="margin-right: -15px;"><span style="display:inline-block;margin-top:5px; color:black; ">انثي</span></td><td class="text-center"><input type="text" name="age'.($t+1).'" value="'.$ch['السن'].'" ></td><td class="text-center"><input type="text" name="income_ch'.($t+1).'" value="'.$ch['دخله'].'" ></td></tr>';
          $t=$t+1;
      }
 $chil=$chil."</tbody></table>";
      
      echo '  <div class="modal-content">
      <div class="modal-header">
      <button class="close" data-dismiss="modal">&times;</button>
      <h3 class="modal-title text-center"> تعديل الحالة</h3>
      </div>
    <div class="modal-body">

        <form class="modal-body" id="form_add" action="update.php" method="post" role="form" dir=rtl>

        <div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" id="user2_name" name="username" value="'.$row['الاسم'].'" class="classname" dir="auto">
            <span class="text-center" id="username2_error_message"></span>
         </div>
		 <div class="col-md-3 col-xs-2">
            <label> اسم الحالة<label></div>
        </div>
        </div>
              <div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="number" id="nat2_num" name="nat_num" value="'.$row['الرقم_القومى'].'" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>الرقم القومي </label></div>
        </div>
        </div>

		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="number" id="age2" name="age" value="'.$row['السن'].'" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>السن </label></div>
        </div>
        </div>

		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="qualified2" name="qualified" value="'.$row['المؤهل'].'" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>المؤهل </label></div>
        </div>
        </div>
		 
		 <div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="tel" id="phone2" name="phone" value="'.$row['رقم_الهاتف'].'" class="classephone" dir="auto">
             <span class="text-center" id="phone2_error_message"></span>
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>رقم التليفون </label></div>
        </div>
        </div>
		
        <div class="form-group">
        <div class="row">
         <div class="col-md-8 col-xs-10">
           <input type="text" name="address" value="'.$row['العنوان'].'" dir="auto"></div>
		   <div class="col-md-3 col-xs-2">
         <label>العنوان</label></div><br>
         </div>
        </div>
       

        <div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" id="status_name2" name="status" value="'.$row['الحاله_الاجتماعيه'].'" dir="auto">
         </div>
		 <div class="col-md-3 col-xs-2">
            <label> الحالة الاجتماعية<label></div>
        </div>
        </div>

		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="work2" name="work" value="'.$row['العمل'].'" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>العمل</label></div>
        </div>
        </div>
		

        <div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" value="'.$row['عدد_الابناء'].'" onchange="son_change()"  id="child_edit" name="familyN"  dir="auto">
         <input type="hidden" id="old_num_child_edit" value="' .$row['عدد_الابناء'].'" name="num_incomes" dir="auto">
         </div>
		 <div class="col-md-3 col-xs-2">
            <label>عدد الابناء<label></div>
        </div>
        </div>
		
		<div id="childeren_edit">'.$chil.'</div>
		
		
		
		<div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" id="edit_income" name="income" value="'.$row['اجمالى_الدخل'].'" dir="auto">
         </div>
		 <div class="col-md-3 col-xs-2">
            <label>اجمالي الدخل<label></div>
        </div>
        </div>
		
		<!-- Start Tabel Of edit Income -->
	<div class="container">
	<table border="1px" id="edit_income_table" class="table table-bordered table-striped ">
	<thead>
	   <tr>
		  <th class="text-center"><input type="hidden" id="num_incomes2" value="' .($incomes_num-1).'" name="num_incomes" dir="auto"></th>
	      <th class="text-center">مصدر الدخل</th>
		  <th class="text-center">المبلغ</th>
	   </tr>
	   </thead>
	   <tbody id="txt">
            '.$incomes.'
	  </tbody>
    </table>
  </div>
		
		
		
		
		<div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" name="outcome" id="edit_outcome" value="'.$row['اجمالى_المصروفات'].'" dir="auto">
         </div>
		 <div class="col-md-3 col-xs-2">
            <label> اجمالي المصروفات<label></div>
        </div>
        </div>
		
		 <!-- Start Tabel Of edit OutCome -->
	<div class="container">
	<table border="1px" id="edit_outcome_table" class="table table-bordered table-striped ">
	<thead>
	   <tr>
		  <th class="text-center"><input type="hidden" id="num_outcomes2" value="' .($outcomes_num-1).'" name="num_outcomes" dir="auto"></th>
	      <th class="text-center">نوع المصروف</th>
		  <th class="text-center">المبلغ</th>
	   </tr>
	   </thead>
	   <tbody id="txt2">

        '.$outcomes.'
	  </tbody>
    </table>
  </div>

		
		
		
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="date2" id="date2" name="date" value="'.$row['تاريخ_البحث'].'" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>تاريخ البحث </label></div>
        </div>
        </div>
	
		
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="kind2" name="kind" value="'.$row['نوع_البحث'].'" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>نوع البحث </label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="researcher2" name="researcher" value="'.$row['القائم_بالبحث'].'" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>القائم بالبحث</label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="guide2" name="guide" value="'.$row['دليل_الحاله'].'" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>دليل الحالة</label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="Quartermaster2" name="Quartermaster" value="'.$row['التموين'].'" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>التموين </label></div>
        </div>
        </div>
		
		
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="building2" name="building" value="'.$row['السكن'].'" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>السكن</label></div>
        </div>
        </div>
		
		<div class="form-group">
         <div class="row">
           <div class="col-md-8 col-xs-10">
           <input type="text" id="area2" name="area" value="'.$row['مساحه_السكن'].'" dir="auto">
          </div>
		  <div class="col-md-3 col-xs-2">
           <label>مساحة السكن </label></div>
        </div>
        </div>
		
		 <div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" id="help_kind2" name="help_kind" value="'.$row['نوع_المساعده_المطلوبه'].'" dir="auto">
         </div>
		 <div class="col-md-3 col-xs-2">
            <label> نوع المساعدة المطلوبة<label></div>
        </div>
        </div>
		
		
		
		<div class="form-group">
          <div class="row">
          <div class="col-md-8 col-xs-10">
           <input type="text" id="period2" name="period" value="'.$row['فتره_المساعده'].'" dir="auto">
         </div>
		 <div class="col-md-3 col-xs-2">
            <label> فترة الحالة<label></div>
        </div>
        </div>
        <div class="modal-footer"></div>
      <div class="row">
    	<div class="col-lg-12 col-sm-12 col-xs-12 center-block butt">
        
    	
        
    	<button class="btn btn-danger btn1 text-center" id="btn4" data-dismiss="modal">الغاء</button>
        
        <button type="submit" onclick="this.form.submit()" name="add_hala" value="add" class="btn btn-primary btn1 text-center" id="addbtn" data-dismiss="modal">حفظ</button>
        
    </div>
  </div>
    </form>
</div>
</div>';
  
  ?>