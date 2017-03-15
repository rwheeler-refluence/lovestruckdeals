<?php 
include 'header.php'; 
include 'validationuser.php'; 
include "config.php";
$passkey=$_GET['passkey'];    
$id=$_GET['id'];
?>


<script type="text/javascript">
function mask(e,f){
	var len = f.value.length;
	var key = whichKey(e);
	if(key>47 && key<58)
	{
		if( len==3 )f.value=f.value+'-'
		else if(len==7 )f.value=f.value+'-'
		else f.value=f.value;
	}
	else{
		f.value = f.value.replace(/[^0-9-]/,'')
		f.value = f.value.replace('--','-')
	}
}
 
function whichKey(e) {
	var code;
	if (!e) var e = window.event;
	if (e.keyCode) code = e.keyCode;
	else if (e.which) code = e.which;
	return code
//	return String.fromCharCode(code);
}
 
</script>

 <script>
 
function showUser(str)
{
if (str=="")
{
document.getElementById("txtHint").innerHTML="";
return;
}
 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
 
 
 
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","fetch_status.php?q="+str,true);
xmlhttp.send();
}
</script>


<script language="Javascript" type="text/javascript">
 
        function onlyNos(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        }
 
    </script>   
<div class="clearfix"></div>
<div class="line"></div>     
<!-- Steps --->
<div class="steps mt30">
    <div class="container">
        <ul>
            <li class="step-one "><a href="#"><span>1</span>Step 1</a></li>
            <li class="step-one active"><a href="#"><span>2</span>Step 2</a></li>
            <li class="step-one"><a href="#"><span>3</span>Step 3</a></li>
            <li class="step-one"><a href="#"><span>4</span>Step 4</a></li>
        </ul>

        <div class="col-md-8 register reg_Details mt30">
            <div class="regdetails mt10">                                   
                <h4>Your Personal Information</h4>                                                
                
                <form class="mt20"  name="regisform2" onsubmit="return validateInformation()" id="informationForm" method="post"  action="regins2.php" >
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" placeholder="*Enter Your First Name" name="firstname"  id="firstname">
                            <div id="fname_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your first name</font></div>
                            <div id="fname_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid first name</font></div>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" placeholder="*Last Name" name="lastname" id="lastname">
                            <div id="lname_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Last name</font></div>
                            <div id="lname_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Last name</font></div>
                        </div>
                    </div>
                    <div class="row">        
                        <div class="col-sm-6">
                            <input type="text" placeholder="*Email" name="email" id="email2">
                            <div id="email_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Email ID</font></div>
                            <div id="email_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Email ID</font></div>
                        </div>
                        <div class="col-sm-6">
                               <input type="text" placeholder="XXX" name="telephone" id="telephone" value="<?php echo $row1['v_telephone']; ?>" onkeydown="mask(event,this)" onkeyup="mask(event,this)" maxlength="3">
                                <input type="text" placeholder="XXX" name="telephone1" id="telephone1" value="<?php echo $row1['v_telephone1']; ?>" onkeydown="mask(event,this)" onkeyup="mask(event,this)" maxlength="3">
                                <input type="text" placeholder="XXXX" name="telephone2" id="telephon2" value="<?php echo $row1['v_telephone2']; ?>" onkeydown="mask(event,this)" onkeyup="mask(event,this)" maxlength="4">
<!--                            <div id="phone_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Phone Number</font></div>
                            <div id="phone_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Phone Number</font></div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" placeholder="*Address1" name="address1" id="address1">
                            <div id="add1_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Address</font></div>
                            <div id="add1_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Address</font></div>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" placeholder="*Address2" name="address2" id="address2">
                            <div id="add2_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Address</font></div>
                            <div id="add2_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Address</font></div>
                        </div>
                    </div>
                    <div class="row">        
<!--                        <div class="col-sm-6">
                            <input type="text" placeholder="*City" name="city" id="city">
                            <div id="city_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your City</font></div>
                            <div id="city_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid City</font></div>
                        </div>-->
                        <div class="col-sm-6">
                            <input type="text" placeholder="*Postal Code" name="postalcode" id="postalcode" maxlength="5" accept="number" onkeypress="return onlyNos(event,this);"  >
                            <div id="postalcode_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Postal Code</font></div>
                            <div id="postalcode_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Postal Code</font></div>
                        </div>
                    </div>
                    
             
            </div>

            <div class="regdetails mt40">

                <h4>Your Business Information</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" placeholder="*Company Name" name="companyname" id="companyname">
                        <div id="cname_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Company Name</font></div>
                        <div id="cname_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Company Name</font></div>
                    </div>
                    <div class="col-sm-6">
                        <select name='ctype'  select id="ctype">                          
                            <option value="">Vendor Type</option>
                            <option value="">Public</option>
                            <option value="">Private</option>
                        </select>
                       <!-- <div id="selectebtype_error" style="display:none"class="error_msg" ><font color="red"> Please Select Your Business Type</font></div> -->
                    </div>
                </div>
                <div class="row">        
                    <div class="col-sm-6">
                        <input type="text" placeholder="*Company Email" name="cemail" id="cemail3">
                        <div id="cemail_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Company Email ID</font></div>
                        <div id="cemail_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Email ID</font></div>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" placeholder="*Company Telephone" name="ctelephone" id="ctelephone">
                       <input type="text" placeholder="XXX" name="ctelephone" id="ctelephone" value="<?php echo $row1['c_telephone']; ?>" onkeydown="mask(event,this)" onkeyup="mask(event,this)" maxlength="3">
                       <input type="text" placeholder="XXX" name="ctelephone1" id="ctelephone1" value="<?php echo $row1['c_telephone1']; ?>"  onkeydown="mask(event,this)" onkeyup="mask(event,this)" maxlength="3">
                       <input type="text" placeholder="XXXX" name="ctelephone2" id="ctelephone2" value="<?php echo $row1['c_telephone2']; ?>" onkeydown="mask(event,this)" onkeyup="mask(event,this)" maxlength="4">

<!--                        <div id="cphone_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Company Phone Number</font></div>
                        <div id="cphone_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Phone Number</font></div>-->
                    </div>
                </div>
                <div class="row">        
<!--                    <div class="col-sm-6">
                        <input type="text" placeholder="*Company Fax" name="cfax" id="cfax">
                        <div id="cfax_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Company Fax Number</font></div>
                        <div id="cfax_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Fax Number</font></div>
                        
                    </div>-->
                    <div class="col-sm-6">
                        <input type="text" placeholder="*Company Website" name="cwebsite" id="cwebsite">
                        <div id="cwebsite_error" style="display:none"class="error_msg" ><font color="red"> Please enter your Company Website</font></div>
                        <div id="cwebsite_error1" style="display:none"class="error_msg" ><font color="red"> Please enter a valid Company Website</font></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" placeholder="*Address1" name="caddress1" id="caddress1" >
                        <div id="cadd1_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Address</font></div>
                        <div id="cadd1_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Address</font></div>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" placeholder="*Address2(optional)" name="caddress2" id="caddress2">
                        <div id="cadd2_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Address</font></div>
                        <div id="cadd2_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Address</font></div>
                    </div>
                </div>
                <div class="row">        
                    <div class="col-sm-6">
<!--                        <input type="text" placeholder="*City" name="ccity" id="ccity">
                        <div id="ccity_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your City Name</font></div>
                        <div id="ccity_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid City Name</font></div>-->
                    </div>
                    <div class="col-sm-6">
                        <input type="text" placeholder="*Postal Code" name="cpostalcode" id="cpostalcode" maxlength="5" accept="number" onkeypress="return onlyNos(event,this);">
                        <div id="cpostalcode_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Postal Code</font></div>
                        <div id="cpostalcode_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Postal Code</font></div>
                    </div>
                </div>
                <div class="row">        
                    <div class="form-group">
                            <div class="col-sm-3">
                              
                            </div>
                            <div class="col-sm-8">
                                
                                <select name="state" onChange="showUser(this.value)">
                                    <?php
                                    $sql = "SELECT * FROM state";
                                    $result = mysql_query($sql);
                                    while ($row = mysql_fetch_array($result)) {
                                        $id = $row['sid'];
                                        echo  "<option  value='$id'>" . $row['sname'] . "</option>";
                                    }
                                    ?>
                                </select>

                                <div id="txtHint" style="width:100px; border:0px solid gray;">
                                    <b>Your City display here</b>
                                </div>
                                <div id="regstate_error" style="display:none"class="error_msg" ><font color="red"> Please Select State</font></div>                            
                            </div>
                        </div>
                   
                </div>
                
                <input type="hidden" name="vid" value="<?php echo $id; ?>" >
                <div class="mt15">
                    <input id="rememberme" type="checkbox" value="yes" name="rememberme">
                    <label for="rememberme">*I Agree All Terms and Conditions</label>
                </div>
                <div class="clearfix"></div>
                <input type="submit" name="submit"  value="save and proceed" class="button row"> 
                </form>
            </div>

        </div>
        <div class="col-md-3 registration-right regdetails_right mt30 pd0">
            <img src="images/register_rightimg.jpg"> 
            <div class="view text-center">
                <h3>Are you Vendor? </h3>
                <a href="#" class="blu-btn bton ">Login Here</a>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div>
       
        <!-- End Steps --->    
<?php include 'footer.php'; ?>