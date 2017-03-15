<script>
    function validatemanageform()        
    {
        var yourname = $("#name1").val();
        var emailf = $("#txtemail").val();
        var conatctno = $("#txtcontact").val();
        
        var ret = true;
        if (!(yourname)) 
    {
        
        $("#name1_error").show();
        $(".error_msg").fadeOut(4000);
        ret = false;
    }   
    var alfa = /^[a-zA-Z -]+$/;
    var val = yourname.match(alfa);
    if (!(val) && (yourname.length != "")) 
    {
        $("#name1_error1").show();
        $("#name1_error").hide();
        $(".error_msg").fadeOut(4000);
        ret = false;
    }  
    
    if (!(emailf)) 
         {
            $("#txtemail_error").show();
            $(".error_msg").fadeOut(4000);
            ret = false;
        }
        //var cemail1 = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
        var emailf1 =/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var EmailmatchArray = emailf.match(emailf1);
       if ( (emailf) && !(EmailmatchArray)) 
        {
            $("#txtemail_error1").show();
            $("#txtemail_error").hide();
            $(".error_msg").fadeOut(4000);
            ret = false;
        } 

        
        if (!(conatctno)) 
        {
            $("#txtcontact_error").show();
            $(".error_msg").fadeOut(4000);
            ret = false;
        }          
//            var mobile_no =/^[a-zA-Z][0-9a-zA-Z_!$@#^&]$/;
//            var phone_error1 = conatctno.match(mobile_no);
//            if (!(phone_error1) && (conatctno.length !="")) 
//            {
//                $("#txtcontact_error1").show();
//                $("#txtcontact_error").hide();
//                $(".error_msg").fadeOut(4000);
//                ret = false;
//                
//            }                 
        
        
                     
        return ret; 
     }    
</script>

<!--<script>
    function searchdeal()
    {
       
        var address = $("#address").val();
        var selectcategory = $("#basic1 option:selected").val();
        var ret = true;
        
        if (!(address)) 
        {
            alert ("Please Enter Location.");           
            ret = false;
        }  
        if (!(selectcategory)) 
        {
            alert('Please Select Category.');
            ret = false;
        }       
        return ret;
    }    
</script>-->