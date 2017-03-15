<?php
session_start();
$sessionid = session_id();
include 'header.php';
include './config.php';
include './validation_enquiryform.php';
include './urlseo.php';
if ($_GET['id']) {
    $id = $_GET['id'];
    //vendor Profile 
    $add1 = "SELECT  c.categoryName,c.categoryId,c.image_icon,v.vendor_id ,v.fname,v.lname,v.profile_image,v.c_website,v.b_description,v.c_name,v.c_type,v.b_type,v.c_email,v.c_telephone,v.c_telephone1,v.c_telephone2,v.c_website,v.c_address1,v.c_address2,v.c_city,v.instagram,v.facebook,v.twitter,v.pinterest,v.c_postalcode,v.c_regionstate FROM vendor_details v,category c WHERE v.b_type = c.categoryId AND v.vendor_id ='" . $id . "'";
    $result = mysqli_query($mysqli, $add1) or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    // local vendor profile last advertisement
    $add2 = "SELECT a.categoryId, a.adv_type,a.advDisplayDate, a.advertise_id,a.description, a.advertise_img, a.vendor_name, c.categoryName,a.is_delete "
            . "FROM advertisement a, category c  "
            . "WHERE a.categoryId = c.categoryId AND a.vendor_id = '" . $id . "' AND a.is_delete=0 ORDER BY a.advertise_id DESC LIMIT 1";
    $result1 = mysqli_query($mysqli, $add2) or die(mysqli_error());
    $row1 = mysqli_fetch_array($result1);
    $img = $row1['advertise_img'];
    $catID = $row1['categoryId'];
    $adv_id = $row1['advertise_id'];
    $addvendor = "select v.profile_image,v.fname,v.v_likes,v.c_city,v.vendor_id,c.cityId,c.cityName,v.vendor_id
                                            from  vendor_details v, city c
                                            where c.cityId = v.c_city and v.vendor_id = '" . $id . "'";
    $addresultven = mysqli_query($mysqli, $addvendor) or die(mysqli_error());
    $rowvwndor = mysqli_fetch_array($addresultven);
    $likeed = $rowvwndor['v_likes'];
    $addlocation = "select c.cityId,c.sid,c.cityName,c.sname,s.sname,v.vendor_id,v.c_city,v.c_regionstate from city c,state s,vendor_details v where c.sid = s.sid and v.c_city = c.cityId and v.vendor_id ='" . $id . "' ";
    $resultlocation = mysqli_query($mysqli, $addlocation);
    $rowloc = mysqli_fetch_array($resultlocation);
    $cityID = $rowloc['cityId'];
    $stateID = $rowloc['sid'];
    $city1 = $rowloc['cityName'];
    $state1 = $rowloc['sname'];
    $add = "SELECT gallery_img FROM vendor_gallery_images where vendor_id='" . $id . "' ORDER BY RAND()";
    $addresult2 = mysqli_query($mysqli, $add) or die(mysqli_error());
} elseif ($_GET['adv_id']) {
    //weding deals
    $adv_id = $_GET['adv_id'];
    $sqladvid = "select advertise_id,advertise_img,vendor_id from advertisement where advertise_id='" . $adv_id . "'";
    $resultadvid = mysqli_query($mysqli, $sqladvid) or die(mysqli_error());
    $rowadvid = mysqli_fetch_array($resultadvid);
    $rowadvid['advertise_id'];
    $rowadvid['vendor_id'];
    $rowadvid['advertise_img'];
    $id = $rowadvid['vendor_id'];
    //vendor Profile
    $add1 = "SELECT  c.categoryName,c.categoryId,c.image_icon,v.fname,v.lname,v.profile_image,v.c_website,v.b_description,v.deal_view,v.c_name,v.c_type,v.b_type,v.c_email,v.c_telephone,v.c_telephone1,v.c_telephone2,v.c_website,v.c_address1,v.c_address2,v.c_city,v.c_postalcode,v.c_regionstate,v.instagram,v.facebook,v.twitter,v.pinterest,v.vendor_id FROM vendor_details v,category c WHERE v.b_type = c.categoryId AND v.vendor_id ='" . $rowadvid['vendor_id'] . "'";
    $result = mysqli_query($mysqli, $add1) or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    $insta = $row['instagram'];
    $catID = $row['categoryId'];
    $view = $row['deal_view'];
//            $view = $lik['0'];
    $likes = $view + 1;
    $view_profile = "update vendor_details set deal_view = '" . $likes . "' where vendor_id = '" . $id . "'";
    $mysqli->query($view_profile);
    $queryadv = "select advertise_id,vendor_id,advertise_img,description from advertisement where advertise_id = '" . $rowadvid['advertise_id'] . "'";
    $resultadv = mysqli_query($mysqli, $queryadv);
    $row1 = mysqli_fetch_array($resultadv);
    $addlocation = "select c.cityId,c.sid,c.cityName,c.sname,s.sname,v.vendor_id,v.likes,v.c_city,v.c_regionstate from city c,state s,vendor_details v ,advertisement a where c.sid = s.sid and v.c_city = c.cityId and v.vendor_id ='" . $rowadvid['vendor_id'] . "' and a.advertise_id = '" . $rowadvid['advertise_id'] . "'";
    $resultlocation = mysqli_query($mysqli, $addlocation);
    $rowloc = mysqli_fetch_array($resultlocation);
    $cityID = $rowloc['cityId'];
    $stateID = $rowloc['sid'];
    $city1 = $rowloc['cityName'];
    $state1 = $rowloc['sname'];
    $likeed1 = $rowloc['likes'];
    $addvendor = "select v.profile_image,v.fname,v.v_likes,v.c_city,v.vendor_id,c.cityId,c.cityName,v.vendor_id
                                            from  vendor_details v, city c
                                            where c.cityId = v.c_city and v.vendor_id = '" . $id . "'";
    $addresultven = mysqli_query($mysqli, $addvendor) or die(mysqli_error());
    $rowvwndor = mysqli_fetch_array($addresultven);
    $likeed = $rowvwndor['v_likes'];
    $add = "SELECT gallery_img FROM vendor_gallery_images where vendor_id='" . $rowadvid['vendor_id'] . "' ORDER BY RAND()";
    $addresult2 = mysqli_query($mysqli, $add) or die(mysqli_error());
}

// customer echo function and differ date

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

//custom echo Functions
function custom_echo($x, $length) {
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '';
        echo $y;
    }
}
?>
<script type="text/javascript">
    //vandor likes Functions  
//    function doSomething(add_id)
//    {
//        var a = $('#item1 span').text();
//        var sessionid = '<?php echo $sessionid; ?>';
//        $.ajax({
//            type: "POST",
//            url: 'vendor_likes.php?sessionid=' + sessionid,
//            data: {'add_id': add_id},
//            success: function (resp) {
//                //alert(resp);
//                $("#likes_new_" + add_id).html(resp);
//            }
//        });
//    }
//    
//    
 $(document).on("click","#likes_new",function (e){
     e.preventDefault();
        var add_id =$(this).data("likeid").valueOf();
        var sessionid ='<?php echo $sessionid; ?>';
        $.ajax({
            type: "POST",
            url: 'https://www.lovestruckdeals.com/vendor_likes?sessionid=' + sessionid,
            data: {'add_id': add_id},
            success: function (resp) {
               $("#likes_new_" + add_id).html(resp);
            }
        });
 });
 
 $(document).on("click", "#likes_new1", function (e) {
            e.preventDefault();
            var add_id = $(this).data("lkid2").valueOf();
            var sessionid = '<?php echo $sessionid; ?>';
            $.ajax({
                url:"https://www.lovestruckdeals.com/indexins?sessionid=" + sessionid,
                type: "POST",
                data: {add_id: add_id},
                 success: function (data) {
                       
                          $("#likes_new1").html(data);
                    }
            });

        });
 
    //Deal likes Functions  
    function doSomethingDeal(add_id)
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

</script><head>
    <link rel="stylesheet" type="text/css" href="  <?php echo ROOT_PATH; ?>css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="  <?php echo ROOT_PATH; ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.owlcarousel.owlgraphic.com/assets/owlcarousel/assets/owl.theme.default.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link rel="stylesheet" href="  <?php echo ROOT_PATH; ?>sss/sss.css" type="text/css" media="all">
    <script src="  <?php echo ROOT_PATH; ?>sss/sss.min.js"></script>

<!--<script type="text/javascript" src="js/jssor.slider.mini.js"></script>-->
    <script src="  <?php echo ROOT_PATH; ?>js/photo-gallery.js"></script>


    <script>
    jQuery(function ($) {
        $('.slider').sss();
    });
    </script>

</head>


<!--<link type="text/css" href="css/style.css" rel="stylesheet"/>-->
<!--<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">-->
<!--     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->


<style>
    .our-gallery #myModal button.close	
    {	width:2% !important;
      float: right;
      line-height: 41px;
      color: #000;
      margin-right: 10px;
      font-size: 32px;
      opacity:0.8;
      font-weight:normal;
      position:absolute;
      right:0;
      z-index:999;
    }
    .next {
        float: right;
        text-align: right;
    }
    .controls {
        width: 50px;
        display: block;
        font-size: 11px;
        padding-top: 8px;
        font-weight: bold;
    }
    .modal-content
    {
        display: table !important;
        width: 100%;
        position:relative;
        /*height:530px;*/

    }
    .modal-body {
        position: relative;
        padding: 10px;
        height:auto;
        min-height:100%;
        vertical-align: middle;
        width: 100%;
        /*display: table-cell;*/
        display:table;
    }
    .our-gallery .modal-dialog .modal-body a.controls
    {
        position:absolute;
        bottom: 11px;
    }
    .our-gallery .modal-dialog .modal-body a.controls.next {
        right: 15px !important;

    }
    .modal-dialog
    {
        width: 600px;
        margin: 0 auto;
        height: 462px;
    }
</style>
<div class="wrapper">
    <!-- wedding_deals ---> 
    <div class="wedding_deals vnd">
        <div class="col-lg-12">
            <div class="container">
                <div class="venue pad">
                    <h2 class="">Wedding Vendor near <span><?php echo $city1; ?>, <?php echo $state1; ?></span></h2>

                </div>                	                               
                        <!-- 	 <div class="mt30"><img src="images/line_163.png"></div>-->               		                  		
            </div>
        </div>
    </div>

    <!-- End wedding_deals --->  
    <div class="clearfix"></div>
    <!-- Martina Joseph ---> 
    <form name="vendor-profile" method="post" >
        <div class="who-we-are mt30">
            <div class="container">
                <div class="profi_tab">
                    <div class="col-lg-6 col-sm-6 who-we-are-right pdr0">

                        <div class="border">

                            <div class="slider">
                                <?php
                                $add2 = "SELECT a.advertise_img,a.is_delete,a.vendor_id,a.description,a.dealtitle,v.v_likes,v.vendor_id,v.profile_image
                FROM advertisement a,vendor_details v
                WHERE a.vendor_id = '" . $id . "' AND a.advertise_id = '" . $adv_id . "' and a.is_delete=0 ORDER BY a.advertise_id DESC LIMIT 1";
                                $result1 = mysqli_query($mysqli, $add2) or die(mysqli_error());
                                $row1 = mysqli_fetch_array($result1);
                                $img = $row1['advertise_img'];
                                $v_like = $row1['v_likes'];
                                $img_ven = $row1['profile_image'];
                                ?>

                                <img src="<?php echo ROOT_PATH; ?>images/<?php echo $row['profile_image']; ?>"/>
                                <?php
                                $count1 = 1;
                                $cl1 = '';
                                while ($addrow = mysqli_fetch_assoc($addresult2)) {
                                    if ($count1 = 1) {
                                        $cl1 = 'active';
                                    } else {
                                        $cl1 = '';
                                    }
                                    $image = $addrow['gallery_img'];
                                    ?>
                                    <img src="<?php echo ROOT_PATH; ?>images/<?php echo $image; ?>"/>
                                    <?php
                                }
                                ?>
               
                            </div>
                        </div>
                        <h3 class="monts mt10"> <?php echo $row1['dealtitle']; ?></h3>
                        <div class="col-sm-12 col-xs-12 pdlt0"><p class=""><?php echo $row1['description']; ?></p></div>
                        <div class="share-details mt15">
                            <input type="hidden" name="advertise_id" value='<?php echo $row1['advertise_id']; ?> '/>
                            <div class="col-sm-12 col-xs-12 pd0">
                                <a class="col-sm-9 col-xs-8 pd0 mt5"  id="likes_new" data-likeid="<?php echo $rowvwndor['vendor_id']; ?>">
                                    <label>Like your vendor</label> <span class="heart" id="likes_new_<?php echo $rowvwndor['vendor_id']; ?>"><?php echo $likeed; ?> </span> 
                                </a>
                                <div class="pd0 col-sm-3 col-xs-4"><a href="<?php echo ROOT_PATH; ?>weddingdeals?cat_id=<?php echo $catID; ?>" class="more-deals pull-right">More Deals</a></div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 who-we-are-left">
                        <div class="row">
                            <div class="col-lg-12 pd0">
                                <div class="col-sm-3 col-xs-6">  
                                    <div class="who-we-sub">    
                                        <?php
                                        if ($row['profile_image'] == '') {
                                            ?>
                                            <img src="  <?php echo ROOT_PATH; ?>images/company-logo_new.jpg" class="pull-left"> 
                                            <?php
                                        } else {
                                            ?>
                                            <img src="  <?php echo ROOT_PATH; ?>images/<?php echo $row['profile_image']; ?>" class="pull-left"> 
                                            <?php
                                        }
                                        ?>
                                   </div>
                                </div> 
                                <div class="col-sm-6 col-xs-6 pd0">
                                    <h2><b><?php echo $row['c_name']; ?></b></h2>
                                    <p class="">
                                        <span><?php echo $city1; ?></span>, <span><?php echo $state1; ?></span>
                                        <br />
                                        <img src="  <?php echo ROOT_PATH; ?>images/<?php echo $row['image_icon']; ?>" ><?php echo $row['categoryName']; ?> 
                                    </p>
                               </div>
                                <div class="db">
                                    <div class="chat pull-right">
                                        <span><a id="getaID" class="getaID" href="<?php echo ROOT_PATH; ?><?php echo $row['vendor_id']; ?>" data-toggle="modal" role="button" data-target="#myModalChat">Message</a></span>
                                    </div>
                                    <div class="icon mt10 pull-right">
                                        <ul>
                                           <?php if(!$row['instagram']==''){?><li><a href="https://<?php echo $row['instagram']; ?>" target="_blank" class="instag">Instagram</a></li><?php } ?>
                                           <?php if(!$row['facebook']==''){?><li><a href="https://<?php echo $row['facebook']; ?>" target="_blank"  class="face">Facebook</a></li><?php } ?>
                                            <?php if(!$row['twitter']==''){?><li><a href="https://<?php echo $row['twitter']; ?>" target="_blank" class="twit">Twitter</a></li><?php } ?>
                                            <?php if(!$row['pinterest']==''){?><li><a href="https://<?php echo $row['pinterest']; ?>" target="_blank" class="pinter">pinterest</a></li><?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-sm-12 col-xs-12 mt5">
                                <div class="ghf">
                                    <span class="tes monts  pho"><b><?php echo $row['c_telephone']; ?>-<?php echo $row['c_telephone1']; ?>-<?php echo $row['c_telephone2']; ?></b></span><br/>
                                    <span  class="tes web"><a href="http://<?php echo $row['c_website']; ?> " target="_blank"><?php echo $row['c_website']; ?></a></span>
                                    <span class="tes email"><a href="https://accounts.google.com/ServiceLogin?sacu=1&scc=1&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&hl=en&service=mail#identifier" target="_blank"><?php echo $row['c_email']; ?></a></span>
                                </div> 
                            </div>
                            <div class="col-sm-12 col-xs-12 mt5">
                                <h2 class="monts">About Us :</h2>
                                <p><?php echo $row['b_description']; ?></p>     
                                <!--<textarea  rows="5" cols="66" size="40" style="border: none;resize:none" readonly=""> <?php // echo $row['b_description']; ?> </textarea>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="vid" value="<?php echo $id; ?>" >
    </form>
    <div class="our-gallery">
        <div class="container">
            <h4 class="brd">Our Gallery</h4>
            <ul class="row">
                <div class="col-md-12 fln owl-carousel_new pd0" id="owlCarouselWithArrows">
                    <?php
                    $add = "SELECT gallery_img FROM vendor_gallery_images where vendor_id='" . $id . "' ORDER BY RAND() limit 8";
                    $addresult2 = mysqli_query($mysqli, $add) or die(mysqli_error());
                    $count = 1;
                    $cl = '';
                    while ($addrow = mysqli_fetch_assoc($addresult2)) {
                        if ($count = 1) {
                            $cl = 'owlCarouselWithArrows';
                        } else {
                            $cl = '';
                        }
                        $image = $addrow['gallery_img'];
                        ?>
                        <li class="mt20 col-sm-3 col-xs-12 <?php echo $cl; ?> item">
                                           <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail " data-trigger="fileinput" style="width: 400px; height: 400px;"> <img class="img-responsive" src="<?php echo ROOT_PATH; ?>images/<?php echo $image; ?>"></div>
                            </div>
                        </li>
                        <?php
                        $count++;
                    }
                    ?>
                 </div> 
            </ul>
            <div class="modal fade pd0" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog mt50">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <div class="modal-content">         
                        <div class="modal-body">  
                            <div class="model-image">
                                <div class="xyz">
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
    <!--End Our gallery ---> 
    <!-- Our Videos ---> 
    <form name="video" action="vid">
        <div class="col-lg-12">
            <div class="container">
                <div class="our-videos">
                    <?php
//user video data
                    $query = "SELECT * FROM  video  where vendor_id ='" . $id . "'";
                    $result8 = mysqli_query($mysqli, $query);
                    $videorow = mysqli_fetch_array($result8);
                    $vtype = $videorow['vvideoType'];
                    $vURL = $videorow['vurl'];
                    $yURL = $videorow['yurl'];
                    $status = $videorow['vstatus'];
                    if (($vURL == NULL) && ($yURL == NUll)) {
                       
                    } elseif (($vtype == "vimeo") && ($status == "1")) {
                        ?>             
                        <h4 class="brd">Our Videos</h4>                    
                        <p><?php echo $videorow['vdescription']; ?> </p>
                        <div class="video">
                            <iframe src="https://player.vimeo.com/video/<?php echo $videorow['vurl']; ?>" width="500" height="281" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" lang="en"></iframe>
                        </div>
                        <?php
                    } else {
                        ?>
                        <h4 class="brd">Our Videos</h4>
                        <p><?php echo $videorow['ydescription'] ?></p>
                        <div class="video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videorow['yurl']; ?>" frameborder="0" allowfullscreen> </iframe>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </form>
    <!-- Our Videos ---> 
    <!-- packages --->     
    <div class="col-lg-12"><!-- mt40-->
        <div class="container">
            <div class="more-great">
                <!-- <div class="packages">-->
                <h4 class="brd">other great deals near you</h4>
                <?php
                $add = "SELECT a.sid,a.cityId,a.vendor_id, a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,v.c_name,cit.cityName
                                FROM advertisement a, category c,vendor_details v,city cit
                                WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id  and a.cityId=cit.cityId
                                AND is_delete='0' and a.sid='" . $stateID . "' and a.cityId='" . $cityID . "' and v.status = '1' and adv_type =  'FEATURED' ORDER BY rand() limit 4";
                $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                $index = 0;
                while ($addrow = mysqli_fetch_array($addresult)) {
                    $title = $addrow['c_name'];
                    $string = slug($title);
                    $tu_id = $addrow['advertise_id'];
                    $index++;
                    if ($index <= 4) {
                        $price = $addrow['price'];
                        $vendor_name = $addrow['vendor_name'];
                        $adv_type = $addrow['adv_type'];
                        $like2 = $addrow['likes'];
                        //echo "likees display..".$like2;
                        $advertise_img = $addrow['advertise_img'];
                        $company_name1 = $addrow['c_name'];
                        $categoryName = $addrow['categoryName'];
                        $advDisplayDate = $addrow['advDisplayDate'];
                        $advExpiryDate = $addrow['advExpiryDate'];
                        $advertise_id = $addrow['advertise_id'];
                        // $date = date('Y-m-d');
                        $systemdate = date("Y-m-d");
                        $numberDay = dateDiff($systemdate, $advExpiryDate);
                        // $diff = date_diff(date_create($date), date_create($advExpiryDate));
                        ?>
                        <div class="col-sm-3 col-xs-6 pckg-tab">
                            <div class="packages">
                                <div class="bor">
                                    <div class="col">
                                        <div class="tag"><?php echo $numberDay > 0 ? $numberDay . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left");  ?></div>
                                        <a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id . '/' . $string; ?> "><img src="  <?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
                                    </div>
                                    <div class="details">
                                        <div class="border">
                                            <div class="deal pd0">
                                                <h5 class="mt0"><a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id . '/' . $string; ?> " ><strong><?php company_echo($addrow['dealtitle'], 14); ?></strong></a></h5>
                                                <p><?php company_echo($company_name1, 14); ?></p>
                                            </div>
                                            <div class="deal-right pd0 pull-right" >
                                             </div>
                                        </div>
                                        <?php
                                        $aid = $addrow['advertise_id'];
                                        ?> 
                                        <form  name="add_form"  >
                                            <div class="likes">
                                                <input type="hidden" name="advertise_id" value='<?php echo $addrow['advertise_id']; ?> '/>
                                                <ul>
                                                    <li> <a onclick="doSomethingDeal(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new1"<?php echo $addrow['advertise_id']; ?>" >&nbsp;<?php echo $like2; ?> </span>  </a></li>
                                                    <li><span><?php custom_echo($addrow['categoryName'], 15); ?></span></li>                                                       
                                                    <li><span class="ny"><?php custom_echo($addrow['cityName'], 2); ?></span></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <!-- </div>-->
            </div>
        </div>
    </div>
     <!---- End Retweet-deals ---> 
    <div class="clearfix"></div>
    <script>
        $('.owl-carousel_new').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })
        $(document).ready(function () {
            var owl = $("#owlCarouselWithArrows");

            owl.owlCarousel({
                items: 3
            });
            // Custom Navigation Events
            $(".owl-carousel-arrows .next").click(function () {
                owl.trigger('owl.next');
            });
            $(".owl-carousel-arrows .prev").click(function () {
                owl.trigger('owl.prev');
            });
        });
    </script>
    <?php include 'footer.php'; ?>
</div>
<script src="<?php echo ROOT_PATH; ?>image-css/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo ROOT_PATH; ?>js/owl.carousel1.js"></script>
<script type="text/javascript" src="<?php echo ROOT_PATH; ?>image-css/bootstrap-fileinput.js"></script>        
<!-- <script src="js/jquery.min.js"></script>-->
<script src="<?php echo ROOT_PATH; ?>js/bootstrap.js"></script>  
<!--Model Of Enquriy From -->
<script>
        $(document).ready(function () {
            $('a.getaID').click(function () {
                var status_id = $(this).attr('href');

                $('#aid').val(status_id);
            });
        });
</script>
<div class="container">
    <!--            </span><a  class="join button" data-toggle="modal" role="button" data-target="#myModal1" >Chat Now</a></span>-->
    <!-- Modal -->
    <div class="modal fade" id="myModalChat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Contact this vendor</h4>
                </div>                   
                <div class="modal-body pt0">
                    <div class="views">
                        <form method="post" action="<?php echo ROOT_PATH; ?>enquiry_localvendor" onsubmit="return validatemanageform();">
                            <input type="hidden" id="pageNo" name="pageNo" value="1" />
                            <input type="hidden" id="aid" name="aid" value="" /> 
                            <div class="form-group">
                                <label><h4 class="m0"></h4></label>

                            </div>
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name1"  id="name1"placeholder="Name">
                                <div id="name1_error" style="display:none;margin-left: 127px;"class="error_msg" ><font color="red"> Please Enter Your Name</font></div>
                                <div id="name1_error1" style="display:none;margin-left: 127px;"class="error_msg" ><font color="red"> Please Enter Your Valid Name</font></div>

                            </div>
                            <div class="form-group">
                                <label>Email:</label> 
                                <input type="text" name="email" id="txtemail" placeholder="Email">
                                <div id="txtemail_error" style="display:none;margin-left: 127px;"class="error_msg">Please Enter Email ID</div>
                                <div id="txtemail_error1" style="display:none;margin-left: 127px;"class="error_msg">Please Enter Your Valid Email ID</div>

                            </div>
                            <div class="form-group">
                                <label>Message:</label> 
                                <textarea rows="4" cols="66" name="contactNo" id="txtcontact" placeholder="Message"></textarea>
                                <div id="txtcontact_error" style="display:none;margin-left: 127px;"class="error_msg">Please Enter Message</div>

                            </div>
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button  name="submit" type="submit" value="submit" class="btn blu-btn" id="sub">Send</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Model Of Enquriy From -->

