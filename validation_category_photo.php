<script>
   
   function  validatesearchcp()
   {
       var search1 = $("#txtAddress").val();
      
        var ret = true;
        
        if (!(search1)) 
    {
        $("#address_errorcp").show();
        $(".error_msg").fadeOut(4000);
        ret = false;
    }   
   var alfa = /^(?:\w+\s*)(?:\w+\s*,\s*){2,3}(?:\w+\s*)*$/;
    var val = search1.match(alfa);
    if (!(val) && (search1.length != "")) 
    {
        $("#address_errorclp").show();
        $("#address_errorcp").hide();
        $(".error_msg").fadeOut(4000);
      
            ret = false;
    }  
       return ret; 
    }
</script>