<?php 
    include 'header.php'; 
    include './validationuser.php'; 
    include './config.php';
    $passkey=$_GET['passkey'];  
   
    $sql1="SELECT * FROM vendor_details where isdel=1 AND confirm_code='".$passkey."'";    
    $addresult1 = mysqli_query($mysqli, $sql1) or die(mysqli_error());    
    $row1=mysqli_fetch_array($addresult1);
?>


<script type="text/javascript">
    
     function getCity(val) 
     {
	$.ajax({
	type: "POST",
	url: "get_city1.php",
	data:'state_id='+val,
	success: function(data){
		$("#city-list").html(data);
	}
	});
        }  
        
        
        
function mask(e,f){
	var len = f.value.length;
	var key = whichKey(e);
	if(key>47 && key<58)
	{
		if( len==3 )f.value=f.value
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
                            <input type="text" placeholder="*Enter Your First Name" name="firstname"  id="firstname" value="<?php echo $row1['fname']; ?>">
                            <div id="fname_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your first name</font></div>
                            <div id="fname_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid first name</font></div>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" placeholder="*Last Name" name="lastname" id="lastname" value="<?php echo $row1['lname']; ?>">
                            <div id="lname_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Last name</font></div>
                            <div id="lname_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Last name</font></div>
                        </div>
                    </div>                   
                             
                                                  
            </div>

            <div class="regdetails mt40">

                <h4>Your Business Information</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" placeholder="*Company Name" name="companyname" id="companyname" value="<?php echo $row1['c_name']; ?>">
                        <div id="cname_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Company Name</font></div>
                        <div id="cname_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Company Name</font></div>
                    </div>
                    
                    <div class="col-sm-6">
                            <select id="vendortype" name="btype">
                                <option selected="selected"  value="">--Select Your Vendor Type--</option>
                                    <?php                                   
                                        $sql = "SELECT categoryId,categoryName,isdel FROM category where isdel=0";
                                        $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
                                        while ($row = mysqli_fetch_array($result)) 
                                        {
                                    ?>
                                    
                                        <option <?php if($row1['b_type'] == $row['categoryId']) echo 'selected="selected"'; ?> value="<?php echo $row['categoryId']; ?>"><?php echo $row['categoryName']; ?></option>
                                        

                                    <?php                                         
                                        }
                                    ?>
                            </select>
                           <div id="vendortype_error" style="display:none"class="error_msg" ><font color="red"> Please Select Vendor type</font></div>
                        </div>

                </div>
                <div class="row">        
                    <div class="col-sm-6">
                        <input type="text" placeholder="*Company Email" name="cemail" id="cemail3" value="<?php echo $row1['c_email']; ?>">
                        <div id="cemail_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Company Email ID</font></div>
                        <div id="cemail_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Email ID</font></div>
                    </div>
                    <div class="col-sm-6 telephone">
                    
                       <div class="col-sm-3 pd0"> <span> Telephone: </span></div>
                       <div class="col-sm-3 pd0 number">
                       <input type="text" placeholder="XXX" name="ctelephone" id="companyTelephone1" value="<?php echo $row1['c_telephone']; ?>" onkeydown="mask(event,this)" onkeyup="mask(event,this)" maxlength="3">
                        <div id="cphone1_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Company Phone Number</font></div>
                    <div id="cphone1_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Phone Number</font></div>
                       </div>
                       <div class="col-sm-3 pd0 number"> 
                       <input type="text" placeholder="XXX" name="ctelephone1" id="companyTelephone2" value="<?php echo $row1['c_telephone1']; ?>"  onkeydown="mask(event,this)" onkeyup="mask(event,this)" maxlength="3">
                       <div id="cphone2_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Company Phone Number</font></div>
                    <div id="cphone2_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Phone Number</font></div>
                       </div>
                        <div class="col-sm-3 pd0 number"> 
                       <input type="text" placeholder="XXXX" name="ctelephone2" id="companyTelephone3" value="<?php echo $row1['c_telephone2']; ?>" onkeydown="mask(event,this)" onkeyup="mask(event,this)" maxlength="4">
                       <div id="cphone3_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Company Phone Number</font></div>
                    <div id="cphone3_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Phone Number</font></div>
						</div>
<!--                        <div id="cphone_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Company Phone Number</font></div>
                        <div id="cphone_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Phone Number</font></div>-->
                    </div>
                </div>
                <div class="row">        
                    <div class="col-sm-6">
                        <input type="text" placeholder="*Company Website" name="cwebsite" id="cwebsite" value="<?php echo $row1['c_website']; ?>">
                        <div id="cwebsite_error" style="display:none"class="error_msg" ><font color="red"> Please enter your Company Website</font></div>
                        <div id="cwebsite_error1" style="display:none"class="error_msg" ><font color="red"> Please enter a valid Company Website</font></div>
                    </div>
                    
                     <div class="col-sm-6">
                        <input type="text" placeholder="*ZIP Code" name="cpostalcode" id="cpostalcode" maxlength="5" accept="number" value="<?php echo $row1['c_postalcode']; ?>" onkeypress="return onlyNos(event,this);">
                        <div id="cpostalcode_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Postal Code</font></div>
                        <div id="cpostalcode_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Postal Code</font></div>
                    </div>
                    
                </div>
                                                
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" placeholder="*Address1" name="caddress1" id="caddress1" value="<?php echo $row1['c_address1']; ?>">
                        <div id="cadd1_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Address</font></div>
                        <div id="cadd1_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Address</font></div>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" placeholder="Address2(optional)" name="caddress2" id="caddress2" value="<?php echo $row1['c_address2']; ?>">
                        <div id="cadd2_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your Address</font></div>
                        <div id="cadd2_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Address</font></div>
                    </div>
                </div>                         
              
            <div class="form-group">                                        
                <div class="col-sm-2">
                    <span>State</span>  
                </div> 
                <div class="col-sm-9">
                    <select name="state" id="state-list" onChange="getCity(this.value);">
                        <option selected="selected" value=""> --Select State --</option>
                        <?php
                            $sqlstate = "SELECT * FROM state";
                            $resultstate = mysqli_query($mysqli, $sqlstate) or die(mysqli_error());
                            while ($rowstate = mysqli_fetch_array($resultstate)) 
                            {                                                           
                        ?>
                               <option <?php if($row1['c_regionstate'] == $rowstate['sid']) echo 'selected="selected"'; ?> value="<?php echo $rowstate['sid']; ?>"><?php echo $rowstate['sname']; ?></option>
                        <?php
                            }
                            ?>
                    </select>
                    <div id="regstate_error" style="display:none"class="error_msg" ><font color="red"> Please Select State</font></div>                     
                </div>
            </div>
                
            <div class="form-group">
                <div class="col-sm-2">
                    <span>City : </span>
                </div>
                
                <div class="col-sm-9">
                    <select name="city" id="city-list">
                        <option selected="selected" value=""> --Select City --</option>
                            <?php
                                $sqlcity = "SELECT * FROM city ";
                                $resultcity = mysqli_query($mysqli, $sqlcity) or die(mysqli_error());
                                    while ($rowcity = mysqli_fetch_array($resultcity)) 
                                    {
                            ?>
                                        <option <?php if($row1['c_city'] == $rowcity['cityId']) echo 'selected="selected"'; ?>value="<?php echo $rowcity['cityId']; ?>" ><?php echo $rowcity['cityName']; ?></option>

                            <?php                             
                                    }
                            ?>
                    </select>                    
                    <div id="regcity_error" style="display:none"class="error_msg" ><font color="red"> Please Select City</font></div>                            
                </div>
            </div>       
                
                
                <input type="hidden" name="vid" value="<?php echo $passkey; ?>" >
                <div class="clearfix"></div>
                <div class="mt15">
                    <input id="rememberme" type="checkbox" required="true" value="yes" name="rememberme">
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
       
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
        <!-- End Steps --->   
        
        
    <!---- Retweet-deals ---> 
        <div class="Retweet-deals">
            <div class="container">
                <div class="col-lg-12">
                    <div class="col-lg-6 bl pdr">
                        <h4 class="mt10"><strong>New vendor? </strong></h4> 
                        <a href="registration.php" class="bton blu-btn"><strong>Register Here</strong></a>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="mt10 mar-left"><strong>Already a XAAZA vendor?</strong></h4>  <a href="#" class="bton blu-btn"><strong>Log In Here</strong></a>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                <div class="mt30"><img src="images/line_163.png"></div>
        
                <div class="col-lg-12">
                    <h3>FOLLOW FOR WEDDING DEALS & INSPIRATION</h3>
                    <p>We share exclusive deals and beautiful real weddings!</p>
                </div>
                
                <div class="col-lg-12 fotr-social">
                    <ul>
                        <li><a class="ft-instg" target="_blank" href="<?php echo $rowsocial1['instragram']; ?>">Instagram</a></li>
                        <li><a class="ft-fb" target="_blank" href="<?php echo $rowsocial1['facebook']; ?>">Facebook</a></li> 
                        <li><a class="ft-twt" target="_blank" href="<?php echo $rowsocial1['twitter']; ?>">Twitter</a></li>
                        <li><a class="ft-pinte" target="_blank" href="<?php echo $rowsocial1['pinterest']; ?>">pinterest</a></li>
                    </ul>
                </div>
            </div>
        </div>



<div class="Retweet container">
    <span><strong>Photo credits:</strong> 
       <a href="http://clarkwalkerstudio.com" target="_blank">Clark + Walker Studio </a>
      <!-- <a href="http://www.studiomerimaphotography.com">Studio Merima, </a>
       <a href="Lin & Jirsa Photography">Lin & Jirsa Photography, </a>
       <a href="http://www.nataliefranke.com">Natalie Franke Photography</a>-->
    </span>

</div>

<!----End Retweet-deals --->   
 
<?php include 'footer.php'; ?>