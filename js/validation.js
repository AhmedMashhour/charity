$(document).ready(function (){


var error_username=false,
    error_phone=false;

    $("#addbtn").click(function()
    {
         error_username=false;
          error_phone=false;

      check_username();
      check_phone();
    if(error_username == false &&  error_phone == false )
    {
       return true;
    }
    else{
      return false;
    }

   });

    $("#user_name").blur(function(){
      check_username();
    });
    $("#phone").blur(function(){
      check_phone();
    });

    function check_username()
    {
  	  var pattern=new RegExp(/[0-9]/);
     if($("#user_name").val()==="")
        {
          $("#username_error_message").html("يجب ادخال الاسم");  // @lang('messages.message_error')
          $("#username_error_message").css("display","inline-block");
          $("#user_name").css('borderRadius','2px');
          error_username=true;
        }
  	   else if($("#user_name").val().length < 4)
  	  {
  		  $("#username_error_message").html('الاسم يجب الا يقل عن 4 حروف ولا يزيد عن 30 حرف');   
            $("#username_error_message").css("display","inline-block");
            $("#user_name").css('borderRadius','2px');
  	  }

		else if($("#user_name").val().length > 30)
	  {
		  $("#username_error_message").html('الاسم يجب الا يقل عن 4 حروف ولا يزيد عن 30 حرف');      
        $("#username_error_message").css("display","inline-block");
          $("#user_name").css("borderRadius","4px");
	  }


  	  else if(pattern.test($("#user_name").val()))
  	  {
  		  $("#username_error_message").html("الاسم يجب الا يحتوي علي ارقام");    
            $("#username_error_message").css("display","inline-block");
  	  }
      else
        {
        $("#username_error_message").eq(0).hide();
        }

    }

    function check_phone()
    {
      var pattern=new RegExp(/[^0-9]/);

      if($("#phone").val().length > 11)
      {
         $("#phone_error_message").html('رقم التليفون لايزيد عن 11 رقم');   
         $("#phone_error_message").css("display","inline-block");
      }
     else if(pattern.test($("#phone").val()))
      {
         $("#phone_error_message").html('رقم تليفون غير صحيح');   
         $("#phone_error_message").css("display","inline-block");
      }

      else{
         $("#phone_error_message").hide();
      }

    }

    //Navbar
     $(".navbar ul li a").click(function(event){    
    $(this).addClass('active').parent().siblings().find('a').removeClass('active');
});












});
    
	
	
	
	