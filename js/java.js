$(document).ready(function(){
	
	
	var error_username=false,
	    error_address=false
       
		
		
		
  $("#registbtn").click(function()
  {
       error_username=false;
	   error_address=false
       check_username();
	   check_address();
    
  if(error_username == false && error_address == false){
	   $(".form").hide();
	   alert("Your Registration Done Successfully !!!!! ");
	    $(".form").hide();
	    $("#question1").removeClass("hidden").css({zIndex:"2",marginTop:"20px"});
	  
    return true;
	
  }
  else{
	
    return false;
	
  }
 
  
 });
  
  
  $("#username").blur(function(){
      check_username();
  });
   
  $("#form_address").blur(function(){
      check_address();
  });
 
  function check_username()
  {
	  var pattern=new RegExp(/[0-9]/);
      if($("#username").val()==="")
      {
        $("#username_error_message").html("this required");
        $("#username_error_message").show();
		 $("#username").css("border","1px solid red");
		// $("#registbtn").preventDefault();
        error_username=true;
      }
	  else if($("#username").val().length < 8)
	  {
		  $("#username_error_message").html("User name at least 8 char");
          $("#username_error_message").show(); 
          $("#username").css("border","1px solid red");		  
	  }
	  
	  else if(pattern.test($("#username").val()))
	  {
		  $("#username_error_message").html("User name cann't start with number");
          $("#username_error_message").show();  
		  
	  }
    else
      {
      $("#username_error_message").eq(0).hide();
	  $("#username").css("border",".5px solid #a9a4a4");	
      }
	  
  }
  
  
  function check_address()
  {
	  if($("#form_address").val()==="")
      {
        $("#address_error_message").html("this required");
        $("#address_error_message").show();
		$("#form_address").css("border","1px solid red");
        error_address=true;
		//$("#registbtn").preventDefault();
      }
  else{
	  $("#address_error_message").hide();
	  $("#form_address").css("border","1px solid #a9a4a4");
      }
  
  };
  
  $("#registbtn").click(function(){
	  error_username=false;
	  error_address=false;
	  check_username();
	  check_address();
	  
  });
  
	
	/*$("#submit").click(function(){
	if($("input").eq(4).val==="" || $("input").eq(5).val==="" || $("input").eq(6).val==="" )
			{
				$("#submit").after("<span>this required</span>").css("color","red");
			}
	}*/
	
	
  
  //Questions
  
	/*$("#submit").click(function(){
		var name=$("#username").val();
		var question=$("#question1").val();
		var answer=$(".input").val();
		*/
	
	$.ajax({
		url:"",
		type:"POST",
		data:{"name":name,"question":question,"answer":answer},
		
		success:function(data){
		
	    
		}
	})
	
});
}); 








	