/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 

$('#form').on('submit', function(e){
    e.preventDefault();
    
    var google_recaptcha = '';
    google_recaptcha = grecaptcha.getResponse();
    $.ajax({
        type: "POST",
        url: js_base_url+ "form/save",
        //data: $(this).serialize(),
        data: {recaptcha:google_recaptcha },
        dataType: "json",
        success: function(data){
          
          if($.isEmptyObject(data.error)){
              
	                $(".print-error-msg").css('display','none');
	                $(".print-success-msg").css('display','block');                                
                        $(".print-success-msg").html(data.success);
                        setTimeout(function(){                             
                            $(".print-success-msg").css('display','none');
                            $(".print-success-msg").html("");                            
                            $("#form").trigger("reset"); 
                            window.location.href = js_base_url+"form";
                            
                        }, 2000);
	                	
	            }else{                        
                        $(".print-success-msg").css('display','none');
			$(".print-error-msg").css('display','block'); 
	                $(".print-error-msg").html(data.error);
	            }
        }
        
      });
    
    
});