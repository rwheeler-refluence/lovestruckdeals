
<script>
    
function validateForm()
{
    var bname = $("#email").val();
    var ret = false;
    alert(validateBuisnessForm());
    if (!(bname)) 
    {
        $("#email_error").show();
        $(".error_msg").fadeOut(4000);
        ret = false;
    }
    else
    {
        ret = true;
    }
    var alfa = /^[a-zA-Z]+$/;
    var val = name.match(alfa);
    if (!(val) && (name.length != "")) 
    {
        $("#email_error1").show();
        $("#email_error").hide();
        $(".error_msg").fadeOut(4000);
        ret = false;
    }
    else
    {
        ret = true;
    }
}
function validateBuisnessForm()
{
    var bname = $("#bname").val();
    var ret = false;
    alert(validateBuisnessForm());
    if (!(bname)) 
    {
        $("#bname_error").show();
        $(".error_msg").fadeOut(4000);
        ret = false;
    }
    else
    {
        ret = true;
    }
    var alfa = /^[a-zA-Z]+$/;
    var val = name.match(alfa);
    if (!(val) && (name.length != "")) 
    {
        $("#bname_error1").show();
        $("#bname_error").hide();
        $(".error_msg").fadeOut(4000);
        ret = false;
    }
    else
    {
        ret = true;
    }
    return ret;
}
</script>