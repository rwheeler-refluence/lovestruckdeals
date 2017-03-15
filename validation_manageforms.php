<script>
    function validatemanageform1()
    {
      // debugger;
        var yourname = $("#getName").val();
      
        var emailf = $("#getTxtemailone").val();

        var selecteState = $("#state-list2 option:selected").val();
//        var selecteCity = $("#city-list2 option:selected").val();

        var ret = true;

        if (!(yourname))
        {
            $("#nameone1_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        var alfa = /^[a-zA-Z -]+$/;
        var val = yourname.match(alfa);
        if (!(val) && (yourname.length != ""))
        {
            $("#nameone1_error1").show();
            $("#nameone1_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        if (!(emailf))
        {
            $("#txtemailone1_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        //var cemail1 = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
        var emailf1 = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var EmailmatchArray = emailf.match(emailf1);
        if ((emailf) && !(EmailmatchArray))
        {
            $("#txtemailone1_error1").show();
            $("#txtemailone1_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        if (!(selecteState))
        {
            $("#regstate2_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
//        if (!(selecteCity))
//        {
//            $("#regcity2_error").show();
//            $(".error_msg").fadeOut(4000);
//            ret = false;
//        }

        return ret;
    }
    
    
    
    function validatemanageform2()
    {
      // debugger;
        var yourname = $("#nameone").val();
      
        var emailf = $("#txtemailone").val();

        var selecteState = $("#state-list option:selected").val();
//        var selecteCity = $("#city-list2 option:selected").val();

        var ret = true;

        if (!(yourname))
        {
            $("#nameone_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        var alfa = /^[a-zA-Z -]+$/;
        var val = yourname.match(alfa);
        if (!(val) && (yourname.length != ""))
        {
            $("#nameone_error1").show();
            $("#nameone_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        if (!(emailf))
        {
            $("#txtemailone_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        //var cemail1 = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
        var emailf1 = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var EmailmatchArray = emailf.match(emailf1);
        if ((emailf) && !(EmailmatchArray))
        {
            $("#txtemailone_error1").show();
            $("#txtemailone_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        if (!(selecteState))
        {
            $("#regstate_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
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
