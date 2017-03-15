<?php
include 'header.php';
$vid = 1; //$_GET['vid'];
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

    function setInfo(i, e) {
        $('#x').val(e.x1);
        $('#y').val(e.y1);
        $('#w').val(e.width);
        $('#h').val(e.height);
    }

    $(document).ready(function () {
        var p = $("#uploadPreview");

        // prepare instant preview
        $("#image").change(function () {
            // fadeOut or hide preview
            p.fadeOut();

            // prepare HTML5 FileReader
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image").files[0]);

            oFReader.onload = function (oFREvent) {
                $('#test').css("display", "block");
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });

        // implement imgAreaSelect plug in (http://odyniec.net/projects/imgareaselect/)
        $('img#uploadPreview').imgAreaSelect({
            // set crop ratio (optional)
            aspectRatio: '1:1',
            onSelectEnd: setInfo
        });
    });
    $(function () {
        $("#upload_link").on('click', function (e) {
            e.preventDefault();
            $("#image:hidden").trigger('click');
        });
    });



    /*  
     * 
     * 
     *  $(function () {
     $(".uploadlnk").on('click', function (e) {
     var id = this.id;
     //e.preventDefault();f
     
     
     $("#uploadImage"+id).click();
     });
     * 
     * $(document).ready(function () {
     $("#submit").click(function () {
     
     // AJAX Code To Submit Form.
     $.ajax({
     type: "POST",
     url: "upload.php",
     enctype: 'multipart/form-data',
     data: $("#form").serialize(),
     
     cache: false,
     success: function(result){
     alert(result);
     }
     });
     
     return false;
     });
     });*/
    /*
     $("form#files").submit(function () {
     
     var formData = new FormData($(this)[0]);
     
     $.ajax({
     url: window.location.upload.php,
     type: 'POST',
     data: formData,
     async: false,
     success: function (data) {
     alert(data)
     },
     cache: false,
     contentType: false,
     processData: false
     });
     
     return false;
     });
     */

    /* $("#data").submit(function (event) {
     
     
     
     //disable the default form submission
     event.preventDefault();
     alert("it' work");
     //grab all form data  
     var formData = new FormData($(this)[0]);
     
     $.ajax({
     url: 'upload.php',
     type: 'POST',
     data: formData,
     async: false,
     cache: false,
     contentType: false,
     processData: false,
     success: function (returndata) {
     alert(returndata);
     }
     });
     
     return false;
     });*/


</script>



<script type="text/javascript">
    $(document).ready(function (e) {
        $("#data").on('submit', (function (e) {


            e.preventDefault();
            $.ajax({
                url: "upload.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#targetLayer").html(data);
                    $(".test").hide();
                },
                error: function () {
                }

            });


        }));
    });
</script>

<script type="text/javascript">
    /* $(function () {
     $(".uploadlnk").on('click', function (e) {
     var id = this.id;
     e.preventDefault();
     
     
     $("#uploadImage" + id).click();
     });
     
     });*/
    $(function () {
        $(".uploadlnk").on('click', function (e) {

            alert(this.id);
            var id = this.id;

            //e.preventDefault();f

            $("#uploadImage" + id).click();

        });
    });




    function addMoreFiles() {

        var iCnt = 5;
        if (iCnt <= 10) {


            iCnt = iCnt + 1;

            $("#upadd").append('<div class="col-sm-3 upload2"><div id="dvPreview3"></div><span><input id=uploadImage' + iCnt + ' name="image" type="file" style="text-decoration:none;display: none;" /><a href="" id=' + iCnt + ' class="uploadlnk">Upload image</a></span></div>');




        }
    }

    $(function () {
        $("#uplink").on('click', function (e) {
            var id = this.id;
            alert(this.id);
            e.preventDefault();
            $("#upFile" + id).click();
        });
    });




    /*$(function () {
     $(".uploadlnk").on('click', function (e) {
     var id = this.id;
     e.preventDefault();
     
     
     $("#uploadImage" + id).click();
     });
     
     });  */



</script>






<!--
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
$(function () {
    $("#uploadFile1").change(function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#dvPreview");
            dvPreview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function () {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.attr("style", "height:150px;width:260px");
                        img.attr("src", e.target.result);
                        dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                } else {
                    alert(file[0].name + " is not a valid image file.");
                    dvPreview.html("");
                    return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
});
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<script type="text/javascript">
    // < ![CDATA[
$(document).ready(function() 
{ 
$('#photoimg').live('change', function()	
{ 

$("#imageform").ajaxForm(
{
target: '#preview'
}).submit();
});
}); 
// ]]></script>
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" href="dist/css/formValidation.css"/>

<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/formValidation.js"></script>
<script type="text/javascript" src="dist/js/framework/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/imgareaselect-animated.css" />
        scripts -->


<link rel="stylesheet" type="text/css" href="css/imgareaselect-animated.css" />
<!-- scripts -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.imgareaselect.pack.js"></script>  
<script type="text/javascript" src="js/script.js"></script>

<div class="steps mt30">
    <div class="container">
        <ul>
            <li class="step-one "><a href="#"><span>1</span>Step 1</a></li>
            <li class="step-one"><a href="registration2.php"><span>2</span>Step 2</a></li>
            <li class="step-one active"><a href="registration3.php"><span>3</span>Step 3</a></li>
            <li class="step-one"><a href="registration4.php"><span>4</span>Step 4</a></li>
        </ul>
        <div class="clearfix"></div>
        <div class="business-detail ">
            <div class="col-sm-10 over">
                <h4>Business Details</h4>
                <p>Please fill all the Profile Details, add your profile picture, images gallery and videose</p>
            </div>
            <div class="col-sm-2">
                <input type="button" onClick="window.location = 'registration4.php';" value="Skip This step" class="blu-btn bton skip-step" >
            </div>
        </div>
        <div class="col-md-8 register reg_Details  mt50 update-profile">

            <div class="regdetails">

                <div id="test" style="display:none;" >
                    <img id="uploadPreview" style="display:none;"/>
                    <form id="data" method="post" enctype="multipart/form-data">
                        <input id="image" name="image" type="file" accept="image/jpeg"  /> 

                        <input type="hidden" id="x" name="x" />
                        <input type="hidden" id="y" name="y" />
                        <input type="hidden" id="w" name="w" />
                        <input type="hidden" id="h" name="h" />
                        <input type="hidden" id="vid" value="<?php $vid; ?>"/>
                        <input type="submit" class="button"  value="submit" >

                    </form>
                </div>



                <form id="defaultForm" name="MyForm" method="post" onsubmit="return validateForm()" class="form-horizontal" enctype="multipart/form-data" action="insert_regis3.php" >


                    <div class="form-group">
                        <div class="col-sm-3"><span>profile image:</span></div>
                        <div class="col-sm-8">
                            <div class="upload-img">

                                <div id="targetLayer" style="height: 100px" > </div>
                                <span>   <input id="uploadImage1"  type="file" accept="image/jpeg" name="image" style="text-decoration:none;display: none;"/>
                                    <a href="" id="1" class="uploadlnk" >Upload your photo</a>  </span>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3"><span>name</span></div>
                        <div class="col-sm-8">
                            <input type="text" placeholder="*Enter Your Business Name" name="bname">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3"><span>Business Type</span></div>
                        <div class="col-sm-8">
                            <select id="btype" name="btype">
                                <option>--Select Your Business Type--</option>
                                <?php
                                $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($mysqli, $sql) or die(mysqli_error());


                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['categoryId']; ?>"><?php echo $row['categoryName']; ?></option>

                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3"><span>Contact</span></div>
                        <div class="col-sm-8">
                            <input type="text" placeholder="*Enter Your Contact No." name="contact">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"><span>Visit Website</span></div>
                        <div class="col-sm-8">
                            <input type="text" placeholder="*Enter Your Website URL" name="website">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"><span>Email</span></div>
                        <div class="col-sm-8">
                            <input type="text" placeholder="*Enter Your Email Address" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3"><span>Business Description</span></div>
                        <div class="col-sm-8">
                            <textarea name="masesges" placeholder="Message" rows="2" cols="50"></textarea>
                        </div>
                    </div>

                    <input type="submit" value="Sign Up" class="button row"  name="submit" > 

                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class=" registration-right regdetails_right mt30 pd0">
                <img src="images/registration3_right.jpg">
                <div class="view text-center">
                    <!-- <h3>Are you Vendor? </h3>-->
                    <div class="zhoom">

                    </div>uploadImage

                </div>

            </div>
            <div class="clearfix"></div>

            <div class="view-sample">
                <a href="#" class="blu-btn bton ">View Sample Profile</a>   
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="business-detail mt50">
            <div class="col-sm-12 uppercase over">
                <h4>Upload gallery images</h4>
             <!-- <p>Please fill all the Profile Details, add your profile picture, images gallery and videose</p>-->
            </div>
            <div class="col-sm-12 mt30">

                <div id="upwindo" style="display:none;" >

                    <form id="data" method="post" enctype="multipart/form-data">
                        <input id="image" name="image" type="file" accept="image/jpeg"  /> 

                        <input type="hidden" id="x" name="x" />
                        <input type="hidden" id="y" name="y" />
                        <input type="hidden" id="w" name="w" />
                        <input type="hidden" id="h" name="h" />
                        <input type="hidden" id="vid" value="<?php $vid; ?>"/>
                        <input type="submit" class="button"  value="submit" >


                        </div>

                        <div class="col-sm-3 upload2">
                            <div id="dvPreview1">


                            </div>

                            <form action="upd.php" method="post" enctype="multipart/form-data">
                                <span class="mt10"><input id="uploadImage2" name="file" type="file" style="text-decoration:none;display: none;" onSelect="upd(this.value)"/>
                                    <a href="" id="2" class="uploadlnk">Upload image</a></span>
                        </div>
                        <div class="col-sm-3 upload2">
                            <div id="dvPreview2"></div>
                            <span><input id="uploadImage3" name="userImage2" type="file" style="text-decoration:none;display: none;" onSelect="upd(this.value)"/>
                                <a href="" id="3" class="uploadlnk">Upload image</a></span>
                        </div>
                        <div class="col-sm-3 upload2">
                            <div id="dvPreview3"></div>
                            <span><input id="uploadImage4" name="userImage3" type="file" style="text-decoration:none;display: none;" onSelect="upd(this.value)"/>
                                <a href="" id="4" class="uploadlnk">Upload image</a></span>
                        </div>
                        <div class="col-sm-3 upload2">
                            <div id="dvPreview3"></div>
                            <span><input id="uploadImage5" name="userImage4" type="file" style="text-decoration:none;display: none;" onSelect="upd(this.value)"/>
                                <a href="" id="5" class="uploadlnk">Upload image</a></span>
                        </div>
                        <div id="product" style="height: 20px;"> </div>

                        <div id="upadd"> </div>

                        <input type="hidden" name="vemail" value="<?php echo $vemail; ?>" >

                        <a href="#" class="blu-btn bton pull-right mt20"  onclick="addMoreFiles();">Add More Images</a>                 
                    </form> 
                </div>

            </div>
            <div class="business-detail">
                <div class="col-sm-12  mt30 uppercase over">
                    <h4>Upload Video</h4>
                 <!-- <p>Please fill all the Profile Details, add your profile picture, images gallery and videose</p>-->
                </div>
                <div class="col-sm-12 mt30">

                    <div class="col-sm-3">
                        <img src="images/video.jpg">
                        <div class="delete"></div>
                    </div>

                    <div class="col-sm-3 upload2">
                        <div id="plus-sign"></div>
                        <span><input id="uploadFile4" name="uploadFile4" type="file" style="text-decoration:none;display: none;" />
                            <a href="" id="upload_link4" > Upload Video </a></span>
                    </div>


                </div>




                <div class="col-sm-4 mt30">
                    <div class="col-sm-5"> <input type="submit" value="upload" class="button row"  name="submit" >   	</div>

                    <div>

                        </form>

                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
            <div class="line mt50"></div>

        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                // Generate a simple captcha

                $('#defaultForm').formValidation({
                    message: 'This value is not valid',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        bname: {
                            row: '.col-sm-4',
                            validators: {
                                regexp: {
                                    regexp: /^[a-z\s]+$/i,
                                    message: 'The full name can consist of alphabetical characters and spaces only'
                                }
                            }
                        },
                        btype: {
                            row: '.col-sm-4',
                            validators: {
                                notEmpty: {
                                    message: 'Please supply your phone number'
                                }
                            }
                        },
                        contact: {
                            validators: {
                                notEmpty: {
                                    message: 'Please supply your phone number'
                                },
                                phone: {
                                    country: 'US',
                                    message: 'Please supply a vaild phone number with area code'
                                }
                            }
                        },
                        website: {
                            validators: {
                                uri: {
                                    message: 'The input is not a valid URL'
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'The email address is required'
                                },
                                emailAddress: {
                                    message: 'The input is not a valid email address'
                                }
                            }
                        },
                        agree: {
                            validators: {
                                notEmpty: {
                                    message: 'You must agree with the terms and conditions'
                                }
                            }
                        }
                    }
                });
            });
        </script> 
        <!-- End Steps --->  
        <script type="text/javascript">

            function validateForm()
            {


                if (document.MyForm.bname.value == "")
                {
                    alert("Please Enter Your Business Name!!!");
                    document.MyForm.bname.focus();
                    return false;
                }


                if (document.MyForm.btype.value == "")
                {
                    alert("Please Select Your Business Type!!!");
                    document.MyForm.btype.focus();
                    return false;
                }


                if (document.MyForm.contact.value == "")
                {
                    alert("Please Enter Your Contact Number!!!");
                    document.MyForm.contact.focus();
                    return false;
                }

                if (document.MyForm.website.value == "")
                {
                    alert("Please Enter Your Website!!!");
                    document.MyForm.website.focus();
                    return false;
                }

                if (document.MyForm.email.value == "")
                {
                    alert("Please Enter Your Email Address!!!");
                    document.MyForm.email.focus();
                    return false;
                }

                if (document.MyForm.masesges.value == "")
                {
                    alert("Please Enter Your Business Description!!!");
                    document.MyForm.masesges.focus();
                    return false;
                }

            }

        </script>

        <?php include 'footer.php'; ?>