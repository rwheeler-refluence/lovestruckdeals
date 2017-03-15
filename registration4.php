<?php
    include './config.php';
    //include './validationuser.php';
    include 'header.php';
    $passkey=$_GET['passkey'];         
    
    //Harish
    $cmpleted=$_GET['completed'];
    
    
    $sql1="SELECT * FROM vendor_details where confirm_code='".$passkey."'";    
    $addresult1 = mysqli_query($mysqli, $sql1) or die(mysqli_error());    
    $row1=mysqli_fetch_array($addresult1); 
    $vendor_id=$row1['vendor_id'];
   // exit;
    
    //video check video linked not insert by nital
     $sqlVideoCheckID="select videoId,vendor_id from video where vendor_id='".$vendor_id."'";
     $addVideo = mysqli_query($mysqli, $sqlVideoCheckID) or die(mysqli_error());    
        if(mysqli_num_rows($addVideo)){}else { 
         $insertVideoID1="insert into video (vendor_id,vvideoType,vstatus,yvideoType,ystatus) values ('".$vendor_id."','vimeo','1','youtube','0')";             
        $insertVideoID=  mysqli_query($mysqli, $insertVideoID1); }
     //video check video linked not insert by nital
       
       
    $sqlcategory="select v.b_type,c.categoryId,c.categoryName from vendor_details v,category c where v.b_type=c.categoryId and v.confirm_code='".$passkey."'"; 
    $resultcategory=  mysqli_query($mysqli, $sqlcategory);
    $rowcategory=  mysqli_fetch_array($resultcategory);   
    
    
    $quefilter=" select v.b_type,f.categoryId,f.type,f.filterid,f.type  from vendor_details v,filter f where v.b_type= f.categoryId and f.isdel='1' and v.confirm_code='".$passkey."'";                               
    $resultfilter=  mysqli_query($mysqli, $quefilter);
    $numberofrow=  mysqli_num_rows($resultfilter);   
    
   // $sqlcatfilter="select * from filter where isdel=1 AND categoryId='".$rowcategory['b_type']."'";
    //echo $sqlcatfilter;
   // die;
?>
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
   
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
   <script>
    function validate_form()
    {
        valid = true;
        if($('input[type=checkbox]:checked').length == 0)
        {
            alert ( "Please Check a Minimum of One Box to Proceed" );
            valid = false;
        }
        return valid;
    }
</script>




<style>
/***** zoom effect  ******/

.slideshow {width:300px; height:auto; margin:0 auto;}
.slideshow input {position:absolute; left:-9999px; display:none;}
label.toggle {display:block; /*width:416px;*/ height:auto; margin:10px; position:relative; cursor:pointer; float:left; z-index:10;
-webkit-transition: 0s 1s;
-moz-transition: 0s 1s;
-o-transition: 0s 1s;
transition: 0s 1s;
}
label.toggle img {display:block;/* width:416px; height:auto;*/
-webkit-transition: 1s ease-in-out;
-moz-transition: 1s ease-in-out;
-o-transition: 1s ease-in-out;
transition: 1s ease-in-out;
}
input:checked + label {z-index:100;
-webkit-transition: 0s;
-moz-transition: 0s;
-o-transition: 0s;
transition: 0s;
}
input:checked + label .test2 img {
-webkit-transform:scale(2);
-moz-transform:scale(2);
-o-transform:scale(2);
transform:scale(2);
margin:128px auto 128px auto;
}
.test2
{
	width:250px;
	height:auto;
}

/***** End zoom effect  ******/
</style>
<!--<div class="wrapper">-->
<!-- Steps --->   
<div class="steps mt30">
    <div class="container">
        <ul>
            <li class="step-one "><a href="#"><span>1</span>Step 1</a></li>
            <li class="step-one"><a href="#"><span>2</span>Step 2</a></li>
            <li class="step-one"><a href="#"><span>3</span>Step 3</a></li>
            <li class="step-one active"><a href="#"><span>4</span>Step 4</a></li>
        </ul>    
        <div class="col-md-8 register pdzero reg_Details mt30 step4">
            <div class="regdetails mt10">
                <h4>Choose Your Business and Requirement</h4>
                <p>You are on the final step to complete your profile</p>
                <?php            
                    if($numberofrow>0)
                    {
                ?>                       
                        <form class="mt20"  name="Registration4" id="defaultForm"  method="post"  action="regins4" onsubmit="return validate_form();" >                                                
                            <div class="row m0">
                                    <div class="col-sm-3 pd0"><span>Category Name</span></div>
                                    <div class="col-sm-8">
                                        <input type="text" name="catagoryname" id="catagoryname" readonly="true" value="<?php echo $rowcategory['categoryName']; ?>">                           
                                    </div>
                                </div>                     

                                <!-- Start If Condition -->
                                <?php 
                                if($rowcategory['b_type']==65)
                                { 
                                ?>                                                                                
                                    <div class="row m0">
                                        <div class="col-sm-3 pd0"><span>Maximum Capacity</span></div>
                                        <div class="col-sm-8">
                                            <select id="maxCapacity" name="maxcapacity">
                                                <option selected="selected" value="">Select Your Capacity</option>                                  
                                                <option value='100' <?php if($row1['max_capacity'] == "100" ) { ?> selected="selected" <?php } ?>>100</option>
                                                <option value='250' <?php if($row1['max_capacity'] == "250" ) { ?> selected="selected" <?php } ?>>250</option>
                                                <option value='400' <?php if($row1['max_capacity'] == "400" ) { ?> selected="selected" <?php } ?>>400+</option>
                                            </select>
                                            <div id="maxcapacity_error" style="display:none"class="error_msg" ><font color="red"> Please select maximum capacity.</font></div>                                                                             
                                        </div>                                                                            
                                    </div> 

                                    <div class="row m0">
                                           <div class="col-sm-3 pd0"><span>Venue Setting</span></div>
                                           <div class="col-sm-8">
                                               <select id="venue" name="venuset">
                                                   <option selected="selected" value="">Select Venue Setting</option>                            
                                                   <option value='Indoor'<?php if($row1['venue_setting'] == "Indoor" ) { ?> selected="selected" <?php } ?> >Indoor</option>
                                                   <option value='Covered Outdoor' <?php if($row1['venue_setting'] == "Covered Outdoor" ) { ?> selected="selected" <?php } ?>>Covered Outdoor</option>
                                                   <option value='UnCovered Outdoor' <?php if($row1['venue_setting'] == "UnCovered Outdoor" ) { ?> selected="selected" <?php } ?>>UnCovered Outdoor</option>
                                                   <option value='On The Water' <?php if($row1['venue_setting'] == "On The Water" ) { ?> selected="selected" <?php } ?>>On The Water</option>
                                               </select>
                                               <div id="venue_error" style="display:none"class="error_msg" ><font color="red"> Please select bussnesstype.</font></div>                                                                                        
                                           </div>
                                        </div>

                                        <div class="row m0">
                                            <div class="col-sm-3 pd0"><span>Speciality </span></div>
                                            <div class="col-sm-8">
                                            <div class="speciality mCustomScrollbar">
                                                <?php                             
                                                        $quefilter=" select v.b_type,f.categoryId,f.type,f.filterid,f.type  from vendor_details v,filter f where v.b_type= f.categoryId and f.isdel='1' and v.confirm_code='".$passkey."'";                                  
                                                        $resultfilter=  mysqli_query($mysqli, $quefilter);
                                                        while ($rowfilter = mysqli_fetch_array($resultfilter)) 
                                                        { 
                                                ?>          <div class="col-sm-6 sub_list">      

                                                            <input type="checkbox" name="cat[]"  value="<?php echo $rowfilter['filterid']; ?>"  >
                                                             <label><?php echo $rowfilter['type']; ?></label>
                                                            </div>
                                                <?php
                                                        }                                                                                          
                                                    ?>  
                                                </div>
                                            </div>
                                        </div>  

                            <?php                
                                }
                                else 
                                {
                            ?> 
                                    <!-- Else If Condition  -->                
                                    <div class="row m0">
                                        <div class="col-sm-3 pd0"><span>Speciality </span></div>
                                        <div class="col-sm-8">
                                            <div class="speciality mCustomScrollbar">
                                                <?php                                                                                                            
                                                    while ($rowfilter = mysqli_fetch_array($resultfilter)) 
                                                    {                                    
                                                ?>          
                                                        <div class="col-sm-6 sub_list">                                      
                                                            <input type="checkbox" name="cat[]" id='checkfilter'  value="<?php echo $rowfilter['filterid']; ?>" >
                                                            <label><?php echo $rowfilter['type']; ?></label>                                    
                                                        </div>
                                                <?php
                                                    }                                                                                                                                                                                                              
                                                ?>
                                            </div>                        
                                        </div>
                                    </div>  
                            <?php                          
                                }
                            ?>                                               
                                <input type="hidden" name="vid" value="<?php echo $passkey; ?>" >       
                                <div class="clearfix"></div>
                                <input type="submit" value="Save" id="sub" name="sub" onsubmit="return validate_form();" class="button row mt30" >
                                <a href="registration3?passkey=<?php echo $_GET['passkey']; ?>" ><input type="Button" value="Back" class="button row mt30"> </a>
                                <!--<input type="reset" value="Reset" class="button row reset mt30">-->
                                <input type="hidden" name="completed" value="<?php echo $cmpleted; ?>">
                        </form>             
                <?php
                    } 
                    else
                    {
                ?>
                        <form class="mt20"  name="Registration4" id="defaultForm"  method="post"  action="regins4" >                                                
                            <div class="row m0">                   
                                <div class="col-sm-3 pd0"><span>Category Name</span></div>
                                <div class="col-sm-8 pdzero">
                                    <input type="text" name="catagoryname" id="catagoryname" readonly="true" value="<?php echo $rowcategory['categoryName']; ?>">                           
                                </div>
                            </div>                                                                            
                            <div class="row m0">
                                <!--<div class="col-sm-3 pd0"><span>Speciality </span></div>-->
                                <div class="col-sm-8 pd0 pdzero">
                                <div class="speciality mCustomScrollbar">
                                    <p>There are no filters for your category, Please proceed to next step</p>                                
                                </div>                        
                                </div>
                            </div>                                                                                          
                            <input type="hidden" name="vid" value="<?php echo $passkey; ?>" >       
                            <div class="clearfix"></div>
<!--                             <div class="form-group">
                              <div class="col-sm-5">
                               <div class="checkbox">                        
                        <label>
                            <input id="rememberme" name="rememberme" required="true" type="checkbox" value="yes" name="terms"><a href="legal" target="_blank"> *I Agree All Terms and Conditions </a>
                        </label>                       
                    </div>
            </div>
       </div>-->
                            <input type="submit" value="Save" id="sub" onsubmit="return validate_form();" class="button row mt30" >
                            <a href="registration3?passkey=<?php echo $_GET['passkey']; ?>" ><input type="Button" value="Back" class="button row mt30"> </a>
                            <!--<input type="reset" value="Reset" class="button row reset mt30">-->
                        </form> 
                <?php                     
                    } 
                ?>
            </div>
            
                <!--<div class="mt15">
                    <input id="rememberme" type="checkbox" value="yes" name="rememberme">
                    <label for="rememberme">*I Agree All Terms and Conditions</label>
                </div>-->                  
        </div>          
        <div class="col-md-3 registration-right regdetails_right pull-right mt30 pd0">
            <!--<img src="images/registration4.jpg">
            <div class="view text-center">
                 <h3>Are you Vendor? </h3>
                <a href="#" class="blu-btn bton ">Login Here</a>
            </div>-->
            <div class="slideshow">
              <input type="checkbox" id="image1" />
                  <label for="image1" class="toggle"> 
                   
                      <div class="test2">
                      <div class="view text-center">
                      </div>
                        <img src="images/registration4.jpg">
                        </div>
                         
                 </label>
       	</div>
        </div>          
    </div>  


   <div class="line"></div>      
    <!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>-->
   <!-- <script src="js/jquery.min.js"></script>           
    <script src="js/bootstrap.js"></script>   
    -->       
    <script type="text/javascript">
     function onlyNos(e, t) 
     {
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
    function mask(e,f){
	var len = f.value.length;
	var key = whichKey(e);
	if(key>47 && key<58)
	{
		if( len==3 )f.value=f.value
		else if(len==7 )f.value=f.value
		else f.value=f.value;
	}
	else{
		f.value = f.value.replace(/[^0-9]/,'')
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
        $(document).ready(function() 
        {
            $("#sub").click(function()
            {                        
                var spacialid = [];
                $.each($(".special option:selected"), function()
                {            
                    spacialid.push($(this).val());
                });                
                   // alert("You have selected the Speciality - " + spacialid.join(", "));
            });
            
           
        });
</script>
 <!-- End Steps --->    
   
    <!-- scroll -->
    
    <script>
		(function($){
			$(window).load(function(){
				
				$("a[rel='load-content']").click(function(e){
					e.preventDefault();
					var url=$(this).attr("href");
					$.get(url,function(data){
						$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
						//scroll-to appended content 
						$(".content").mCustomScrollbar("scrollTo","h2:last");
					});
				});
				
				$(".content").delegate("a[href='top']","click",function(e){
					e.preventDefault();
					$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
				});
				
			});
		})(jQuery);
	</script>
        <script language="Javascript" type="text/javascript">
            function disable_browser_back_button() 
            { 
                window.history.forward(); 
            }
        </script>
    
    <!--- scroll -->  
      <!---- Retweet-deals ---> 
<!--        <div class="Retweet-deals">
            <div class="container">
                <div class="col-lg-12">
                    <div class="col-lg-6 bl pdr">
                        <h4 class="mt10"><strong>New vendor? </strong></h4> 
                        <a href="registration" class="bton blu-btn"><strong>Register Here</strong></a>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="mt10 mar-left"><strong>Already a LOVESTRUCK DEALS vendor?</strong></h4>  <a href="#" class="bton blu-btn"><strong>Log In Here</strong></a>
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
                        <li><a class="ft-instg" target="_blank" href="<?php //echo $rowsocial1['instragram']; ?>">Instagram</a></li>
                        <li><a class="ft-fb" target="_blank" href="<?php //echo $rowsocial1['facebook']; ?>">Facebook</a></li> 
                        <li><a class="ft-twt" target="_blank" href="<?php //echo $rowsocial1['twitter']; ?>">Twitter</a></li>
                        <li><a class="ft-pinte" target="_blank" href="<?php //echo $rowsocial1['pinterest']; ?>">pinterest</a></li>
                    </ul>
                </div>
            </div>
        </div>-->

<?php include './vendorlogin.php'; ?>

<div class="Retweet container">
    <span><strong>Photo credits:</strong> 
       <a href="http://clarkwalkerstudio.com" target="_blank">Clark + Walker Studio </a>
      <!-- <a href="http://www.studiomerimaphotography.com">Studio Merima, </a>
       <a href="Lin & Jirsa Photography">Lin & Jirsa Photography, </a>
       <a href="http://www.nataliefranke.com">Natalie Franke Photography</a>-->
    </span>

</div>

<!----End Retweet-deals --->   
<!-- footer --->  
 <?php include 'footer.php'; ?>
 </div>

