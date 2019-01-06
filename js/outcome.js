$(document).ready(function(){

$("#outcome_table").css('display','block');



$("#outcome_icon").on("click",function(){
	var num=$("#num_outcomes").val();
$("#outcome_table").append("<tr> <td></td><td><input type='text'name='outcome"+num+"'></td><td><input type='text' name ='num_outcome"+num+"'></td></tr>");
});



// OutCome Table In Show Page
    $("#outcome2_table").css('display','block');



$("#outcome2_icon").on("click",function(){
	
	$("#outcome2_table").append("<tr> <td></td> <td><input type='text'></td> <td><input type='text'></td> </tr>");
});



// OutCome Table In admin_Show Page
    $("#edit_outcome_table").css('display','block');
/*


$("#edit_outcome_icon").on("click",function(){
	var num=$("#num_outcomes2").val();
	$("#edit_outcome_table").append("<tr> <td></td><td><input type='text' name='outcome"+num+"'></td> <td><input type='text' name='num_outcome"+num+"'></td> </tr>");
});
*/



// Edit OutCome Table In Show Page
    $("#edit_outcome2_table").css('display','block');



$("#edit_outcome2_icon").on("click",function(){
	
	$("#edit_outcome2_table").append("<tr> <td></td> <td><input type='text'></td> <td><input type='text'></td> </tr>");
});

});