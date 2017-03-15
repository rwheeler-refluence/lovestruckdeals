<?php
include 'header.php';
include 'config.php';
include './validationuser.php';
$passkey = $_GET['passkey'];
//$id=$_GET['id'];
if($_GET['passkey']==''){
    echo "<h2 style='margin: 85px;text-align: -webkit-center;'>Please follow stepwise</h2>";
    include 'footer.php';exit;
}
$sql1 = "SELECT * FROM vendor_details where confirm_code='" . $passkey . "'";
$addresult1 = mysqli_query($mysqli, $sql1) or die(mysqli_error());
$row1 = mysqli_fetch_array($addresult1);
$id = $row1['vendor_id'];
?>


<link rel="stylesheet" href="loaderfile/css/demo.css">
<link rel="stylesheet" href="loaderfile/dist/ladda.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!--<script src="../src/jquery.ae.image.resize.js"></script>-->
<script type="text/javascript">

    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];

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

</script>   

<style>
    /***** zoom effect  ******/

    .slideshow {width:300px; height:auto; margin:128px auto;}
    .slideshow input {position:absolute; left:-9999px; display:none;}
    label.toggle {display:block; width:416px; height:auto; margin:10px; position:relative; cursor:pointer; float:left; z-index:10;
                  -webkit-transition: 0s 1s;
                  -moz-transition: 0s 1s;
                  -o-transition: 0s 1s;
                  transition: 0s 1s;
    }
    label.toggle img {display:block; width:416px; height:auto;
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

    }
    .test2
    {
        width:250px;
        height:250px;
    }

    /***** End zoom effect  ******/
</style>




<div class="steps mt30">
    <div class="container">
        <ul>
            <li class="step-one "><a href="#"><span>1</span>Step 1</a></li>
            <li class="step-one active"><a href="#"><span>2</span>Step 2</a></li>
            <li class="step-one "><a href="registration3"><span>3</span>Step 3</a></li>
            <li class="step-one"><a href="#"><span>4</span>Step 4</a></li>

           
        </ul>
        <div class="clearfix"></div>
        <div class="business-detail">
            <div class="col-sm-10 pdzero col-xs-12 over">
                <h4>Logo And Social Media</h4>
                <p>Upload your company logo and add all of your social media links.</p>
            </div>
            <div class="col-sm-2 col-xs-6 pdzero">
                <input type="button" onClick="window.location = 'registration3?completed=3&passkey=<?php echo $passkey; ?>';" value="Skip This Step" class="blu-btn bton skip-step" >
            </div>
        </div>

        <form id="defaultForm" name="BuisnessForm" method="post"  class="form-horizontal" enctype="multipart/form-data" action="regins2" onsubmit="return validateusersocialmedia()">
            <div class="col-md-8 pdzero register reg_Details  mt50 update-profile">                        
                <div class="regdetails">
                    <div class="row m0">
                    </div>
                    <div class="form-group">                    
                        <div class="fileinput fileinput-new" data-provides="fileinput">                            
                            <div class="col-sm-3 pdzero">
                                <span class="btn default btn-file">
                                    <span class="fileinput-new">
                                        Profile Picture: 
                                    </span>
                                </span>
                            </div>                            
                              <div class="col-sm-8 pdzero">
                                <input type="file" name="image"  id="image" value="company-logo_new.jpg" accept="image/x-png, image/gif, image/jpeg" />

                                <input type="hidden" name="DefaultImage" value="company-logo_new.jpg"/>
<!--                                     <div class="fileinput-preview mt10 thumbnail"  data-trigger="fileinput" style="width: 200px; height: 200px;"><img src="./images/company-logo_new.jpg" width="150" height="150" class="mb15"></div>-->
                                <div id="area"><img src="images/company-logo_new.jpg" width="150" height="150" class="mb15"></div>
                                <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput" ></a>
                            </div>
                        </div>                                            
<!--                                 <img src="webadmin/images/Company-logo.png" alt=""/>-->
                    </div>

                <!-- <div> <span id="lblError" style="color: red;"></span>  </div>-->


                    <div class="form-group">
                        <div class="col-sm-3 pdzero"><span>Instagram :</span></div>                                

                        <div class="col-sm-8 pdzero"> 
                            <input type="text" id="Instagram" name="instagram" value="<?php echo $row1['instagram']; ?>"> 
                            <label> <font color="#19b5bc" >Example : www.instagram.com/username </font></label>
                            <!--<div id="instagram_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Instagram URL</font></div>-->
                            <div id="instagram_error1" style="display:none"class="error_msg" >Please enter valid instagram URL.</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 pdzero"><span>Facebook  :</span></div>                                

                        <div class="col-sm-8 pdzero">
                            <input type="text" id="Facebook" name="facebook" value="<?php echo $row1['facebook']; ?>">
                            <label> <font color="#19b5bc">Example : www.facebook.com/username </font></label>
                            <!--<div id="facebook_error" style="display:none" class="error_msg">Please Enter Facebook URL</div>-->
                            <div id="facebook_error1" style="display:none" class="error_msg">Please enter valid facebook URL.</div>                        
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 pdzero"><span>Twitter  :</span></div>                                

                        <div class="col-sm-8 pdzero">  
                            <input type="text" id="Twitter" name="twitter" value="<?php echo $row1['twitter']; ?>">  
                            <label> <font color="#19b5bc">Example : www.twitter.com/username </font></label>
                            <!--<div id="twitter_error" style="display:none" class="error_msg">Please Enter Twitter URL</div>-->
                            <div id="twitter_error1" style="display:none" class="error_msg">Please Enter Valid Twitter URL.</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 pdzero"><span>Pinterest :</span></div>                                

                        <div class="col-sm-8 pdzero">
                            <input type="text" id="Pinterest" name="pinterest" value="<?php echo $row1['pinterest']; ?>">
                            <label> <font  color="#19b5bc">Example : www.pinterest.com/username </font></label>
                            <!--<div id="pinterest_error" style="display:none"class="error_msg">Please Enter Pinterest URL</div>-->
                            <div id="pinterest_error1" style="display:none"class="error_msg">Please enter valid pinterest URL.</div>
                        </div> 
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3 pdzero"><span>Business Description</span></div>

                        <div class="col-sm-8 pdzero">
                            <!--<label><font color="red">*</font> </label>-->
                            <textarea name="masesges" rows="2" cols="50" maxlength="700" id="busnessdisc"><?php echo $row1['b_description']; ?></textarea>
                            <lable style="color: red;">Note:Please write your business description in a continuous text (no multiple paragraphs) so it looks seamless in your vendor profile!</lable>
                        </div>
                    </div>

                    <input type="hidden" name="vid" value="<?php echo $passkey; ?>" >
                </div>
            </div>


            <div class="col-md-4 col-xs-12 pdzero">
                <div class="slideshow">

                    <input type="checkbox" id="image1" />
                    <label for="image1" class="toggle"> 
                        <div class="test2">
                            <div class="zhoom">
                            </div>
                            <img src="images/registration3_right.jpg">
                        </div>
                    </label>

                </div>
            </div>

            <div class="clearfix"></div>
            <script src="vendor_admin/js/binaryajax.js" type="text/javascript"></script>
            <script src="vendor_admin/js/canvasResize.js" type="text/javascript"></script>
            <script src="vendor_admin/js/exif.js" type="text/javascript"></script>
            <script>

            $().ready(function () {

                $("input[name='image1[]']").change(function (e) {

                    var area = $(this).parent("#plus-sign").find('#area');
                    var file = e.target.files[0];

                    canvasResize(file, {
                        width: 200,
                        height: 200,
                        crop: false,
                        quality: 80,
                        rotate: 0,
                        callback: function (data, width, height) {

                            var img = new Image();
                            img.onload = function () {

                                $(this).css({
                                    'margin': '10px auto',
                                    'width': width,
                                    'height': height
                                }).appendTo(area);

                            };
                            $(img).attr('src', data);

                        }
                    });

                });
                $('input[name=image]').change(function (e) {

                    var image = e.target.files[0];
                    // CANVAS RESIZING
                    canvasResize(image, {
                        width: 200,
                        height: 200,
                        crop: false,
                        quality: 80,
                        rotate: 0,
                        callback: function (data, width, height) {

                            var img = new Image();
                            img.onload = function () {

                                $(this).css({
                                    'margin': '10px auto',
                                    'width': width,
                                    'height': height
                                });
                                $('#area').html(this);

                            };
                            $(img).attr('src', data);

                        }
                    });

                });
            });

            </script>
            <div class="business-detail">

                <div class="col-sm-7 col-xs-12 pdzero mt30">
                    <div class="col-sm-12 pdzero">       

                        <section class="progress-demo">

                            <button  class="button row" name="submit" data-color="mint" data-style="expand-right" data-size="l">Next</button>
                            <a href="registration2?passkey=<?php echo $_GET['passkey']; ?>" >
                                <input type="Button" value="Back" class="button row" onclick="history.go(-1);"> </a>
                        </section>
<!--                     <input type="submit" value="Next" class="button row"  name="submit" > -->


                    </div>                
                </div>
            </div>
        </form>
    </div>
</div>
<?php // include './vendorlogin.php'; ?>
<div class="Retweet-deals">
            <div class="container-fluid pd0">
<!--                <div class="col-lg-12">
                    <div class="col-lg-5 col-sm-5 col-sm-offset-1 col-xs-6 bl pdr">
                        <h4 class="mt10">New vendor?</h4> <strong>New vendor? </strong>
                        <a href="registration.php" class="bton blu-btn">Register Here</a>
                    </div>
                    <div class="col-sm-6 pdzero1 col-xs-6">
                        <h4 class="mt10 mar-left">Already a LOVESTRUCK DEALS vendor?</h4>  <a href="" class="bton blu-btn" data-toggle="modal" data-target="#myModal3">Log In Here</a>
                    </div>
                </div>-->
                <div class="col-sm-12 mt50 pd0 about-deals">
                	<div class="container pt30 pb30">
                    	<div class="col-sm-12">
                            <h3>Why Lovestruck Deals?</h3>
                            <p>Lovestruck Deals a wedding website where you can find amazing wedding deals and wedding discounts offered by the industry's top wedding vendors. We make the wedding planning process easier by connecting couples with their favorite vendors. Brides are looking to plan a wedding on a budget and still get great vendors, and wedding professionals are always looking to book more events- it's a win win for everyone.</p>
                            <p>Lovestruck Deals is different than other wedding websites because it's super easy to use and makes it simple for both vendors to post their wedding deals and for couples to find and book them. Not only is Lovestruck Deals the biggest wedding website for wedding discounts and deals, but we also streamlined the communication between vendors and brides by implementing a live chat. With just one simple click, brides can chat live with vendors and find more about their wedding deals in just a few seconds.</p>
                        </div>
                        <div class="col-sm-12 our-best">
                            <h1 class="brd"><span>We invite you to browse our site and find the best wedding packages</span></h1>
                            <ul class="list-inline">
                            	<li><span>Inexpensive wedding venues</span></li>   
                                <li><span>Wedding photography deals</span></li>      
                                <li><span>Wedding Venue Deals</span></li>   
				<li><span>Wedding Dj Deals</span></li>       
                                <li><span>Wedding Floral Deals</span></li>        
                                <li><span>Wedding Dress Deals</span></li>   
				<li><span>Party Rental Deals</span></li>     
                                <li><span>Wedding Make Up Deals</span></li>   
                                <li><span>Wedding Planner Deals</span></li>  
                                <li><span> Wedding Limo Deals</span></li>  
                            </ul>
                            <p class="mt20"><b> and many more!</b></p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="mt30"><img src="images/line_163.png"></div>
        
                <div class="col-lg-12">
                    <h3>FOLLOW US FOR EXCLUSIVE WEDDING DEALS </h3>
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

        <div class="modal fade" id="myModal3" role="dialog">
            <div class="modal-dialog">            
            <div class="modal-content1">
                
            <form class="login-form" name="form" onSubmit="return login()" action="vendor_admin/loginins" method="post">
                <div class="modal-header">
                    <button type="button" class="close close1" data-dismiss="modal">&times;</button>
                    <img src="images/xaaza_logo.png" alt=" ">
                    <h4 class="modal-title">Vendor Login</h4>
                </div>
                                
                
                <div class="col-lg-12 pd0" id="message1" ><span class="alert-danger error_msg"><?php echo $message1;?></span></div> 
                
                <div class="modal-body1">                   
                    <input class="form-control form-control-solid placeholder-no-fix" type="text"  placeholder="Email Id " name="email" id="email1" autocomplete="off"/>
                    
                </div>
                
                <div class="modal-body1">                   
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" name="password" id="password1" placeholder="Password" autocomplete="off"/>
                    
                </div>
                
                <div class="modal-footer modal-footer1">
                    <button type="submit" name="submit" class="btn btn-default">Login</button>
                </div>
                
            </form>
                
            </div>
      
    </div>
  </div>  





<?php include 'footer.php'; ?>
<script src="loaderfile/dist/spin.min.js"></script>
<script src="loaderfile/dist/ladda.min.js"></script>

<!--<script>

            // Bind normal buttons
            Ladda.bind('.button-demo button', {timeout: 8000});

            // Bind progress buttons and simulate loading progress
            Ladda.bind('.progress-demo button', {
                callback: function (instance) {
                    var progress = 0;
                    var interval = setInterval(function () {
                        progress = Math.min(progress + Math.random() * 0.1, 1);
                        instance.setProgress(progress);

                        if (progress === 1) {
                            instance.stop();
                            clearInterval(interval);
                        }
                    }, 200);
                }
            });



</script>-->


<script src="image-css/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="image-css/bootstrap-fileinput.js"></script>        
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
