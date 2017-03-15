<?php
    @session_start();

//        include './vendor_sidebar.php';
         include './vendor_admin/validation_vendor.php';
         include './config.php';
         include 'header.php';
         include 'mailFunctions.php';
 
    $passkey=$_GET['passkey'];
    if($_GET['passkey']==''){
    echo "<h2 style='margin: 85px;text-align: -webkit-center;'>Please follow stepwise</h2>";
    include 'footer.php';exit;
}
    $sql1="SELECT * FROM vendor_details where confirm_code='".$passkey."'";  
    $addresult1 = mysqli_query($mysqli, $sql1) or die(mysqli_error());    
    $row1=mysqli_fetch_array($addresult1); 
    $vendor_id=$row1['vendor_id']; 
//        
//        function dateDiff($start, $end) 
//        {
//            $start_ts = strtotime($start);
//            $end_ts = strtotime($end);
//            $diff = $end_ts - $start_ts;
//            return round($diff / 86400);                                    
//        }

//        if (!empty($_SESSION['name'])) 
//        {
            
             $sessionSql = "SELECT c.categoryName,c.categoryId,vd.vendor_id,vd.fname,vd.c_city,vd.c_regionstate,vd.latitude,vd.longitude
                            FROM  `vendor_details` vd, category c
                            WHERE vd.`b_type` = c.categoryId
                            AND vd.`vendor_id`='" . $vendor_id . "'";                  
            $sessionQuery = mysqli_query($mysqli, $sessionSql);
            $sessRow = mysqli_fetch_array($sessionQuery);

            
            $venderID = $sessRow['vendor_id'];
            $state = $sessRow['c_regionstate'];
            $city = $sessRow['c_city'];
            $fname = $sessRow['fname'];
            $categoryName = $sessRow['categoryName'];
            $categoryId = $sessRow['categoryId'];
            $isdelete=$sessRow['is_delete'];
            $latitude=$sessRow['latitude'];
            $longitude=$sessRow['longitude'];

                                                            
//        }    
//
        
        
        $queadvfirst = "select count(*) as vendorcount from advertisement where vendor_id='" . $vendor_id . "' and is_delete='0'";
        $resultadvfirst = mysqli_query($mysqli, $queadvfirst);
        $row = mysqli_fetch_array($resultadvfirst);            
//        $countvendor = $row[0];
//        if ($countvendor > 0) 
//        { 
        
        //email to vendor 
        $sqlvendorselect="select v.fname,v.profile_image,v.c_name,ca.categoryName,v.v_email,v.c_telephone,v.c_telephone1,v.c_telephone2,s.sname,c.cityName,v.lname 
                      from vendor_details v,category ca,state s,city c
                      WHERE v.b_type=ca.categoryId and v.c_regionstate=s.sid and v.c_city=c.cityId and v.confirm_code='".$passkey."'";  

    $resultvendor=  mysqli_query($mysqli, $sqlvendorselect);
    $row=  mysqli_fetch_row($resultvendor);
   $name=$row[0];$profileImage=$row[1];$companyName=$row[2];$categoryName=$row[3];
   $vendorEmail=$row[4];$vendeorNo1=$row[5];$vendeorNo2=$row[6];$vendeorNo3=$row[7];
   $stateName=$row[8];$cityName=$row[9];$sarName=$row[10];
   
 $to = $vendorEmail;
$cc='info@lovestruckdeals.com';
//$cc='xxaaza@gmail.com';
    //$from = 'rahulp@wdipl.com';
    
    $from = 'Lovestruckdeals';
    $subject ="New Vendor Registration";
   


$path=$_SERVER['SERVER_NAME'];

$serverurl = "https://" . $path ;
$body.='<tbody>
   <tr>
              <td style="padding:20px 20px 20px;" valign="top"><table border="0" cellpadding="20" cellspacing="0" width="600" style="border:1px solid #f5f5f5;">
                  <!---->
                  <tbody>
                  <tr>
                      <td colspan="2" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0" width="500" bgcolor="#fff">
                          <!--bgcolor="#ECEEF1"-->
                          
                     </table>
                     </td>
                     </tr>
                    <tr>
                      <td align="center" valign="top">
                      <table border="0" cellpadding="10" cellspacing="0" style="border:1px solid #f5f5f5; margin:15px 0;width:100%;">
                          <tbody>
                            <tr>
                              <td colspan="3" height="45" style="font: 18px arial, helvetica, sans-serif; color:#fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px;border-bottom-style: solid;background-color:#69c9ca;font-size-adjust: none; font-stretch: normal; font-weight:600;"> Vendor Login Details</td>
                            </tr>
                            <tr>
                           
                                  <td height="15" style="font: 14px arial, helvetica, sans-serif; width: 100%;float:left; color:#333;font-size-adjust: none; font-stretch: normal; text-align: justify;padding-left:3px;" valign="middle"> Vendor Profile Image </td>
                                   <td style="padding: 12px 0pt 12px 12px;width:100%;float:left;" valign="top"> <img src= "' . $serverurl . '/images/' . $profileImage . '"height="150px" width="150px"></td>
                                 
                              </tr>
                            <tr>
                              <td align="left" height="40" style="font: 14px arial, helvetica, sans-serif; width: 176px; color:#333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Vendor Name </td>
                              <td align="left" style="font: 14px arial, helvetica, sans-serif; width:  auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '. $name .'&nbsp;'.$sarName.'</td>
                             <!-- <td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                            <tr>
                              <td align="left" height="40" style="font: 14px arial, helvetica, sans-serif; width: 176px; color:#333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Company Name </td>
                              <td align="left" style="font: 14px arial, helvetica, sans-serif; width: auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '. $companyName .'</td>
                             <!-- <td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                            <tr>
                              <td align="left" height="40" style="font: 14px arial, helvetica, sans-serif; width: 176px; color:#333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Vendor Category </td>
                              <td align="left" style="font: 14px arial, helvetica, sans-serif; width:  auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '. $categoryName .'</td>
                              <!--<td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                            <tr>
                              <td align="left" height="40" style="font: 14px arial, helvetica, sans-serif; width: 176px; color:#333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Vendor Email Id </td>
                              <td align="left" style="font: 14px arial, helvetica, sans-serif; width: auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '. $vendorEmail .'</td>
                             <!-- <td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                            
                            <tr>
                              <td align="left" height="40" style="font: 14px arial, helvetica, sans-serif; width: 176px; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Vendor Location </td>
                              <td align="left" style="font:14px arial, helvetica, sans-serif; width: auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '.$stateName.',&nbsp;'.$cityName.' </td>
                               <!--<td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                           <tr>
                              <td align="left" height="30" style="font: 14px arial, helvetica, sans-serif; width: 176px; color:#333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle">Vendor Contact No </td>
                              <td align="left" style="font: 14px arial, helvetica, sans-serif; width: auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width:1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '. $vendeorNo1 .'-'.$vendeorNo2.'-'.$vendeorNo3.'
                              
                              </td>
                            <!--  <td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                          </tbody>
                        </table>
                       </td>
                    </tr>
                   <!-- <tr>
                      <td height="30"></td>
                    </tr>-->
                    <tr>
                      <td align="left" style="font: 14px arial, helvetica, sans-serif; padding:10px 15px; color:#333; font-size-adjust: none; font-stretch: normal;" valign="top"> Thanks,<br />
                        <br />
                        LOVESTRUCK DEALS Support</td>
                    </tr>
                  </tbody>
                   <!-- footer-->
                  <tr> <td bgcolor="#f06597" colspan="2" height="40" style="padding-right: 15px; padding-left: 15px;" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" colspan="2">
                      <tbody>
                        <tr>
                          <td align="center"><a href="https://www.lovestruckdeals.com/" style="font: 14px arial, helvetica, sans-serif; color: rgb(255, 255, 255); text-decoration: none; font-size-adjust: none; font-stretch: normal;" target="_blank">www.lovestruckdeals.com</a></td>
                        </tr>
                      </tbody>
                  
                                
                  </table>
                </td>
                </tr>
                </table>
                </td>
            </tr>
     
  </tbody>
</table>';
sendgridEmail($to,$cc,$from, $subject, $body);
        
        
        
?> 

        <head>

                <link type="text/css" href="css/style.css" rel="stylesheet"/>
           
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
             <script type="text/javascript">
        
                var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
                function Validate(oForm) 
                {
                    var arrInputs = oForm.getElementsByTagName("input");
                    for (var i = 0; i <= arrInputs.length; i++) 
                    {
                        var oInput = arrInputs[i];
                        if (oInput.type === "file") 
                        {
                            var sFileName = oInput.value;
                            if (sFileName.length > 0) 
                            {
                                var blnValid = false;
                                for (var j = 0; j < _validFileExtensions.length; j++) 
                                {
                                    var sCurExtension = _validFileExtensions[j];
                                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) 
                                    {
                                        blnValid = true;
                                        break;
                                    }
                                }
                                if (!blnValid) 
                                {
                                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                                    return false;
                                }
                            }
                        }
                    }                
                    return true;
                }    
            </script>
           
        </head>                               
                <body>
               
                </body>
<?php                                
//            } 
//            else
//            {
?>          
     
            
            <head>
  
            <!--       <link type="text/css" href="css/style.css" rel="stylesheet"/>-->
           
            <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
           </head>           
              <body>
                    <section>
                          <div class="clearfix"></div>
                         
                              <div class="container">    
                                  <ul>
            <li class="step-one "><a href="#"><span>1</span>Step 1</a></li>
            <li class="step-one "><a href="#"><span>2</span>Step 2</a></li>
            <li class="step-one "><a href="#"><span>3</span>Step 3</a></li>
            <li class="step-one active"><a href="registration5"><span>4</span>Step 4</a></li>

           
        </ul>
        <div class="col-md-12 register pdzero reg_Details mt30 step4">
            <div class="col-sm-8 pdzero col-xs-12 over">
                <h4>Post a deal</h4>
                <b><p>Upload your free deal</p></b>
                
            </div>
            <div class="col-sm-4 col-xs-6 pdzero">
                <input type="button" onClick="window.location = 'vendor_admin/dashboard?completed=4&passkey=<?php echo $passkey; ?>';" value="Skip This Step" class="blu-btn bton skip-step" >
            </div>
           
        </div>     
<!--              <div class="col-md-4 pdzero register reg_Details  mt50 update-profile">
                  
        </div>-->
                                    <div class="col-md-12 pdzero register reg_Details  mt50 update-profile">
                                <form  method="post" action="vendor_admin/uploadfree" enctype="multipart/form-data"  id="adddeals" name="adddeals" onSubmit="return validateaddeals()">
                                 
                                <input type="hidden" value="<?php echo $venderID; ?>" name="venderid">
                                <input type="hidden" value="<?php echo $fname; ?>" name="username">
                                <input type="hidden" value="<?php echo $categoryId; ?>" name="categoryid">                               
                                <input type="hidden" value="<?php echo $state; ?>" name="stateid">
                                <input type="hidden" value="<?php echo $city; ?>" name="cityid">
                                <input type="hidden" value="<?php echo $latitude; ?>" name="latitude">
                                <input type="hidden" value="<?php echo $longitude; ?>" name="longitude">
                            
                                <div class="col-md-4 pdzero">
                                        <div class="form-group ">                    
                                                <div class="imageinput imageinput-new" data-provides="imageinput">                            
                                                    <div class="col-sm-4">
                                                    <!--<span class="btn default btn-image">-->
                                                        <span class="fileinput-new">
                                                            <label> Image : </label> 
                                                        </span>
                                                        <!--</span>-->
                                                    </div>                            
                                                    <div class="col-sm-8 pdzero">
<!--                                                        <input type="hidden" name="DefaultImage" value="<?php echo $row1['proimage_image']; ?>">-->
                                                        <div id="area"><img src="images/default_logo.jpg" width="150" height="150" class="mb15"></div>
                                                        <input type="hidden" name="DefaultImage" value="default_logo.jpg"/>
                                                        <!--<label class="fileContainer"> Click here to trigger the file uploader <input type="file" class="easyui-validatebox" required  name="image" id="image" accept="image/*"></label>--> 
                                                        <input type="file" class="easyui-validatebox" value="default_logo.jpg" name="image" id="image" accept="image/*" required="required">
                                                        <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput" ></a>
                                                    </div>
                                                    <h3>upload your deal image</h3>
                                                    <p class="con">You can always use current image as a placeholder and upload your own picture at a later time from your vendor dashboard.</p>
                                                <div class="free-deal">
                                                    <p><b>FIRST DEAL IS FREE</b></p>
                                            </div>
                                                </div> 
                                            
                                            </div>
                                </div>
                                <div class="col-md-8 pdzero">                  
                                    <div class="form-group deal">  
                                        <div class="col-sm-12 pdzero">        
                                            <label> Deal Title:</label> 
                                        </div>                 
                                         <div class="col-sm-12 pdzero">
                                             <input type="text"  size="40" class="easyui-validatebox" value="" name="dealtitle"  id="dealtitle" data-bind="" maxlength="50">
                                        <div id="dealtitle_error" style="display:none"class="error_msg" ><font color="red"> Please enter deal title.</font></div>
                                        <div id="dealtitle_error1" style="display:none"class="error_msg" ><font color="red"> Please enter a valid deal title.</font></div>
                                          <br/>  <label><font color="#66cccc" >Maximum 50 Characters</font></label>
                                         </div>
                                    </div> 
                                    
                                    <div class="form-group description">  
                                        <div class="col-sm-12 pdzero">        
                                            <label>  Description:</label> 
                                        </div>                 
                                         <div class="col-sm-12 pdzero">
                                             <textarea  rows="8" cols="70"  size="50" type="text" name="description"  class="easyui-validatebox"  id="description" maxlength="250"><?php echo $description; ?></textarea>          
                                        <div id="text_error" style="display:none"class="error_msg" ><font color="red"> Please write description.</font></div>
                                     <label><font color="#66cccc" >Maximum 250 Characters</font></label>
                                         </div>
                                    </div> 
                                  <input type="hidden" name="vid" value="<?php echo $passkey; ?>" >       

                                    <div class="form-group">
                                        <div class="col-xs-offset">
                                            <input name="submit" type="submit" class="blu-btn sign_up button row mt30" value="signup and post a deal" style="width: 220px !important;" ><br> <br>
                                        </div>
                                    </div>
                            
                                 
                              </form></div> 
                            </div>
                        </div>  
                          <div class="container cat1 mt30">
                              
                     <h3 class="ml15"><font color="#66cccc">Benefits of posting a deal</font></h3>
                    
                     <div class="col-md-4">
                          <div class="graphic_block">
                        <div class="circle">
                            
                            <img src="images/fill-empty-calender.png">
                            
                             </div>
                         <p>FILL EMPTY CALENDAR DATES</p>
                     </div>
                         
                     </div>
                     <div class="col-md-4">
                         <div class="graphic_block">
                         <div class="circle">
                             <img src="images/boost-your-business.png">
                             </div>
                             <p>BOOST YOUR BUSINESS</p></div>
                     </div>
                     <div class="col-md-4">
                         <div class="graphic_block">
                         <div class="circle">
                             <img src="images/expand.png">
                             </div>
                             <p>EXPAND YOUR CLIENT BASE</p></div>
                     </div>
                 </div>
                          <div class="container cat2">
                              
                     <h3 class="ml15"><font color="#66cccc">Types of deals our couples love</font></h3>
                     <div class="col-md-4 col-xs-6">
                         <div class="circle-bottom">
                             <img src="images/discount.png">
                             <p>
                               DISCOUNTS
                             </p>
                             </div>
                         
                     </div>
                     <div class="col-md-4 col-xs-6">
                         <div class="circle-bottom">
                             <img src="images/bundle-deal.png">
                             <p>
                                BUNDLE DEALS
                             </p>
                             </div>
                     </div>
                     <div class="col-md-4 col-xs-6">
                         <div class="circle-bottom">
                             <img src="images/free-upgrade.png">
                             <p>
                                FREE UPGRADE
                             </p>
                             </div>
                     </div>
                        <div class="col-md-4 col-xs-6">
                         <div class="circle-bottom">
                             <img src="images/give-away.png">
                             <p>
                                GIVEAWAY
                             </p>
                             </div>
                     </div>
                        <div class="col-md-4 col-xs-6">
                         <div class="circle-bottom">
                             <img src="images/free-gifts.png">
                             <p>
                                FREE GIFTS
                             </p>
                             </div>
                     </div>
                        <div class="col-md-4 col-xs-6">
                         <div class="circle-bottom">
                             <img src="images/free-trail.png">
                             <p>
                                FREE TRIALS
                             </p>
                             </div>
                     </div>
                 </div>
                          </div>
                    </section>
                </body>

<?php                                         
//            }                              
//    }                
?>  
       <?php include 'footer.php'; ?>  
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
<script src="../image-css/jquery.min.js" type="text/javascript"></script>
<!--        <script type="text/javascript" src="../image-css/bootstrap-imageinput.js"></script>        -->
        <script src="<?php echo ROOT_PATH; ?>vendor_admin/js/jquery.min.js"></script>
        <script src="<?php echo ROOT_PATH; ?>vendor_admin/js/bootstrap.js"></script>  
        <script src="<?php echo ROOT_PATH; ?>vendor_admin/js/binaryajax.js" type="text/javascript"></script>
        <script src="<?php echo ROOT_PATH; ?>vendor_admin/js/canvasResize.js" type="text/javascript"></script>
        <script src="<?php echo ROOT_PATH; ?>vendor_admin/js/exif.js" type="text/javascript"></script>