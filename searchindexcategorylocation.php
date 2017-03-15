<?php
    include './header.php';
    include './config.php';
    include './validation_manageforms.php';
    include './includes/config.inc.php';
      
    $distances = array(
    200 => '200 Miles',
    100 => '100 Miles',
    50 => '50 Miles',
    );
    
    
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
         
  // $cat_id=$_GET['cat'];         
   // $address=$_GET['address']; 
    
   // echo "<br>Category id=".$cat_id;
   // echo "<br>Address=".$address;
   // exit();
    
    $cat_id=$_POST['cat'];         
    $address=$_POST['address']; 
    $latitude=$_POST['latitude'];
    $longitude=$_POST['longitude']; 
       
    
    if($cat_id!="" && $address!="")
    {            
        $val = explode(",", $address);
        $city = $val[0];
        $state = $val[1];

        $s1 = trim($state, " ");          
        $qrystate="select sid,sname from state where sname='".$s1."' ";      
        $resultstate= mysqli_query($mysqli, $qrystate);    
        $rowstate=  mysqli_fetch_array($resultstate);    
        $statename=$rowstate['sname'];
        $stateid=$rowstate['sid'];   

        $c1 = trim($city, " "); 
        $qrycity="select cityId,cityName from city where cityName='".$c1."' ";
        $resultcity=  mysqli_query($mysqli, $qrycity);
        $rowcity=  mysqli_fetch_array($resultcity);
        $cityid=$rowcity['cityId'];
        $cityname=$rowcity['cityName'];
    
        $condition="";   
        if(isset($stateid) && !empty($stateid))
        {
            $condition.=" AND s.sid = '".$stateid."'";                        
        }

         if(isset($cityid) && !empty($cityid))
        {
            $condition.=" AND cit.cityId='".$cityid."'";      
        }

        if(isset($cat_id) && !empty($cat_id))
        {
            $condition.=" AND c.categoryId='".$cat_id."'";       
        }
        
        $sqlcategoryname="select categoryName from category where categoryId='".$cat_id."'";
        $resultcategoryname=  mysqli_query($mysqli, $sqlcategoryname);
        $rowcategoryname=  mysqli_fetch_array($resultcategoryname);
          
?>
    <link rel="stylesheet" type="text/css" href="css/bs_leftnavi.css">
    <script src="js/bs_leftnavi.js"></script>    
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,places"></script>    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    
<!--    <script type="text/javascript" src="js/bootstrap-select.js"></script>
    <script src="js/jquery.min.js"></script>-->
    <style>
        #country-list{float:left;list-style:none;margin:0;padding:0;width:87%;position:absolute;z-index:99;}
        #country-list li{padding:8px 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;font-size:14px;}
        #country-list li:hover{background:#F0F0F0;}
    </style>

    
    
    <script type="text/javascript">       
    function doSomething(add_id)
    {
        var a = $('#item1 span').text();
        $.ajax({
            type: "POST",
            url: 'indexins.php',
            data: {'add_id': add_id},
            success: function (resp) {
                //alert(resp);
                $("#likes_new_"+add_id).html(resp);
            }
        });
    }
        
        $(document).ready(function (e) {             
        $("#data").on('submit', (function (e) {            
            e.preventDefault();
            $.ajax({
                url: "searchcategory.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {                                        
                    $("#grid").html(data);
                   
                },
                error: function () {
                }

            });
            
             $.ajax({
                url: "searchweadingcatlocation.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {                                        
                    $("#venue1").html(data);                                       
                },
                error: function () {
                }
                
                $(".venue").hide();
            });
                                    
            // fliter data
            $.ajax({
                url: "filterpages.php",
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
        }));
    });  
    </script>
<!--    
    <script type="text/javascript">
    
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
                                                               
    </script>-->
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
            
            var categoryid='<?php echo $cat_id; ?>';          
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
                var catid='<?php echo $cat_id; ?>';
                $.ajax({
                    type: "POST",
                    url: 'searchcategoryindex.php',
                    data: {'add_id': add_id,'cat': catid},
                    success: function (resp) {                     
                        $("#grid").html(resp);
                    }
                });
            }
    </script>
    
    
    <!-- wedding_deals ---> 
    <div class="wedding_deals">
        <div class="col-lg-12">
            <div class="container">
                
                <div id="venue1"> </div>
                
                
             	<div class="venue">
                    <div class="col-lg-10">
                        <h2 class="monts mt15">Wedding <?php echo strtolower($rowcategoryname['categoryName']);?> near <span><?php echo $cityname; ?> , <?php echo $statename; ?></span></h2>                			 
                         <!-- <p class="sprite" id="cat">Categories</p>-->
                    </div>
                    
                    <div class="col-lg-2 pull-right pd0">
                        <div class="col-lg-4"></div>
                            <div class="col-lg-4 pd0">
                                <div class="venue-right photo">
<!--                                    <a href="searchindexcategorylocation.php"><p>Photo</p></a>-->
                                    <a href="searchindexcategorylocation.php?address=<?php echo $address; ?>&cate=<?php echo $cat_id; ?>&stateid=<?php echo $stateid; ?>&cityid=<?php echo $cityid; ?>"><p>Photo</p></a>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 pd0">
                                <div class="venue-right list">
<!--                                    <a href="searchindexcategorylocationlist.php"><p>List</p></a>-->
                                    <a href="searchindexcategorylocationlist.php?address=<?php echo $address; ?>&cate=<?php echo $cat_id; ?>&stateid=<?php echo $stateid; ?>&cityid=<?php echo $cityid; ?>"><p>List</p></a>
                                    
                                </div>
                            </div>
                            <!--<div class="col-lg-4 pd0"><div class="venue-right map"><a href="#"><p>Map</p></a></div></div>-->
                    </div>
                </div>  
                
                <!--Ajex div-->
                
                                                
                <!-- Search location and category -->
                    <form  name='data' id="data" method="POST" enctype="multipart/form-data" >                    
                        <div class="col-sm-8 mt30 col-sm-push-2">                                                                                                                                       
                            <div class="col-lg-4">                                      
                                  <div id="suggesstion-box1"  class="loc2"></div>                                             
<!--                                  <input type="text" id="txtAddress" name="txtAddress" placeholder="Enter Location" value="<?php //echo $address; ?>" >-->
                                  <input type="text" id="address" name="address" placeholder="Enter Location" size="20" value="<?php echo $address; ?>">
                            </div>
                    
                            <div class="col-lg-4" id="ctaid">
                                <div class="categories2"></div>                                           
                                    <select id="basic1" name="cat" class="selectpicker show-tick  services" >
                                        <option selected="selected"  value="">All  Categories</option>
                                        <?php  
                                            $sql = "SELECT categoryId,categoryName FROM category where isdel='0'";
                                            $result = mysqli_query($mysqli, $sql) or die(mysqli_error());                                            
                                            while ($row = mysqli_fetch_array($result)) 
                                            {                                                
                                        ?>                                                    
                                                <option <?php if($cat_id == $row['categoryId']) echo 'selected="selected"'; ?> value="<?php echo $row['categoryId'];?>"><?php echo $row['categoryName'];?></option>                                                                                                                                       
                                        <?php                                                       
                                            }
                                        ?> 
                                    </select>
                                <!-- <option>All  Catagories</option>-->                            
                            </div>
                    
                            <div class="col-lg-4">
                                <input type="submit" name="search" value="Search" class="btn blu-btn ser-new-btn">                                   
                            </div>
                        </div>
                    </form>
                                               
                <!-- Filter By  -->
                <div class="mt30"><img src="images/line_163.png"></div>             
                    <div class="col-lg-3" name="fliterID" class="filter-data" id="filter" >
                  	<div class="filter-by">                    	
                            <h4 class="gw-menu-text">Filter by</h4> 
                            <div class="gw-sidebar mt40">
                                <div id="gw-sidebar" class="gw-sidebar">
                                    <div class="nano-content">                          
                                        <ul class="gw-nav gw-nav-list">                             
                                        <?php
                                              // echo $id = $_GET['cat_id'];
//                                                $sql = "SELECT filterid,type FROM filter WHERE categoryId='".$cat_id."'";
//                                                echo $sql;
//                                             
//                                                $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
//
//                                                  while ($row = mysqli_fetch_array($result)) 
//                                                    {
//                                                          $atr_id = $row['atr_id'];
//                                                          $atr_name = $row['atr_name'];?>

                                                <li class="init-arrow-down"> 
                                                    <a href="javascript:void(0)"> 
                                                        <span class="gw-menu-text">Type </span>
                                                        <b class="gw-arrow icon-arrow-up8"></b> 
                                                    </a>
                                                <ul class="gw-submenu">
                                                    <?php
                                                            $sql2 = "SELECT filterid,type FROM filter WHERE  isdel='1'and categoryId='".$cat_id."'";
                                                            $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error());
                                                            while ($row = mysqli_fetch_array($result2)) 
                                                            {
                                                                $sub_cat_id = $row['filterid'];
                                                                $sub_cat_name = $row['type']; ?>
                                                                <li class="init-arrow-down"> 
                                                                    <a href="javascript:void(0)"> <span class="gw-menu-text"><?php echo $sub_cat_name; ?> </span> <b class="gw-arrow icon-arrow-up8"></b> </a> 
                                                                </li>
                                                    <?php                                          
                                                            } 
                                                    ?>
                                                </ul>
                                            </li>
                                            <?php                                  
                                               // }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                
                    <!-- Pagination for dealfis-->                   
                    <?php    
                            $perpage = 12;
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
                    <!-- Rahul Sortlight -->
                
                    <div class="col-lg-9 pd0" id="grid1"></div>
                        <div class="col-lg-9 pd0" id="grid">  
                          
                            <?php
                                  
                                //$categoryid = $_GET['category_Id'];
                                //$add = "SELECT * FROM advertisement WHERE  adv_type='SPOTLIGHT'";
                                $add = "SELECT a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.vendor_id,a.categoryId, a.description,a.dealtitle, a.advertise_img, a.price, a.vendor_name, c.categoryName,cit.cityName,v.c_name
                                    FROM vendor_details v,advertisement a join category c on a.categoryId = c.categoryId 
                                    join state s  on s.sid=a.sid 
                                    join city cit on cit.cityId=a.cityId 
                                    WHERE 1=1 AND a.adv_type ='SPOTLIGHT' and is_delete='0' and a.vendor_id = v.vendor_id and a.is_delete=0 and a.spotlightDeal='yes'  ".$condition." ";                                             
                                                                                                                     
                                $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                                $row= mysqli_num_rows($addresult);                                      
                                if($row<=0)
                                {?>
                                   
                                <div class="col-md-12"><p>Sorry! No Spotlight Deal Available for Current Location and Category.</p></div>
                               <?php }

                                $index=0;
                                while ($addrow = mysqli_fetch_array($addresult)) 
                                {
                                    $index++;
                                    if($index <=3)
                                    {
                                        $price = $addrow['price'];
                                        $comapny_name = $addrow['c_name'];
                                        $adv_type = $addrow['adv_type'];
                                        $like2 = $addrow['likes'];
                                        $advDisplayDate = $addrow['advDisplayDate'];
                                        $advExpiryDate = $addrow['advExpiryDate'];  
                                        $city=$addrow['cityName'];
                                        
                                        $systemdate = date("Y-m-d");
                                        $numberDay = dateDiff($systemdate, $advExpiryDate);                                                                               
                                                                           
                                        
                            ?>
                                        <div class="col-lg-4 pckg-tab">
                                            <div class="packages">
                                                <div class="bor">
                                                    <div class="col">
                                                        <div class="tag"><?php echo $numberDay>0?$numberDay." Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                                            <a href="vendor-profile.php?adv_id=<?php echo $addrow['advertise_id']; ?>"><img src="images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
                                                            <?php echo  '<div class="feat_light spot">' . $adv_type .'</div>'; ?>
                                                    </div>
                                                    <div class="details">
                                                        <div class="border">
                                                            <div class="deal pd0">
                                                                <h5 class="mt0"><strong><a href="#"><?php echo $addrow['dealtitle'];?></a></strong></h5>
                                                                <p><?php echo $comapny_name;?></p>
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
                                                                    <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow['advertise_id']; ?>" >&nbsp;<?php echo $like2; ?> </span>  </a></li>
                                                                    <li><span><?php custom_echo($addrow['categoryName'], 15); ?></span></li>                                                       
                                                                    <li><span class="ny pull-right"><?php custom_echo($addrow['cityName'], 2);  ?></span></li>
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
                            
                    <!-- Rahul Featured -->
                              <div class="featured">
                            <?php
                                //$add1 = "SELECT * FROM advertisement WHERE adv_type='FEATURED'";
                                $add1 = "SELECT a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.vendor_id,a.advertise_id,a.categoryId, a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,cit.cityName,v.c_name,v.vendor_id
                                    FROM vendor_details v, advertisement a join category c on a.categoryId = c.categoryId 
                                    join state s  on s.sid=a.sid 
                                    join city cit on cit.cityId=a.cityId 
                                    WHERE 1=1 AND a.adv_type ='FEATURED' and is_delete='0' and a.vendor_id = v.vendor_id and a.is_delete=0 and a.spotlightDeal='no'  ".$condition."  limit $start_from,$perpage";                                                           
                               
                                $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
                                $row1= mysqli_num_rows($addresult1);                                                
                                if($row1<=0)
                                {
                                    echo "<br> Sorry! No Featured Deal Available for Current Location and Category.<br>"; 
                                }
                                while ($addrow1 = mysqli_fetch_array($addresult1)) 
                                {
                                    $price1 = $addrow1['price'];
                                    $comapny_name1 = $addrow1['c_name'];
                                    $adv_type1 = $addrow1['adv_type'];
                                    $like3 = $addrow1['likes'];
                                    $advDisplayDate1 = $addrow1['advDisplayDate'];
                                    $advExpiryDate1 = $addrow1['advExpiryDate'];  
                                    $city=$addrow1['cityName'];                                        
                                    $systemdate1 = date("Y-m-d");
                                    $numberDay1 = dateDiff($systemdate1, $advExpiryDate1);  
                            ?>
<!--                                <div class="featured">-->
                                    <div class="col-lg-3 pckg-tab pd0">
                                        <div class="packages">  
                                            <div class="bor">   
                                                <div class="col">
<!--                                                    <div class="tag">30 days left</div>-->
                                                    <div class="tag"><?php echo $numberDay1>0?$numberDay1." Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                                    <a href="vendor-profile.php?adv_id=<?php echo $addrow1['advertise_id']; ?>"> <img src="images/<?php echo $addrow1['advertise_img']; ?>" width="269" height="253"></a>
                                                    <?php echo  '<div class="feat_light spot">' . $adv_type1 .'</div>'; ?>
                                                    <div class="feat_light feat">FEATURED</div>
                                                </div>
                                                
                                                <div class="details">
                                                    <div class="border">
                                                        <div class="deal pd0">
                                                            <h5 class="mt0"><a href="#"><strong><?php echo $addrow1['dealtitle'];?></strong></a></h5>
                                                            <p><?php echo $comapny_name1;?></p>
                                                        </div>
                                                        <div class="deal-right pd0 pull-right">
                                                            <span><a href="chatnow.html">Chat Now</a></span>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $aid = $addrow1['advertise_id'];
                                                    ?> 
                                                    <form  name="add_form"  >
                                                        <div class="likes">
                                                            <ul>
                                                                <input type="hidden" name="advertise_id" value='<?php echo $addrow1['advertise_id']; ?> '/>
                                                                <li> <a onclick="doSomething(<?php echo $addrow1['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>" >&nbsp;<?php echo $like3; ?> </span>  </a></li>
                                                                <li><span><?php custom_echo($addrow1['categoryName'], 15); ?></span></li>
                                                                 <li><span class="ny pull-right"><?php custom_echo($addrow1['cityName'], 2);  ?></span></li>
<!--                                                                <li><span class="ny">NY</span></li>-->
                                                            </ul>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
<!--                                </div> -->
                                                         
                            <?php
                                }
                            ?>
                                
                        </div> 
                      
                        <div class="bs-example">
                            <ul class="pagination  mt40">
                                    <?php
                                    $qry = "SELECT * FROM advertisement where is_delete='0'";
                                    $res = mysqli_query($mysqli, $qry);
                                    $total_records = mysqli_num_rows($res);
                                    $total_pages = ceil($total_records / $perpage);

                                    echo "<li><a href='searchindexcategorylocation.php?page=1&cate=".$cat_id."&address=".$address."&stateid=".$stateid."&cityid=".$cityid."'>&laquo;</a></li>";

                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo"<li><a href ='searchindexcategorylocation.php?page=".$i."&cate=".$cat_id."&address=".$address."&stateid=".$stateid."&cityid=".$cityid."'>".$i."</a></li>";
                                    };
                                    echo "<li><a href ='searchindexcategorylocation.php?page=".$total_pages."&cate=".$cat_id."&address=".$address."&stateid=".$stateid."&cityid=".$cityid."'>&raquo;</a></li>";
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
       <?php include './vendorlogin.php'; ?>

<div class="Retweet container">
    <span><strong>Photo credits:</strong> 
        <a href="#" target="_blank">Fabrice Tranzer Photography </a>
        <!-- <a href="http://www.studiomerimaphotography.com">Studio Merima, </a>
         <a href="Lin & Jirsa Photography">Lin & Jirsa Photography, </a>
         <a href="http://www.nataliefranke.com">Natalie Franke Photography</a>-->
    </span>

</div>
<?php
    include "footer.php";    
    }
    else 
    {
        
        $cat_id=$_GET['cate'];
        $stateid=$_GET['stateid'];
        $cityid=$_GET['cityid']; 
        $address=$_GET['address'];
          
        $condition="";   
        if(isset($stateid) && !empty($stateid))
        {
            $condition.=" AND s.sid = '".$stateid."'";                        
        }

         if(isset($cityid) && !empty($cityid))
        {
            $condition.=" AND cit.cityId='".$cityid."'";      
        }

        if(isset($cat_id) && !empty($cat_id))
        {
            $condition.=" AND c.categoryId='".$cat_id."'";       
        }
        
        $sqlcategoryname="select categoryName from category where categoryId='".$cat_id."'";
        $resultcategoryname=  mysqli_query($mysqli, $sqlcategoryname);
        $rowcategoryname=  mysqli_fetch_array($resultcategoryname);
        
        $qrystate="select sname from state where sid='".$stateid."' ";      
        $resultstate= mysqli_query($mysqli, $qrystate);    
        $rowstate=  mysqli_fetch_array($resultstate);    

        $qrycity="select cityName from city where cityId='".$cityid."' ";
        $resultcity = mysqli_query($mysqli, $qrycity);
        $rowcity = mysqli_fetch_array($resultcity);
          
?>
    <link rel="stylesheet" type="text/css" href="css/bs_leftnavi.css">
    <script src="js/bs_leftnavi.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.js"></script>
    <script src="js/ddmenu.js" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,places"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <style>
        #country-list{float:left;list-style:none;margin:0;padding:0;width:87%;position:absolute;z-index:99;}
        #country-list li{padding:8px 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;font-size:14px;}
        #country-list li:hover{background:#F0F0F0;}
    </style>
<!--    <script type="text/javascript"> 
        $(document).ready(function () 
        {             
            $('form').submit(function () 
            {                
                var address = $.trim($('#txtAddress').val());     
                var category = $('#basic1').val();                                             
                if (address === '') 
                {
                    alert('Please Enter Location.');
                    return false;
                }                
                if (category === 'All  Categories') 
                {
                    alert('Please Select Category.');
                    return false;
                }                
            });            
        });       
    </script>-->
   
    <script type="text/javascript">  
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
        </script>
        <script type="text/javascript">  
          $(document).ready(function (e) {      
        $("#data").on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: "searchcategory.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {                                        
                    $("#grid").html(data);
                   
                },
                error: function () {
                }

            });
              $.ajax({
                url: "searchweadingcatlocation.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {                                        
                    $("#venue1").html(data);
                   
                },
                error: function () {
                }
                
                $(".venue").hide();

            });
            // fliter data
            $.ajax({
                url: "filterpages.php",
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
        }));
    });    
    </script>
    <script type="text/javascript"> 
      
    function doSomething(add_id)
    {
        var a = $('#item1 span').text();
        $.ajax({
            type: "POST",
            url: 'indexins.php',
            data: {'add_id': add_id},
            success: function (resp) {
                //alert(resp);
                $("#likes_new_"+add_id).html(resp);
            }
        });
    }                                                             
    </script>
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
            
            var categoryid='<?php echo $cat_id; ?>';          
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
                var catid='<?php echo $cat_id; ?>';
                $.ajax({
                    type: "POST",
                    url: 'searchcategoryindex.php',
                    data: {'add_id': add_id,'cat': catid},
                    success: function (resp) {                     
                        $("#grid").html(resp);
                    }
                });
            }
    </script>
    
    <!-- wedding_deals ---> 
    <div class="wedding_deals">
        <div class="col-lg-12">
            <div class="container">
                
                <div id="venue1"> </div>
                
             	<div class="venue">
                    <div class="col-lg-10">
                        <h2 class="monts mt15">Wedding <?php echo strtolower($rowcategoryname['categoryName']);?> near <span><?php echo $rowcity['cityName']; ?> , <?php echo $rowstate['sname']; ?></span></h2>                			 
                        <!--  <p class="sprite" id="cat">Categories</p>-->                      
                    </div>
                    
                    <div class="col-lg-2 pull-right pd0">
                        <div class="col-lg-4"></div>
                            <div class="col-lg-4 pd0">
                                <div class="venue-right photo">
<!--                                    <a href="searchindexcategorylocation.php"><p>Photo</p></a>-->
                                    <a href="searchindexcategorylocation.php?address=<?php echo $address; ?>&cate=<?php echo $cat_id; ?>&stateid=<?php echo $stateid; ?>&cityid=<?php echo $cityid; ?>"><p>Photo</p></a>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 pd0">
                                <div class="venue-right list">
<!--                                    <a href="searchindexcategorylocationlist.php"><p>List</p></a>-->
                                    <a href="searchindexcategorylocationlist.php?address=<?php echo $address; ?>&cate=<?php echo $cat_id; ?>&stateid=<?php echo $stateid; ?>&cityid=<?php echo $cityid; ?>"><p>List</p></a>
                                   
                                </div>
                            </div>
                            <!--<div class="col-lg-4 pd0"><div class="venue-right map"><a href="#"><p>Map</p></a></div></div>-->
                    </div>
                </div>  
                
                
                 <!-- Search location and category -->
                    <form  name='data' id="data" method="POST" enctype="multipart/form-data" >                    
                        <div class="col-sm-8 mt30 col-sm-push-2">                                                                                                                                       
                            <div class="col-lg-4">                                      
                                <div id="suggesstion-box1"  class="loc2"></div>                                            
                                <input type="text" id="txtAddress" name="txtAddress" placeholder="Enter Location" value="<?php echo $address; ?>">
                            </div>
                    
                            <div class="col-lg-4" id="ctaid">
                                <div class="categories1"></div>                                           
                                    <select id="basic1" name="cat" class="selectpicker show-tick  services" >
                                        <option selected="selected"  value="">All  Categories</option>
                                        <?php  
                                            $sql = "SELECT categoryId,categoryName FROM category where isdel='0'";
                                            $result = mysqli_query($mysqli, $sql) or die(mysqli_error());                                            
                                            while ($row = mysqli_fetch_array($result)) 
                                            {                                                
                                        ?>                                                    
                                                <option <?php if($cat_id == $row['categoryId']) echo 'selected="selected"'; ?> value="<?php echo $row['categoryId'];?>"><?php echo $row['categoryName'];?></option>                                       
                                        <?php                                                       
                                            }
                                        ?> 
                                    </select>
                                <!-- <option>All  Catagories</option>-->                            
                            </div>
                    
                            <div class="col-lg-4">
                                <input type="submit" name="search" value="Search" class="btn blu-btn ser-new-btn">                                   
                            </div>
                        </div>
                    </form>
                                               
                <!-- Filter By  -->
                <div class="mt30"><img src="images/line_163.png"></div>             
                    <div class="col-lg-3" name="fliterID" class="filter-data" id="filter" >
                  	<div class="filter-by">                    	
                            <h4 class="gw-menu-text">Filter by</h4> 
                            <div class="gw-sidebar mt40">
                                <div id="gw-sidebar" class="gw-sidebar">
                                    <div class="nano-content">                          
                                        <ul class="gw-nav gw-nav-list">                             
                                        <?php
                                              // echo $id = $_GET['cat_id'];
//                                                $sql = "SELECT filterid,type FROM filter WHERE categoryId='".$cat_id."'";
//                                                echo $sql;
//                                             
//                                                $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
//
//                                                  while ($row = mysqli_fetch_array($result)) 
//                                                    {
//                                                          $atr_id = $row['atr_id'];
//                                                          $atr_name = $row['atr_name'];?>

                                                <li class="init-arrow-down"> 
                                                    <a href="javascript:void(0)"> 
                                                        <span class="gw-menu-text">Type </span>
                                                        <b class="gw-arrow icon-arrow-up8"></b> 
                                                    </a>
                                                <ul class="gw-submenu">
                                                    <?php
                                                            $sql2 = "SELECT filterid,type FROM filter WHERE categoryId='".$cat_id."'";
                                                            $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error());
                                                            while ($row = mysqli_fetch_array($result2)) 
                                                            {
                                                                $sub_cat_id = $row['filterid'];
                                                                $sub_cat_name = $row['type']; ?>
                                                                <li class="init-arrow-down"> 
                                                                    <a href="javascript:void(0)"> <span class="gw-menu-text"><?php echo $sub_cat_name; ?> </span> <b class="gw-arrow icon-arrow-up8"></b> </a> 
                                                                </li>
                                                    <?php                                          
                                                            } 
                                                    ?>
                                                </ul>
                                            </li>
                                            <?php                                  
                                               // }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                
                
                     <?php    
                            $perpage = 12;
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
                    <!-- Rahul Sortlight -->
                
                    <div class="col-lg-9 pd0" id="grid1"></div>
                        <div class="col-lg-9 pd0" id="grid">  
                            
                            <?php
                                  
                                //$categoryid = $_GET['category_Id'];
                                //$add = "SELECT * FROM advertisement WHERE  adv_type='SPOTLIGHT'";
                                $add = "SELECT a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId, a.description,a.dealtitle, a.advertise_img, a.price, a.vendor_name, c.categoryName,cit.cityName,v.c_name
                                    FROM vendor_details v,advertisement a join category c on a.categoryId = c.categoryId 
                                    join state s  on s.sid=a.sid 
                                    join city cit on cit.cityId=a.cityId 
                                    WHERE 1=1 AND a.adv_type ='SPOTLIGHT' and  a.is_delete=0 and a.vendor_id = v.vendor_id and a.spotlightDeal='yes'  ".$condition." ";                                             
                                                                                                                     
                                $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                                $row= mysqli_num_rows($addresult);                                      
                                if($row<=0)
                                {
                                    echo "<br> Sorry! No Spotlight Deal Available for Current Location and Category."; 
                                }

                                $index=0;
                                while ($addrow = mysqli_fetch_array($addresult)) 
                                {
                                    $index++;
                                    if($index <=3)
                                    {
                                        $price = $addrow['price'];
                                        $cmname = $addrow['c_name'];
                                        $adv_type = $addrow['adv_type'];
                                        $like2 = $addrow['likes'];
                                        $advDisplayDate = $addrow['advDisplayDate'];
                                        $advExpiryDate = $addrow['advExpiryDate'];  
                                        $city=$addrow['cityName'];
                                        
                                        $systemdate = date("Y-m-d");
                                        $numberDay = dateDiff($systemdate, $advExpiryDate);                                                                               
                                                                           
                                        
                            ?>
                                        <div class="col-lg-4 pckg-tab">
                                            <div class="packages">
                                                <div class="bor">
                                                    <div class="col">
                                                        <div class="tag"><?php echo $numberDay>0?$numberDay." Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                                            <a href="vendor-profile.php?adv_id=<?php echo $addrow['advertise_id']; ?>"><img src="images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
                                                            <?php echo  '<div class="feat_light spot">' . $adv_type .'</div>'; ?>
                                                    </div>
                                                    <div class="details">
                                                        <div class="border">
                                                            <div class="deal pd0">
                                                                <h5 class="mt0"><strong><?php echo $addrow['dealtitle'];?></strong></h5>
                                                                <p><?php echo $cmname;?></p>
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
                                                                    <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow['advertise_id']; ?>" >&nbsp;<?php echo $like2; ?> </span>  </a></li>
                                                                    <li><span><?php custom_echo($addrow['categoryName'], 6); ?></span></li>                                                       
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
                            
                    <!-- Rahul Featured -->
                    <div class="featured">
                            <?php
                                //$add1 = "SELECT * FROM advertisement WHERE adv_type='FEATURED'";
                                $add1 = "SELECT a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId, a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,cit.cityName,v.c_name
                                    FROM vendor_details v, advertisement a join category c on a.categoryId = c.categoryId 
                                    join state s  on s.sid=a.sid 
                                    join city cit on cit.cityId=a.cityId 
                                    WHERE 1=1 AND a.adv_type ='FEATURED' and a.is_delete=0 and a.vendor_id = v.vendor_id and a.spotlightDeal='no'  ".$condition." limit $start_from,$perpage";                                                           
                               
                                $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
                                $row1= mysqli_num_rows($addresult1);                                                
                                if($row1<=0)
                                {
                                    echo "<br> Sorry! No Featured Deal Available for Current Location and Category."; 
                                }
                                while ($addrow1 = mysqli_fetch_array($addresult1)) 
                                {
                                    $price1 = $addrow1['price'];
                                    $cmpname = $addrow1['c_name'];
                                    $adv_type1 = $addrow1['adv_type'];
                                    $like3 = $addrow1['likes'];
                                    $advDisplayDate1 = $addrow1['advDisplayDate'];
                                    $advExpiryDate1 = $addrow1['advExpiryDate'];  
                                    $city=$addrow1['cityName'];                                        
                                    $systemdate1 = date("Y-m-d");
                                    $numberDay1 = dateDiff($systemdate1, $advExpiryDate1);  
                            ?>
<!--                                <div class="featured">-->

                                    <div class="col-lg-3 pckg-tab pd0">
                                        <div class="packages">  
                                            <div class="bor">   
                                                <div class="col">
<!--                                                    <div class="tag">30 days left</div>-->
                                                    <div class="tag"><?php echo $numberDay1>0?$numberDay1." Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                                    <a href="vendor-profile.php?adv_id=<?php echo $addrow1['advertise_id']; ?>"> <img src="images/<?php echo $addrow1['advertise_img']; ?>" width="269" height="253"></a>
                                                    <?php echo  '<div class="feat_light spot">' . $adv_type1 .'</div>'; ?>
                                                    <div class="feat_light feat">FEATURED</div>
                                                </div>
                                                
                                                <div class="details">
                                                    <div class="border">
                                                        <div class="deal pd0">
                                                            <h5 class="mt0"><strong><?php echo $addrow1['dealtitle'];?></strong></h5>
                                                            <p><?php echo $cmpname;?></p>
                                                        </div>
                                                        <div class="deal-right pd0 pull-right">
                                                            <span><a href="chatnow.html">Chat Now</a></span>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $aid = $addrow1['advertise_id'];
                                                    ?> 
                                                    <form  name="add_form"  >
                                                        <div class="likes">
                                                            <ul>
                                                                <input type="hidden" name="advertise_id" value='<?php echo $addrow1['advertise_id']; ?> '/>
                                                                <li> <a onclick="doSomething(<?php echo $addrow1['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>" >&nbsp;<?php echo $like3; ?> </span>  </a></li>
                                                                <li><span><?php custom_echo($addrow1['categoryName'], 6); ?></span></li>
                                                                 <li><span class="ny"><?php custom_echo($addrow1['cityName'], 2);  ?></span></li>
<!--                                                                <li><span class="ny">NY</span></li>-->
                                                            </ul>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
<!--                                   </div>                          -->
                            <?php
                                }
                            ?>
                        </div>

                        <div class="bs-example">
                            <ul class="pagination  mt40">
                                    <?php
                                    $qry = "SELECT * FROM advertisement where is_delete='0'";
                                    $res = mysqli_query($mysqli, $qry);
                                    $total_records = mysqli_num_rows($res);
                                    $total_pages = ceil($total_records / $perpage);

                                    echo "<li><a href='searchindexcategorylocation.php?page=1&cate=".$cat_id."&address=".$address."&stateid=".$stateid."&cityid=".$cityid."'>&laquo;</a></li>";

                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo"<li><a href ='searchindexcategorylocation.php?page=".$i."&cate=".$cat_id."&address=".$address."&stateid=".$stateid."&cityid=".$cityid."'>".$i."</a></li>";
                                    };
                                    echo "<li><a href ='searchindexcategorylocation.php?page=".$total_pages."&cate=".$cat_id."&address=".$address."&stateid=".$stateid."&cityid=".$cityid."'>&raquo;</a></li>";
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
    <?php include './vendorlogin.php'; ?>

<div class="Retweet container">
    <span><strong>Photo credits:</strong> 
        <a href="#" target="_blank">Fabrice Tranzer Photography </a>
        <!-- <a href="http://www.studiomerimaphotography.com">Studio Merima, </a>
         <a href="Lin & Jirsa Photography">Lin & Jirsa Photography, </a>
         <a href="http://www.nataliefranke.com">Natalie Franke Photography</a>-->
    </span>

</div>
<?php
    include "footer.php";
    }              
?>    