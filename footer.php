<?php
    include './config';
    include './validation_manageforms.php';
      include './validation_enquiryform.php';
    $sqlsocial = "select instragram,facebook,twitter,pinterest from admin ";
    $sqlsocialresult = mysqli_query($mysqli, $sqlsocial);
    $rowsocial1 = mysqli_fetch_array($sqlsocialresult);
   
?>


<div class="line"></div>




<!-- upper footer --->
<div class="footer-top">
    <div class="container">
        <div class="fot-top">
            <a href="https://www.lovestruckdeals.com"><img src="<?php echo ROOT_PATH; ?>images/xaazalogo.png" alt="wedding deals"></a>
            <h5><a href="">© Copyright 2016 Lovestruck Deals</a></h5>
        </div>
        <div class="fot-top fot-top1">
            <h4><strong>About</strong></h4>
            <ul> <li><a href="about-us" target="_blank" >What We Do</a></li><li><a href="about-us" target="_blank">FAQ</a></li>
                <li><a href="about-us" target="_blank">Contact</a></li>
                <li><a href="about-us" target="_blank">Careers</a></li>
            </ul>
        </div>
        <div class="fot-top fot-top1">
            <h4><strong>Legal</strong></h4>
            <ul>
                <li><a href="legal" target="_blank">Terms of Use</a></li>
                <li><a href="legal" target="_blank">Privacy Policy</a></li>

            </ul>
        </div>
        <div class="fot-top fot-top1">
            <h4><strong>Chat</strong></h4> <ul>
                <li><a data-toggle="modal" role="button" data-target="#myModalAboutus">Live Chat</a></li>
               <li><a data-toggle="modal" role="button" data-target="#myModalAboutus">Free Chat</a></li>

            </ul>
        </div>
    </div>
</div>

<!--End upper footer --->  


<!-- footer --->  

<div class="footer">
    <div class="container">

    </div>
    <div class="container">
        <div class="location right-border mt10">
            <h6>Categories :</h6>
            <ul class="test"> 
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/65/venues">Wedding Venue Deals</a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/1/photography">Wedding Photography Deals</a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/2/catering">Wedding Catering Deals</a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/10/bridal-beauty">Wedding Make-up Deals</a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/59/event-rentals">Wedding Rental Deals</a></li>
                <li><a href="weddingdeals">Wedding Invitations Deals</a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/61/decorations">Wedding Decor Deals</a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/6/dj">Wedding DJ Deals</a></li>
                <li><a href="weddingdeals">Discount Wedding Dresses </a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/7/fashion">Wedding Fashion Deals</a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/4/videography">Wedding Videography Deals</a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/57/event-planner">Wedding Planning Deals</a></li>
                <li><a href="weddingdeals">Wedding Flower Deals</a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/3/wedding-cake">Wedding Cakes deals</a></li>
                <li><a href="weddingdeals">Wedding Limo Deals</a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/62/photo-booth">Wedding Photo Booths Deals</a></li>
                <li><a href="weddingdeals">Wedding Bands Deals</a></li>

            </ul>
        </div>
        <div class="deals-location right-border mt10">
            <h6>Location :</h6> <ul class="test"> <li>
                    <a href="weddingdeals">New York Wedding Deals</a></li>
                <li><a href="weddingdeals">New Jersey Wedding Deals</a></li>
                <li><a href="weddingdeals">Philadelphia Wedding Deals</a></li>
                <li><a href="weddingdeals">Atlanta Wedding Deals</a></li>
                <li><a href="weddingdeals">Jacksonville Wedding Deals</a></li>
                <li><a href="weddingdeals">Miami Wedding Deals</a></li>
                <li><a href="weddingdeals">Austin Wedding Deals</a></li>
                <li><a href="weddingdeals">Dallas Wedding Deals</a></li>
                <li><a href="weddingdeals">Houston Wedding Deals</a></li>
                <li><a href="weddingdeals">Phoenix Wedding Deals</a></li>
                <li><a href="weddingdeals">San Antonio Wedding Deals</a></li>
                <li><a href="weddingdeals">Indianapolis Wedding Deals</a></li>
                <li><a href="weddingdeals">Nashville Wedding Deals</a></li>
                <li><a href="weddingdeals">Los Angeles Wedding Deals</a></li>
                <li><a href="weddingdeals">San Diego Wedding Deals</a></li>
                <li><a href="weddingdeals">San Francisco Wedding Deals</a></li>
                <li><a href="weddingdeals">San Jose Wedding Deals</a></li>
                <li><a href="weddingdeals">Chicago Wedding Deals</a></li>
                <li><a href="weddingdeals">Seattle Wedding Deals</a></li>
                <li><a href="weddingdeals">Boston Wedding Deals</a></li>
            </ul>

        </div>
        <div class="deals-location right-border mt10">
            <h6>Lovestruck Deals:</h6>
            <ul class="test">
                <li><a href="weddingdeals">Wedding Deals</a></li>
                <li><a href="weddingpackages">Wedding Packages</a></li>
                <li><a href="https://www.lovestruckdeals.com/weddingdeals/65/venues">Wedding Venues </a></li>
                <li><a href="local-vendors">Wedding Specials</a></li>
                <li><a href="https://www.lovestruckdeals.com/">Wedding Coupons</a></li>
                <li><a href="weddingdeals">Budget wedding</a></li>
                <li><a href="https://www.lovestruckdeals.com/wedding-discounts/477/design-house-decor">Wedding Discounts</a></li>
                <li><a href="https://www.lovestruckdeals.com/">Affordable Weddings</a></li>
                
            </ul>


        </div>
    </div>
    <!-- <div class="location right-border">
           <div class="fot-logo"><img src="images/footer-logo.png" /></div>
       <h5><a href="#">© Copyrights 2015 xaaza</a></h5>
     <ul <li><a href="#">Terms of use </a></li>
           <li><a href="#">Privacy policy</a></li>
           
       </ul>
           
   </div>-->


</div>

 <!--Model Of Enquriy From -->
    
     <div class="container">
<!--            </span><a  class="join button" data-toggle="modal" role="button" data-target="#myModal1" >Chat Now</a></span>-->
            <!-- Modal -->
                <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">Dear User Chat Will Be Available Soon !</h4>
                            </div>   
                               <div class="modal-body">
                                <div class="views">

                                        <div class="form-group">
                                            <label><h4 class="modal-title" id="myModalLabel">Dear User Chat Will Be Available Soon !</h4></label> 
                                            

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
<!-- MODEL NEWSLETTER SIGNUP -->
<style>
    
 

    #owl-demo1 .item{
        /*background: #3fbf79;
        padding: 30px 0px;
         margin: 10px;*/
        color: #333;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
        /*display:inline-block;*/
    }
    #owl-demo1 .item a
    {
        font-size:0.6em;
        color:#333;
        display: block;

    }

    #owl-demo1 .owl-item
    {
        margin:0 0;
        /*width:122px !important*/

    }
    #owl-demo1 .owl-carousel .owl-item .item
    {
        /*width:110px !important;*/
        display:inline-block;
    }

    .top-heading .customNavigation{
        text-align: center;
    }
    .top-heading .customNavigation a{
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        padding-top: 10px;
    }
    .owl-pagination{display:none;}
    #owl-demo1 i.glyphicon {color: #888 !important;}
    #country-list{float:left;list-style:none;margin:0;padding:0;width:87%;position:absolute;z-index:99;}
    #country-list li{padding:8px 12px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;font-size:14px; color: black;text-align:left;}
    #country-list li:hover{background:#F0F0F0;}
    @media only screen and (max-width:375px)

    {	/*#owl-demo1 .owl-item{width:77px !important;}*/
        #owl-demo1 .item a{font-size:10px;}
    }
    
    
    
    
   
.popup-banner{
    border-top: 1px solid #D7D4CF;
    bottom: 0;
    display: block;
     height: 98px; 
    position: fixed;
    width: 100%;
    z-index: 17;
}
.popup-banner .pop-inner
{
    background: #efefef;
    width:100%;
    height: 100%;
    position: absolute;
    z-index:9;
        
}
.pdb{padding-bottom: 100px !important;}
.popup-banner .pop-content {
    display: block;
    line-height: 54px;
    margin: 22px 0;
    position: relative;
    text-align: center;
    width: 100%;
    z-index: 15;
}
.popup-banner .pop-content .pop-msg{
    display: inline-block;
    margin-left: 20px;
    position: relative;
    text-align: center;
    vertical-align: middle;
    width: 545px;
}
.popup-banner .pop-content .pop-msg h2{
    font-size:15px;
    color: #191f26;
    line-height: 25px;
    margin: 0;
/*    position: absolute;*/
    text-align: center;
    width: 100%;
}
.popup-banner .pop-content .pop-msg h2 span{color: #f06597}

.popup-banner .pop-content .sign-button{
  display: inline-block; 
    text-align: center;
    width: 230px;
    height: auto;
    line-height: 0;
    float: right;
    position:relative;
    left: -100px;
    top: 6px;
}
.popup-banner .pop-content .sign-button button{
    line-height: 0;
    box-sizing: content-box;
    overflow: visible;
    cursor: pointer;background:#66cccc; position:relative;padding: 20px;color:#fff;font-size: 15px;text-align: center;text-transform: uppercase;height: auto;width: 180px;border-radius: 3px; }
.popup-banner .pop-content .sign-button button:after{border-radius: inherit;
    box-sizing: border-box;
    content: '';
    display: block;
    height: inherit;
    position: absolute;
    top: 0;
    width: inherit;
    z-index: -1;
}
.lets-go .search .sub-head, .sub-head{
    background: #efefef;
    width:100% !important;
    height: 100%;
    text-align: center;
    display: block;
    position: relative;
    top: -15px;
    left:0;
    margin-bottom: 0px;
}
.sub-head{height:auto;}
.lets-go .search .sub-head h3, .sub-head h3{
    font-size:13px;
    color: #191f26;
    padding: 5px;
    margin: 0px;
    line-height: 23px;
    text-transform: inherit;
    word-spacing: 1px;
    font-weight: normal;
}

.bgd{
    display: none;
}
.lets-go .search .modal-dialog  .modal-content, .modal-dialog  .modal-content, .lets-go .search .modal-dialog .modal-content1, .modal-dialog .modal-content1{/*overflow-y:auto;*/height: 600px;}
.cate_gory{width: 33%;
    float: left;
    margin-bottom: 5px;}

.hide-btn{   
    margin: 20px 0 0 0 !important;
    width: 151px !important;
    height: 44px;
    color: #fff;
    font-size: 14px;
    padding: 7px 35px;
    background: #19b5bc;
    margin: 18px auto;
    display: inline-block;
    border: none;}

.multiselect-container{
    overflow:scroll;
    height: 300px;
}
.modal-content.cob {
    height: 90px;
}
/*.cate_gory label{font-size: 12px !important;}
.cate_gory input[type=checkbox], input[type=radio]{margin-left: 4px;}
.modal-content .modal-body form .form-group .cate_gory label{
    font-size: 0.7em !important;
    float: right;
    padding-left: 0px;
    margin-top: 4px;
    min-width: 89%;
    text-align: left;
    position: relative;
    color: #3d9c9c !important;
    text-transform: uppercase;
    font-weight: 600;
}
.modal-content .modal-body form .form-group .all_slct input[type="checkbox"] {
    float: left;
    margin-top: 5px !important;
    width: 9%;
    display: inline-block;
    height: auto;
}
.modal-content .modal-body form .form-group .cate_gory{   
    width: 33%;
     display: inline-block; 
    float: left;
    margin-bottom: 5px;
}*/


</style>
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>css/owl.carousel.css">
<link href="<?php echo ROOT_PATH; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ROOT_PATH; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<script src="<?php echo ROOT_PATH; ?>js/modal_lsd.js"></script>
 <div class="modal fade" id="myModalt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog mt20">
                            <div class="modal-content mymd">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">GET GREAT WEDDING DEALS </br>+ LIMITED TIME GIVEAWAY</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="views">
                                         <div class="row">
                                     <div class="col-sm-12 sub-head pd0">
                                            <h3>When you sign up, you will automatically be entered into a giveaway for a $150 cash reward! Giveaway ends 3/31/17 and winner will be contacted shortly after.</h3>
                                        </div>
                                    </div>  
                                        <form method="post" action="insertform" onsubmit="return validatemanageform1();" id="form_id1">
                                            <div class="form-group">
                                                <div class="col-sm-2 pd0">
                                                    <label>Name:</label>
                                                </div>
                                                <div class="col-sm-10 pd0">
                                                    <input type="text" name="name1"  id="getName"placeholder="Name" >
                                                    <div id="nameone1_error" style="display:none"class="error_msg" ><font color="red"> Please enter your name.</font></div>
                                                    <div id="nameone1_error1" style="display:none"class="error_msg" ><font color="red"> Please enter your valid name.</font></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-2 pd0">
                                                    <label>Email:</label> 
                                                </div>
                                                <div class="col-sm-10 pd0">
                                                    <input type="text" name="email" id="getTxtemailone" placeholder="Email">
                                                    <div id="txtemailone1_error" style="display:none"class="error_msg">Please enter email ID.</div>
                                                    <div id="txtemailone1_error1" style="display:none"class="error_msg">Please enter your valid email ID.</div></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-2 pd0"> 
                                                    <label> Select Category:</label>
                                                </div>
                                                <div class="col-sm-10 pd0">
                                                    <select name="cat[]" id="selectall" size="6" multiple="multiple">
                                                        <!--<option selected="selected" value=""> --Select Category --</option>-->
                                                            
                                                        <?php
                                                        include './config.php';
                                                        $sql = "SELECT * FROM category where isdel=0";
                                                        $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                        
                                                        <option value="<?php echo $row['categoryId']; ?>" ><?php echo $row['categoryName']; ?></option>
                                                              
                                                            <?php
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>	 
                                                </div> 
                                           
                                            <div class="form-group">
                                                <div class="col-sm-2 pd0">
                                                    <label>State:</label>
                                                </div>
                                                <div class="col-sm-10 pd0">
                                                    <select name="state[]" id="state-list2" onChange="getCity(this.value);">
                                                        <option selected="selected" value=""> --Select State --</option>
                                                        <?php
                                                        $sqlstate = "SELECT * FROM state";
                                                        $resultstate = mysqli_query($mysqli, $sqlstate) or die(mysqli_error());
                                                        while ($rowstate = mysqli_fetch_array($resultstate)) {
                                                            ?>
                                                            <option <?php if ($rowse['sid'] == $rowstate['sid']) echo 'selected="selected"'; ?> value="<?php echo $rowstate['sid']; ?>"><?php echo $rowstate['sname']; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div id="regstate2_error" style="display:none"class="error_msg">Please select city.</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-2 pd0">
                                                    <label>City :</br><span>[ select multiple <br/> states ]</span> </label>
                                                </div>
                                                <div class="col-sm-10 pd0">
                                                    <select name="city[]" id="city-list2" multiple="multiple" class="special" size="6" >
                                                        <option value=""> --Select City --</option>
                                                        <?php
                                                        $sqlcity = "SELECT * FROM city ";
                                                        $resultcity = mysqli_query($mysqli, $sqlcity) or die(mysqli_error());
                                                        while ($rowcity = mysqli_fetch_array($resultcity)) {
                                                            ?>
                                                            <option <?php if ($rowse['cityId'] == $rowstate['cityId']) ; ?>value="<?php echo $rowcity['cityId']; ?>" ><?php echo $rowcity['cityName']; ?></option>

                                                            <?php
                                                        }
                                                        ?>
                                                    </select>   
                                                    <div id="regcity2_error" style="display:none"class="error_msg">Please select city.</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-2 pd0">
                                                    <label>&nbsp;</label>
                                                </div>
                                                <div class="col-sm-10 pd0">
                                                    <button  name="submit" type="submit" value="submit" class="btn blu-btn bt-sign" id="sub">Save Changes</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
   <div class="container">
<!--            </span><a  class="join button" data-toggle="modal" role="button" data-target="#myModal1" >Chat Now</a></span>-->
            <!-- Modal -->
                <div class="modal fade" id="myModalAboutus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content cob">
                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                <!--<div class="views">-->

                                        <div class="form-group">
                                            <label style="display:block; margin:10px 0"><h3 class="modal-title" id="myModalLabel" style="color:#19b5bc;">Live chat coming soon!</h3></label> 
                                            

                                        </div>
                                <!--</div>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            
        </div>
    <script src="<?php echo ROOT_PATH; ?>js/select2.min.js"></script>
    <script src="<?php echo ROOT_PATH; ?>js/multi-select.js"></script>
    <!--Start of Tawk.to Script-->
    <script>
                                                        $(document).ready(function () {
                                                            $('#selecctall').click(function (event) {  //on click
                                                                if (this.checked) { // check select status
                                                                    $('.checkbox1').each(function () { //loop through each checkbox
                                                                        this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                                    });
                                                                } else {
                                                                    $('.checkbox1').each(function () { //loop through each checkbox
                                                                        this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                                    });
                                                                }
                                                            });

                                                        });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#selectall').multiselect({
            includeSelectAllOption: true
        });
       
    });
</script>

<!-- MODEL NEWSLETTER SIGNUP -->
<!--Model Of Enquriy From -->


<!--  <script src="js/bootstrap.js"></script>-->
<!-- <script src="js/bs_leftnavi.js"></script>-->
<!-- End footer --->   

 <!--<script type="text/javascript">

 var _gaq = _gaq || [];
 _gaq.push(['_setAccount', 'UA-36251023-1']);
 _gaq.push(['_setDomainName', 'jqueryscript.net']);
 _gaq.push(['_trackPageview']);

 (function() {
   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 })();

</script>-->    

<!--
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>-->
<span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=mY6Q2N6UxORQXqIHrXV5TepYDnJQpUUzaEUNJDfzDG9Pbvvx1kxQX2Vc6cBC"></script></span>
</body>
</html>
