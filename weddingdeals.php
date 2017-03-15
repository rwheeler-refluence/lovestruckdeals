<?php
session_start();
$sessionid = session_id();
include './header.php';
include './config.php';
include './validation_enquiryform.php';
include './urlseo.php';

$id = $_GET['cat_id'];
$cat_id = $_POST['cat'];
$id1 = intval($_POST['cat_id']);
$id != null ? $catid = $id : $catid = $id1;
$sqlpage = "SELECT * FROM category where categoryId='$id'";
$resultpage = mysqli_query($mysqli, $sqlpage) or die(mysqli_error());
$rowpage = mysqli_fetch_array($resultpage);
$h1 = $rowpage['h1'];
$title = $rowpage['title'];
$description = $rowpage['description'];
?>
<script type="text/javascript">
    $(document).ready(function () {
        var fID = "<?php echo $id; ?>";
        var fID2 = "<?php echo $id1; ?>";
        if (fID != '') {
            $.ajax({
                url: "https://www.lovestruckdeals.com/filterpages",
                type: "POST",
                data: {'cat': fID.valueOf()},
                success: function (data) {
                    $("#filter").html(data);
                },
                error: function () {
                }
            });
        } else {
            $.ajax({
                url: "https://www.lovestruckdeals.com/filterpages",
                type: "POST",
                data: {'cat': fID2.valueOf()},
                success: function (data) {
                    $("#filter").html(data);
                },
                error: function () {
                }
            });
        }
    });
</script>

<?php
//end fiter id get
$cityID = $_GET['cityName'];
$city1 = $_POST['cityID'];
$city = ($cityID != null ? $cityID : $city1);
//seacheing the city and state wise 
$StateID = strval($_GET['stateID']);
$state1 = $_POST['stateID'];
$StateID != null ? $state = $StateID : $state = $state1;
$city = $_POST['cityID'];
$qry = $mysqli->query("SELECT sid FROM state WHERE sname = '$state'");
$row = $qry->fetch_row();
$sid = $row[0];
//$row = $qry->fetch_array();$sid=$row[0];
$qry1 = $mysqli->query("SELECT cityId FROM city WHERE cityName = '$city'");
$row = $qry1->fetch_row();
$cid = $row[0];
//print_r($_POST);exit;
$condition = "";
if ($sid != NULL && $cid == NULL && $catid == NULL) {
    $condition.=" And a.sid='" . $sid . "'";
} else if ($sid != NULL && $cid != NULL && $catid == NULL) {
    $condition.=" And a.sid='" . $sid . "' And a.cityId='" . $cid . "'";
} else if ($sid != NULL && $cid != NULL && $catid != NULL) {
    $condition.=" And a.sid='" . $sid . "' And a.cityId='" . $cid . "' And a.categoryId='" . $catid . "'";
} else if ($sid == NULL && $cid == NULL && $catid != NULL) {
    $condition.=" And a.categoryId='" . $catid . "'";
} else if ($sid != NULL && $cid == NULL && $catid != NULL) {
    $condition.=" And a.sid='" . $sid . "' And  a.categoryId='" . $catid . "'";
}

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
<style>
    #country-list{float:left;list-style:none;margin:0;padding:0;width:87%;position:absolute;z-index:99;}
    #country-list li{padding:8px 10px; background:#F5F5F5;border-bottom:#F0F0F0 1px solid;font-size:14px;}
    #country-list li:hover{background:#F0F0F0;}
    .venue h1{display: block;text-transform: uppercase;font-size: 23px;text-align: left;margin: 15px 0;}
</style>

<script type="text/javascript">
    $(document).ready(function (e) {
        var state = '<?php echo $state; ?>';
        var city = '<?php echo $city; ?>';
        if (state != null)
        {
            getCitySearches(state);
            $("#city-Name").val('<?php echo $city; ?>');
        }
        $("#data").on('submit', (function (e) {
            e.preventDefault();
            var CatId = $("#basic1").val();
            var StateId = $("#basic").val();
            var CityId = $("#city-Name").val();
            $.ajax({
                async: false,
                url: "https://www.lovestruckdeals.com/searchcategory",
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
            $(".paging").each(function (index, element) {
                $(this).attr("href", ($(this).attr("href") + (CatId != "" ? ("&cat_id=" + CatId) : "") + (StateId != null ? ("&stateID=" + StateId) : "") + (CityId != null ? ("&cityName=" + CityId) : "")));
            });
            // fliter data
            $.ajax({
                url: "https://www.lovestruckdeals.com/filterpages",
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
        //enquriy from 
        $('a.getaID').click(function () {
            var status_id = $(this).attr('href');
            $('#aid').val(status_id);
           
        });

        $('#filter').click(function () {
            //  $( this ).toggleClass( "highlight" );
            $("#gw-sidebar").toggleClass('sidebar-fixed');
            $('body').toggleClass('sidebar-fixed');
        });
    });
    function getCitySearches(val)
    {
        //debugger;
        $.ajax({
            type: "POST",
            url: "https://www.lovestruckdeals.com/citySearches",
            data: 'stateID=' + val,
            success: function (data) {

                $("#city-Name").html(data);
                $("#city-Name").selectpicker('refresh');
            }
        });
    }
    function filtercategory(add_id, basic1, stateID, cityID)
    {
        //debugger; 
        var stateID = $('#basic').val();
        var cityID = $('#city-Name').val();
        var cat = $('#basic1').val();
//        var a = $('#item1 span').text(); 
        $.ajax({
            type: "POST",
            url: 'https://www.lovestruckdeals.com/searchcategory',
            data: {'add_id': add_id, 'cat': cat, 'stateID': stateID, 'cityID': cityID},
            success: function (resp) {
                $("#grid").html(resp);
            }
        });
    }
    function doSomething(add_id)
    {
        var a = $('#item1 span').text();
        var sessionid = '<?php echo $sessionid; ?>';
        $.ajax({
            type: "POST",
            url: 'https://www.lovestruckdeals.com/indexins?sessionid=' + sessionid,
            data: {'add_id': add_id},
            success: function (resp) {
                //alert(resp);
                $("#likes_new_" + add_id).html(resp);
            }
        });
    }
</script>
<div class="wrapper">
    <!-- wedding_deals ---> 
    <div class="wedding_deals">
        <div class="col-lg-12">
            <div class="container">
                <div class="venue">
                    <div class="col-sm-12">
                        <h1>WEDDING DEALS</h1>                			 
                    </div>
                </div>  
                <form  name='data'  method="POST" enctype="multipart/form-data"  id="data"  onsubmit="return searchdeal();" >                    
                    <div class="col-sm-10 mt30 pdzero col-xs-12 xcate_search"><!---->                                               
                        <div class="col-sm-3 col-xs-6 pdzero text-center">
                            <div class="serch-inner">
                                Enter State Name
                                
                            </div>
<!--                            <div class="loc1"></div>-->
                            <select id="basic" name="stateID" class="selectpicker show-tick"  data-live-search="true" onchange="getCitySearches(this.value);">
                                <option selected disabled>Enter State Name</option>
                                <?php
                                $qry = "SELECT sname from state ORDER BY sname";
                                $addresult = mysqli_query($mysqli, $qry) or die(mysqli_error());
                                while ($addrow = mysqli_fetch_array($addresult)) {
                                    ?>
                                    <option value="<?php echo $addrow["sname"]; ?>" <?php if ($addrow["sname"] == $state) { ?> selected="selected" <?php } ?>><?php echo $addrow["sname"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>                                             
                        <div class="col-sm-3 col-xs-6 pdzero">   
                            <div class="serch-inner">
                                Enter City Name
                                
                            </div>
<!--                            <div class="loc1"></div>                                                                                         -->
                            <select id="city-Name" name="cityID" class="selectpicker show-tick" data-live-search="true">
                                <option selected disabled> Enter City Name</option>
                                <?php
                                $qry = "SELECT sid, cityName from city ORDER BY cityName";
                                $addresult = mysqli_query($mysqli, $qry) or die(mysqli_error());
                                while ($addrow = mysqli_fetch_array($addresult)) {
                                    ?>
                                    <option value="<?php echo $addrow["cityName"]; ?>" <?php if ($addrow["cityName"] == $city) { ?> selected="selected" <?php } ?>><?php echo $addrow["cityName"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>                                   
                        </div>
                        <div class="col-sm-4 col-xs-12 pdzero cate-main" id="ctaid">
                            <div class="categry">
                                All  Categories
                            </div>                                           
                            <select id="basic1" name="cat" class="selectpicker show-tick  services" >
                                <option selected="selected" class="pdl" value="">All  Categories</option>
                                <?php
                                $sql = "SELECT categoryId,categoryName FROM category where isdel='0'";
                                $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
                                while ($row = mysqli_fetch_array($result)) {
                                    $cid1 = $row['categoryId'];
                                    ?>                                                  
                                    <option value="<?php echo $row['categoryId']; ?>" <?php if ($cid1 == $catid) { ?> selected="selected" <?php } ?>> <?php echo $row['categoryName']; ?></option>                                       
                                    <?php
                                }
                                ?> 
                            </select>
                            <!-- <option>All  Catagories</option>-->                            
                        </div>

                        <div class="col-sm-2 col-xs-12 pdzero">
                            <input type="submit" name="search" value="Search" class="btn blu-btn ser-new-btn">                                   
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-4 pd0 mt20 pull-right">
                        <div class="col-sm-4 col-xs-1 pd0"></div>
                        <div class="col-sm-4 col-xs-5 pd0">
                            <div class="venue-right photo">
                                <a href="weddingdeals"><p>Photo</p></a>
                            </div>
                        </div>

                        <div class="col-sm-4 col-xs-5 pd0">
                            <div class="venue-right list">
                                <a href="<?php echo ROOT_PATH; ?>categorylist?cat_id=<?php echo $id; ?>"><p>List</p></a>
                            </div>
                        </div>

                    </div>
                </form>
                <!-- Filter By  -->
                <div class="mt30 border_img"><img src="<?php echo ROOT_PATH; ?>images/line_163.png"><h1><?php echo $h1; ?></h1></div>             
                <div name="fliterID" class="col-lg-3 filter-data" id="filter">
                    <div class="filter-by">  

                        <h4 class="gw-menu-text">Filter By</h4> 
                        <div class="mfilter"></div>
                        <div class="filteroverlay"></div>
                        <div class="gw-sidebar mt40">
                            <div id="gw-sidebar" class="gw-sidebar">
                                <div class="nano-content">                          
                                    <ul class="gw-nav gw-nav-list" data-toggle="modal">                             
                                        <li class="init-arrow-down"> 
                                            <a href="javascript:void(0)"> 
                                                <span class="gw-menu-text">Type </span>                                                        
                                                <b class="gw-arrow icon-arrow-up8"></b> 
                                            </a>
                                            <ul class="gw-submenu" style="display:none;">
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
                <?php
                $perpage = 12;
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                }
                $start_from = ($page - 1) * $perpage;
                ?>
                <div class="col-lg-9 pd0" id="grid1"></div>
                <div class="col-lg-9 pd0" id="grid">  
                    <?php
                    $add = "SELECT a.vendor_id, a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,v.c_name,cit.cityName
                                FROM advertisement a, category c,vendor_details v,city cit
                                WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id  and a.cityId=cit.cityId
                                AND is_delete='0' " . $condition . " AND adv_type =  'SPOTLIGHT' and v.status = '1' order by a.advertise_id desc";

                    $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                    $index = 0;
                    while ($addrow = mysqli_fetch_array($addresult)) {
                          $title = $addrow['c_name'];
                       $string = slug ($title);
                      $tu_id= $addrow['advertise_id'];
                        $index++;
                        if ($index <= 3) {
                            $price = $addrow['price'];
                            $companyname = $addrow['c_name'];
                            $adv_type = $addrow['adv_type'];
                            $title = $addrow['dealtitle'];
                            $like2 = $addrow['likes'];
                            $advDisplayDate = $addrow['advDisplayDate'];
                            $advExpiryDate = $addrow['advExpiryDate'];
                            $city = $addrow['cityName'];
                            $systemdate = date("Y-m-d");
                            $numberDay = dateDiff($systemdate, $advExpiryDate);
                            ?>
                            <div class="col-sm-4 col-xs-12 pckg-tab">
                                <div class="packages packages2">
                                    <div class="bor">
                                        <div class="col rspsv_img">
                                            <div class="tag"><?php echo $numberDay > 0 ? $numberDay . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left");      ?></div>
                                            <a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id.'/'.$string; ?> "><img src="<?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
                                            <div class="feat_light spot"><?php echo $adv_type; ?></div>
                                        </div>
                                        <div class="details">
                                            <div class="border">
                                                <div class="deal pd0">
                                                    <h5 class="mt0"><a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id.'/'.$string; ?> "><strong>
        <?php company_echo($title, 14); ?></strong></a></h5>
                                                    <p><?php company_echo($companyname, 14); ?></p>
                                                </div>
                                                <div class="deal-right deal-static pd0 pull-right" >
                                                    <span><a id="getaID" class="getaID" href="<?php echo $id1 = $addrow['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal12">Message</a></span>
                                                </div>
                                            </div>
                                            <?php
                                            $aid = $addrow['advertise_id'];
                                            ?> 
                                            <form  name="add_form">
                                                <div class="likes lks_rspsv">
                                                    <input type="hidden" name="advertise_id" value='<?php echo $addrow['advertise_id']; ?> '/>
                                                    <ul>
                                                        <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow['advertise_id']; ?>" >&nbsp;<?php echo $like2; ?> </span>  </a></li>
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
                    <!-- Rahul Featured -->
                    <div class="featured">
                        <?php
                        $add1 = "SELECT a.vendor_id,a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id,v.c_name,a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,v.fname,cit.cityName
                                              FROM advertisement a, category c,vendor_details v,city cit
                                              WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id  AND a.cityId=cit.cityId AND is_delete='0' AND v.isdel='1' " . $condition . " AND adv_type =  'FEATURED'  and v.status = '1' order by a.advertise_id desc limit $start_from,$perpage";
                        $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
                        $count = mysqli_num_rows($addresult1);
                        while ($addrow1 = mysqli_fetch_array($addresult1)) {
                            $title = $addrow1['c_name'];
                       $string = slug ($title);
                      $tu_id= $addrow1['advertise_id'];
                            $price1 = $addrow1['price'];
                            $company_name1 = $addrow1['c_name'];
                            $adv_type1 = $addrow1['adv_type'];
                            $like3 = $addrow1['likes'];
                            $advDisplayDate1 = $addrow1['advDisplayDate'];
                            $advExpiryDate1 = $addrow1['advExpiryDate'];
                            $city = $addrow1['cityName'];
                            $systemdate1 = date("Y-m-d");
                            $numberDay1 = dateDiff($systemdate1, $advExpiryDate1);
                            ?>
                            <div class="col-sm-3 col-xs-6 pckg-tab pd0">
                                <div class="packages">  
                                    <div class="bor">   
                                        <div class="col">

                                            <div class="tag"><?php echo $numberDay1 > 0 ? $numberDay1 . "Days Left" : "1 Day Left"  //echo $diff->format("%a days left");      ?></div>
                                            <a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id.'/'.$string; ?> "> <img src="<?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow1['advertise_img']; ?>" width="269" height="253" alt="wedding venues"></a>

                                        </div>
                                        <div class="details">
                                            <div class="border">
                                                <div class="deal pd0">
                                                    <h5 class="mt0"><a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id.'/'.$string; ?> "><strong><?php company_echo($addrow1['dealtitle'], 14); ?></strong></a></h5>
                                                    <p> <?php company_echo($company_name1, 14); ?> </p>
                                                </div>
                                                <div class="deal-right pd0 pull-right">

                                                    <span><a id="getaID" class="getaID" href="<?php // echo $id1 = $addrow1['advertise_id']; ?>" data-aid = "<?php echo $addrow1['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal12">Message</a></span>
                                                </div>
                                            </div>
                                            <?php
                                            $aid = $addrow1['advertise_id'];
                                            ?> 
                                            <form  name="add_form">
                                                <div class="likes">
                                                    <input type="hidden" name="advertise_id" value='<?php echo $addrow1['advertise_id']; ?> '/>
                                                    <ul>
                                                        <li> <a onclick="doSomething(<?php echo $addrow1['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>" >&nbsp;<?php echo $like3; ?> </span>  </a></li>
                                                        <li><span><?php custom_echo($addrow1['categoryName'], 18); ?></span></li>
                                                        <li><span class="ny"><?php custom_echo($addrow1['cityName'], 2); ?></span></li>

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
                    <div class="bs-example">
                        <ul class="pagination monts">
                            <?php
                            $add11 = "SELECT a.vendor_id,a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id,v.c_name,a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,v.fname,cit.cityName
                                              FROM advertisement a, category c,vendor_details v,city cit
                                              WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id  AND a.cityId=cit.cityId AND is_delete='0' AND v.isdel='1' " . $condition . " AND adv_type =  'FEATURED'  and v.status = '1' order by a.advertise_id desc";
                            $addresult11 = mysqli_query($mysqli, $add11) or die(mysqli_error());
                            $total_records = mysqli_num_rows($addresult11);
                            $total_pages = ceil($total_records / $perpage);
                            ?>
                            <li><a class='paging' href='<?php echo ROOT_PATH; ?>weddingdeals?cat_id=<?php
                                if ($id == '0') {
                                    echo "";
                                } else {
                                    echo $id;
                                }
                                ?>&page=1'>&laquo;</a></li>
                                <?php
                                for ($i = 1; $i <= $total_pages - 1; $i++) {
                                    ?>
                                <li><a id='ff' class='paging' href ='<?php echo ROOT_PATH; ?>weddingdeals?stateID=<?php echo $StateID; ?>&cityName1=<?php echo $cityID; ?>&cat_id=<?php
                                    if ($id == '0') {
                                        echo "";
                                    } else {
                                        echo $id;
                                    }
                                    ?>&page=<?php echo $i ?>'><?php echo $i ?></a></li>
                                    <?php
                                    // echo '&nbsp;';
                                };
                                ?>

                            <li><a class='paging' href ='<?php echo ROOT_PATH; ?>weddingdeals?stateID=<?php echo $StateID; ?>&cityName=<?php echo $cityID; ?>&cat_id=<?php
                                if ($id == '0') {
                                    echo "";
                                } else {
                                    echo $id;
                                }
                                ?>&page=<?php echo $total_pages; ?>'><?php echo $total_pages; ?></a></li>

                        </ul>
                    </div>
                </div>
            </div>                  	
        </div>
    </div>                    
    <?php
include './newsletter_sidebar.php';
?>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content1">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Filter Information </h4>
                </div>
                <div class="modal-body">
                    <p>To refine your search using filters, please select a category. You may also select your desired location to further narrow the results</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Contact this vendor</h4>
                </div>
                <div class="modal-body">
                    <div class="views">
                        <form method="post" action="<?php echo ROOT_PATH; ?>enquiry" onsubmit="return validatemanageform();">
                            <input type="hidden" id="pageNo" name="pageNo" value="2" />
                            <input type="hidden" id="aid" name="aid" value="" /> 
                            <div class="form-group mt0">
                                <label><h4 class="mt0"></h4></label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 pd0">
                                    <label>Name:</label>
                                </div>
                                <div class="col-sm-10 pd0">
                                    <input type="text" name="name1"  id="name1"placeholder="Name">
                                    <div id="name1_error" style="display:none;"class="error_msg" ><font color="red"> Please Enter Your Name</font></div>
                                    <div id="name1_error1" style="display:none;"class="error_msg" ><font color="red"> Please Enter Your Valid Name</font></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 pd0">
                                    <label>Email:</label> 
                                </div>
                                <div class="col-sm-10 pd0">
                                    <input type="text" name="email" id="txtemail" placeholder="Email">
                                    <div id="txtemail_error" style="display:none;" class="error_msg">Please Enter Email ID</div>
                                    <div id="txtemail_error1" style="display:none;" class="error_msg">Please Enter Your Valid Email ID</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 pd0">
                                    <label>Message:</label>
                                </div>
                                <div class="col-sm-10 pd0"> 
                                    <textarea rows="4" cols="40" name="contactNo" id="txtcontact" placeholder="Message"></textarea>
                                    <div id="txtcontact_error" style="display:none;" class="error_msg">Please Enter Message</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 pd0">
                                    <label>&nbsp;</label>
                                </div>
                                <div class="col-sm-10 pd0">
                                    <button  name="submit" type="submit" value="submit" class="btn blu-btn" id="sub">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?php
include "footer.php";
?>
</div>
<script>
        
        $('#myModal12').on('show.bs.modal', function(e) {
           
            var anid = $(e.relatedTarget).data('aid')
            
            var modal = $(this)

            modal.find('#aid').val(anid)
            
        });
    </script>