$(document).ready(function(){

$("#income_table").css('display','block');


$("#income_icon").on("click",function(){
	var num=$("#num_incomes").val();
	$("#income_table").append("<tr> <td></td> <td><input type='text' name ='income"+num+"'></td> <td><input type='text' name ='num_income"+num+"'></td> </tr>");
});



// Income Table In Show Page
	$("#income2_table").css('display','block');



$("#income2_icon").on("click",function(){
	
	$("#income2_table").append("<tr> <td></td> <td><input type='text' name ='income"+num+"'></td> <td><input type='text' name ='num_income"+num+"'></td> </tr>");
});


// Table of Edit Income in admin_show
$("#edit_income_table").css('display','block');

 /*

$("#edit_income_icon").on("click",function(){
              
	var num=$("#num_incomes2").val();
	$("#edit_income_table").append("<tr> <td></td> <td><input type='text' name ='income"+num+"'></td> <td><input type='text' name ='num_income"+num+"'></td> </tr>");
});


*/

// Table of Edit Income in show page
$("#edit_income2_table").css('display','block');



$("#edit_income2_icon").on("click",function(){
	
	$("#edit_income2_table").append("<tr> <td></td> <td><input type='text'></td> <td><input type='text'></td> </tr>");
});


});