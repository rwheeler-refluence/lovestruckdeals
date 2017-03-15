<!--validation form registration.php  -->
<script>
    function login()
    {
        var email = $("#email").val();
        var password = $('#password').val();
        var ret = true;
        if (!(email))
        {
            $("#email_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        if (!(password))
        {
            $("#password_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        return ret;
    }
</script>

<script>
    function validateLogin()
    {


        var vemail = $("#email11").val();
        var vpassword = $("#password11").val();
        // var rememberme = document.getElementById("rememberme").checked;
        var ret = true;
        if (!(vemail))
        {
            $("#email_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        if (!(document.getElementById("rememberme").checked))
        {
            $("#chekbox").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        var vemail1 = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var EmailmatchArray = vemail.match(vemail1);
        if ((vemail) && !(EmailmatchArray))
        {
            $("#email_error1").show();
            $("#email_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        if (!(vpassword))
        {
            $("#pass_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        var pass2 = /^[a-zA-Z][0-9a-zA-Z_!$@#^&]{6,12}$/;
        var passmatchArray = vpassword.match(pass2);

        if ((vpassword) && !(passmatchArray))
        {
            $("#pass_error1").show();
            $("#pass_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }/* 
         if (vrememberme.checked == 1)
         {
         ret = false;
         //$("#rememberme_error").show();
         // ret = false;
         //alert("checked") ;
         }
         else
         {
         $("#rememberme_error").show();
         $(".error_msg").fadeOut(7000);
         ret = false;
         }*/
        if (!this.form.checkbox.checked)
        {
            alert('You must agree to the terms first.');
            return false;
        }
        return ret;
    }
</script>

<!--validation form registration1.php  -->

<script>
    function validateInformation()
    {
        var vemail = $("#email11").val();
//        var vpassword = $("#password11").val();
        var fname = $("#firstname").val();
        var lname = $("#lastname").val();
        var cname = $("#companyname").val();
        var selectvendortype = $("#vendortype option:selected").val();
        var cemail = $("#cemail3").val();
        var cphone1 = $("#companyTelephone1").val();
        var cphone2 = $("#companyTelephone2").val();
        var cphone3 = $("#companyTelephone3").val();
        var txtURL = $("#cwebsite").val();
        var cpostal = $("#cpostalcode").val();
        var cadd1 = $("#caddress1").val();
        var cadd2 = $("#caddress2").val();
        var ser = $("#txtAddress").val();
        var state1 = $("#statelist1 option:selected").val();
        var city1 = $("#city-list1 option:selected").val();
        var aboutus = $("#aboutus option:selected").val();
       // var hiddenRecaptcha = $(".recaptcha").val();

        var ret = true;

        if (!(vemail))
        {
            $("#email_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        var vemail1 = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-zA-Z]{2,6}(?:\.[a-zA-Z]{2})?)$/i;
        var EmailmatchArray = vemail.match(vemail1);
        if ((vemail) && !(EmailmatchArray))
        {
            $("#email_error1").show();
            $("#email_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

//        if (!(vpassword))
//        {
//            $("#pass_error").show();
//            $(".error_msg").fadeOut(7000);
//            ret = false;
//        }
//        var pass2 = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{6,50}$/;
//        var passmatchArray = vpassword.match(pass2);
//
//        if ((vpassword) && !(passmatchArray))
//        {
//            $("#pass_error1").show();
//            $("#pass_error").hide();
//            $(".error_msg").fadeOut(7000);
//            ret = false;
//        }

        if (!(fname))
        {

            $("#fname_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
var captcha_response = grecaptcha.getResponse();
if(captcha_response.length == 0)
{
      $("#hiddenRecaptcha_error").show();
     $(".error_msg").fadeOut(7000);
       ret = false;
        }
  
           
        if (!(lname))
        {
            $("#lname_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        if (!(cname))
        {
            $("#cname_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        if (!(document.getElementById("rememberme").checked))
        {
            $("#chekbox").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
//        var alfa = /^[a-zA-Z]+$/;
//        var val = cname.match(alfa);
//        if (!(val) && (cname.length != "")) 
//        {
//            $("#cname_error1").show();
//            $("#cname_error").hide();
//            $(".error_msg").fadeOut(4000);
//            ret = false;
//        }

        if (!(selectvendortype))
        {
            $("#vendortype_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }


        if (!(cemail))
        {
            $("#cemail_error").show();
            $(".error_msg").fadeOut(4000);
            ret = false;
        }
        var vemail1 = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z][A-Z]{2,6}(?:\.[a-z][A-Z]{2})?)$/i;
        var EmailmatchArray = cemail.match(vemail1);
        if ((cemail) && !(EmailmatchArray))
        {
            $("#cemail_error1").show();
            $("#cemail_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
//         if (!(cphone1)) 
//        {
//            $("#cphone1_error").show();
//            $(".error_msg").fadeOut(7000);
//            ret = false;
//        }          
        var mobile_no = /^[+0-9][0-9+-_ ]{2,2}$/;
        var phone_error1 = cphone1.match(mobile_no);
        if (!(phone_error1) && (cphone1.length != ""))
        {
            $("#cphone1_error1").show();
//                $("#cphone1_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;

        }
//        
//         if (!(cphone2)) 
//        {
//            $("#cphone2_error").show();
//            $(".error_msg").fadeOut(7000);
//            ret = false;
//        }
        var mobile_no = /^[+0-9][0-9+-_ ]{2,2}$/;
        var phone_error1 = cphone2.match(mobile_no);
        if (!(phone_error1) && (cphone2.length != ""))
        {
            $("#cphone2_error1").show();
//            $("#cphone2_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;

        }
//         if (!(cphone3)) 
//        {
//            $("#cphone3_error").show();
//            $(".error_msg").fadeOut(7000);
//            ret = false;
//        }
        var mobile_no = /^[+0-9][0-9+-_ ]{3,3}$/;
        var phone_error1 = cphone3.match(mobile_no);
        if (!(phone_error1) && (cphone3.length != ""))
        {
            $("#cphone3_error1").show();
//            $("#cphone3_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;

        }

//        if (!(txtURL)) {
//            $("#cwebsite_error").show();
//            $(".error_msg").fadeOut(7000);
//            ret= false;
//
//        }
        //var txtURL1 = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
        //var txtURL1 = /^(http(?:s)?\:\/\/[a-zA-Z0-9\-]+(?:\.[a-zA-Z0-9\-]+)*\.[a-zA-Z]{2,6}(?:\/?|(?:\/[\w\-]+)*)(?:\/?|\/\w+\.[a-zA-Z]{2,4}(?:\?[\w]+\=[\w\-]+)?)?(?:\&[\w]+\=[\w\-]+)*)$/;
        var txtURL1 = /((?:https?\:\/\/|www\.)(?:[-a-zA-Z0-9]+\.)*[-a-zA-Z0-9]+.*)/i;
        var URLmatchArray = txtURL.match(txtURL1);


        if ((txtURL.length != "") && !(URLmatchArray)) {
            $("#cwebsite_error1").show();
//            $("#cwebsite_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        if (!(cpostal))
        {
            $("#cpostalcode_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        var txtPincode1 = /^[\d]{5}$/;
        var proofmatchArray = cpostal.match(txtPincode1);
        if (!(proofmatchArray))
        {
            $("#cpostalcode_error1").show();
            $("#cpostalcode_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }


        if (!(cadd1))
        {
            $("#cadd1_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        var add11 = /^[A-Za-z0-9\-\\,. ]+$/;
        var addmatchArray = cadd1.match(add11);
        if (!(addmatchArray))
        {
            $("#cadd1_error1").show();
            $("#cadd1_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }




        if (!(state1))
        {

            $("#regstate1_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        if (!(city1))
        {
            $("#regcity1_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        if (!(aboutus))
        {
            $("#aboutus_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }


        return ret;
    }
</script>


<script>
    function validateBussReq()
    {
        alert("Rahul");
        var checkfilter = $("#checkfilter type:checkbox").val();
        //var minprice=$("#minprice").val();

        var ret = true;

        if (!(checkfilter))
        {
            $("#checkbox_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        /*
         if (!(minprice)) 
         {        
         $("#minprice_error").show();
         $(".error_msg").fadeOut(4000);
         ret = false;
         }   
         var alfa = /^[a-zA-Z]+$/;
         var val = minprice.match(alfa);
         if (!(val) && (minprice.length != "")) 
         {
         $("#minprice_error1").show();
         $("#minprice_error").hide();
         $(".error_msg").fadeOut(4000);
         ret = false;
         }
         */


        return ret;
    }
</script>
<!-- validation for Contact Us Page -->
<script>
    function validateContact()
    {
        var contactname = $("#name").val();
        var contactemail = $("#txtemail").val();
        var contacttext = $("#message").val();
        var ret = true;

        if (!(contactname))
        {
            $("#contactname_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        var alfa = /^[a-zA-Z_ -]+$/;
        var val = contactname.match(alfa);
        if (!(val) && (contactname.length != ""))
        {
            $("#contactname_error1").show();
            $("#contactname_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        if (!(contactemail))
        {
            $("#txtemail_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
        var contactemail1 = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var EmailmatchArray = contactemail.match(contactemail1);
        if ((contactemail) && !(EmailmatchArray))
        {
            $("#txtemail_error1").show();
            $("#txtemail_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

        if (!(contacttext))
        {
            $("#textdesc_error").show();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }
//        var alfa = /^[a-zA-Z0-9_ -,]{10,100}$/;
//        var val = contacttext.match(alfa);
//        if (!(val) && (contacttext.length != "")) 
//        {
//            $("#textdesc_error1").show();
//            $("#textdesc_error").hide();
//            $(".error_msg").fadeOut(4000);
//            ret = false;
//        }   

        return ret;
    }
</script>

<script>
    function validateusersocialmedia()
    {

        var instragram = $("#Instagram").val();
        var facebook = $("#Facebook").val();
        var twitter = $("#Twitter").val();
        var pinterest = $("#Pinterest").val();
//        var vimeoUrl = $("#txturl").val();
//        var youtueUrl = $("#txturl1").val();
//        var businessdisc =$("busineedesc").val();

        var ret = true;

//         if (!(instragram)) 
//         {
//            $("#instagram_error").show();
//            $(".error_msg").fadeOut(4000);
//            ret= false;
//                
//        }
        var txtURLin = /^(?:www\.)?instagram\.com\/(?:(?:\w\.)*#!\/)?(?:pages\/)?(?:[\w\-\.]*\/)*([\w\-\.]*)/;

        var URLmatchArray = instragram.match(txtURLin);


        if ((instragram.length != "") && !(URLmatchArray))
        {
            $("#instagram_error1").show();
//            $("#instagram_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }


//        if (!(facebook)) 
//         {
//            $("#facebook_error").show();
//            $(".error_msg").fadeOut(4000);
//            ret= false;
//                
//        }
        var txtURLfa = /^(?:www\.)?facebook\.com\/(?:(?:\w\.)*#!\/)?(?:pages\/)?(?:[\w\-\.]*\/)*([\w\-\.]*)/;

        var URLmatchArray = facebook.match(txtURLfa);


        if ((facebook.length != "") && !(URLmatchArray)) {
            $("#facebook_error1").show();
//            $("#facebook_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

//         if (!(twitter)) 
//         {
//            $("#twitter_error").show();
//            $(".error_msg").fadeOut(4000);
//            ret= false;
//                
//        }
        var txtURLtwi = /^(?:www\.)?twitter\.com\/(?:(?:\w\.)*#!\/)?(?:pages\/)?(?:[\w\-\.]*\/)*([\w\-\.]*)/;

        var URLmatchArray = twitter.match(txtURLtwi);


        if ((twitter.length != "") && !(URLmatchArray))
        {
            $("#twitter_error1").show();
//            $("#twitter_error").hide();
            $(".error_msg").fadeOut(7000);
            ret = false;
        }

//     if (!(pinterest)) 
//        {
//            $("#pinterest_error1").show();
//            $(".error_msg").fadeOut(4000);
//            ret= false;
//                
//       }        
        var txtURLpi = /^(?:www\.)?pinterest\.com\/(?:(?:\w\.)*#!\/)?(?:pages\/)?(?:[\w\-\.]*\/)*([\w\-\.]*)/;
//           /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/
        var URLmatchArray = pinterest.match(txtURLpi);

        if ((pinterest.length != "") && !(URLmatchArray))
        {
            $("#pinterest_error1").show();
//            $("#pinterest_error").hide();
            $(".error_msg").fadeOut(7000);


            ret = false;
        }
//         if (!(businessdisc)) 
//        {
//            $("#busineedesc").show();
//            $(".error_msg").fadeOut(4000);
//            ret = false;
//        } 
        // validations of youtube and vimeo 
//        var txtURLins = /https?:\/\/(?:www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/;
//        var URLmatchArray = vimeoUrl.match(txtURLins);
//        if ((vimeoUrl.length != "") && !(URLmatchArray))
//        {
//            $("#urlvimeo_error1").show();
//            $(".error_msg").fadeOut(7000);
//            ret = false;
//        }
//        var txtURLins = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
//        var URLmatchArray = youtueUrl.match(txtURLins);
//        if ((youtueUrl.length != "") && !(URLmatchArray))
//        {
//            $("#urlyoutube_error1").show();
//            $(".error_msg").fadeOut(7000);
//            ret = false;
//        }


        return ret;
    }
</script>

