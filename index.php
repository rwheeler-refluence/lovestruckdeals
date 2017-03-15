<?php
session_start();
$sessionid = session_id();
include './header.php';
include 'config.php';
include './validation_manageforms.php';
include './validation_enquiryform.php';
include './urlseo.php';

function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}

// Display Company name
function company_echo($x, $length) {
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '';
        echo $y . " ...";
    }
}

function custom_echo($x, $length) {
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '';
        echo $y;
    }
}

function getAdvterID($id1) {
    // $aid
    $id1;
}

$sqlse = "select * from newsletterform";
$addresulltse = mysqli_query($mysqli, $sqlse) or die(mysqli_error());
$rowse = mysqli_fetch_array($addresulltse);

//include 'validationuser.php';
?>
 
<script type='text/javascript'>
    $('#form_id1').submit(function () {
        if ($(this).find('input[name="cat[]"]:checked').length == 0) {
            alert('make at least one selection!');
            return false;
        }
    });
</script>
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


<div class="wrapper">

    <div class="container-fluid ban pd0">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                $slider_count = "select photogalleryImgName from photogalleryimage where isdel='0'";
                $slider_addresult = mysqli_query($mysqli, $slider_count) or die(mysqli_error());
                $count = mysqli_num_rows($slider_addresult);
                $j = 1;
                $clss = '';
                if ($j == 1) {
                    $clss = 'active';
                } else {
                    $clss = '';
                }
                ?>
                <li data-target="#myCarousel" data-slide-to="0" class="<?php echo $clss; ?>"> </li>
                <?php
                for ($x = 1; $x < $count; $x++) {
                    ?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo $x; ?>"  ></li>
                    <?php
                    $j++;
                }
                ?>  
            </ol>
            <!-- Wrapper for slides -->            
            <div class="carousel-inner" role="listbox">
                <?php
                $input_sort = $_POST['sort1'];
                $add = "SELECT photogalleryImgName,sort_order FROM photogalleryimage WHERE isdel='0'";
                $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                $i = 1;
                $cls = '';
                while ($addrow = mysqli_fetch_assoc($addresult)) {
                    if ($i == 1) {
                        $cls = 'active';
                    } else {
                        $cls = '';
                    }
                    $banner_image = $addrow['photogalleryImgName'];
                    $sorting = $addrow['sort_order'];
                    ?>
                    <div class="item <?php echo $cls; ?>">
                        <!--<img src="images/<?php //echo $banner_image;   ?>" alt="Chania" width="460" height="345"> -->
                        <img src="images/<?php echo $banner_image; ?>" alt="Chania">
                    </div> 
                    <?php
                    $i++;
                }
                ?> 
                <!-- Left and right controls -->
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="overlay">
            <div class="container">
                <h3>WEDDING DEALS</h3>
                <div class="ban-text text-center">
                    <p>Find deals and chat live with vendors</p>
                    <div class="deals mt40">
                        <form  name="SearchCategoryindex" id="clinic-finder-form" method="post" action="weddingdeals">
                            <h4 class="brd"><span>Find Best Wedding Deals</span></h4>
                            <div class="col-sm-12 xcate_search">
                                <div class="col-sm-3 col-sm-offset col-xs-6 pdzero">
<!--                                    <div class="loc1"></div>-->
                            <div class="serch-inner">
                                Enter State Name
                                
                            </div>
                                    <select id="basic" name="stateID" class="selectpicker show-tick"  data-live-search="true" onchange="getCitySearches(this.value);">
                                        <option selected disabled>Enter State Name</option>
                                        <?php
                                        $qry = "SELECT sname from state ORDER BY sname";
                                        $addresult = mysqli_query($mysqli, $qry) or die(mysqli_error());
                                        while ($addrow = mysqli_fetch_array($addresult)) {
                                            ?>
                                            <option value="<?php echo $addrow["sname"]; ?>"><?php echo $addrow["sname"]; ?></option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div> 
                                <div class="col-sm-3 col-xs-6 pdzero">
<!--                                    <div class="loc1"></div>-->
                                    <div class="serch-inner">
                                        Enter City Name

                                    </div>
                                    <select id="city-Name" name="cityID" class="selectpicker show-tick" data-live-search="true">
                                        <option selected disabled> Enter City Name</option>
                                        <?php
//                                        $qry = "SELECT sid, cityName from city ORDER BY cityName";
//                                        $addresult = mysqli_query($mysqli, $qry) or die(mysqli_error());
//                                        while ($addrow = mysqli_fetch_array($addresult)) {
                                            ?>
<!--                                            <option value="<?php // echo $addrow["cityName"]; ?>"><?php // echo $addrow["cityName"]; ?></option>-->

                                            <?php
//                                        }
                                        ?>
                                    </select>
                                </div>   
                                <div class="col-sm-3 col-xs-12 pdzero cate-main">
<!--                                    <div class="categories1"></div>-->
                            <div class="categry">
                                All  Categories
                            </div>    
                                    <select id="basic1" name="cat_id" class="selectpicker show-tick services">
                                        <option selected="selected" value="">All  Categories</option>
                                        <!--                                <option>AllCategories</option>-->
                                        <?php
                                        $sql = "SELECT  categoryId,categoryName FROM category where isdel=0";
                                        $result = mysqli_query($mysqli, $sql) or die(mysqli_error());

                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['categoryId']; ?>"><?php echo $row['categoryName']; ?></option>                                  

                                            <?php
                                        }
                                        ?>   
                                    </select> 
                                </div>
                                <div class="col-sm-2 col-xs-12 pdzero">
                                    <input type="submit" name="search" value="Search" class="btn blu-btn ser-new-btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!------ end Banner --->
        <!-- wedding_deals ---> 
        <div class="wedding_deals mt40">
            <div class="col-lg-12" id="grid">
                <div class="container">
                    <div class="holdr categories">
                        <h1 class="brd"><span>GREAT WEDDING DEALS</span></h1>
                        <div class="wedding_deals_main">
                            <div class="cate_popup">    
                                <div class="container">
                                    <nav id="ddmenu">
                                        <ul>
                                            <li class="full-width">
                                                <div id="owl-demo1" class="owl-carousel">
                                                    <?php
                                                    $cat = "SELECT image,categoryName,categoryId FROM category WHERE isdel='0' and status=1";
                                                    $cat_addresult = mysqli_query($mysqli, $cat) or die(mysqli_error());
                                                    $index = 0;
                                                    while ($addrow = mysqli_fetch_array($cat_addresult)) {
                                                        $tu_id = $addrow['categoryId'];
                                                        $title = $addrow['categoryName'];
                                                        $string = slug($title);
                                                        $index++;
                                                        if ($index <= 19) {
                                                            $cat_image = $addrow['image'];
                                                            $cat_name = $addrow['categoryName'];
                                                            $cat_id = $addrow['categoryId'];
                                                            ?>
                                                            <div class="item"><a href="<?php echo ROOT_PATH . 'weddingdeals/' . $tu_id . '/' . $string; ?>"><img src="<?php echo ROOT_PATH; ?>categoryImage/<?php echo $cat_image; ?>" class="grey" width="5" height="5"><?php echo $cat_name ?></a> </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> 
                            </div>    
                        </div>
                    </div>
                    <?php
                    $add = "SELECT a.categoryId,a.vendor_id,a.dealtitle, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.description,a.advertise_id, a.advertise_img, a.price, a.vendor_name, c.categoryName,cit.cityName,v.c_name,a.vendor_id FROM vendor_details v,advertisement a, category c,city cit WHERE a.categoryId = c.categoryId AND a.cityId=cit.cityId  AND is_delete=0 and v.status='1'  and a.vendor_id = v.vendor_id order by a.advertise_id DESC LIMIT 12";
                    $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                    $index = 0;
                    while ($addrow = mysqli_fetch_array($addresult)) {
                        $title = $addrow['c_name'];
                        $string = slug($title);
                        $tu_id = $addrow['advertise_id'];
                        //  $blog .='<a href="http://www.simplecss3.com/tutorial/' . $tu_id . '/' . $string . '">' . $title . '</a>';
                        $index++;
                        if ($index <= 16) {
                            $price = $addrow['price'];
                            $comapny_name = $addrow['c_name'];
                            $adv_type = $addrow['adv_type'];
                            $categoryName = $addrow['categoryName'];
                            $like = $addrow['likes'];
                            $advDisplayDate = $addrow['advDisplayDate'];
                            $advExpiryDate = $addrow['advExpiryDate'];
                            $dealtitle = $addrow['dealtitle'];
                            $systemdate = date("Y-m-d");
                            $numberDay = dateDiff($systemdate, $advExpiryDate);
                            ?>
                            <div class="col-sm-3 col-xs-6  pckg-tab">
                                <div class="packages">
                                    <div class="bor">
                                        <div class="packagelist">
                                            <div class="col">
                                                <div class="tag"><?php echo $numberDay > 0 ? $numberDay . " Days Left" : "1 Day Left"?></div>
                                                <a href="<?php echo ROOT_PATH;?>wedding-discounts/<?php echo $tu_id . '/' . $string; ?>"><img src="<?php echo ROOT_PATH;?>vendor_admin/images/<?php echo $addrow['advertise_img'];?>" width="269" height="253"></a>
                                                <?php
                                                if ($adv_type == "SPOTLIGHT") {
                                                    ?>
                                                    <div class="feat_light spot"> <?php echo $adv_type; ?> </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="details">
                                                <div class="border">
                                                    <div class="deal pd0">
                                                        <h5 class="mt0"><a href="<?php echo ROOT_PATH;?>wedding-discounts/<?php echo $tu_id . '/' . $string;?>"><strong><?php company_echo($dealtitle, 20);?></strong></a></h5>                                            
                                                        <p><?php company_echo($comapny_name, 20); ?></p>
                                                    </div>
                                                    <div class="deal-right pd0 pull-right">
                                                        <span>
                                                            <a id="getaID" class="getaID" href="<?php echo $id1 = $addrow['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Message</a></span>
                                                    </div>
                                                </div>
                                                <?php
                                                $aid = $addrow['advertise_id'];
                                                ?>                                                                                
                                                <div class="likes">
                                                    <form name="add_form">
                                                        <input type="hidden" name="advertise_id" value='<?php echo $addrow['advertise_id']; ?> '/>
                                                        <ul>
                                                            <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart"  id="likes_new_<?php echo $addrow['advertise_id'];?>" >&nbsp;<?php echo $like;?> </span>  </a></li>
                                                            <li><span><?php custom_echo($addrow['categoryName'], 16); ?></span></li>                                                       
                                                            <li><span class="ny"><?php custom_echo($addrow['cityName'], 2); ?></span></li>
                                                        </ul>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>                          
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="container">
                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Contact this vendor</h4>
                                    </div>                  
                                    <div class="modal-body pt0">
                                        <div class="views">
                                            <form method="post" action="enquiry" onsubmit="return validatemanageform();">
                                                <input type="hidden" id="pageNo" name="pageNo" value="3" />
                                                <input type="hidden" id="aid" name="aid" value="" /> 
                                                <div class="form-group">
                                                    <label><h4 class="mt0"></h4></label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-2 pd0"><label>Name:</label></div>
                                                    <div class="col-sm-10 pd0"><input type="text" name="name1"  id="name1"placeholder="Name">
                                                        <div id="name1_error" style="display:none;" class="error_msg mb0"><font color="red"> Please Enter Your Name</font></div>
                                                        <div id="name1_error1" style="display:none;" class="error_msg mb0"><font color="red"> Please Enter Your Valid Name</font></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-2 pd0"><label>Email:</label></div>
                                                    <div class="col-sm-10 pd0">
                                                        <input type="text" name="email" id="txtemail" placeholder="Email">
                                                        <div id="txtemail_error" style="display:none;" class="error_msg mb0">Please Enter Email ID</div>
                                                        <div id="txtemail_error1" style="display:none;" class="error_msg mb0">Please Enter Your Valid Email ID</div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-2 pd0"><label>Message:</label> </div>
                                                    <div class="col-sm-10 pd0"> <textarea rows="4" cols="40" name="contactNo" id="txtcontact" placeholder="Message"></textarea>
                                                        <div id="txtcontact_error" style="display:none;" class="error_msg mb0">Please Enter Message</div>
                                                        <!--                                            <div id="txtcontact_error1" style="display:none"class="error_msg">Please Enter Your Valid Contact Number</div>-->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-2 pd0"> <label>&nbsp;</label></div>
                                                    <div class="col-sm-10 pd0"> <button  name="submit" type="submit" value="submit" class="btn blu-btn bt-sign" id="sub">Send</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End wedding_deals ---> 
        <div class="btn-new-find"> <a href="weddingdeals"> <button type="button" class="blu-btn ser-new-btn find">FIND MORE WEDDING DEALS</button></a></div>
        <div class="clearfix"> </div>
        
        <?php
//$input_sort1 = $_POST['sort1'];
        $add3 = "SELECT bannerImgName FROM finddealbanner WHERE isdel='0'";
        $addresult3 = mysqli_query($mysqli, $add3) or die(mysqli_error());
        while ($addrow3 = mysqli_fetch_assoc($addresult3)) {
            $banner_image3 = $addrow3['bannerImgName'];
            ?>

            <!-- all-question --->    
            <?php
        }
        ?>
        <div class="all-question"  >
           <!-- <img src="images/<?php // echo $banner_image3;   ?>" width="460" height="345">-->
            <img src="images/<?php echo $banner_image3; ?>">
            <div class="container">
                <div class="advice">
                    <span>HOW IT WORKS</span>
                <!--  <span>ETIQETTE</span>-->
                    <h3>PLANNING A WEDDING<br/>
                        ON A BUDGET<br/>
                        IS SO EASY!</h3>
                    <p> No registration, no coupons, no vouchers.<br/>
                        We make it easy for you to find the best<br/>
                        deals. Simply browse our wedding deals <br/>
                        and contact the vendor directly.
                        
                       






                        
                        
                    </p>
                    <a class="get_scoop" href="weddingdeals">FIND DEALS</a>
                </div>
            </div>
        </div>
        <!--End all-question --->
        <!-- get-inspired --->
        <div class="get-inspired"> 
            <div class="container">
                <div class="col-sm-4 wdp col-xs-4">
                    <div class="get-inspired-left">
                        <span>ONLY ON LOVESTRUCK DEALS</span>
                        <h2 class="text-uppercase">CHAT WITH VENDORS</h2>
                        <p>Live chat with your favorite vendors! No<br/>
                            registration required, it’s 100% free and<br/>
                            private. Simply click and chat!
                        </p>
                        <a class="read-more mrgn" role="button" data-toggle="modal" data-target="#myModalAboutus">Chat Now</a>
                    </div>
                </div>
                <div class="col-sm-8 wdp col-xs-8">
                    <div class="get-inspired-right">
                        <img src="images/inspire_right_img.jpg" />
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container-fluid trending-wedding">
            <h2 class="brd container"><span>trending wedding deals</span></h2>
            <div id="oceanCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                <!-- Indicators -->
                <!-- Wrapper for slides -->
                <div class="container">
                    <div class="hdn">
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <?php
                                $addtren = "SELECT trenddealImgName,title,subtitle,description FROM trenddealbanner WHERE isdel='0' limit 0,3 ";
                                $addresullttre = mysqli_query($mysqli, $addtren) or die(mysqli_error());
                                $counttre = 0;
                                while ($addrowtrend = mysqli_fetch_assoc($addresullttre)) {
                                    $counttre ++;
                                    if ($counttre < 4) {
                                        $banner_imagetrend = $addrowtrend['trenddealImgName'];
                                        ?>
                                        <div class="col-sm-4 col-xs-4">
                                            <div class="col-sm-5 col-xs-6 pd0"><img src="images/<?php echo $banner_imagetrend; ?>" class="trad_deal"/></div>
                                            <div class="col-sm-6 col-xs-6 pd0prm"> <!-- col-lg-offset-1 -->
                                                <!--<p class="hrt-bg Robo">184 liked this deal</p>-->
                                                <h3><strong><?php echo $addrowtrend['title']; ?></strong></h3>
                                                <span><?php echo $addrowtrend['subtitle']; ?></span>
                                                <p class="mt5"><p class="mt5"><?php echo $addrowtrend['description']; ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="item">
                                <?php
                                $add3 = "SELECT trenddealImgName,title,subtitle,description FROM trenddealbanner WHERE isdel='0' limit 3,6";
                                $addresult5 = mysqli_query($mysqli, $add3) or die(mysqli_error());
                                $count = 0;
                                while ($addrow5 = mysqli_fetch_assoc($addresult5)) {
                                    $count ++;
                                    if ($count < 4) {
                                        $banner_image6 = $addrow5['trenddealImgName'];
                                        ?>                                       
                                        <div class="col-sm-4 col-xs-4">
                                            <div class="col-sm-5 col-xs-6 pd0"><img src="images/<?php echo $banner_image6; ?>"  class="trad_deal"/></div>
                                            <div class="col-sm-6 col-xs-6 pd0prm"> <!-- col-lg-offset-1 -->
                                            <!--<p class="hrt-bg Robo">184 liked this deal</p>-->
                                                <h3><strong><?php echo $addrow5['title']; ?></strong></h3>
                                                <span><?php echo $addrow5['subtitle']; ?></span>
                                                <p class="mt5"><?php echo $addrow5['description']; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                     
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#oceanCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#oceanCarousel" role="button" data-slide="next">

                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- End old trending-wedding--->
        <?php
        $add4 = "SELECT newsletterImgName FROM newsletterbanner WHERE isdel='0'";
        $addresult4 = mysqli_query($mysqli, $add4) or die(mysqli_error());
        while ($addrow4 = mysqli_fetch_assoc($addresult4)) {
            $banner_image4 = $addrow4['newsletterImgName'];
        }
        ?>
        <div class="lets-go">
            <!-- <img src="images/<?php //echo $banner_image4;   ?>" width="500" height="500"> -->
            <div class="cir-img">  <img src="images/<?php echo $banner_image4; ?>"> </div>
            <!--<div class="container">-->
                <div class="search">
                    <h3><!--Let's go-->Getting Married?</h3>
                    <p>Get latest deals in your inbox!</p>
                   <button type="button" class="hide-btn" name="-up" data-toggle="modal" data-target="#myModalt" >Get Deals</button>
                    
                </div>
            <!--</div>-->
        </div>
    </div>
    <?php include './vendorlogin'; ?>
    <div class="Retweet container">
        <span><strong>Photo credits:</strong> 
            <a href="http://www.studiomerimaphotography.com" target="_blank">Studio Merima, </a>
            <a href="http://www.linandjirsa.com" target="_blank">Lin & Jirsa Photography, </a>
            <a href="http://www.nataliefranke.com" target="_blank">Natalie Franke Photography</a>
        </span>
    </div>
    <!----End Retweet-deals ---> 
    <?php // include 'footer'; ?>
    
     <div class="line"></div>
    
    <div class="footer-top pb150">
    <div class="container">
        <div class="fot-top">
            <a href="https://www.lovestruckdeals.com/"><img src="images/xaazalogo.png" alt="wedding deals"></a>
            <h5><a href="https://www.lovestruckdeals.com/">© 2016 Lovestruck Deals</a></h5>
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
               <li><span><a data-toggle="modal" role="button" data-target="#myModalAboutus">Free Chat</a></li>

            </ul>
        </div>
    </div>
</div>
    
     <div class="footer pdb">
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
            <h6>Location :</h6> <ul class="test"> <li><a href="weddingdeals?cityName=New York City">New York Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Jersey City">New Jersey Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Philadelphia">Philadelphia Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Atlanta">Atlanta Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Jacksonville">Jacksonville Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Miami">Miami Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Austin">Austin Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Dallas">Dallas Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Houston">Houston Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Phoenix">Phoenix Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=San Antonio">San Antonio Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Indianapolis">Indianapolis Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Nashville">Nashville Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Los Angeles">Los Angeles Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=San Diego">San Diego Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=San Francisco">San Francisco Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=San Jose">San Jose Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Chicago">Chicago Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Seattle">Seattle Wedding Deals</a></li>
                <li><a href="weddingdeals?cityName=Boston">Boston Wedding Deals</a></li>
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
<!--     <div class="location right-border">
           <div class="fot-logo"><img src="images/footer-logo.png" /></div>
       <h5><a href="#">© Copyrights 2016 Lovestuckdeals</a></h5>
     <ul <li><a href="#">Terms of use </a></li>
           <li><a href="#">Privacy policy</a></li>
           
       </ul>
           
   </div>-->

<span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=mY6Q2N6UxORQXqIHrXV5TepYDnJQpUUzaEUNJDfzDG9Pbvvx1kxQX2Vc6cBC"></script></span>
</div>
     
     <div class="container">
            </span><a  class="join button" data-toggle="modal" role="button" data-target="#myModal1" >Message</a></span>
             Modal 
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
     <div class="container">
<!--            </span><a  class="join button" data-toggle="modal" role="button" data-target="#myModal1" >Message</a></span>-->
            <!-- Modal -->
                <div class="modal fade" id="myModalAboutus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content cob">
                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                <!--<div class="views">-->

                                        <div class="form-group">
                                            <label style="display:block; margin:10px 0"><h3 class="modal-title" id="myModalLabel" style="color:#19b5bc;">LIVE CHAT COMING SOON</h3></label> 
                                            

                                        </div>
                                <!--</div>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            
        </div>
     
   


<div class="popup-banner">
       <div class="pop-inner">
           
       </div>
       
       <div class="pop-content">
           <div class="container">
           <div class="pop-msg">
               <h2>Get the latest wedding deals straight into your inbox and save <span>up to 80% !</span></h2>
               <h2><span>LIMITED TIME GIVEAWAY</span>: Win $150 towards your dream wedding !</h2>
           </div>
           <div class="sign-button">
               <button class="hide-btn" name="sign-up" data-tab-name="Register"  data-toggle="modal" data-target="#myModalt">sign up</button>
           </div>
           </div>
       </div>
    </div>


 </body>
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
                                                    <label>City :</br><span>[select multiple<br/>city]</span> </label>
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
    <script src="js/select2.min.js"></script>
    <script src="js/multi-select.js"></script>
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <script src="js/modal_lsd.js"></script>
    <script src="js/owl.carousel.js"></script>

   
    
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
    <script>
        $("document").ready(function () {
            $(".abhi").click(function () {
                alert("Abhi");

                var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
                (function () {
                    var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
                    s1.async = true;
                    s1.src = 'https://embed.tawk.to/56795bff189c2a551bbd3feb/default';
                    s1.charset = 'UTF-8';
                    s1.setAttribute('crossorigin', '*');
                    s0.parentNode.insertBefore(s1, s0);
                })();

            });
        });
    </script>
    <script type="text/javascript">
        var owl = $("#owl-demo");
        owl.owlCarousel({
            items: 3, //10 items above 1000px browser width
            itemsDesktop: [1000, 3], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // 3 items betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0;
            itemsMobile: [400, 1] // itemsMobile disabled - inherit from itemsTablet option

        });
        // Custom Navigation Events
        $(".next").click(function () {
            owl.trigger('owl.next');
        })
        $(".prev").click(function () {
            owl.trigger('owl.prev');
        })
        $(".play").click(function () {
            owl.trigger('owl.play', 1000);
        })
        $(".stop").click(function () {
            owl.trigger('owl.stop');
        })
    </script>
    <script type="text/javascript">
        function doSomething(add_id)
        {
            var a = $('#item1 span').text();
            var sessionid = '<?php echo $sessionid; ?>';
            $.ajax({
                type: "POST",
                url: 'indexins?sessionid=' + sessionid,
                data: {'add_id': add_id},
                success: function (resp) {
                    //alert(resp);
                    $("#likes_new_" + add_id).html(resp);
                }
            });
        }
    </script>
    <script>
        //advance multiselect start
        $('#my_multi_select3').multiSelect({
            selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
            selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
            afterInit: function (ms) {
                var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function (e) {
                            if (e.which === 40) {
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function (e) {
                            if (e.which == 40) {
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
            },
            afterSelect: function () {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function () {
                this.qs1.cache();
                this.qs2.cache();
            }
        });
       
        // Select2
//        $(".select2").select2();
//        $(".select2-limiting").select2({
//            maximumSelectionLength: 2
//        });
//        $('.selectpicker').selectpicker();
//        $(":file").filestyle({input: false});
        
                </script>
  <!--   <script src="js/bootstrap-select.js"></script>-->
</div>
<script type="text/javascript">
            function login() {
                var email1 = $('#email1').val();
                var password1 = $('#password1').val();

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
    ;
</script>

 <script>
$(document).ready(function(){
    $(".hide-btn").click(function(){
        $(".popup-banner").addClass("bgd");
    });
});
</script>

<script>
$(document).ready(function(){
    $(".close").click(function(){
        $(".popup-banner").removeClass("bgd");
    });
});
</script>

<script>
$(document).ready(function(){
    $("#myModalt").on('blur',function(){
    $(".popup-banner").removeClass("bgd");
    
});
$("#form_id1 input,#form_id1 select,#sub").on('click',function(){
    $(".popup-banner").addClass("bgd");
    
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
<script>
    $(document).ready(function () {
        var owl = $("#owl-demo1");
        owl.owlCarousel({
            itemsCustom: [
                [0, 2],
                [450, 3],
                [600, 4],
                [700, 5],
                [1000, 10],
                [1200, 9],
                        // [1400, 9],
//       [1600, 9],
            ],
            navigation: true,
        });
    });
</script>
<!----- End categories arrow ------>
<script type="text/javascript">
    function getCitySearches(val)
    {
        //debugger;
        $.ajax({
            type: "POST",
            url: "citySearches",
            data: 'stateID=' + val,
            success: function (data) {

                $("#city-Name").html(data);
                $("#city-Name").selectpicker('refresh');
            }
        });
    }
    function getCity(val)
    {
        $(".loader").show();
        $.ajax({
            type: "POST",
            url: "get_city1",
            data: 'state_id=' + val,
            success: function (data) {
                 $(".loader").hide();
                $("#city-list2").html(data);
            }
        });
    }
</script>
<script>
    $(document).ready(function ()
    {
        $("#sub").click(function ()
        {
            var spacialid = [];
            $.each($(".special option:selected"), function ()
            {
                spacialid.push($(this).val());
            });
            // alert("You have selected the Speciality - " + spacialid.join(", "));
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#clinic-finder-form').submit(function () {
            var address = $('#address').val();
            var category = $('#basic1').val();
            // var session=$('#session').val();
            //alert(session);
            //var distance=$('#distance').val();
//            var session=address+" "+category+" "+distance;
//            alert(session);
            document.location.href = "search?address=" + address + "&cat=" + category;
        });
        //get Advetred id
        $('a.getaID').click(function () {
            var status_id = $(this).attr('href');
            $('#aid').val(status_id);
        });
    });
</script>



