<?php
include './header.php';
include './validationuser.php';
include './config.php';
//$passkey = $_GET['passkey'];
//$sql1 = "SELECT * FROM vendor_details where isdel=1 AND confirm_code='" . $passkey . "'";

//$addresult1 = mysqli_query($mysqli, $sql1) or die(mysqli_error());
//$row1 = mysqli_fetch_array($addresult1);
?>
<SCRIPT type="text/javascript">
    function getMideoInfo(val) {
        if (val == 'Other')
        {
            $.ajax({
                type: "POST",
                url: "findfeedBack",
                success: function (data) {

                    $("#filterValue").html(data);
                    $("#filterValue").show();

                }
            });
        } else
        {
            $("#filterValue").hide();
        }
    }
    function getCity(val)
    {
        $(".loader").show();
        /*$('#city-list1').removeAttr("disabled");*/
        $.ajax({
            type: "POST",
            url: "get_city1",
            data: 'state_id=' + val,
            success: function (data) {
                $(".loader").hide();
                $("#city-list1").html(data);
                //alert($("#city-list").html(data));
            }
        });
    }
    function mask(e, f) {
        var len = f.value.length;
        var key = whichKey(e);
        if (key > 47 && key < 58)
        {
            if (len == 3)
                f.value = f.value
            else if (len == 7)
                f.value = f.value + '-'
            else
                f.value = f.value;
        }
        else {
            f.value = f.value.replace(/[^0-9-]/, '')
            f.value = f.value.replace('--', '-')
        }
    }
    function whichKey(e) {
        var code;
        if (!e)
            var e = window.event;
        if (e.keyCode)
            code = e.keyCode;
        else if (e.which)
            code = e.which;
        return code
    }
    function onlyNos(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            }
            else if (e) {
                var charCode = e.which;
            }
            else {
                return true;
            }
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        catch (err) {
            alert(err.Description);
        }
    }
</SCRIPT>
<script src="https://www.google.com/recaptcha/api.js"></script>
<div class="clearfix"></div>
<div class="line"></div>     
<div class="steps mt30">
    <div class="container">
        <ul>
            <li class="step-one active"><a href="#"><span>1</span>Step 1</a></li>
            <li class="step-one "><a href="#"><span>2</span>Step 2</a></li>
            <li class="step-one"><a href="#"><span>3</span>Step 3</a></li>
            <li class="step-one "><a href=""><span>4</span>Step 4</a></li>

            
        </ul>
        <div class="col-md-8 col-xs-12 register reg_Details pdzero mt30">
            <form class="mt20"  name="regisform2" onsubmit="return validateInformation()" id="informationForm" method="post"  action="regins1" >


                <div class="regdetails mt10">                                   
                    <h4>Your Personal Information</h4>                                                
                    <div class="row">
                        <div class="col-sm-6 pdzero">
                            <input type="hidden" name="complete_status" value="1" />
                            <input type="text" placeholder="*First Name" name="firstname"  id="firstname" value="">
<!--                            <div id="fname_error" style="display:none"class="error_msg" ><font color="red"> Please enter your first name.</font></div>
                            <div id="fname_error1" style="display:none"class="error_msg" ><font color="red"> Please enter a valid first name.</font></div>-->
                        </div>
                        <div class="col-sm-6 pdzero">
                            <input type="text" placeholder="*Last Name" name="lastname" id="lastname" value="">
<!--                            <div id="lname_error" style="display:none"class="error_msg" ><font color="red"> Please enter your last name.</font></div>
                            <div id="lname_error1" style="display:none"class="error_msg" ><font color="red"> Please enter a valid last name.</font></div>-->
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-6 pdzero">
                            <input placeholder="*Enter Email ID" class="form-control" name="email" id="email11">
<!--                            <div id="email_error" style="display:none" class="error_msg">Please enter  your email ID.</div>
                            <div id="email_error1" style="display:none" class="error_msg">Please enter a valid your email ID.</div>-->
                        </div>
                        <div class="col-sm-6 pdzero">
                            <input id="password11" class="form-control" type="password" placeholder="*Password" value="" name="password" required>
<!--                            <label><font color = "#66cccc">Ex : abc@123 (minimum 7 character)</font> </label>-->
<!--                            <div id="pass_error" style="display:none;" class="error_msg">Please enter your password.</div>
                            <div id="pass_error1" style="display:none;" class="error_msg">Please enter a valid your password.</div>-->
                        </div>
                    </div> 

                    

                </div>

                <div class="regdetails mt40">
                    <h4>Your Business Information</h4>
                    <div class="row">
                        <div class="col-sm-6 pdzero">
                            <input type="text" placeholder="*Company Name" name="companyname" id="companyname" value="">
<!--                            <div id="cname_error" style="display:none"class="error_msg">Please enter your company name.</div>
                            <div id="cname_error1" style="display:none"class="error_msg">Please enter a valid company name.</div>-->
                        </div>
                        <div class="col-sm-6 pdzero">
                            <select id="vendortype" name="btype">
                                <option selected="selected"  value="">--Select Your Vendor Type--</option>
                                <?php
                                $sql = "SELECT categoryId,categoryName,isdel FROM category where isdel=0";
                                $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>                                    
                                    <option value="<?php echo $row['categoryId']; ?>"><?php echo $row['categoryName']; ?></option>                                        
                                    <?php
                                }
                                ?>
                            </select>
<!--                            <div id="vendortype_error" style="display:none"class="error_msg">Please Select vendor type.</div>-->
                        </div>
                    </div>
                    <div class="row">  
                        <div class="col-sm-6 pdzero telephone">
                            <input type="text" placeholder="*Company Email" name="cemail" id="cemail3" value="">
                        </div>
                        <div class="col-sm-6 pdzero telephone">
                            <div class="col-sm-3 pd0"> <span> *Telephone: </span></div>
                            <div class="col-sm-3 pd0 number">
                                <input type="text" placeholder="XXX" name="ctelephone" id="companyTelephone1" value="" onkeydown="mask(event, this)" onkeyup="mask(event, this)" maxlength="3">
                                <div id="cphone1_error1" style="display:none" class="error_msg">Ex.123</div>
                            </div>
                            <div class="col-sm-3 pd0 number"> 
                                <input type="text" placeholder="XXX" name="ctelephone1" id="companyTelephone2" value=""  onkeydown="mask(event, this)" onkeyup="mask(event, this)" maxlength="3">
                                <div id="cphone2_error1" style="display:none"class="error_msg"> Ex.123</div>
                            </div>
                            <div class="col-sm-3 pd0 number"> 
                                <input type="text" placeholder="XXXX" name="ctelephone2" id="companyTelephone3" value="" onkeydown="mask(event, this)" onkeyup="mask(event, this)" maxlength="4">
                                <div id="cphone3_error1" style="display:none" class="error_msg">Ex.1234</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">        
                        <div class="col-sm-6 pdzero">
                            <input type="text" placeholder="*Company Website" name="cwebsite" id="cwebsite" value="">
                            <div id="cwebsite_error1" style="display:none" class="error_msg" >Please enter a valid website. Ex.www.yourwebsite.com</div>
                        </div>
                        <div class="col-sm-6 pdzero">
                            <input type="text" placeholder="*Address 1" name="caddress1" id="caddress1" value="">
                            <div id="cadd1_error" style="display:none"class="error_msg" >Please enter your address.</div>
                            <!--<div id="cadd1_error1" style="display:none"class="error_msg" >Please enter a valid address.</div>-->
                        </div>                                        
                    </div>

                    <div class="row">                   
                        <div class="col-sm-6 pdzero">
                            <input type="text" placeholder="Address 2 (Optional)" name="caddress2" id="caddress2" value="">
                        </div>
                        <div class="col-sm-6 pdzero">
                            <input type="text" placeholder="*ZIP Code" name="cpostalcode" id="cpostalcode" maxlength="5" accept="number" value="" onkeypress="return onlyNos(event, this);">
                          <div id="cpostalcode_error" style="display:none" class="error_msg" >Please enter your postal code.</div>
                            <div id="cpostalcode_error1" style="display:none" class="error_msg" >Please enter a valid postal code.</div>
                        </div>
                    </div>      
                    <div class="row">  
                        <div class="form-group">                                        
                            <div class="col-sm-1 pdzero">
                                <span>*State</span>  
                            </div> 
                            <div class="col-sm-11 pdzero">
                                <select id="statelist1" name="state"  onChange="getCity(this.value);">
                                    <option selected="selected" value=""> --Select State --</option>
                                    <?php
                                    $sqlstate = "SELECT * FROM state";
                                    $resultstate = mysqli_query($mysqli, $sqlstate) or die(mysqli_error());
                                    while ($rowstate = mysqli_fetch_array($resultstate)) {
                                        ?>
                                        <option value="<?php echo $rowstate['sid']; ?>"><?php echo $rowstate['sname']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
<!--                                <div id="regstate1_error" style="display:none"class="error_msg" ><font color="red"> Please select state.</font></div>                     -->
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="form-group">
                            <div class="col-sm-1 pdzero">
                                <span>*City </span>
                            </div>
                            <div class="col-sm-11 pdzero">
                                <select name="city" id="city-list1">
                                    <option selected="selected" value=""> --Select City --</option>
                                    <?php
                                    $sqlcity = "SELECT * FROM city";
                                    $resultcity = mysqli_query($mysqli, $sqlcity) or die(mysqli_error());
                                    while ($rowcity = mysqli_fetch_array($resultcity)) {
                                        ?>
                                        <option value="<?php echo $rowcity['cityId']; ?>" ><?php echo $rowcity['cityName']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>                    
<!--                                <div id="regcity1_error" style="display:none"class="error_msg" ><font color="red"> Please select city.</font></div>                            -->
                            </div>
                        </div>       
                    </div> 
                    
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-1 pdzero"></div>
                            <div class="col-sm-11 pdzero">
                                <select id="aboutus" name="aboutus" onChange="getMideoInfo(this.value)">
                                    <option selected="selected"  value="">--How Did You Hear About Us.--</option>                                                                    
                                    <option value="Facebook">Facebook</option> 
                                    <option value="Instagram">Instagram</option> 
                                    <option value="Twitter">Twitter</option> 
                                    <option value="Pinterest">Pinterest</option> 
                                    <option value="Email">Email</option> 
                                    <option value="Referral">Referral</option> 
                                    <option value="Other">Other</option>
                                </select>
<!--                                <div id="aboutus_error" style="display:none"class="error_msg" ><font color="red"> Please select.</font></div>-->
                            </div>
                        </div>
                    </div>
                     <div id="filterValue">
                        <div class="col-sm-1 pdzero">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-5 pdzero">
                                <div class="checkbox">                        
                                    <label>
                                        <input id="rememberme" name="rememberme"  type="checkbox" value="yes" name="terms"><a href="<?php echo ROOT_PATH.'legal'; ?>" target="_blank"> *I Agree All Terms and Conditions </a>
                                    </label>   
<!--                                    <div id="chekbox" style="display:none;" class="error_msg">Check terms and condition</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-1 pdzero"></div>
                            <div class="col-sm-11 pdzero">
                                <div class="g-recaptcha" data-sitekey="6LfPJiUTAAAAABdncdebvpkFeaOVZdtDt3FZU2dR"></div> </div>
                            <input type="hidden" class="hiddenRecaptcha" name="hiddenRecaptcha" id="hiddenRecaptcha">
                             <div id="hiddenRecaptcha_error" style="display:none" class="error_msg" >Please Select Google Captcha.</div>
                         
                        </div>
                    </div>
                    <input type="hidden" name="vid" value="<?php echo $passkey; ?>" >
                   
                    <div class="clearfix"></div>
                    <div class="form-group">
                    </div>
                    <div class="clearfix"></div> 


                </div>
                <div class="row">
                    <div class="form-group">
                        <input type="submit" name="submit"  value="Save & Proceed" class="button row">
                    </div> 
                </div>
            </form>
        </div>
        <div class="col-md-3 registration-right regdetails_right pull-right mt30 pd0">
            <img src="images/register_rightimg.jpg"> 
            <div class="view text-center">
                <h3>Are you Vendor? </h3>
                <a href="" class="blu-btn bton" data-toggle="modal" data-target="#myModal3">Login Here</a>
            </div>
        </div>  
    </div>
</div>
<div class="line"></div>
<?php include './vendorlogin'; ?>
<div class="Retweet container">
    <span><strong>Photo credits:</strong> 
        <a href="http://clarkwalkerstudio.com" target="_blank">Clark + Walker Studio </a>
    </span>
</div>
<?php include './vendorlogin.php'; ?>
<!--End Modal content-->
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript">
    $(function () {
        
       jQuery.validator.addMethod("urlval", function (value, element) {
        if (/^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$/.test(value)) {    
            return true;
        } else {
            return false;
        }; });
           jQuery.validator.addMethod("website_vali", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9\t\n ./<>?;:"'`!@#$%^&*()\[\]{}_+=|\\-]+$/i.test(value);
           }, "Letters only please"); 
              jQuery.validator.addMethod("address1", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9\t\n ./<>?;:"',`!@#$%^&*()\[\]{}_+=|\\-]+$/i.test(value);
           }, "Letters only please"); 
           $.validator.methods.email = function( value, element ) {
            return this.optional( element ) || /[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]+/.test( value );
}
        $("#informationForm").validate({
		// validate signup form on keyup and submit
		
			rules: {
                                firstname:{
                                   required: true
                                   
                                },
                                lastname:{
                                    required: true
                                   
                                },
                                cemail:{
                                    required: true,
					email: true
                                },
				cwebsite:{
                                   required: true,
                                   urlval :true
                                },
				companyname:{
                                   required: true,
                                   website_vali:true
                                },
                                btype:{
                                    required: true
                                },
                                ctelephone:{required: true},
                                ctelephone1:{required: true},
                                ctelephone2:{required: true},
                                caddress1:{required: true,address1:true},
                                cpostalcode:{required: true},
                                state:{required: true},
                                city:{required: true},
                                aboutus:{required: true},
                                rememberme:{required: true},
                                email: {
					required: true,
					email: true,
                                        
                                      "remote":
                                    {
                                    url: 'checkemail',
                                    type: "post",
                                    data:
                                        {
                                            email: function ()
                                            {
                                                return $('#informationForm :input[name="email"]').val();
                                            }
                                        }
                                    }
				},
				
				agree: "required"
			},
			messages: {
				
				cwebsite: "Please enter a valid website. Ex.www.yourwebsite.com",
				email: {
                                    required : "Please enter email",
                                    email : "Please enter a valid email address",
                                    remote:"Email is already in use"
                                }
			}
		});
                });
</script>
<script type="text/javascript">
    function login2() {
        var email1 = $('#email2').val();
        var password1 = $('#password2').val();

        if (email1 == "" && password1 == "")
        {
            $("#message1").show();
            $('.alert-danger').html("<span>Please enter UserName and Password</span>");
            return false;
        }
        if (email1 == "")
        {
            $("#message1").show();
            $('.alert-danger').html("<span>Please enter UserName</span>");
            return false;
        }
        if (password1 == "")
        {
            $("#message1").show();
            $('.alert-danger').html('<span id="error">Please enter Password</span>');
            return false;
        }

    }
</script>
<!--End Modal content-->
<?php include 'footer'; ?>
