<?php
@session_start();
if (empty($_SESSION["name"])) {
    //require_once("index.php");
    ?>

    <SCRIPT LANGUAGE='JavaScript'>
        window.location.href = '../index.php'
    </SCRIPT>
    <?php
} else {
    include './vendor_sidebar.php';
    include '../config.php';
    ini_set('max_file_uploads', "50");
    if (!empty($_SESSION['name'])) {
        $s = $_SESSION['name'];
        $vid = $_SESSION['vendor_id'];

        $sessionSql = "SELECT c.categoryName,c.categoryId
                            FROM  `vendor_details` vd, category c
                            WHERE vd.`b_type` = c.categoryId
                            AND vd.`vendor_id`='" . $_SESSION['vendor_id'] . "'";
        $sessionQuery = mysqli_query($mysqli, $sessionSql);
        $sessRow = mysqli_fetch_array($sessionQuery);
        $categoryId = $sessRow['categoryId'];
        if (isset($_POST['submit'])) {
            foreach ($_FILES["image"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $venId = $_POST['venderid'];
                    $catID = $_POST['categoryid'];
                    $dt2 = date("Y-m-d H:i:s");
                    ini_set('memory_limit', '-1');
                    $image = imagecreatefromstring(file_get_contents($_FILES['image']['tmp_name'][$key]));
                    $exif = exif_read_data($_FILES['image']['tmp_name'][$key]);
                    if (!empty($exif['Orientation'])) {
                        switch ($exif['Orientation']) {
                            case 8:
                                 ini_set('memory_limit', '-1');
                                $image = imagerotate($image, 90, 0);
                                break;
                            case 3:
                                 ini_set('memory_limit', '-1');
                                $image = imagerotate($image, 180, 0);
                                break;
                            case 6:
                                 ini_set('memory_limit', '-1');
                                $image = imagerotate($image, -90, 0);
                                break;
                        }
                        imagejpeg($image, $_FILES['image']['tmp_name'][$key]);
                    }

                    $target_path1 = "../images/";
                    $imgname = rand(1000, 100000) . "-" . $_FILES['image']['name'][$key];
                    $target_path = $target_path1 . $imgname;
                    move_uploaded_file($_FILES['image']['tmp_name'][$key], $target_path);

                    $sql3 = "INSERT INTO vendor_gallery_images(vendor_id,categoryId,gallery_Img,addDate)VALUES('" . $venId . "','" . $catID . "','" . $imgname . "','" . $dt2 . "')";
                    $result3 = mysqli_query($mysqli, $sql3);
                }
            }
            if (!$result3) {
                ?>
    <script src="../js/sweetalert-dev.js" type="text/javascript"></script>
                <link href="../css/sweetalert.css" rel="stylesheet" type="text/css"/>
                <script>
      $(document).ready(function () {
                        swal({
                            title: "",
                            text: "Gallery image not added",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#19b5bc',
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        },
                        function () {
                            window.location.href = 'addGallary.php';
                        });
                     });
                </script>
                <?php
            } else {
               ?> 
            <script src="../js/sweetalert-dev.js" type="text/javascript"></script>
                <link href="../css/sweetalert.css" rel="stylesheet" type="text/css"/>
                <script>
         $(document).ready(function () {
                        swal({
                            title: "",
                            text: "Gallery image succesfully added",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: '#19b5bc',
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        },
                        function () {
                            window.location.href = 'managephotogallery.php';
                        });
            });
                </script>
                <?php
            }
        }
        ?>
         <script type="text/javascript">
            $(function ()
            {
                $("#uploadFile1").on("change", function ()
                {
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader)
                        return; // no file selected, or no FileReader support

                    if (/^image/.test(files[0].type))
                    { // only image file
                        var reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(files[0]); // read the local file

                        reader.onloadend = function () { // set image data as background of div
                            $("#imagePreview1").css("background-image", "url(" + this.result + ")");
                            $('#imagePreview1').addClass("imagePre");
                        }
                    }
                });
            });
            $(function ()
            {
                $("#uploadFile2").on("change", function ()
                {
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader)
                        return; // no file selected, or no FileReader support
                    if (/^image/.test(files[0].type))
                    { // only image file
                        var reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(files[0]); // read the local file

                        reader.onloadend = function () { // set image data as background of div
                            $("#imagePreview2").css("background-image", "url(" + this.result + ")");
                            $('#imagePreview2').addClass("imagePre");
                        }
                    }
                });
            });
            $(function () {
                $("#uploadFile3").on("change", function ()
                {
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader)
                        return; // no file selected, or no FileReader support
                    if (/^image/.test(files[0].type)) { // only image file
                        var reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(files[0]); // read the local file
                        reader.onloadend = function () { // set image data as background of div
                            $("#imagePreview3").css("background-image", "url(" + this.result + ")");
                            $('#imagePreview3').addClass("imagePre");
                        }
                    }
                });
            });
            $(function () {
                $("#uploadFile4").on("change", function ()
                {
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader)
                        return; // no file selected, or no FileReader support
                    if (/^image/.test(files[0].type)) { // only image file
                        var reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(files[0]); // read the local file
                        reader.onloadend = function () { // set image data as background of div
                            $("#imagePreview4").css("background-image", "url(" + this.result + ")");
                            $('#imagePreview4').addClass("imagePre");
                        }
                    }
                });
            });
            $(function () {
                $("#uploadFile5").on("change", function ()
                {
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader)
                        return; // no file selected, or no FileReader support

                    if (/^image/.test(files[0].type)) { // only image file
                        var reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(files[0]); // read the local file

                        reader.onloadend = function () { // set image data as background of div
                            $("#imagePreview5").css("background-image", "url(" + this.result + ")");
                            $('#imagePreview5').addClass("imagePre");
                        }
                    }
                });
            });
            $(function () {
                $("#uploadFile6").on("change", function ()
                {
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader)
                        return; // no file selected, or no FileReader support

                    if (/^image/.test(files[0].type)) { // only image file
                        var reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(files[0]); // read the local file

                        reader.onloadend = function () { // set image data as background of div
                            $("#imagePreview6").css("background-image", "url(" + this.result + ")");
                            $('#imagePreview6').addClass("imagePre");
                        }
                    }
                });
            });
            $(function () {
                $("#uploadFile7").on("change", function ()
                {
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader)
                        return; // no file selected, or no FileReader support

                    if (/^image/.test(files[0].type)) { // only image file
                        var reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(files[0]); // read the local file

                        reader.onloadend = function () { // set image data as background of div
                            $("#imagePreview7").css("background-image", "url(" + this.result + ")");
                            $('#imagePreview7').addClass("imagePre");
                        }
                    }
                });
            });
            $(function () {
                $("#uploadFile8").on("change", function ()
                {
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader)
                        return; // no file selected, or no FileReader support

                    if (/^image/.test(files[0].type)) { // only image file
                        var reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(files[0]); // read the local file

                        reader.onloadend = function () { // set image data as background of div
                            $("#imagePreview8").css("background-image", "url(" + this.result + ")");
                            $('#imagePreview8').addClass("imagePre");
                        }
                    }
                });
            });
        </script>



        <html>  
            <link rel="stylesheet" href="../loaderfile/css/demo.css">
            <link rel="stylesheet" href="../loaderfile/dist/ladda.min.css">
                <body>
                <section>
           <div class="views">
                        <div class="editsubadmin">
                            <h2>Manage Gallery Image</h2>
                            <div class="edit_form">                
                                <form name="ff" action="" enctype="multipart/form-data" method="post" >
                                    <input type="hidden" value="<?php echo $vid; ?>" name="venderid">
                                    <input type="hidden" value="<?php echo $categoryId; ?>" name="categoryid"> 
                                    <font color='#66cccc'>Minimum image size 300 x 300 pixels</font>
                                    <div class="business-detail">
                                        <div class="col-sm-12 col-xs-12 pdzro mt30">
                                            <div class="col-sm-3 col-xs-6 upload2" >                   
                                                <div class=""  id=""  > 
                                                    <div id="plus-sign">
                                                        <input type="file" id="uploadFile1" name="image[]" accept="image/x-png, image/gif, image/jpeg">
                                                        <DIV id="area"></DIV>
                                                    </div>
                                                    <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a> 
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-xs-6 upload2" >                   
                                                <div class=""  id=""  > 
                                                    <div id="plus-sign">
                                                        <input type="file" id="uploadFile2" value="Choose file" name="image[]"  accept="image/x-png, image/gif, image/jpeg">
                                                        <DIV id="area"></DIV>
                                                    </div>

                                                    <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a> 
                                                </div>
                                            </div>                                                                                              

                                            <div class="col-sm-3 col-xs-6 upload2" >                   
                                                <div class=""  id=""  > 
                                                    <div id="plus-sign">
                                                        <input type="file" id="uploadFile3" name="image[]" accept="image/x-png, image/gif, image/jpeg">
                                                        <DIV id="area"></DIV>
                                                    </div>

                                                    <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a> 
                                                </div>
                                            </div>

                                            <div class="col-sm-3 col-xs-6 upload2" >                   
                                                <div class=""  id=""  > 
                                                    <div id="plus-sign">
                                                        <input type="file" id="uploadFile4" name="image[]" accept="image/x-png, image/gif, image/jpeg">
                                                        <DIV id="area"></DIV>
                                                    </div>
                                                    <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a> 
                                                </div>
                                            </div>

                                        </div>    
                                        <div class="col-sm-12 col-xs-12 pdzro m0 mt30">
                                            <div class="col-sm-3 col-xs-6 upload2" >                   
                                                <div class=""  id=""  > 
                                                    <div id="plus-sign">
                                                        <input type="file" id="uploadFile5" name="image[]" accept="image/x-png, image/gif, image/jpeg">
                                                        <DIV id="area"></DIV>
                                                    </div>
                                                    <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a> 
                                                </div>
                                            </div>

                                            <div class="col-sm-3 col-xs-6 upload2" >                   
                                                <div class=""  id=""  > 
                                                    <div id="plus-sign">
                                                        <DIV id="area"></DIV>
                                                        <input type="file" id="uploadFile6" value="Choose file" name="image[]"  accept="image/x-png, image/gif, image/jpeg">
                                                    </div>
                                                    <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a> 
                                                </div>
                                            </div>                                                                                              

                                            <div class="col-sm-3 col-xs-6 upload2" >                   
                                                <div class=""  id=""  > 
                                                    <div id="plus-sign">
                                                        <DIV id="area"></DIV>
                                                        <input type="file" id="uploadFile7" name="image[]" accept="image/x-png, image/gif, image/jpeg">
                                                    </div>
                                                    <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a> 
                                                </div>
                                            </div>

                                            <div class="col-sm-3 col-xs-6 upload2" >                   
                                                <div class=""  id=""  > 
                                                    <div id="plus-sign">
                                                        <input type="file" id="uploadFile8" name="image[]" accept="image/x-png, image/gif, image/jpeg">
                                                        <DIV id="area"></DIV>
                                                    </div>
                                                    <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a> 
                                                </div>
                                            </div>

                                        </div> 
                                      
                                        <div class="progress-demo mt20">
                                            <div class="form-group">
                                                <button  class="button row" name="submit" id="submit" data-color="mint" data-style="expand-right" data-size="l">Submit</button>
                                                <a href="managephotogallery.php" class="ml15"><input type="button" value="Back"> </a>
                                            </div>
                                        </div>
                                    </div>  
                                </form>
                            </div>        
                        </div>
                    </div>
                </div>
            </section>
        </BODY>
        <script src="../loaderfile/dist/spin.min.js"></script>
        <script src="../loaderfile/dist/ladda.min.js"></script>
        <script src="js/binaryajax.js" type="text/javascript"></script>
        <script src="js/canvasResize.js" type="text/javascript"></script>
        <script src="js/exif.js" type="text/javascript"></script>
        <script>
            $().ready(function () {

                $("input[name='image[]']").change(function (e) {
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
            });
        </script>
        <script>
            // Bind normal buttons
            Ladda.bind('.button-demo button', {timeout: 5000});
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
        </script>
        <script type="text/javascript">
            // validations of image size
            //image1   
            var _URL = window.URL || window.webkitURL;
            //debugger;
            $("#image").change(function (e) {
                var file, img;
                //debugger;

                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function () {										//debugger;
                        var w = this.width;

                        var h = this.height;

                        if (w > 298 && h > 298)
                        {

                            //alert("valid image");
                        } else
                        {

                            $("#image").val("");
                            $("#del").click();
                            $("#img").val("");
                            alert("Invalid Image must select up to 300 * 300");

                            //$('#popup_upload').hide();
                            // window.location.href='addphotogallery.php';
                        }

                    };
                    img.onerror = function () {
                        alert("not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);
                }
            });


            //end image
            //image2               
            $("#image1").change(function (e) {
                var file, img;
                //debugger;

                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function () {										//debugger;
                        var w = this.width;

                        var h = this.height;

                        if (w > 298 && h > 298)
                        {

                            //alert("valid image");
                        } else
                        {
                            // alert(w);
                            $("#image1").val("");
                            $("#del1").click();
                            $('#img1').val("");
                            alert("Invalid Image must select up to 300 * 300");
                            //$('#popup_upload').hide();
                            // window.location.href='addphotogallery.php';
                        }

                    };
                    img.onerror = function () {
                        alert("not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);
                }
            });
            $("#image2").change(function (e) {
                var file, img;
                //debugger;

                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function () {										//debugger;
                        var w = this.width;

                        var h = this.height;

                        if (w > 298 && h > 298)
                        {

                            //alert("valid image");
                        } else
                        {
                            // alert(w);
                            $("#image2").val("");
                            $("#del2").click();
                            $('#img2').val("");
                            alert("Invalid Image must select up to 300 * 300");
                            //$('#popup_upload').hide();
                            // window.location.href='addphotogallery.php';
                        }

                    };
                    img.onerror = function () {
                        alert("not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);
                }
            });
            $("#image3").change(function (e) {
                var file, img;
                //debugger;

                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function () {										//debugger;
                        var w = this.width;

                        var h = this.height;

                        if (w > 298 && h > 298)
                        {

                            //alert("valid image");
                        } else
                        {
                            // alert(w);
                            $("#image3").val("");
                            $("#del3").click();
                            $('#img3').val("");
                            alert("Invalid Image must select up to 300 * 300");
                            //$('#popup_upload').hide();
                            // window.location.href='addphotogallery.php';
                        }

                    };
                    img.onerror = function () {
                        alert("not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);
                }
            });
            $("#image4").change(function (e) {
                var file, img;
                //debugger;

                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function () {										//debugger;
                        var w = this.width;

                        var h = this.height;

                        if (w > 298 && h > 298)
                        {

                            //alert("valid image");
                        } else
                        {
                            // alert(w);
                            $("#image4").val("");
                            $("#del4").click();
                            $('#img4').val("");
                            alert("Invalid Image must select up to 300 * 300");
                            //$('#popup_upload').hide();
                            // window.location.href='addphotogallery.php';
                        }

                    };
                    img.onerror = function () {
                        alert("not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);
                }
            });

        </script>



                                <!--                                            <script src="../image-css/jquery.min.js" type="text/javascript"></script>
                                                                            <script type="text/javascript" src="../image-css/bootstrap-fileinput.js"></script>        
                                                                            <script src="js/jquery.min.js"></script>
                                                                            <script src="js/bootstrap.js"></script>  --> 
        <script src="../image-css/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../image-css/bootstrap-fileinput.js"></script>        
        <!--   <script src="../js/jquery.min.js"></script>-->
        <script src="../js/bootstrap.js"></script>


        <?php
    }
}
?>
</html>
</body>



