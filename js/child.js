$(document).ready(function(){
 
 /* start Childeren Table in Admin Show */
$("#childeren_number , #child_edit").blur();
function check_sons(){
		
 var num=$("#childeren_number , #child_edit").val();
 var i;
if(num > 0)
{
 
 $("#childeren , #childeren_edit").append("<table border=1 id='child_table' class='table table-bordered table-striped '><thead><tr><th class='text-center'></th><th class='text-center'>الاسم</th><th class='text-center'>الرقم القومي</th><th class='text-center'>النوع</th><th class='text-center'>السن</th><th class='text-center'>الدخل</th></tr></thead><tbody id='txt'>");
  
 for(i=1;i<=num;i++)
 {
	 var nam="gender"+i;
  $("#child_table").append("<tr><td class='text-center'>" + i +"</td><td class='text-center'><input type='text' name='username" + i +"' ></td><td class='text-center'><input type='text' name='national"+i+"'></td><td class='text-center'><input type='radio' name='nam"+i+"' value='ذكر'><span style='display:inline-block;margin-top:30px;color:black;'>ذكر </span><br><input type='radio' name='nam"+ i +"' value='انثي'style='margin-right: -15px;'><span style='display:inline-block;margin-top:5px;color:black;'>انثي</span></td><td class='text-center'><input type='text' name='age"+i+"'></td><td class='text-center'><input type='text' name='income_ch"+i+"'></td></tr>");
 }
  $("#child_table").append("</tbody></table>");
 }
}

$("#childeren_number , #child_edit").blur(function(){
	  $("#child_table").remove();
      check_sons();
    });
	
	
	
	
/* Start Table Childeren in info page */
	
 var num2=$("#dis_input").val();
 var j;
if(num2 > 0)
{
 
 $("#childeren2").append("<table border=1 id='child2_table' class='table table-bordered table-striped '><thead><tr><th class='text-center'></th><th class='text-center'>الاسم</th><th class='text-center'>الرقم القومي</th><th class='text-center'>النوع</th><th class='text-center'>السن</th><th class='text-center'>الدخل</th></tr></thead><tbody id='txt'>");
   
 for(j=1;j<=num2;j++)
 {
  $("#child2_table").append("<tr><td class='text-center'>" + j + "</td><td class='text-center'></td><td class='text-center'></td><td class='text-center'></td><td class='text-center'></td><td class='text-center'></td></tr>");
 }
  $("#child2_table").append("</tbody></table>");
}



    
/*  Start Edit Sons */

 
$("#child_edit").blur();
function check_sons2(){
		
 var num=$("#child_edit").val();
 var i;
if(num > 0)
{
 
 $("#childeren_edit").append("<table border=1 id='child_table3' class='table table-bordered table-striped '><thead><tr><th class='text-center'></th><th class='text-center'>الاسم</th><th class='text-center'>الرقم القومي</th><th class='text-center'>النوع</th><th class='text-center'>السن</th><th class='text-center'>الدخل</th></tr></thead><tbody id='txt'>");
  
 for(i=1;i<=num;i++)
 {
	 var nam="gender"+i;
  $("#child_table3").append("<tr><td class='text-center'>" + i +"</td><td class='text-center'><input type='text' name='username" + i +"' ></td><td class='text-center'><input type='text' name='national" + i +"'></td><td class='text-center'><input type='radio' name=nam"+i+" value='ذكر'><span style='display:inline-blockmargin-top:30px;color:black;'>ذكر </span><br><input type='radio' name=nam"+ i +" value='انثي'style='margin-right: -15px;'><span style='display:inline-block;margin-top:5px;color:black;'>انثي</span></td><td class='text-center'><input type='text' name='age" + i +"'></td><td class='text-center'><input type='text' name='income_ch" + i +"'></td></tr>");
 }
  $("#child_table3").append("</tbody></table>");
 }
}

$("#childeren_number , #child_edit").blur(function(){
	  $("#child_table3").remove();
      check_sons2();
    });
	
	
	

	
	
	
});