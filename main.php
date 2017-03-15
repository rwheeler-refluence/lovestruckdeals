<?php
session_start();    
$sessionid= session_id();
    include 'header.php';
    include 'config.php';
    include './validation_manageforms.php';
   
     function dateDiff($start, $end) 
    {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);                                                       
    }  
    
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

    $sqlse = "select * from newsletterform";
    $addresulltse = mysqli_query($mysqli, $sqlse) or die(mysqli_error());
    $rowse = mysqli_fetch_array($addresulltse);

//include 'validationuser.php';
?>
<style>
	
    #owl-demo1 .item{
        /*background: #3fbf79;*/
        padding: 30px 0px;
         margin: 10px;
        color: #333;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
		/*display:inline-block;*/
    }
    #owl-demo1 .item a
    {
        font-size:0.7em;
        color:#333;
    }
	
  	 #owl-demo1 .owl-item
    {
        margin:0 0;
		width:136px !important
	
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
	#owl-demo1 i.glyphicon {color: #777 !important;}
</style>
<!--<link href="css/ddmenu.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<!--<link rel="stylesheet" type="text/css" href="css/owl.theme.css">
<link href="css/ddmenu.css" rel="stylesheet" type="text/css" />-->
<!--<link href="css/bootstrapTheme.css" rel="stylesheet" type="text/css" />-->
<!--<script src="js/jquery.min.js"></script> -->
<script src="js/owl.carousel.js"></script>
<!--<script src="js/ddmenu.js" type="text/javascript"></script>-->

  <script src="includes/geoip.php" type="text/javascript"><!--mce:1--></script>
<script src="js/jquery.sort.js" type="text/javascript"></script>
<script src="js/jquery.geocomplete.js" type="text/javascript"></script>


  <style>
        #country-list{float:left;list-style:none;margin:0;padding:0;width:87%;position:absolute;z-index:99;}
        #country-list li{padding:8px 12px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;font-size:14px; color: black;text-align:left;}
        #country-list li:hover{background:#F0F0F0;}
    </style>
 <script type="text/javascript">            
 // searche to state Name.......       
 $(document).ready(function(){
    $("#search-box1").keyup(function()
        {       
           // debugger;
		$.ajax({
		type: "POST",
		url: "stateSearches.php",
		data:'state='+$(this).val(),
		beforeSend: function(){
			$("#search-box1").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box1").show();
			$("#suggesstion-box1").html(data);
			$("#search-box1").css("background","#FFF");
		}
		});
	});
    });
     
    function selectState(val) 
    {                 
        $("#search-box1").val(val);
        $("#suggesstion-box1").hide();
    }

 // searche to city Name.......   
    $(document).ready(function()
    {
	$("#search-box").keyup(function()
        {           
                var stateID=$('#search-box1').val();
                var cityID=$('#search-box').val();
		$.ajax({
		type: "POST",
		url: "citySearches.php",
		data:{'city':cityID,'stateID':stateID},
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
    });

    function selectCountry(val) 
    {        
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
 </script>
 
 <!----- categories arrow ------>
 
 <script>


$(document).ready(function () {
    var carousel = $("#owl-demo1");
  carousel.owlCarousel({
    navigation:true,
    navigationText: [
      "<i class='glyphicon glyphicon-chevron-left icon-white'></i>",
      "<i class='glyphicon glyphicon-chevron-right icon-white'></i>"
      ],
  });

  
});
$(document).ready(function() {
 
  var owl = $("#owl-demo1");
 
  owl.owlCarousel({
     
      itemsCustom : [
        [0, 2],
        [450, 4],
        [600, 7],
        [700, 9],
        [1000, 10],
        [1200, 12],
        [1400, 13],
        [1600, 15]
      ],
      navigation : true
 
  });
 
});
</script>
 <!----- End categories arrow ------>
 
<!--<script>
    $(document).ready(function () {
        document.getElementById('txtAddress').setAttribute('autocomplete', 'off');
        var txtAddress;
        //googel autosearch textbox
        function initialize() {
            /*
             var options = {
             componentRestrictions: { country: "in" }
             };*/

            var txtAddress = document.getElementById('txtAddress');
            var autocomplete = new google.maps.places.Autocomplete(txtAddress);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
        //end google autosearch textbox
    });
    //end txtAddress blur
</script>-->
<script>
var owl = $('#myCarousel');
owl.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true
});
</script>

<script type="text/javascript">
    function getCity(val)
    {
        $.ajax({
            type: "POST",
            url: "get_city1.php",
            data: 'state_id=' + val,
            success: function (data) {
                $("#city-list").html(data);
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
    
    $(document).ready(function(){
        $('#clinic-finder-form').submit(function(){
           
            var address = $('#address').val();
            var category=$('#basic1').val();              
           // var session=$('#session').val();
            //alert(session);
            //var distance=$('#distance').val();
//            var session=address+" "+category+" "+distance;
//            alert(session);
            document.location.href = "search.php?address=" + address + "&cat=" + category;
        });
    });
   
</script>



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
                for ($x = 1; $x < $count; $x++) 
                {
                ?>

                <li data-target="#myCarousel" data-slide-to="<?php echo $x; ?>"  ></li>
                <!--<li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>-->
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
                    <!--<img src="images/<?php //echo $banner_image; ?>" alt="Chania" width="460" height="345"> -->
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
<!--                    <form  name="SearchCategoryindex" 

id="SearchFormindex" method="post"  

action="searchallcategory.php" >-->
<form  name="SearchCategoryindex" id="clinic-finder-form" 

method="post" action="wedding_deals.php">
<!--                        <form  name="SearchCategoryindex" 

id="SearchFormindex" method="post" onsubmit="return 

searchdeal();"  action="searchindexcategorylocation.php" >-->
                        <h4 class="brd"><span>Find Best Wedding Deals</span></h4>
                        
                         <div class="col-sm-3">

                            <div class="loc1"></div>

                            <input type="text" id="search-box1" name="stateID" placeholder="Enter State Name" />
                            <div id="suggesstion-box1"></div>
                        </div> 
                        <div class="col-sm-3 col-xs-3">

                            <div class="loc1"></div>

                            <input type="text" id="search-box" name="cityID" placeholder="Enter City Name" />
                            <div id="suggesstion-box"></div>
                        </div>   

                        <div class="col-sm-4 col-xs-4" >
                            <div class="categories1"></div>
                            <select id="basic1" name="cat_id" class="selectpicker show-tick">
                                <option selected="selected" class="pdlt0" value="">All  Categories</option>
<!--                                <option>AllCategories</option>-->
                                <?php
                                $sql = "SELECT  categoryId,categoryName FROM category where isdel=0";
                                $result = mysqli_query($mysqli, $sql) or die(mysqli_error());

                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                  <option value="<?php echo $row['categoryId']; ?>"><?php echo $row['categoryName']; ?></option>                                   
                                   }

                                    <?php
                                }
                                ?>   
                            </select> 
                        </div>
                      <div class="col-sm-2 col-xs-3">
                            <input type="submit" name="search" value="Search" class="btn blu-btn ser-new-btn">
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
                    <h4 class="brd"><span>GREAT WEDDING DEALS</span></h4>
                    <div class="wedding_deals_main">
                        <div class="cate_popup">    
                            <div class="container">
                                <nav id="ddmenu">
                                    <!--<div class="menu-icon"></div>-->
                                    <ul>
                                        <li class="full-width">
                                        <!--<div class="more_details">
                                            <div class="col-md-12">
                                          	<img src="images/more.png" />
                                            </div>
                                            <span class="top-heading pd0 col-md-12">
                                                <div class="customNavigation">
                                                    <!--<a class="btn prev">Previous</a>
                                                    <a class="next">More Categories</a>
                                                    <!--<a class="btn play">Autoplay</a>
                                                    <a class="btn stop">Stop</a>
                        			</div>
                                            </span>
					</div>-->
                                            <!-- <div class="dd-inner">
                                               <div class="categories_deals"> -->
                                                    <!--<div class="dropdown"> id="owl-demo"-->
                                                        <div id="owl-demo1" class="owl-carousel">
                                                                            <?php
                                                                            $cat = "SELECT image,categoryName,categoryId FROM category WHERE isdel='0' and status=1";
                                                                            $cat_addresult = mysqli_query($mysqli, $cat) or die(mysqli_error());
                                                                            $index = 0;
                                                                            while ($addrow = mysqli_fetch_array($cat_addresult)) {
                                                                                $index++;
                                                                                if ($index <= 12) {
                                                                                    $cat_image = $addrow['image'];
                                                                                    $cat_name = $addrow['categoryName'];
                                                                                    $cat_id = $addrow['categoryId'];
                                                                                    ?>
                                                                    <div class="item"><a href="wedding_deals.php?cat_id=<?php echo $cat_id ?>"><img src="categoryImage/<?php echo $cat_image; ?>" class="grey" width="5" height="5"><?php echo $cat_name ?></a> </div>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <!-- <div class="item"><h1>1</h1></div>
                                                            <div class="item"><h1>16</h1></div>-->
                                                        </div>
                                                  <!--  </div> --> 
                                             <!--   </div>-->
                                             <!--carousel-control1--> 
                                           <!-- </div>-->
                                        </li>
                                    </ul>
                                </nav>
                            </div> 
                        </div>    
                    </div>
                </div>
                <!--<div class="col-lg-9 pd0"> -->

                <!-- Rahul Sortlight -->
                <?php
                //$add = "SELECT a.categoryId,a.vendor_id,a.dealtitle, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.description,a.advertise_id, a.advertise_img, a.price, a.vendor_name, c.categoryName,cit.cityName,v.c_name,a.vendor_id FROM vendor_details v,advertisement a, category c,city cit WHERE a.categoryId = c.categoryId AND a.cityId=cit.cityId AND spotlightDeal='yes' AND is_delete=0 and  adv_type =  'SPOTLIGHT' and a.vendor_id = v.vendor_id order by RAND() LIMIT 16";
                 $add = "SELECT a.categoryId,a.vendor_id,a.dealtitle, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.description,a.advertise_id, a.advertise_img, a.price, a.vendor_name, c.categoryName,cit.cityName,v.c_name,a.vendor_id FROM vendor_details v,advertisement a, category c,city cit WHERE a.categoryId = c.categoryId AND a.cityId=cit.cityId AND spotlightDeal='no' AND is_delete=0 and v.status='1' and adv_type =  'FEATURED' and a.vendor_id = v.vendor_id order by a.advertise_id DESC LIMIT 12";
                $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                $index = 0;
                while ($addrow = mysqli_fetch_array($addresult)) {
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
                        
//                        $date21 = date('Y-m-d');
//                        $diff21 = date_diff(date_create($date21), date_create($advExpiryDate21));
                        
                        ?>
                        <div class="col-sm-3 col-xs-6  pckg-tab">
                            <div class="packages">
                            <div class="bor">
                                <div class="packagelist">
                                    <div class="col">
                                        <div class="tag"><?php echo $numberDay>0?$numberDay." Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                        <a href="vendor-profile.php?adv_id=<?php echo $addrow['advertise_id']; ?>"><img src="vendor_admin/images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
<!--                                        <div class="feat_light spot"> <?php // echo $adv_type; ?> </div>-->
                                    </div>
                                    <div class="details">
                                        <div class="border">
                                            <div class="deal pd0">
                                                <h5 class="mt0"><a href="vendor-profile.php?adv_id=<?php echo $addrow['advertise_id']; ?>"><strong><?php echo $dealtitle; ?></strong></a></h5>                                            
                                                <p><?php echo $comapny_name; ?></p>
                                            </div>
                                            <div class="deal-right pd0 pull-right">
                                                <span class=""><a href="chatnow.php">Chat Now</a></span>
                                                 <!--<span class="abhi"><a href="#">Chat Now</a></span>-->
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
                                                    <li><span class="ny"><?php custom_echo($addrow['cityName'], 2);  ?></span></li>
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

                <!-- Rahul Featured -->

<?php
/*
  $add1 = "SELECT a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.description,a.advertise_id, a.advertise_img, a.price, a.vendor_name, c.categoryName
  FROM advertisement a, category c
  WHERE a.categoryId = c.categoryId
  AND adv_type =  'FEATURED'
  order by RAND() LIMIT 6";

  $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
  $index = 0;
  while ($addrow1 = mysqli_fetch_array($addresult1)) {
  $index++;
  if ($index <= 6) {
  $price1 = $addrow1['price'];
  $vendor_name1 = $addrow1['vendor_name'];
  $adv_type1 = $addrow1['adv_type'];
  $category_name = $addrow1['categoryName'];
  $like1 = $addrow1['likes'];
  $advDisplayDate20 = $addrow1['advDisplayDate'];
  $advExpiryDate20 = $addrow1['advExpiryDate'];


  $date20 = date('Y-m-d');
  $diff20 = date_diff(date_create($date20), date_create($advExpiryDate20));
 * 
 */
?>

                <!--                        <div class="col-lg-3 col-xs-6  pckg-tab">
                                            <div class="packages">  
                                                <div class="packagelist">   
                                                    <div class="col">
                                                        <div class="tag"><?php // echo $diff20->format(" %a days left")  ?></div>
                                                        <img src="images/<?php //echo $addrow1['advertise_img'];  ?>" width="269" height="253">
                                                        <div class="feat_light spot"> <?php //echo $adv_type1;  ?> </div>
                                                        <div class="feat_light feat">FEATURED</div>
                                                    </div>
                                                    <div class="details">
                                                        <div class="border">
                                                            <div class="deal pd0">
                                                                <h5 class="mt0"><strong>$<?php //echo $price1;   ?>  Off Packages</strong></h5>
                                                                <p> <?php //echo $vendor_name1;   ?> </p>
                                                            </div>
                                                            <div class="deal-right pd0 pull-right">
                                                                <span><a href="chatnow.html">Chat Now</a></span>
                                                            </div>
                                                        </div>
<?php
//$aid = $addrow1['advertise_id'];
?> 
                                                        <form  name="add_form_feaured" >
                                                            <div class="likes">
                                                                <ul>

                                                                    <input type="hidden" name="advertise_id" value='<?php //echo $addrow1['advertise_id'];   ?> '/>                                                                     
                                                                    <li> <a onclick="doSomething(<?php echo $addrow1['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>" ><?php echo $like1; ?> </span>  </a></li>

                                                                    <li><span> <?php // echo $category_name;   ?> </span></li>
                                                                    <li><span class="ny">NY</span></li>
                                                                </ul>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->


<?php
//}
//}
?>                                    
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
       <!-- <img src="images/<?php// echo $banner_image3; ?>" width="460" height="345">-->
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
                <a class="get_scoop" href="wedding_deals.php">FIND DEALS</a>
            </div>
        </div>
    </div>

    <!--End all-question --->

    <!-- get-inspired --->

    <div class="get-inspired"> 
        <div class="container">
            <div class="col-sm-4 col-xs-4">
                <div class="get-inspired-left">
                    <span>ONLY ON LoveStruck Deals</span>
                    <h3><strong>chat with vendors</strong></h3>
                    <p>Live chat with your favorite vendors! No <br/>
                        registration required, it’s 100% free and <br/>
                        private. Simply click and chat!
                    </p>
                    <a class="see_photos">CHAT NOW</a>
                </div>
            </div>

            <div class="col-sm-8 col-xs-8">
                <div class="get-inspired-right">
                    <img src="images/inspire_right_img.jpg" />
                </div>
            </div>
        </div>
    </div>

    <!-- End get-inspired --->  
    <!-- photos---> 
    <div class="photos container-fluid">
<?php
//$input_sort1 = $_POST['sort1'];
$add3 = "SELECT bridalImgName FROM bridalbanner WHERE isdele='0'";
$addresult5 = mysqli_query($mysqli, $add3) or die(mysqli_error());
while ($addrow5 = mysqli_fetch_assoc($addresult5)) {
    $banner_image5 = $addrow5['bridalImgName'];
    ?>
            <div class="col-sm-3 col-xs-3"><img src="images/<?php echo $banner_image5; ?>" width="385" height="542"></div>
            <!--<div class="col-lg-3"><img src="images/img_2.jpg" width="385" height="542"></div>
                   <div class="col-lg-3"><img src="images/img_3.jpg" width="385" height="542"></div>
                   <div class="col-lg-3"><img src="images/img_4.jpg" width="385" height="542"></div>-->
    <?php
}
?>
    </div>

    <!-- End photos--->
    <div class="clearfix"></div>

    <!-- End trending-wedding---> 

    <!--<div class="container-fluid trending-wedding">

        <h2 class="brd container"><span>trending wedding deals</span></h2>
        <div id="oceanCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
    <!-- Indicators

    <!-- Wrapper for slides
    <div class="container">
        <div class="hdn">

            <div class="carousel-inner" role="listbox">
                <div class="owl-item">
                    <div class="item active">
<?php /* ?> <?php
  $add3 = "SELECT trenddealImgName FROM trenddealbanner WHERE isdel='0' limit 0,3";
  $addresult5 = mysqli_query($mysqli, $add3) or die(mysqli_error());
  $count = 0;

  while ($addrow5 = mysqli_fetch_assoc($addresult5)) {
  $count ++;
  if ($count < 6) {
  $banner_image6 = $addrow5['trenddealImgName'];
  ?><?php */ ?>

                        <div class="col-lg-4">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 pd0"><img src="images/<?php echo $banner_image6; ?>" /></div>


                            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 pd0 col-lg-offset-1 prm"> 
                                <p class="hrt-bg Robo">184 liked this deal</p>

                                <h3><strong>CRESS FLORAL DECORATORS</strong></h3>

                                <span>Flowers</span>

                                <p class="mt5">Tom and Lori cress’s artistry<br />
                                    and commitment made my <br />
                                    daughters wed..... </p>
                            </div>
                        </div>

<?php /* ?>  <?php } else { ?>
  <?php }
  } ?><?php */ ?></div>
        </div>

    </div>
</div>

</div>
<a class="left carousel-control" href="#oceanCarousel" role="button" data-slide="prev">

<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#oceanCarousel" role="button" data-slide="next">

<span class="sr-only">Next</span>
</a>
</div>
</div>-->
    <!-- End trending-wedding--->

    <!-- old trending-wedding--->

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


                                    <!--<div class="col-lg-4">
                                                     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 pd0"><img src="images/Xaaza_115.png" /></div>
                                                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 pd0 col-lg-offset-1 prm"> 
                                                                 <p class="hrt-bg Robo">184 liked this deal</p>
                                                                 
                                                                 <h3><strong>CRESS FLORAL DECORATORS</strong></h3>
                                                                          
                                                                 <span>Flowers</span>
                                                                          
                                                                 <p class="mt5">Tom and Lori cress’s artistry<br />
                                                                    and commitment made my <br />
                                                                    daughters wed..... </p>
                                                        </div>
                                                    </div>-->
                                    <!--<div class="col-lg-4">
                                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 pd0"><img src="images/Xaaza_115.png" /></div>
                                            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 pd0 col-lg-offset-1 prm"> 
                                                     <p class="hrt-bg Robo">184 liked this deal</p>
                                                     
                                                     <h3><strong>CRESS FLORAL DECORATORS</strong></h3>
                                                              
                                                     <span>Flowers</span>
                                                              
                                                     <p class="mt5">Tom and Lori cress’s artistry<br />
                                                        and commitment made my <br />
                                                        daughters wed..... </p>
                                            </div>
                                        </div>-->
                                    <!--                        <div class="col-lg-4">
                                                             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 pd0"><img src="images/Xaaza_115.png" /></div>
                                                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 pd0 col-lg-offset-1 prm"> 
                                                                         <p class="hrt-bg Robo">184 liked this deal</p>
                                                                         
                                                                         <h3><strong>CRESS FLORAL DECORATORS</strong></h3>
                                                                                  
                                                                         <span>Flowers</span>
                                                                                  
                                                                         <p class="mt5">Tom and Lori cress’s artistry<br />
                                                                            and commitment made my <br />
                                                                            daughters wed..... </p>
                                                                </div>
                                                            </div>-->
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

                <span class="sr-only">Previous</span>
            </a>

            <a class="right carousel-control" href="#oceanCarousel" role="button" data-slide="next">

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
        <!-- <img src="images/<?php //echo $banner_image4; ?>" width="500" height="500"> -->
        <img src="images/<?php echo $banner_image4; ?>">
        <script type="javascript"  >
            function openRequestedPopup()
            {
            window.open('')

            }
        </script>
        <div class="container">
            <div class="search">
                <h3>Let's go</h3>
                <p>Get the latest 
                    deals into your inbox!</p>
                    <!--<input type="txet" placeholder="Enter your email address here"  align="middle"/>-->
                <a  class="join button" data-toggle="modal" role="button" data-target="#myModal" >Get Deals</a>

                <!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">Details Form</h4>
                            </div>

                            <div class="modal-body">
                                <div class="views">
                                    <form method="post" action="insertform.php" onsubmit="return validatemanageform();">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" name="name1"  id="name1"placeholder="Name">
                                            <div id="name1_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Your Name</font></div>
                                            <div id="name1_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter Your Valid Name</font></div>

                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label> 
                                            <input type="text" name="email" id="txtemail" placeholder="Email">
                                            <div id="txtemail_error" style="display:none"class="error_msg">Please Enter Email ID</div>
                                            <div id="txtemail_error1" style="display:none"class="error_msg">Please Enter Your Valid Email ID</div>

                                        </div>
                                        <div class="form-group"> 
                                            <label> Select Category:</label>
                                            <div class="sub_cate">
                                                        <?php
                                                        include './config.php';
                                                        $sql = "SELECT * FROM category where isdel=0";
                                                        $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                    <div class="cate_gory">
                                                        <label><?php echo $row['categoryName']; ?></label>
                                                        <input type="checkbox" name="cat[]" value="<?php echo $row['categoryId']; ?>" >
                                                    </div> 
    <?php
}
?>
                                            </div>	  
                                        </div>

                                        <div class="form-group">
                                            <label>State:</label>
                                            <select name="state[]" id="state-list " onChange="getCity(this.value);">
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
                                        </div>

                                        <div class="form-group">
                                            <label>City : </label>

                                            <select name="city[]" id="city-list" multiple="multiple" class="special" size="3" >
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

                                        </div>
										<div class="form-group">
                                        <label>&nbsp;</label>
                                        <button  name="submit" type="submit" value="submit" class="btn blu-btn" id="sub">Save changes</button></div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>





<!--<script src="js/bootstrap.js"></script>  -->


<!--    <script>
        $(document).ready(function () {
            document.getElementById('txtAddress').setAttribute('autocomplete', 'off');
            var txtAddress;
            //googel autosearch textbox
            function initialize() {
                /*
                 var options = {
                 componentRestrictions: { country: "in" }
                 };*/

                var txtAddress = document.getElementById('txtAddress');
                var autocomplete = new google.maps.places.Autocomplete(txtAddress);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
            //end google autosearch textbox
        });
        //end txtAddress blur


    </script>-->
    
    


<!--Start of Tawk.to Script-->


<script>
    $("document").ready( function(){
        $(".abhi").click( function(){
            alert("Abhi");
            
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/56795bff189c2a551bbd3feb/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
            
        } );
    } );
</script>

<!--End of Tawk.to Script-->
   <!-- <script>

        $(document).ready(function () {

            var owl = $("#owl-demo");

            owl.owlCarousel({
                items: 10, //10 items above 1000px browser width
                itemsDesktop: [1000, 5], //5 items between 1000px and 901px
                itemsDesktopSmall: [900, 3], // betweem 900px and 601px
                itemsTablet: [600, 2], //2 items between 600 and 0
                itemsMobile: [0, 1] // itemsMobile disabled - inherit from itemsTablet option
            });
        });


    </script>-->
    <script type="text/javascript">


 var owl = $("#owl-demo");

      owl.owlCarousel({

      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0;
      itemsMobile :[400,1] // itemsMobile disabled - inherit from itemsTablet option
      
      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000);
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })





</script>

    <script type="text/javascript">
        function doSomething(add_id)
        {            
            var a = $('#item1 span').text();
            var sessionid='<?php echo $sessionid; ?>';                 
            $.ajax({
                type: "POST",
                url: 'indexins.php?sessionid='+sessionid,
                data: {'add_id': add_id},
                success: function (resp) {
                    //alert(resp);
                    $("#likes_new_" + add_id).html(resp);
                }
            });            
        }

    </script>

    




   <!-- <script src="../owl-carousel/owl.carousel.js"></script>-->
    <!-- End lets-go --->


    <!---- Retweet-deals ---> 
<!--    <div class="Retweet-deals">
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
                    <li><a class="ft-instg" target="_blank" href="<?php //echo $rowsocial1['instragram']; ?>">Instagram</a></li>
                    <li><a class="ft-fb" target="_blank" href="<?php //echo $rowsocial1['facebook']; ?>">Facebook</a></li> 
                    <li><a class="ft-twt" target="_blank" href="<?php //echo $rowsocial1['twitter']; ?>">Twitter</a></li>
                    <li><a class="ft-pinte" target="_blank" href="<?php //echo $rowsocial1['pinterest']; ?>">pinterest</a></li>
                </ul>
            </div>
        </div>
    </div>-->


<?php include './vendorlogin.php';?>
    <div class="Retweet container">
        <span><strong>Photo credits:</strong> 
            <a href="http://www.christophegenty.com/napaweddingphotographers/index.html" target="_blank">Christophe Genty Photography, </a>
            <a href="http://www.studiomerimaphotography.com" target="_blank">Studio Merima, </a>
            <a href="Lin & Jirsa Photography" target="_blank">Lin & Jirsa Photography, </a>
            <a href="http://www.nataliefranke.com" target="_blank">Natalie Franke Photography</a>
        </span>

    </div>

    <!----End Retweet-deals ---> 

<?php include 'footer.php'; ?>
