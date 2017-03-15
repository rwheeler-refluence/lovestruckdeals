<?php

    session_start();    
    $sessionid= session_id();
    include 'header.php';
    include './config.php';
    //@session_start();
    //if (!empty($_SESSION['name'])) {
    //    $s = $_SESSION['name'];
    //    $sessionSql = "select * from vendor_details where v_email='" . $s . "'";
    //    $sessionQuery = mysqli_query($mysqli,$sessionSql);
    //    $sessRow = mysqli_fetch_array($sessionQuery);
    //    $venderID = $sessRow['vendor_id'];
    //local vendor   
    if ($_GET['id']) 
    {
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
        $img=$row1['advertise_img'];
        $adv_id = $row1['advertise_id'];
        
        
        
//        $query = "SELECT * FROM  video  where vendor_id ='" . $id . "'ORDER BY videoId DESC LIMIT 1 ";
//        $result8 = mysqli_query($mysqli, $query);
//        $videorow = mysqli_fetch_array($result8);
//         echo "url..".$vurl=$videorow[1];echo "dec".$descr=$videorow[2];$vtype=$videorow[7];$status=$videorow[9];

    $addvendor = "select v.profile_image,v.fname,v.v_likes,v.c_city,v.vendor_id,c.cityId,c.cityName,v.vendor_id
                                            from  vendor_details v, city c
                                            where c.cityId = v.c_city and v.vendor_id = '" . $id . "'";
        $addresultven = mysqli_query($mysqli, $addvendor) or die(mysqli_error());
        $rowvwndor = mysqli_fetch_array($addresultven);
        $likeed = $rowvwndor['v_likes'];
        
        

        $addlocation = "select c.cityId,c.sid,c.cityName,c.sname,s.sname,v.vendor_id,v.c_city,v.c_regionstate from city c,state s,vendor_details v where c.sid = s.sid and v.c_city = c.cityId and v.vendor_id ='" . $id . "' ";
        $resultlocation = mysqli_query($mysqli, $addlocation);
        $rowloc = mysqli_fetch_array($resultlocation);
        $cityID=$rowloc['cityId'];
        $stateID=$rowloc['sid'];
        $city1 = $rowloc['cityName'];
        $state1 = $rowloc['sname'];
        
         $add = "SELECT gallery_img FROM vendor_gallery_images where vendor_id='" . $id . "' limit 8";
         $addresult2 = mysqli_query($mysqli, $add) or die(mysqli_error());
        
    }
    elseif ($_GET['adv_id']) 
    {
            //weding deals
            
          
                
                 
            $adv_id = $_GET['adv_id'];
            $sqladvid = "select advertise_id,advertise_img,vendor_id from advertisement where advertise_id='" . $adv_id . "'";
            $resultadvid = mysqli_query($mysqli, $sqladvid) or die(mysqli_error());
            $rowadvid = mysqli_fetch_array($resultadvid);
            $rowadvid['advertise_id'];
            $rowadvid['vendor_id'];
            $rowadvid['advertise_img'];
            $id=$rowadvid['vendor_id'];
            
            
            
            
            
            //vendor Profile
            $add1 = "SELECT  c.categoryName,c.categoryId,c.image_icon,v.fname,v.lname,v.profile_image,v.c_website,v.b_description,v.deal_view,v.c_name,v.c_type,v.b_type,v.c_email,v.c_telephone,v.c_telephone1,v.c_telephone2,v.c_website,v.c_address1,v.c_address2,v.c_city,v.c_postalcode,v.c_regionstate,v.instagram,v.facebook,v.twitter,v.pinterest FROM vendor_details v,category c WHERE v.b_type = c.categoryId AND v.vendor_id ='" . $rowadvid['vendor_id'] . "'";
            $result = mysqli_query($mysqli, $add1) or die(mysqli_error());
            $row = mysqli_fetch_array($result);
            $insta = $row['instagram'];
            $view = $row['deal_view'];
//            $view = $lik['0'];
            $likes = $view + 1;
         
            
            $view_profile ="update vendor_details set deal_view = '".$likes."' where vendor_id = '".$id."'";
            $mysqli->query($view_profile);
            $queryadv = "select advertise_id,vendor_id,advertise_img,description from advertisement where advertise_id = '" . $rowadvid['advertise_id'] . "'";
            $resultadv = mysqli_query($mysqli, $queryadv);
            $row1 = mysqli_fetch_array($resultadv);
        
            
            $addlocation = "select c.cityId,c.sid,c.cityName,c.sname,s.sname,v.vendor_id,v.likes,v.c_city,v.c_regionstate from city c,state s,vendor_details v ,advertisement a where c.sid = s.sid and v.c_city = c.cityId and v.vendor_id ='" . $rowadvid['vendor_id'] . "' and a.advertise_id = '" . $rowadvid['advertise_id'] . "'";
            $resultlocation = mysqli_query($mysqli, $addlocation);
            $rowloc = mysqli_fetch_array($resultlocation);
            $cityID=$rowloc['cityId'];
            $stateID=$rowloc['sid'];
            $city1 = $rowloc['cityName'];
            $state1 = $rowloc['sname'];
            $likeed = $rowloc['likes'];
          
            
            $add = "SELECT gallery_img FROM vendor_gallery_images where vendor_id='" . $rowadvid['vendor_id']. "' limit 8";
            $addresult2 = mysqli_query($mysqli, $add) or die(mysqli_error());
            
//            $queryadv1 = "select advertise_id,vendor_id,advertise_img,description from advertisement where vendor_id = '5'";
//            $resultadv1 = mysqli_query($mysqli, $queryadv1);
//            $row11 = mysqli_fetch_array($resultadv1);
            
         
            
        }
        // customer echo function and differ date
        
    function dateDiff($start, $end) 
    {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);                                                       
    }    
    
     //custom echo Functions
    function custom_echo($x, $length) 
    {
        if (strlen($x) <= $length) 
        {
            echo $x;
        } 
        else 
        {
            $y = substr($x, 0, $length) . '';
            echo $y;
        }
    }
    
?>
    <script type="text/javascript">
        function doSomething(add_id)
        {
          
            var a = $('#item1 span').text();
            var sessionid='<?php echo $sessionid; ?>';
            $.ajax({
                type: "POST",
                url: 'vendor_likes.php?sessionid='+sessionid,
                data: {'add_id': add_id},
                success: function (resp) {
                    //alert(resp);
                    $("#likes_new_" + add_id).html(resp);
                }
            });
        }

    </script>
  <head>
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" href="http://www.owlcarousel.owlgraphic.com/assets/owlcarousel/assets/owl.theme.default.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<link rel="stylesheet" href="sss/sss.css" type="text/css" media="all">
<script src="sss/sss.min.js"></script>

<!--<script type="text/javascript" src="js/jssor.slider.mini.js"></script>-->
 <script src="js/photo-gallery.js"></script>
 
         
<script>
jQuery(function($) {
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
    padding: 15px;
    height: 530px;
    vertical-align: middle;
    width: 100%;
    display: table-cell;
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
	width: 750px;
    margin:59px auto;
	height:530px;
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
            	<div class="col-lg-6 who-we-are-right pdr0">
   
                    <div class="border">
                       
                  <div class="slider">
    <?php
        $add2 = "SELECT a.advertise_img,a.is_delete,a.vendor_id,a.description,a.dealtitle,v.v_likes,v.vendor_id
                FROM advertisement a,vendor_details v
                WHERE a.vendor_id = '".$id."' AND a.advertise_id = '".$adv_id."' and a.is_delete=0 ORDER BY a.advertise_id DESC LIMIT 1";
        $result1 = mysqli_query($mysqli, $add2) or die(mysqli_error());
        $row1 = mysqli_fetch_array($result1);
        $img=$row1['advertise_img'];
        $v_like = $row1['v_likes'];
       
        ?>
                                              
      <img src="vendor_admin/images/<?php echo $img; ?>"/>
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
            <img src="images/<?php echo $image; ?>"/>
       <?php
        }                        
        ?>
<!--    <img src="images/flowe.jpg" />
<div class="just_text">This one's just text.</div>
<img src="images/3.HRM-Photography.helenKevin.jpg" />
<!--<img src="images/-hostess-cupcake.jpg" />-->

<!--    <span class="caption">This one has a caption</span></div>-->

</div>
                        </div>
<!--                        <img src="images/<?php // echo $row1['advertise_img']; ?>" class="pull-left"> -->
                        <h3 class="monts mt10"> <?php echo $row1['dealtitle'] ;?></h3>
                        <div class="col-sm-12 col-xs-12 pdlt0 mt15"><p><?php echo $row1['description']; ?></p></div>
                    

                    <div class="share-details mt15">
                        <input type="hidden" name="advertise_id" value='<?php echo $row1['advertise_id']; ?> '/>
                        <div class="col-sm-12 col-xs-12 pd0">
                        <a class="col-sm-9 col-xs-8 pd0 mt10" onclick="doSomething(<?php echo $rowvwndor['vendor_id']; ?>);"  name="post_id">
                           <label>Like your vendor</label> <span class="heart" id="likes_new_<?php echo $rowvwndor['vendor_id']; ?>" ><?php echo $likeed; ?> </span> 
                        </a>
                        <div class="pd0 col-sm-3 col-xs-4"><a href="wedding_deals.php" class="more-deals pull-right">More Deals</a></div>
                        </div>
                        <!--<div class="social-icon mt15">-->
                            <!--<ul>-->
                                <!--Share it-->
                                <!--<li><a href="<?php // echo $row['instagram']; ?>" target="_blank" class="in">Instagram</a></li>-->
                                <!--<li><a href="<?php // echo $row['facebook']; ?>" target="_blank" class="f">Facebook</a></li>-->
                                <!--<li><a href="<?php // echo $row['twitter']; ?>" target="_blank" class="t">Twitter</a></li>-->
                                <!--<li><a href="<?php // echo $row['pinterest']; ?>"target="_blank" class="p">pinterest</a></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                        
                    </div>
                </div>
                <div class="col-lg-6 who-we-are-left">
                    <div class="row">

                        <div class="col-lg-12 pd0">
                            <div class="col-sm-3 col-xs-3">  
                                <div class="who-we-sub">           
                                    <img src="images/<?php echo $row['profile_image']; ?>" class="pull-left"> 
                                </div>
							</div> 
                            <div class="col-sm-6 col-xs-6 pd0">
                                <h2><b><?php echo $row['c_name']; ?></b></h2>

                                <p class="">
                                 <span><?php echo $city1; ?>, <?php echo $state1; ?></span>
                                 <br />
                                 <img src="images/<?php echo $row['image_icon'];?>" ><?php echo $row['categoryName']; ?> 
                                 </p>

                            </div>

                            <div class="db">
                                <div class="chat pull-right">
                                  <span><a href="chatnow.php?id=<?php echo $row['vendor_id']; ?>" target="_blank">Chat Now</a></span>
                                </div>
                                <div class="icon mt10 pull-right">
                                    <ul>
                                        <li><a href="https://<?php echo $row['instagram']; ?>" target="_blank" class="instag">Instagram</a></li>
                                        <li><a href="https://<?php echo $row['facebook']; ?>" target="_blank"  class="face">Facebook</a></li>
                                        <li><a href="https://<?php echo $row['twitter']; ?>" target="_blank" class="twit">Twitter</a></li>
                                        <li><a href="https://<?php echo $row['pinterest']; ?>" target="_blank" class="pinter">pinterest</a></li>
                                    </ul>
                                </div>
                            </div>

                           

                        </div>  
                        <div class="col-sm-12 col-xs-12 mt5">
                            <div class="ghf">
                                <span><b class="tes pho"><?php echo $row['c_telephone']; ?>-<?php echo $row['c_telephone1']; ?>-<?php echo $row['c_telephone2']; ?></b></span><br/>
                                <span><a href="http://<?php echo $row['c_website']; ?> " target="_blank"  class="tes web"><?php echo $row['c_website']; ?></a></span>
                               
                                <span><a href="https://accounts.google.com/ServiceLogin?sacu=1&scc=1&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&hl=en&service=mail#identifier" target="_blank" class="tes email"><?php echo $row['c_email']; ?></a></span>
                            </div> 
                           
                        </div>
                        <div class="col-sm-12 col-xs-12 mt5 mt5">
                            <h2 class="monts">Who we are :</h2>
                                <?php echo $row['b_description']; ?>             
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="vid" value="<?php echo $id; ?>" >
</form>

<!-- End Martina Joseph --->  

<!-- Our gallery --->  
<!--    <div class="our-gallery mt40">
        <div class="container">
            <h4 class="brd">Our Gallery</h4> 
<?php
//                 $add = "SELECT gallery_img FROM vendor_gallery_images where vendor_id='" . $id . "' ORDER BY gallery_Img desc limit 6" ;
//                 $addresult2 = mysqli_query($mysqli, $add) or die(mysqli_error());
//          
//                 while ($addrow = mysqli_fetch_array($addresult2)) {
?>   
            <ul class="row">  

                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                        <img  class="img-responsive" src="images<?php // echo $addrow['gallery_img'];   ?>" >
                    </li> 
<?php
//                    }
?>
                </ul>

        </div>
    </div> 
    <div class="modal fade pd0" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">         
                <div class="modal-body"></div>
            </div> /.modal-content 
        </div> /.modal-dialog 
    </div> /.modal         -->

<div class="our-gallery">
    <div class="container">
        <h4 class="brd">Our Gallery</h4>
          
        <ul class="row">
        <div class="col-md-12 fln owl-carousel_new pd0" id="owlCarouselWithArrows">
            <?php
            $add = "SELECT gallery_img FROM vendor_gallery_images where vendor_id='" . $id . "' limit 8";
            $addresult2 = mysqli_query($mysqli, $add) or die(mysqli_error());
            $count = 1;
            $cl = '';
            while ($addrow = mysqli_fetch_assoc($addresult2)) {
                if ($count = 1) {
                    $cl = 'active';
                } else {
                    $cl = '';
                }
                $image = $addrow['gallery_img'];
                ?>
              
                <li class="mt20 col-sm-3 col-xs-12 <?php echo $cl; ?> item">
                    <!--<div class="gellery-img"><div class="gellery-sub-img">-->
<!--                            <img class="img-responsive" src="images/<?php// echo $image; ?>">-->
                             
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail " data-trigger="fileinput" style="width: 400px; height: 400px;"> <img class="img-responsive" src="images/<?php echo $image; ?>"></div>
                                  
                                </div>
                            <!--</div></div>-->
                            
 				                </li>
               
                <?php
                $count++;
            }
            ?>
              <div class="arrow">
                    <div class="owl-carousel-arrows">
                        <a class="prev" href="#"><i class="fa fa-chevron-left"></i></a>
                    </div>
                </div>
                 <div class="arrow">
                <div class="owl-carousel-arrows">
                    <a class="next" href="#"><i class="fa fa-chevron-right"></i></a><!--btn btn-primary-->
                </div>
            </div>

            </div> 
        </ul>
       
        <div class="modal fade pd0" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          
            <div class="modal-dialog">
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

<form name="video" action="vid.php">
    <div class="col-lg-12">
        <div class="container">
            <div class="our-videos">
                <h4 class="brd">Our Videos</h4>
                <?php
         
                //user video data
                 $query = "SELECT * FROM  video  where vendor_id ='" . $id . "'";
                  $result8 = mysqli_query($mysqli, $query);
                  $videorow = mysqli_fetch_array($result8);
                  $vtype=$videorow['vvideoType'];$status=$videorow['vstatus'];
              if(($vtype=="vimeo") && ($status=="1") )
                {  
                
                    ?>             
                                            
                     <p><?php echo $videorow['vdescription']; ?> </p>
                <div class="video">


                    <iframe src="https://player.vimeo.com/video/<?php echo $videorow['vurl']; ?>" width="500" height="281" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>

                </div>
               <?php }
                else
                { 
                     
                    ?>
                     <p><?php echo $videorow['ydescription'] ?></p>
                <div class="video">

                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videorow['yurl'];  ?>" frameborder="0" allowfullscreen> </iframe>
<!--                    <iframe src="https://player.vimeo.com/video/<?php echo $vurl; ?>" width="500" height="281" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>-->

                </div>
               <?php }
                ?>
                
            </div>
        </div>
    </div>
</form>

<!-- Our Videos ---> 
<!-- packages --->     

<div class="col-lg-12 mt40">
    <div class="container">
        <div class="more-great">
           <!-- <div class="packages">-->
                <h4 class="brd">other great deals near you</h4>
<?php
//$add = "SELECT a.categoryId, a.adv_type,a.advDisplayDate,a.advExpiryDate, a.advertise_id,a.description, a.advertise_img, a.price, a.vendor_name, c.categoryName "
//        . "FROM advertisement a, category c "
//        . "WHERE a.categoryId = c.categoryId AND adv_type =  'SPOTLIGHT' and vendor_id = '" . $sessRow['vendor_id'] . "'";

$add="SELECT a.sid,a.cityId,a.vendor_id, a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,v.c_name,cit.cityName
                                FROM advertisement a, category c,vendor_details v,city cit
                                WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id  and a.cityId=cit.cityId
                                AND is_delete='0' and a.sid='".$stateID."' and a.cityId='".$cityID."' and v.status = '1' and adv_type =  'FEATURED' ORDER BY rand() limit 4";

$addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
$index = 0;
while ($addrow = mysqli_fetch_array($addresult)) {
    $index++;
    if ($index <= 4) {

        $price = $addrow['price'];
        $vendor_name = $addrow['vendor_name'];
        $adv_type = $addrow['adv_type'];
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
                                                        <div class="tag"><?php echo $numberDay>0?$numberDay." Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                                        <a href="vendor-profile.php?adv_id=<?php echo $addrow['advertise_id']; ?>"><img src="vendor_admin/images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
                                                            
                                                    </div>
                                                    <div class="details">
                                                        <div class="border">
                                                            <div class="deal pd0">
                                                                <h5 class="mt0"><a href="vendor-profile.php?adv_id=<?php echo $addrow['advertise_id']; ?>" ><strong><?php echo $addrow['dealtitle']; ?></strong></a></h5>
                                                                <p><?php echo $company_name1;?></p>
                                                            </div>
                                                            <div class="deal-right pd0 pull-right" >
<!--                                                                <span><a href="chatnow.php?id=<?php //echo $addrow['vendor_id'];  ?>" target="_blank" >Chat Now</a></span>-->
<!--                                                               <span><a id="getaID" class="getaID" href="<?php //echo $id1=$addrow['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Chat Now</a></span>-->
                                                            </div>
                                                        </div>
                                                        <?php
                                                            $aid = $addrow['advertise_id'];
                                                        ?> 

                                                        <form  name="add_form"  >
                                                            <div class="likes">
                                                           <input type="hidden" name="advertise_id" value='<?php echo $addrow['advertise_id']; ?> '/>
                                                                <ul>
                                                                    <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow['advertise_id']; ?>" >&nbsp;<?php echo $like2; ?> </span>  </a></li>
                                                                    <li><span><?php custom_echo($addrow['categoryName'],15); ?></span></li>                                                       
                                                                    <li><span class="ny"><?php custom_echo($addrow['cityName'], 2);  ?></span></li>
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
<!-- packages --->  

<!---- Retweet-deals ---> 

<!--<div class="Retweet-deals">
    <div class="container">
        <div class="col-lg-12">
            <div class="col-lg-6 bl pdr">
                <h4 class="mt10"><strong>New vendor? </strong></h4> 
                <a href="registration.php" class="bton blu-btn"><strong>Register Here</strong></a>
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
                <li><a class="ft-instg" target="_blank" href="<?php echo $rowsocial1['instragram']; ?>">Instagram</a></li>
                <li><a class="ft-fb" target="_blank" href="<?php echo $rowsocial1['facebook']; ?>">Facebook</a></li> 
                <li><a class="ft-twt" target="_blank" href="<?php echo $rowsocial1['twitter']; ?>">Twitter</a></li>
                <li><a class="ft-pinte" target="_blank" href="<?php echo $rowsocial1['pinterest']; ?>">pinterest</a></li>
            </ul>
        </div>
    </div>
</div>
<script>

        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $Idle: 2000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $Cols: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Scale: false                                   //Scales bullets navigator or not while slider scale
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Rows: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 12,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 4,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1,                                //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    $Scale: false                                   //Scales bullets navigator or not while slider scale
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider1.$ScaleWidth(parentWidth - 30);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>-->
<?php include './vendorlogin.php';?>
    


<!---- End Retweet-deals ---> 
<div class="clearfix"></div>
<script>
$('.owl-carousel_new').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
$(document).ready(function() {

    var owl = $("#owlCarouselWithArrows");

    owl.owlCarousel({
        items: 3
    });

    // Custom Navigation Events
    $(".owl-carousel-arrows .next").click(function() {
        owl.trigger('owl.next');
    });
	
    $(".owl-carousel-arrows .prev").click(function() {
        owl.trigger('owl.prev');
    });

});
</script>


<?php include 'footer.php'; ?>
</div>


  <script src="image-css/jquery.min.js" type="text/javascript"></script>
  <script src="js/owl.carousel1.js"></script>
        <script type="text/javascript" src="image-css/bootstrap-fileinput.js"></script>        
       <!-- <script src="js/jquery.min.js"></script>-->
        <script src="js/bootstrap.js"></script>  
       