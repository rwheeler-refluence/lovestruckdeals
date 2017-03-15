<?php
session_start();
$sessionid = session_id();
include 'header.php';
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

</style>
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<title>Wedding deals | Wedding vendors | Chat live with vendors</title>
<meta name="description" content="Lovestruck Deals is the ultimate source for wedding deals and discounts by top wedding photographers, venues, wedding planners, and other wedding vendors."/>
<script src="js/owl.carousel.js"></script>
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
            url: "citySearches.php",
            data: 'stateID=' + val,
            success: function (data) {

                $("#city-Name").html(data);
                $("#city-Name").selectpicker('refresh');
            }
        });
    }
    function getCity(val)
    {
        $.ajax({
            type: "POST",
            url: "get_city1.php",
            data: 'state_id=' + val,
            success: function (data) {
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
            document.location.href = "search.php?address=" + address + "&cat=" + category;
        });
        //get Advetred id
        $('a.getaID').click(function () {
            var status_id = $(this).attr('href');
            $('#aid').val(status_id);
        });
    });
</script>
<script type='text/javascript'>
    $('#form_id1').submit(function () {
        if ($(this).find('input[name="cat[]"]:checked').length == 0) {
            alert('make at least one selection!');
            return false;
        }
    });
</script>
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
                        <form  name="SearchCategoryindex" id="clinic-finder-form" method="post" action="wedding/">
                            <h4 class="brd"><span>Find Best Wedding Deals</span></h4>
                            <div class="col-lg-12">
                                <div class="col-sm-3 col-sm-offset col-xs-6 pdzero">
                                    <div class="loc1"></div>
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
                                    <div class="loc1"></div>
                                    <select id="city-Name" name="cityID" class="selectpicker show-tick" data-live-search="true">
                                        <option selected disabled> Enter City Name</option>
                                        <?php
                                        $qry = "SELECT sid, cityName from city ORDER BY cityName";
                                        $addresult = mysqli_query($mysqli, $qry) or die(mysqli_error());
                                        while ($addrow = mysqli_fetch_array($addresult)) {
                                            ?>
                                            <option value="<?php echo $addrow["cityName"]; ?>"><?php echo $addrow["cityName"]; ?></option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>   
                                <div class="col-sm-3 col-xs-12 pdzero">
                                    <div class="categories1"></div>
                                    <select id="basic1" name="cat_id" class="selectpicker show-tick">
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
                                                            <div class="item"><a href="<?php echo ROOT_PATH . 'wedding/' . $tu_id . '/' . $string; ?>"><img src="<?php echo ROOT_PATH; ?>categoryImage/<?php echo $cat_image; ?>" class="grey" width="5" height="5"><?php echo $cat_name ?></a> </div>
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
                                                <div class="tag"><?php echo $numberDay > 0 ? $numberDay . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left");   ?></div>
                                                <a href="<?php echo ROOT_PATH; ?>vendor-advertise/<?php echo $tu_id . '/' . $string; ?> "><img src="<?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
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
                                                        <h5 class="mt0"><a href="<?php echo ROOT_PATH; ?>vendor-advertise/<?php echo $tu_id . '/' . $string; ?> "><strong><?php company_echo($dealtitle, 20); ?></strong></a></h5>                                            
                                                        <p><?php company_echo($comapny_name, 20); ?></p>
                                                    </div>
                                                    <div class="deal-right pd0 pull-right">
                                                        <span>
                                                            <a id="getaID" class="getaID" href="<?php echo $id1 = $addrow['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Chat Now</a></span>
                                                    </div>
                                                </div>
                                                <?php
                                                $aid = $addrow['advertise_id'];
                                                ?>                                                                                
                                                <div class="likes">
                                                    <form name="add_form">
                                                        <input type="hidden" name="advertise_id" value='<?php echo $addrow['advertise_id']; ?> '/>
                                                        <ul>
                                                            <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart"  id="likes_new_<?php echo $addrow['advertise_id']; ?>" >&nbsp;<?php echo $like; ?> </span>  </a></li>
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
                                        <h4 class="modal-title" id="myModalLabel">LIVE CHAT COMING SOON</h4>
                                    </div>                  
                                    <div class="modal-body pt0">
                                        <div class="views">
                                            <form method="post" action="enquiry.php" onsubmit="return validatemanageform();">
                                                <input type="hidden" id="pageNo" name="pageNo" value="3" />
                                                <input type="hidden" id="aid" name="aid" value="" /> 
                                                <div class="form-group">
                                                    <label><h4 class="mt0">In the meantime, send the vendor a message!</h4></label>
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
                                                    <div class="col-sm-10 pd0"> <button  name="submit" type="submit" value="submit" class="btn blu-btn" id="sub">Send</button></div>
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
                    <h3>Finding your<br/>
                        perfect deal<br/>
                        is so easy!</h3>
                    <p>No registration, no coupons, no vouchers.<br/>
                        We make it easy for you to find the best<br/>
                        deals. Simply browse our wedding deals <br/>
                        and contact the vendor directly.
                    </p>
                    <a class="get_scoop" href="wedding-deals.php">FIND DEALS</a>
                </div>
            </div>
        </div>
        <!--End all-question --->
        <!-- get-inspired --->
        <div class="get-inspired"> 
            <div class="container">
                <div class="col-sm-4 wdp col-xs-4">
                    <div class="get-inspired-left">
                        <span>ONLY ON LoveStruck Deals</span>
                        <h2 class="text-uppercase">chat with vendors</h2>
                        <p>Live chat with your favorite vendors! No <br/>
                            registration required, it’s 100% free and <br/>
                            private. Simply click and chat!
                        </p>
                        <a class="see_photos">CHAT NOW</a>
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
            <img src="images/<?php echo $banner_image4; ?>">
            <div class="container">
                <div class="search">
                    <h3><!--Let's go-->Getting Married?</h3>
                    <p>Get latest deals in your inbox!</p>
                    <button type="button" class="join button" data-toggle="modal" data-target="#myModalt" >Get Deals</button><!--role="button" -->
                    <div class="modal fade" id="myModalt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog mt20">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Get Deals</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="views">
                                        <form method="post" action="insertform.php" onsubmit="return validatemanageform1();" id="form_id1">
                                            <div class="form-group">
                                                <div class="col-sm-3 pd0">
                                                    <label>Name:</label>
                                                </div>
                                                <div class="col-sm-9 pd0">
                                                    <input type="text" name="name1"  id="getName"placeholder="Name">
                                                    <div id="nameone1_error" style="display:none"class="error_msg" ><font color="red"> Please enter your name.</font></div>
                                                    <div id="nameone1_error1" style="display:none"class="error_msg" ><font color="red"> Please enter your valid name.</font></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3 pd0">
                                                    <label>Email:</label> 
                                                </div>
                                                <div class="col-sm-9 pd0">
                                                    <input type="text" name="email" id="getTxtemailone" placeholder="Email">
                                                    <div id="txtemailone1_error" style="display:none"class="error_msg">Please enter email ID.</div>
                                                    <div id="txtemailone1_error1" style="display:none"class="error_msg">Please enter your valid email ID.</div></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3 pd0"> 
                                                    <label> Select Category:</label>
                                                </div>
                                                <div class="col-sm-9 pd0">
                                                    <div class="sub_cate">
                                                        <div class="all_slct">
                                                            <label>Select All</label>
                                                            <input type="checkbox" id="selecctall"/>   
                                                        </div>
                                                        <?php
                                                        include './config.php';
                                                        $sql = "SELECT * FROM category where isdel=0";
                                                        $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            ?>

                                                            <div class="cate_gory">
                                                                <label><?php echo $row['categoryName']; ?></label>
                                                                <input type="checkbox" class="checkbox1" name="cat[]" value="<?php echo $row['categoryId']; ?>">
                                                            </div> 
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>	 
                                                </div> 
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3 pd0">
                                                    <label>State:</label>
                                                </div>
                                                <div class="col-sm-9 pd0">
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
                                                <div class="col-sm-3 pd0">
                                                    <label>City :</br><span>[ select multiple <br/> states ]</span> </label>
                                                </div>
                                                <div class="col-sm-9 pd0">
                                                    <select name="city[]" id="city-list2" multiple="multiple" class="special" size="3" >
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
                                                <div class="col-sm-3 pd0">
                                                    <label>&nbsp;</label>
                                                </div>
                                                <div class="col-sm-9 pd0">
                                                    <button  name="submit" type="submit" value="submit" class="btn blu-btn" id="sub">Save Changes</button></div>
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
    <?php include './vendorlogin.php'; ?>
    <div class="Retweet container">
        <span><strong>Photo credits:</strong> 
            <a href="http://www.studiomerimaphotography.com" target="_blank">Studio Merima, </a>
            <a href="http://www.linandjirsa.com" target="_blank">Lin & Jirsa Photography, </a>
            <a href="http://www.nataliefranke.com" target="_blank">Natalie Franke Photography</a>
        </span>
    </div>
    <!----End Retweet-deals ---> 
    <?php include 'footer.php'; ?>
    <script src="js/select2.min.js"></script>
    <script src="js/multi-select.js"></script>
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
                url: 'indexins.php?sessionid=' + sessionid,
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
        $(".select2").select2();
        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });
        $('.selectpicker').selectpicker();
        $(":file").filestyle({input: false});
        });</script>
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