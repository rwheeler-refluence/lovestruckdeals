<?php
    @session_start();
    if (empty($_SESSION["name"])) 
    { 
?>
        <SCRIPT LANGUAGE='JavaScript'>                   
            window.location.href='../index.php'
        </SCRIPT>
<?php
    } 
    else 
    {
        include './vendor_sidebar.php';
        include './validation_vendor.php';
        include '../config.php';
        $id = $_GET['id'];
//        
//        function dateDiff($start, $end) 
//        {
//            $start_ts = strtotime($start);
//            $end_ts = strtotime($end);
//            $diff = $end_ts - $start_ts;
//            return round($diff / 86400);                                    
//        }

        if (!empty($_SESSION['name'])) 
        {
            
            $sessionSql = "SELECT c.categoryName,c.categoryId,vd.vendor_id,vd.fname,vd.c_city,vd.c_regionstate,vd.latitude,vd.longitude
                            FROM  `vendor_details` vd, category c
                            WHERE vd.`b_type` = c.categoryId
                            AND vd.`vendor_id`='" . $_SESSION['vendor_id'] . "'";                     
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

                                                            
        }    

        
        
        $queadvfirst = "select count(*) as vendorcount from advertisement where vendor_id='" . $_SESSION['vendor_id'] . "'";
        $resultadvfirst = mysqli_query($mysqli, $queadvfirst);
        $row = mysqli_fetch_array($resultadvfirst);            
        $countvendor = $row[0];
        if ($countvendor > 0) 
        {                               
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
                        if (oInput.type == "file") 
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
                    <section>
                        <div class="col-md-12 pd0">
                            
                      
                        
                            <font class="prof_title"><h2>Post Deals</h2></font> 
                     
                        </div>
                        

                                            
                        <form method="post" action="uploadspolight.php" enctype="multipart/form-data"  id="adddeals" name="adddeals" onchange="return Validate(this)" onSubmit="return validateaddeals()">
                                <input type="hidden" value="<?php echo $venderID; ?>" name="venderid">
                                <input type="hidden" value="<?php echo $fname; ?>" name="username">
                                <input type="hidden" value="<?php echo $categoryId; ?>" name="categoryid">                          
                                <input type="hidden" value="<?php echo $state; ?>" name="stateid">
                                <input type="hidden" value="<?php echo $city; ?>" name="cityid">
                                <input type="hidden" value="<?php echo $isdelete; ?>" name="isdelete">
                                <input type="hidden" value="<?php echo $latitude; ?>" name="latitude">
                                <input type="hidden" value="<?php echo $longitude; ?>" name="longitude">
                                
                                <div class="views">
                                    
                                    
                                    <div class="form-group">                    
                                                <div class="fileinput fileinput-new" data-provides="fileinput">                            
                                                    <div class="col-sm-2">
                                                    <!--<span class="btn default btn-file">-->
                                                        <span class="fileinput-new">
                                                            <label>  Image : </label> 
                                                        </span>
                                                        <!--</span>-->
                                                    </div>                            
                                                    <div class="col-sm-8">
                                                        
                                                        <input type="file" name="image"  id="image"class="easyui-validatebox" required accept="image/*"/>
<!--                                                        <input type="hidden" name="DefaultImage" value="<?php echo $row1['profile_image']; ?>">-->
                                                        <div class="fileinput-preview mt10 thumbnail"  data-trigger="fileinput" style="width: 200px; height: 200px;" ></div>
                                                        <!--<img src="../images/Company-logo.png" width="150" height="150" class="mb15">-->
                                                        <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"></a>
                                                    </div>
                                                </div>                                            
                                            </div>

                                    <div class="form-group">  
                                        <div class="col-md-2">        
                                            <label> Deal Title:</label> 
                                        </div>                 
                                        <div class="col-md-8">
                                            <input type="text"  size="40" value="" name="dealtitle" class="easyui-validatebox" required id="dealtitle" maxlength="50" data-bind="" >
                                            <br> 
                                            <label><font color="red" >Maximum 50 Characters</font></label>
                                        </div>
                                        
                                    </div>  
                                    
                                   
                                    
                                    <div class="form-group">     
                                        <div class="col-md-2">         
                                           <label>  Description:</label>    
                                        </div>
                                        <div class="col-md-8">                  
                                            <textarea  rows="8"  class="easyui-validatebox" required size="50" type="text" name="description" id="description" maxlength="250"><?php // echo $description; ?></textarea>          
                                            <!--<div id="text_error" style="display:none" class="error_msg"><font color="red"> Please give a brief description of your deal </font></div>-->
                                            <label><font color="red">Maximum 250 Characters</font></label>
                                        </div>
                                    </div>                                       
                                    <div class="form-group">  
                                        <div class="col-xs-offset-2">
                                        <input name="submit" class="ml15" type="submit" value="ADD">
                                        </div>
                                    </div>                                       
                                </div>                                                         
                            </form>                                                        
                        </div>
                    </section>
                </body>
<?php                                
            } 
            else
            {
?>          
           
            
            <head>
  
                   <link type="text/css" href="css/style.css" rel="stylesheet"/>
           
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
           </head>           
              <body>
                    <section>

                         <div class="views">
                          <div class="editsubadmin">
                          	 <h2>Post Deals</h2>	           
                            <div class="edit_form">
                            <form method="post" action="upload.php" enctype="multipart/form-data"  id="adddeals" name="adddeals" onSubmit="return validateaddeals()">
                                <input type="hidden" value="<?php echo $venderID; ?>" name="venderid">
                                <input type="hidden" value="<?php echo $fname; ?>" name="username">
                                <input type="hidden" value="<?php echo $categoryId; ?>" name="categoryid">                               
                                <input type="hidden" value="<?php echo $state; ?>" name="stateid">
                                <input type="hidden" value="<?php echo $city; ?>" name="cityid">
                                <input type="hidden" value="<?php echo $latitude; ?>" name="latitude">
                                <input type="hidden" value="<?php echo $longitude; ?>" name="longitude">
                            

                                        <div class="form-group">                    
                                                <div class="fileinput fileinput-new" data-provides="fileinput">                            
                                                    <div class="col-sm-2">
                                                    <!--<span class="btn default btn-file">-->
                                                        <span class="fileinput-new">
                                                            CImage : 
                                                        </span>
                                                        <!--</span>-->
                                                    </div>                            
                                                    <div class="col-sm-8">
                                                        <input type="file" class="easyui-validatebox" required  name="image" id="image" accept="image/*">
<!--                                                        <input type="hidden" name="DefaultImage" value="<?php echo $row1['profile_image']; ?>">-->
                                                        <div  class="fileinput-preview mt10 thumbnail"  data-trigger="fileinput" style="width: 200px; height: 200px;" ></div>
                                                        <!--<img src="../images/Company-logo.png" width="150" height="150" class="mb15">-->
                                                        <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"></a>
                                                    </div>
                                                </div>                                            
                                            </div>
                                                                
                                    <div class="form-group">  
                                        <div class="col-md-2">        
                                            <label> Deal Title:</label> 
                                        </div>                 
                                         <div class="col-md-8">
                                             <input type="text"  size="40" class="easyui-validatebox" value="" name="dealtitle"  id="dealtitle" data-bind="" maxlength="50">
                                        <div id="dealtitle_error" style="display:none"class="error_msg" ><font color="red"> Please enter Deal Title</font></div>
                                        <div id="dealtitle_error1" style="display:none"class="error_msg" ><font color="red"> Please enter a valid Deal Title</font></div>
                                          <br/>  <label><font color="red" >Maximum 50 Characters Only</font></label>
                                         </div>
                                    </div> 
                                    
                                    <div class="form-group">  
                                        <div class="col-md-2">        
                                            <label>  Description:</label> 
                                        </div>                 
                                         <div class="col-md-8">
                                             <textarea  rows="8" cols="70"  size="50" type="text" name="description"  class="easyui-validatebox"  id="description" maxlength="250"><?php echo $description; ?></textarea>          
                                        <div id="text_error" style="display:none"class="error_msg" ><font color="red"> Please Write Description</font></div>
                                     <label><font color="red" >Maximum 250 Characters Only</font></label>
                                         </div>
                                    </div> 
                                    
                                    <div class="form-group">
                                        <div class="col-xs-offset-2">
                                            <input name="submit" type="submit" class="ml15" value="ADD"><br> 
                                             <h3 class="ml15"><font color="#19b5bc"> first deal is free </font></h3>
                                        </div>
                                    </div>
                            
                                   
                            </form>
                            </div>
                        </div>                                                
                        </div>
                    </section>
                </body>
<!--                <script type="text/javascript">
                var _URL = window.URL || window.webkitURL;

                $("#photo").change(function(e) 
                {
                    var file, img;
                    if ((file = this.files[0])) 
                    {
                        img = new Image();
                        img.onload = function() 
                        {        												        												//debugger;
                            var w=this.width;
                            var h=this.height;        											
                            if (w<=400 && h<=400)
                            {			        												
                                //alert("valid image");
                            }
                            else
                            { 
                                alert("Invalid Image must select 400 * 400");
                                $('#popup_upload').hide();
                                // window.location.href='editdeals.php';
                            }        										  
                        };
                        img.onerror = function() 
                        {
                            alert( "not a valid file: " + file.type);
                        };
                        img.src = _URL.createObjectURL(file);
                    }
                });	                          
                //end image

            </script>-->
<?php                                         
            }                                
    }                
?>        
<script src="../image-css/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../image-css/bootstrap-fileinput.js"></script>        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>  
        
           