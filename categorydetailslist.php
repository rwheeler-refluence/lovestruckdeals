<?php
session_start();    
$sessionid= session_id();
    include 'header.php';
    include './config.php';
    $id = $_GET['cat_id'];
    
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
    function dateDiff($start, $end) 
    {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);                                                       
    }                               
    
    $category="select categoryName from category where categoryId='".$id."'";
    $resultcategory= mysqli_query($mysqli, $category);
    $rowcategory=  mysqli_fetch_array($resultcategory);
   
    $add1 = "SELECT * FROM vendor_details WHERE vendor_id='$id' ";
    $result = mysqli_query($mysqli, $add1) or die(mysqli_error());
    $row = mysqli_fetch_array($result);

    $add2 = "SELECT * FROM advertisement WHERE advertise_id ='$id' and is_delete='0' ";
    $result1 = mysqli_query($mysqli, $add2) or die(mysqli_error());
    $row1 = mysqli_fetch_array($result1);
?>
    <!--
    <link type="text/css" href="css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700|Montserrat|Roboto' rel='stylesheet' type='text/css'>
    -->
    <link href="css/ddmenu.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/bs_leftnavi.css">
   
    <script src="js/ddmenu.js" type="text/javascript"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/bs_leftnavi.js"></script>
<!--    <script src="js/jquery.min.js"></script>-->
    <!--<script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.js"></script>-->
  
    <!--
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,places"></script>-->
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
    <!--<script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.slidingDiv').hide();
            $('.show_hide').click(function (e) {
                e.stopPropagation();
                $('.slidingDiv').slideToggle();
            });
            $('.slidingDiv').click(function (e) {
                e.stopPropagation();
            });

            $(document).click(function () {
                $('.slidingDiv').slideUp();
            });
            
            var categoryid='<?php echo $id; ?>';   
                 // fliter data
            $.ajax({
                url: "filterpagesindex.php?cat="+categoryid,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#filter").html(data);
                   
                },
                error: function () {
                }

            });  
        });
         function filtercategory(add_id)
            {                 
                var a = $('#item1 span').text();
                var catid='<?php echo $id; ?>';
                $.ajax({
                    type: "POST",
                    url: 'searchcategorylistindex.php',
                    data: {'add_id': add_id,'cat': catid},
                    success: function (resp) {                     
                        $("#grid").html(resp);
                    }
                });
            }

    </script>
    <style>
        #owl-demo .item{
            /*background: #3fbf79;*/
            padding: 30px 0px;
            /*  margin: 10px;*/
            color: #333;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            text-align: center;
        }
        #owl-demo .item a
        {
            font-size:0.7em;
            color:#333;
        }
        #owl-demo .owl-item
        {
            margin:0 12px 0 0;
        }
        #owl-demo .owl-carousel .owl-item .item
        {
            width:110px !important;
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
        .slidingDiv{position: absolute;
                    top: 52px;
                    left:40px;
                    background-color: #dddddd;
                    padding: 8px 9px;
                    min-width: 263px;
                    border-radius: 0 0 3px 3px;
                    z-index:9999;
                    text-align:left;
        }
        .slidingDiv:before{width: 0; 
                           height: 0; 
                           border-left: 10px solid transparent;
                           border-right: 10px solid transparent;
                           border-bottom: 10px solid #dddddd;position:absolute;top:-10px;left:43%;content:"";}
        .wel-tab{position:relative;}

        .slidingDiv input
        {
            font-size:13px;
            padding:10px 46px;
            margin:10px;
        }
        .slidingDiv div
        {width:100%;}
        .slidingDiv form lable
        {
            font-size:13px;
            margin-left:10px;
            margin-right:10px;
        }
        div.remember_me lable{
            float: left;
            line-height: 31px;
        }
        div input.submit {
            text-align: right;
            padding:7px 12px;
        }
    </style>
    <!-- wedding_deals ---> 

    <div class="wedding_deals">
        <div class="container">
            
            <div class="venue">
                <div class="col-lg-10">
                    <h2 class="monts mt15">Wedding Deals <?php echo strtolower($rowcategory['categoryName']); ?></h2>
                    <!--<p class="sprite" id="cat">Categories</p>-->
                </div>

                <div class="col-lg-2 pull-right pd0">
                    <div class="col-lg-4 pd0"></div>
                    <div class="col-lg-4 pd0"><div class="venue-right photo"><a href="categorydetails.php?cat_id=<?php echo $id; ?>"><p>Photo</p></a></div></div>
                    <div class="col-lg-4 pd0"><div class="venue-right list"><a href="categorydetailslist.php?cat_id=<?php echo $id; ?>"><p>List</p></a></div></div>                       
                </div>
            </div>

            <div class="wedding_deals mt40">
                <!-- <div class="col-lg-12">
                    <div class="container">-->
                <div class="holdr categories">
                    <!-- <h4 class="brd">GREAT WEDDING DEALS</h4>-->
                    <h4 class="brd"><span>GREAT WEDDING DEALS</span></h4>

                    <div class="wedding_deals_main">
                        <div class="cate_popup">    
                            <div class="container">
                                <nav id="ddmenu">
                                    <!--<div class="menu-icon"></div>-->
                                    <ul>
                                        <li class="full-width">
                                            <div class="more_details">
                                                <div class="col-md-12">
                                                    <img src="images/more.png" />
                                                </div>
                                                <span class="top-heading pd0 col-md-12">
                                                    <div class="customNavigation">
                                                        <!--   <a class="btn prev">Previous</a>-->
                                                        <a class="next">More Categories</a>
                                                        <!--<a class="btn play">Autoplay</a>
                                                        <a class="btn stop">Stop</a>-->
                                                    </div>
                                                </span>
                                            </div>
<!--                                            <span class="top-heading">

                                                <div class="customNavigation">
                                                       <a class="btn prev">Previous</a>
                                                    <a class="btn next">MORE Categories</a>
                                                    <a class="btn play">Autoplay</a>
                                                    <a class="btn stop">Stop</a>
                                                </div>
                                            </span>-->
                                            
                                            <div class="dd-inner">
                                                <div class="categories_deals"> 
                                                    <div class="dropdown"> <!--id="owl-demo"-->
                                                        <div id="owl-demo" class="owl-carousel">
                                                            <?php                                                               
                                                                $cat = "SELECT image,categoryName,categoryId FROM category WHERE isdel='0' and status=1";

                                                                $cat_addresult = mysqli_query($mysqli, $cat) or die(mysqli_error());
                                                                $index = 0;
                                                                while ($addrow = mysqli_fetch_array($cat_addresult)) {
                                                                    $index++;

                                                                if ($index <= 30) {
                                                                    $cat_image = $addrow['image'];
                                                                    $cat_name = $addrow['categoryName'];
                                                                    $cat_id = $addrow['categoryId'];
                                                                    ?>
                                                                    <div class="item"><a href="categorydetailslist.php?cat_id=<?php echo $cat_id ?>"><img src="categoryImage/<?php echo $cat_image; ?>" width="5" height="5" ><?php echo $cat_name ?></a> </div>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>                                                            
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div> 
                        </div>    
                    </div>                                        
                    <div class="clearfix"></div>                    
                </div>
                
                <div class="mt30"><img src="images/line_163.png"></div>              
                <div class="col-lg-3" >
                    <div class="filter-by" name="fliterID" class="filter-data" id="filter" >                       
                        <h4 class="gw-menu-text">Filter by</h4> 
                        <div class="gw-sidebar mt40">
                            <div id="gw-sidebar" class="gw-sidebar">
                                <div class="nano-content">
                                    <ul class="gw-nav gw-nav-list">
                                  
                                        <li class="init-arrow-down"> 
                                            <a href="javascript:void(0)"> 
<!--                                                    <span class="gw-menu-text"><?php //echo $atr_name;  ?> </span>-->
                                                <span class="gw-menu-text">Type </span>
                                                <b class="gw-arrow icon-arrow-up8"></b> 
                                            </a>
                                            <ul class="gw-submenu">
                                                <?php
                                                    $sql2 = "SELECT filterid,type FROM filter WHERE categoryId<>0";
                                                    $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error());
                                                    while ($row = mysqli_fetch_array($result2)) 
                                                    {
                                                        $sub_cat_id = $row['filterid'];
                                                        $sub_cat_name = $row['type'];
                                                ?>
                                                        <li class="init-arrow-down"> 
                                                            <a href="javascript:void(0)"> <span class="gw-menu-text"><?php echo $sub_cat_name; ?> </span> <b class="gw-arrow icon-arrow-up8"></b> </a> 
                                                        </li>
                                                <?php
                                                    }
                                                ?>
                                            </ul>
                                        </li>                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination for dealfis-->                   
                <?php    
                        $perpage = 6;
                        if (isset($_GET["page"])) 
                        {
                                $page = $_GET["page"];
                        } 
                        else 
                        {
                                $page = 1;
                        }
                        $start_from = ($page - 1) * $perpage;                                              
                ?>
                <!--Spotlight deal -->
                
                <div class="col-lg-9 pd0" id="grid">

                    <?php
                    $add = "SELECT a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description, a.dealtitle,a.advertise_img, a.price,v.c_name,a.vendor_name, c.categoryName,cit.cityName
                            FROM advertisement a, category c,vendor_details v,city cit
                            WHERE a.categoryId = c.categoryId 
                            AND a.categoryId =  '$id'
                            AND a.vendor_id = v.vendor_id
                            AND a.cityId=cit.cityId
                            AND is_delete=0
                            AND adv_type =  'SPOTLIGHT' 
                            order by RAND() LIMIT 6";
                                                      
                    $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                    $row= mysqli_num_rows($addresult);
                    if($row<=0)
                    {
                        echo "<br> Sorry! No Spotlight Deal Available for Current Category.<br>"; 
                    }
                    while ($addrow = mysqli_fetch_array($addresult)) {
                        $price = $addrow['price'];
                        $comapny_name = $addrow['c_name'];
                        $adv_type = $addrow['adv_type'];
                        $advertise_img = $addrow['advertise_img'];
                        $categoryName = $addrow['categoryName'];
                        $like = $addrow['likes'];
                        $advDisplayDate = $addrow['advDisplayDate'];
                        $advExpiryDate = $addrow['advExpiryDate'];
                        $advertise_id = $addrow['advertise_id'];
                        
                        $systemdate = date("Y-m-d");
                        $numberDay = dateDiff($systemdate, $advExpiryDate);   

                        ?>
                        <div class="col-lg-4 pckg-tab">
                            <div class="packages">
                                <div class="bor">
                                    <div class="col">
                                        <div class="tag"><?php echo $numberDay>0?$numberDay." Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
<!--                                        <div class="tag"><?php// echo $diff->format("%a days left"); ?></div>-->
                                        <a href="vendor-profile.php?adv_id=<?php echo $advertise_id; ?>"><img src="images/<?php echo $addrow['advertise_img'] ?>" width="269" height="253"/> </a>                                            
                                        <div class="feat_light spot"><?php echo $adv_type ?></div>
                                    </div>

                                    <div class="details">
                                        <div class="border">
                                            <div class="deal pd0">
                                                <h5 class="mt0"><strong>$<?php echo $addrow['dealtitle']; ?> </strong></h5>                                                   
                                                <p> <?php echo $comapny_name; ?> </p> 
                                            </div>
                                            <div class="deal-right pd0 pull-right">
                                                <span><a href="chatnow.html">Chat Now</a></span>
                                            </div>
                                        </div>
                                        <?php
                                            $aid = $addrow['advertise_id'];
                                        ?>                                    
                                        <form  name="add_form"  >
                                            <div class="likes">
                                                <ul>
                                                    <input type="hidden" name="advertise_id" value='<?php echo $addrow['advertise_id']; ?> '/>
                                                    <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow['advertise_id']; ?>" >&nbsp;<?php echo $like; ?> </span>  </a></li>
                                                    <li><span><?php custom_echo($addrow['categoryName'], 15); ?></span></li> 
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
    ?>

                    <?php
                    $add1 = "SELECT a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id,v.fname, a.description,a.dealtitle,a.advertise_img,cit.cityName,s.sname,a.vendor_name,v.v_email,v.c_website,v.c_telephone,v.c_telephone1,v.c_telephone2,c.categoryName
                            FROM advertisement a, category c,vendor_details v,city cit,state s
                            WHERE a.categoryId = c.categoryId
                            AND a.vendor_id = v.vendor_id
                            AND a.cityId=cit.cityId
                            AND a.sid=s.sid
                            AND a.categoryId =  '$id'
                            AND adv_type =  'FEATURED'
                            AND is_delete='0'
                            order by RAND() limit $start_from,$perpage";               
                    
                        $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
                        $row1= mysqli_num_rows($addresult1);                                                
                        if($row1<=0)
                        {
                            echo "<br> Sorry! No Featured Deal Available for Current Category. <br>"; 
                        }
                        while ($addrow1 = mysqli_fetch_array($addresult1)) {
                            $price1 = $addrow1['price'];
                            $vendor_name1 = $addrow1['vendor_name'];
                            $adv_type1 = $addrow1['adv_type'];
                            $category_name1 = $addrow1['categoryName'];
                            $like1 = $addrow1['likes'];
                            $email=$addrow1['v_email'];
                            $website=$addrow1['c_website'];
                            $advertise_img1 = $addrow1['advertise_img'];
                            $advDisplayDate1 = $addrow1['advDisplayDate'];
                            $advExpiryDate1 = $addrow1['advExpiryDate'];
                            $advertise_id1 = $addrow1['advertise_id'];

                            
                            $systemdate1 = date("Y-m-d");
                            $numberDay1 = dateDiff($systemdate1, $advExpiryDate1);                       
                            ?>

                            <div class="packagelist">                                        
                                        <div class="packages">
                                                <div class="col-lg-3">
                                                    <div class="pckg-tab">
                                                        <div class="bor">
                                                            <div class="col">
                                                                    <div class="tag"><?php echo $numberDay1>0?$numberDay1." Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                                                    <!--<div class="tag">30 days left</div>-->                                                                     
                                                                    <a href="vendor-profile.php?adv_id=<?php echo $advertise_id1; ?>"><img src="images/<?php echo $addrow1['advertise_img'] ?>" /> </a>
<!--                                                                    <div class="feat_light feat"><?php//echo $adv_type1; ?></div>-->
                                                                     <div class="feat_light feat">FEATURED</div>
                                                            </div>
                                                            <div class="details times-Square-left">
                                                                <div class="border ">
                                                                    <div class="deal pd0">
                                                                        <h5 class="mt0"><strong><?php echo $addrow1['dealtitle'];?></strong></h5>
                                                                        <p><?php echo $vendor_name1;?></p>
                                                                    </div>
                                                                    <div class="now pd0 pull-right">
                                                                        <span>
                                                                            <a href="chatnow.html">Chat Now</a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                
                                                                 <?php
                                                                    $aid = $addrow1['advertise_id'];
                                                                ?>
                                                                <div class="likes">
                                                                    <div class="col-lg-12 pd0">
                                                                        <ul>
<!--                                                                            <li><span class="heart">526</span></li>-->
                                                                            <li> <a onclick="doSomething(<?php echo $addrow1['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>" ><?php echo $like1; ?> </span>  </a></li>
                                                                            <li><span><?php custom_echo($addrow1['categoryName'], 15); ?></span></li>
                                                                            <li><span class="ny"><?php custom_echo($addrow1['cityName'], 2);  ?></span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-9 times-Square"> 
                                                    <div class="row">
                                                        <div class="col-lg-10 pd0">
<!--                                                            <h4 class="zx"><strong>The Times Square Orchestra</strong></h4>-->
                                                            <h4 class="zx"><strong><?php echo $addrow1['c_name']; ?></strong></h4>
                                                        </div>
                                                        <div class="now pull-right">
                                                            <span><a href="chatnow.html">Chat Now</a></span>
                                                        </div>
                                                    </div>

                                                    <div class="row tp">
                                                         <p><?php custom_echo($addrow1['description'], 50); ?></p>
                                                         <br>
                                                         
                                                        <p>  <?php echo $addrow1['sname'];?> ,<?php echo $addrow1['cityName'];?> | <?php echo $addrow1['c_telephone']; echo "-"; echo $addrow1['c_telephone1']; echo "-"; echo $addrow1['c_telephone2'];?></p>                                                            
                                                        <br/>
                                                       
                                                    </div>
                                                    <br />
                                                    <div class="row">
                                                        <div class="col-lg-3 pd0">
                                                            <d class="website contact">
<!--                                                                <a href="rushabh@wdipl.com" target="blank" class="color ">Contact Us</a>-->
                                                                    <a href="mailto:<?php echo $email; ?>?subject=Inquiry for the deal&body=Hello Vendor want to get information for the deal.">Send me an email</a>
                                                            </d>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <a href="http://<?php echo $website; ?>" target="blank" class="color website site">Website</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            <?php
                        }
                        ?>
                    <div class="featured">
                    </div>
                    <div class="bs-example">
                        <ul class="pagination  mt40">
                            <?php
                            $qry = "SELECT * FROM advertisement where is_delete='0'";
                            $res = mysqli_query($mysqli, $qry);
                            $total_records = mysqli_num_rows($res);
                            $total_pages = ceil($total_records / $perpage);

                            echo "<li><a href='categorydetailslist.php?page=1&cat_id=".$id."'>&laquo;</a></li>";

                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo"<li><a href ='categorydetailslist.php?page=".$i."&cat_id=".$id."'>" . $i . "</a></li>";
                            };
                            echo "<li><a href ='categorydetailslist.php?page=$total_pages&cat_id=".$id."'>&raquo;</a></li>";
                            ?>  
                        </ul>
                    </div>
                </div>  

            </div>
        </div>

    </div>
<!-- End wedding_deals ---> 
<div class="clearfix"></div>
<!---- Retweet-deals ---> 
<div class="line"></div>  

<!----End Retweet-deals ---> 
<!--<div class="Retweet-deals">
    <div class="container">
        <div class="col-lg-12">
            <div class="col-lg-6 bl pdr">
                <h4 class="mt10"><strong>New vendor? </strong></h4> 
                <a href="registration.php" class="bton blu-btn"><strong>Register Here</strong></a>
            </div>
            <div class="col-lg-6">
                <h4 class="mt10 mar-left"><strong>Already a XAAZA vendor?</strong></h4>  <a href="#" class="bton blu-btn"><strong>Log In Here</strong></a>
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
<?php include './vendorlogin.php'; ?>
<div class="Retweet container">
    <span><strong>Photo credits:</strong> 
        <a href="#" target="_blank">Fabrice Tranzer Photography </a>
        <!-- <a href="http://www.studiomerimaphotography.com">Studio Merima, </a>
         <a href="Lin & Jirsa Photography">Lin & Jirsa Photography, </a>
         <a href="http://www.nataliefranke.com">Natalie Franke Photography</a>-->
    </span>

</div>

<script>

    $(document).ready(function () {

        var owl = $("#owl-demo");

        owl.owlCarousel({
            items: 10, //10 items above 1000px browser width
            itemsDesktop: [1000, 5], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0
            itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
        });
    });

    $(document).ready(function () {

        var owl = $("#owl-demo");

        owl.owlCarousel({
            items: 10, //10 items above 1000px browser width
            itemsDesktop: [1000, 5], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // 3 items betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0;
            itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option

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


    });
</script>

<?php include 'footer.php'; ?>