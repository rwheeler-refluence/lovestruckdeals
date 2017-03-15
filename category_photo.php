<?php
    include './header.php';
    include './config.php';
    include './valaidation_search.php';  
                   
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
    <link rel="stylesheet" type="text/css" href="css/bs_leftnavi.css">
    <script src="js/bs_leftnavi.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,places"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <style>
        #country-list{float:left;list-style:none;margin:0;padding:0;width:87%;position:absolute;z-index:99;}
        #country-list li{padding:8px 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;font-size:14px;}
        #country-list li:hover{background:#F0F0F0;}
    </style>
    <script>
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

//        $(document).ready(function(){
//	$("#search-box1").keyup(function()
//        {           
//		$.ajax({
//		type: "POST",
//		url: "stateSearches.php",
//		data:'state='+$(this).val(),
//		beforeSend: function(){
//			$("#search-box1").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
//		},
//		success: function(data){
//			$("#suggesstion-box1").show();
//			$("#suggesstion-box1").html(data);
//			$("#search-box1").css("background","#FFF");
//		}
//		});
//	});
//    });
//    
//    function selectState(val) 
//    {                 
//        $("#search-box1").val(val);
//        $("#suggesstion-box1").hide();
//    } 
//    
//    
//    $(document).ready(function()
//    {
//	$("#search-box").keyup(function()
//        {           
//		$.ajax({
//		type: "POST",
//		url: "citySearches.php",
//		data:'city='+$(this).val(),
//		beforeSend: function(){
//			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
//		},
//		success: function(data){
//			$("#suggesstion-box").show();
//			$("#suggesstion-box").html(data);
//			$("#search-box").css("background","#FFF");
//		}
//		});
//	});
//    });
//
//    function selectCountry(val) 
//    {        
//        $("#search-box").val(val);
//        $("#suggesstion-box").hide();
//    }
    
    function filtercategory(add_id,cat,txtAddress)
    {
      
        var a = $('#item1 span').text();
       // debugger;
        $.ajax({
            type: "POST",
            url: 'searchcategory.php',
            data: {'add_id': add_id,'cat': cat,'txtAddress':txtAddress},
            success: function (resp) {
                //alert(resp);
                //$("#likes_new_" + add_id).html(resp);
                $("#grid").html(resp);
            }
        });
    }
    
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
    
//    $(document).ready(function (e) {      
//        $("#data").on('submit', (function (e) {
//            e.preventDefault();
//            $.ajax({
//                url: "searchcategory.php",
//                type: "POST",
//                data: new FormData(this),
//                contentType: false,
//                cache: false,
//                processData: false,
//                success: function (data) {
//                    $("#grid").html(data);
//                   
//                },
//                error: function () {
//                }
//
//            });
//            // fliter data
//            $.ajax({
//                url: "filterpages.php",
//                type: "POST",
//                data: new FormData(this),
//                contentType: false,
//                cache: false,
//                processData: false,
//                success: function (data) {
//                    $("#filter").html(data);
//                   
//                },
//                error: function () {
//                }
//
//            });                        
//        }));
//    });
   
//     $(document).ready(function () {        
//            document.getElementById('txtAddress').setAttribute('autocomplete', 'off');
//            var txtAddress;
//            //googel autosearch textbox
//            function initialize() {
//               /*
//                var options = {
//                    componentRestrictions: { country: "in" }
//                };*/
//                
//                var txtAddress = document.getElementById('txtAddress');
//                var autocomplete = new google.maps.places.Autocomplete(txtAddress);
//            }
//            google.maps.event.addDomListener(window, 'load', initialize);
//            //end google autosearch textbox
//        });
        //end txtAddress blur
 
// like funcationality 
/*
    function doSomething(add_id,cat,txtAddress)
    {
      
        var a = $('#item1 span').text();
       // debugger;
        $.ajax({
            type: "POST",
            url: 'searchcategory.php',
            data: {'add_id': add_id,'cat': cat,'txtAddress':txtAddress},
            success: function (resp) {
                //alert(resp);
                //$("#likes_new_" + add_id).html(resp);
                $("#grid").html(resp);
            }
        });
    }    
    
    */
    
    
   
//serach locations and cataegory wise results
/*function getCatategorywiseResults(val) 
            {
                var catid = document.form.cat.value;
                var address = document.form.txtAddress.value;
           debugger;
                $.ajax({
                    type: "POST",
                    url: "searchcategory.php",
                    data:{ categoryId: catid, Address: address },
                    success: function (data) 
                    {
                      $("#grid").html('');
                    $("#grid").html(data);
                     e.preventDefault();
                      
                    }
                });
            }*/
  /* function match(){
       var catid = document.form.cat.value;
                var address = document.form.txtAddress.value;
                alert(catid);
                alert(address);
       debugger;
  
   }  */           
    
    </script>

    <!-- wedding_deals ---> 
    <div class="wedding_deals">
        <div class="col-lg-12">
            <div class="container">
             	<div class="venue">
                    <div class="col-lg-10">
                        <h2 class="monts mt15">Wedding near <span>new york,ny</span></h2>                			 
<!--                        <p class="sprite" id="cat">Categories</p>                     -->
                    </div>
                    
                    <div class="col-lg-2 pull-right pd0">
                        <div class="col-lg-4"></div>
                            <div class="col-lg-4 pd0">
                                <div class="venue-right photo">
                                    <a href="category_photo.php"><p>Photo</p></a>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 pd0">
                                <div class="venue-right list">
                                    <a href="category_list.php"><p>List</p></a>
                                </div>
                            </div>
                            <!--<div class="col-lg-4 pd0"><div class="venue-right map"><a href="#"><p>Map</p></a></div></div>-->
                    </div>
                </div>  
                
                <form  name='data' id="data" method="POST" enctype="multipart/form-data" onsubmit="return validatesearchcp()" action="searchindexcategorylocation.php">                    
                    <div class="col-sm-8 mt30 col-sm-push-2">
                        <div class="col-lg-4">
                                    <div class="loc2"></div>
                                        <input type="text" value="" id="txtAddress" name="txtAddress" placeholder="Enter Location" class="btn-group bootstrap-select show-tick">
                                        <div id="address_errorcp" style="display:none"class="error_msg" ><font color="red"> Please Search Correct State And City</font></div>
                                        <div id="address_errorclp" style="display:none"class="error_msg" ><font color="red"> Please Search Valid State And City</font></div>
                       
                        </div>                                                                                             
                    
                        <div class="col-lg-4" id="ctaid">
                            <div class="categories2"></div>                                           
                                <select id="basic1" name="cat" class="selectpicker show-tick  services" >
                                    <option>All  Categories</option>
                                    <?php  
                                        $sql = "SELECT categoryId,categoryName FROM category where isdel='0'";
                                        $result = mysqli_query($mysqli, $sql) or die(mysqli_error());                                            
                                        while ($row = mysqli_fetch_array($result)) 
                                        {                                                
                                    ?>                                                    
                                            <option value="<?php echo $row['categoryId'];?>"><?php echo $row['categoryName'];?></option>                                       
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
                                               /* $sql = "SELECT * FROM cat_attributes WHERE categoryId='$id' and  parent_id = 0";
                                                $result = mysqli_query($mysqli, $sql) or die(mysqli_error());

                                                  while ($row = mysqli_fetch_array($result)) 
                                                    {
                                                          $atr_id = $row['atr_id'];
                                                          $atr_name = $row['atr_name'];*/?>

                                                <li class="init-arrow-down"> 
                                                    <a href="javascript:void(0)"> 
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
                            $perpage = 8;
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
                                $add="SELECT a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description,a.dealtitle, a.advertise_img, a.price, a.vendor_name, c.categoryName,v.c_name,cit.cityName
                                FROM advertisement a, category c,vendor_details v,city cit
                                WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id  and a.cityId=cit.cityId
                                AND adv_type =  'SPOTLIGHT' AND is_delete='0' order by a.advDisplayDate DESC";
                               
                                $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());

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
                                                                <h5 class="mt0"><strong><a href="vendor-profile.php?adv_id=<?php echo $addrow['advertise_id']; ?>"><?php echo $addrow['dealtitle'];?></a></strong></h5>
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
                                $add1="SELECT a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description,a.dealtitle, a.advertise_img, a.price, a.vendor_name, c.categoryName,v.c_name,cit.cityName
                                              FROM advertisement a, category c,vendor_details v,city cit
                                              WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id  AND a.cityId=cit.cityId AND a.is_delete='0' AND adv_type =  'FEATURED' order by a.advDisplayDate desc limit $start_from,$perpage" ;
                                $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
                                while ($addrow1 = mysqli_fetch_array($addresult1)) 
                                {
                                    $price1 = $addrow1['price'];
                                    $comapny_name = $addrow1['c_name'];
                                    $adv_type1 = $addrow1['adv_type'];
                                    $like3 = $addrow1['likes'];
                                    $advDisplayDate1 = $addrow1['advDisplayDate'];
                                    $advExpiryDate1 = $addrow1['advExpiryDate'];  
                                    $city=$addrow1['cityName'];                                        
                                    $systemdate1 = date("Y-m-d");
                                    $numberDay1 = dateDiff($systemdate1, $advExpiryDate1);  
                            ?>
                   
                                    <div class="col-lg-3 pckg-tab pd0">
                                        <div class="packages">  
                                            <div class="bor">   
                                                <div class="col">
<!--                                                    <div class="tag">30 days left</div>-->
                                                    <div class="tag"><?php echo $numberDay1>0?$numberDay1." Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                                    <a href="vendor-profile.php?adv_id=<?php echo $addrow1['advertise_id']; ?>"> <img src="images/<?php echo $addrow1['advertise_img']; ?>" width="269" height="253"></a>
                                                      <!--<div class="feat_light spot"><?php echo $adv_type1 ?></div>-->
                                                    <!--<div class="feat_light feat">FEATURED</div>-->
                                                </div>
                                                
                                                <div class="details">
                                                    <div class="border">
                                                        <div class="deal pd0">
                                                            <h5 class="mt0"><strong><a href="vendor-profile.php?adv_id=<?php echo $addrow1['advertise_id']; ?>"><?php echo $addrow1['dealtitle'];?></a></strong></h5>
                                                            <p><?php echo $comapny_name;?></p>
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
                                                                <li><span><?php custom_echo($addrow1['categoryName'], 1); ?></span></li>
                                                                 <li><span class="ny"><?php custom_echo($addrow1['cityName'], 2);  ?></span></li>
<!--                                                                <li><span class="ny">NY</span></li>-->
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
                        </div>
                      </div>
                        <div class="bs-example">
                            <ul class="pagination  mt40">
                                    <?php
                                            $qry = "SELECT * FROM advertisement where is_delete='0'";
                                            $res = mysqli_query($mysqli, $qry);
                                            $total_records = mysqli_num_rows($res);
                                            $total_pages = ceil($total_records / $perpage);

                                            echo "<li><a href='category_photo.php?page=1'>&laquo;</a></li>";        

                                            for ($i = 1; $i <= $total_pages; $i++) 
                                            {
                                                    echo"<li><a href ='category_photo.php?page=" . $i . "'>" . $i . "</a></li>";                       
                                            };                
                                            echo "<li><a href ='category_photo.php?page=$total_pages'>&raquo;</a></li>";
                                    ?>  
                            </ul>
                        </div>
            </div>                  	
        </div>
    </div>                    
    <!-- End wedding_deals --->  
    
    <div class="clearfix"></div>  
    <!---- Retweet-deals ---> 
<?php
    include "footer.php";
?>