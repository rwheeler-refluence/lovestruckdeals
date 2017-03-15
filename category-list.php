<?php
    include "header.php";
    include "config.php";
    include './validation_enquiryform.php';
     include './urlseo.php';
    $id = $_GET['cat_id'];
    $cat_id = $_POST['cat'];
    $id != null ? $catid = $id : $catid = $id1;

    function dateDiff($start, $end) 
    {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);
    }
    //seacheing the city wise 
    $cityID = $_GET['cityName'];
    $city1 = $_POST['cityID'];
    $city = ($cityID != null ? $cityID : $city1);

    //seacheing the state wise 
    $StateID = strval($_GET['stateID']);
    $state1 = $_POST['stateID'];
    $StateID != null ? $state = $StateID : $state = $state1;


    $qry = $mysqli->query("SELECT sid FROM state WHERE sname = '$state'");
    $row = $qry->fetch_row();
    $sid = $row[0];

    $qry1 = $mysqli->query("SELECT cityId FROM city WHERE cityName = '$city'");
    $row = $qry1->fetch_row();
    $cid = $row[0];

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
?>
<link rel="stylesheet" type="text/css" href="css/bs_leftnavi.css">
<script src="js/bs_leftnavi.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<style>
    #country-list{float:left;list-style:none;margin:0;padding:0;width:87%;position:absolute;z-index:99;}
    #country-list li{padding:8px 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;font-size:14px;}
    #country-list li:hover{background:#F0F0F0;}
</style>

<script type="text/javascript">
    function filtercategory(add_id, basic1, stateID, cityID)
    {
        var stateID = $('#basic').val();
        var cityID = $('#city-Name').val();
        var cat = $('#basic1').val();
        var a = $('#item1 span').text();
        
        $.ajax({
            type: "POST",
            url: 'searchindexcategorylocationlist.php',
            data: {'add_id': add_id, 'cat': cat, 'stateID': stateID, 'cityID': cityID},
            success: function (resp) {
                $("#grid").html(resp);
            }
        });

        $(".paging").each(function (index, element) {
            $(this).attr("href", ($(this).attr("href") + (cat != "" ? ("&cat_id=" + cat) : "") + (stateID != null ? ("&stateID=" + stateID) : "") + (cityID != null ? ("&cityName=" + cityID) : "")));
        });
    }

    function getCitySearches(val)
    {
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

    function doSomething(add_id)
    {
        var a = $('#item1 span').text();
        $.ajax({
            type: "POST",
            url: 'indexins.php',
            data: {'add_id': add_id},
            success: function (resp) {
                //alert(resp);
                $("#likes_new_" + add_id).html(resp);
            }
        });
    }

    $(document).ready(function (e) {
        $("#data").on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: "searchindexcategorylocationlist.php",
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

<?php
    // Display Company name
    function company_echo($x, $length) 
    {
        if (strlen($x) <= $length) {
            echo $x;
        } else {
            $y = substr($x, 0, $length) . '';
            echo $y . " ...";
        }
    }

    //custom echo Functions
    function custom_echo($x, $length) 
    {
        if (strlen($x) <= $length) {
            echo $x;
        } else {
            $y = substr($x, 0, $length) . '';
            echo $y;
        }
    }
?>
<!-- wedding_deals ---> 
<div class="wedding_deals">
    <div class="col-lg-12">
        <div class="container">
            <div class="venue">
                <div class="col-sm-10 col-xs-8">
                    <h2 class="mt20">Wedding Deals</h2>                			 
                </div>
                <div class="col-sm-2 col-xs-4 pull-right pd0">
                    <div class="col-sm-4 col-xs-1 pd0"></div>
                    <div class="col-sm-4 col-xs-5 pd0">
                        <div class="venue-right photo">
                            <a href="wedding-deals.php"><p>Photo</p></a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-5 pd0">
                        <div class="venue-right list">
                            <a class="pageval" href="category-list.php?cat_id=<?php echo $catid; ?>">
                                <p>List</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <form  name='data' id="data" method="POST" enctype="multipart/form-data" action="searchindexcategorylocation.php">
                <div class="col-sm-10 mt30 mb30 col-sm-push-1 col-xs-12 wd100sm">
                    <div class="col-sm-3 col-xs-6 pdzero">
                        <div class="loc1"></div>
                        <select id="basic" name="stateID" class="selectpicker show-tick"  data-live-search="true" onchange="getCitySearches(this.value);">
                            <option selected disabled>Enter State Name</option>
                            <?php
                                $qry = "SELECT sname from state ORDER BY sname";
                                $addresult = mysqli_query($mysqli, $qry) or die(mysqli_error());
                                while ($addrow = mysqli_fetch_array($addresult)) 
                                {
                            ?>
                                <option value="<?php echo $addrow["sname"]; ?>" <?php if ($addrow["sname"] == $state) { ?> selected="selected" <?php } ?>><?php echo $addrow["sname"]; ?></option>
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
                                $qry = "SELECT c.sid, cityName from city c,state s where c.sid=s.sid and s.sname='$state' ORDER BY cityName";
                                $addresult = mysqli_query($mysqli, $qry) or die(mysqli_error());
                                while ($addrow = mysqli_fetch_array($addresult)) 
                                {
                            ?>
                                <option value="<?php echo $addrow["cityName"]; ?>" <?php if ($addrow["cityName"] == $city) { ?> selected="selected" <?php } ?>><?php echo $addrow["cityName"]; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4 col-xs-12 pdzero" id="ctaid">
                        <div class="categories2"></div>
                        <select id="basic1" name="cat" class="selectpicker show-tick  services" >
                            <option selected="selected"  value="">All  Categories</option>
                            <?php
                                $sql = "SELECT categoryId,categoryName FROM category where isdel='0'";
                                $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
                                while ($row = mysqli_fetch_array($result)) 
                                {
                            ?>
                                <option value="<?php echo $row['categoryId']; ?>" <?php if ($row['categoryId'] == $catid) { ?> selected="selected" <?php } ?>> <?php echo $row['categoryName']; ?></option>
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
            <!-- Filter By  -->
            <div class="mt30 border_img">
                <img src="images/line_163.png">
            </div>
            <div class="col-lg-3 col-xs-12" name="fliterID" class="filter-data" id="filter" >
                <div class="filter-by wd100 filtr_rspv">
                    <h4 class="gw-menu-text">Filter by</h4>
                    <div class="mfilter"></div>
                    <div class="filteroverlay"></div>
                    <div class="gw-sidebar mt40">
                        <div id="gw-sidebar" class="gw-sidebar">
                            <div class="nano-content">
                                <ul class="gw-nav gw-nav-list" data-toggle="modal" data-target="#myModal">
                                    <li class="init-arrow-down">
                                        <a href="javascript:void(0)"> 
                                            <span class="gw-menu-text">Type </span>
                                            <b class="gw-arrow icon-arrow-up8"></b> 
                                        </a>
                                        <ul class="gw-submenu">    
                                            <?php echo $sub_cat_name; ?> 
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
            <div class="col-lg-9 pd0" id="grid1"></div>
            <div class="col-lg-9 col-xs-12 pd0" id="grid">
            <?php
                
                $add = "SELECT a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,v.c_name,cit.cityName,v.vendor_id
                                FROM advertisement a, category c,vendor_details v,city cit
                                WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id  and a.cityId=cit.cityId
                                AND is_delete='0' " . $condition . " AND adv_type =  'SPOTLIGHT' AND is_delete='0' and v.status = '1' order by a.advertise_id desc ";
                $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                while ($addrow = mysqli_fetch_array($addresult)) {
                    $index++;
                    if ($index <= 3) {
                        $price = $addrow['price'];
                        $comapny_name = $addrow['c_name'];
                        $adv_type = $addrow['adv_type'];
                        $like2 = $addrow['likes'];
                        $advDisplayDate = $addrow['advDisplayDate'];
                        $advExpiryDate = $addrow['advExpiryDate'];
                        $string = slug($title);
                         $tu_id = $addrow['advertise_id'];
                        //$city=$addrow['cityName'];

                        $systemdate = date("Y-m-d");
                        $numberDay = dateDiff($systemdate, $advExpiryDate);
            ?>
                <div class="col-sm-4 pckg-tab">
                    <div class="packages packages2">
                        <div class="bor">
                            <div class="col rspsv_img">
                                <div class="tag">
                                    <?php echo $numberDay > 0 ? $numberDay . " Days Left" : "1 Day Left"?>
                                </div>
                                <!--<a href="vendor-profile.php?adv_id=<?php // echo $addrow['advertise_id']; ?>"><img src="vendor_admin/images/<?php // echo $addrow['advertise_img']; ?>" width="269" height="253">-->
                                 <a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id . '/' . $string; ?>"><img src="<?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>

                            <!--</a>-->
                                <div class="feat_light spot"><?php echo $adv_type; ?></div>
                            </div>
                            <div class="details">
                                <div class="border">
                                    <div class="deal pd0">
                                        <h5 class="mt0">
                                            <strong>
                                                <a href="vendor-profile.php?adv_id=<?php echo $addrow['advertise_id']; ?>"><?php company_echo($addrow['dealtitle'], 25); ?>
                                                </a>
                                            </strong>
                                        </h5>
                                        <p><?php company_echo($comapny_name, 25); ?></p>
                                    </div>
                                    <div class="deal-right deal-static pd0 pull-right">
                                        <span>
                                            <a id="getaID" class="getaID" href="<?php echo $id1 = $addrow['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Chat Now
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <?php
                                    $aid = $addrow['advertise_id'];
                                ?> 
                                <form  name="add_form">
                                    <div class="likes lks_rspsv">
                                        <input type="hidden" name="advertise_id" value='<?php echo $addrow['advertise_id']; ?> '/>
                                        <ul>
                                            <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow['advertise_id']; ?>"><?php echo $like2; ?></span>  </a></li>
                                            <li><span><?php custom_echo($addrow['categoryName'], 18); ?></span></li>                                                       
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
                <div class="featured">
                    <?php
                        $add1 = "SELECT 
                                    a.vendor_id,
                                    a.categoryId, 
                                    a.adv_type,
                                    a.likes,
                                    a.advDisplayDate,
                                    a.advExpiryDate,
                                    a.advertise_id,
                                    v.c_name,
                                    a.description,
                                    a.dealtitle,
                                    a.advertise_img, 
                                    a.price, 
                                    a.vendor_name, 
                                    c.categoryName,
                                    v.fname,
                                    v.c_website,
                                    v.c_telephone1,
                                    v.c_telephone2,
                                    v.c_telephone,
                                    cit.cityName,
                                    s.sname
                                FROM
                                    state s,
                                    advertisement a, 
                                    category c,
                                    vendor_details v,
                                    city cit 
                                WHERE 
                                    a.sid=s.sid and
                                    a.categoryId = c.categoryId and  
                                    a.vendor_id = v.vendor_id AND 
                                    a.cityId=cit.cityId AND 
                                    is_delete='0' AND v.isdel='1' " . $condition . " AND adv_type = 'FEATURED' and v.status = '1' order by a.advertise_id desc limit $start_from,$perpage";
                        $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
                        while ($addrow1 = mysqli_fetch_array($addresult1)) 
                        {
                            $price1 = $addrow1['price'];
                            $comapny_name = $addrow1['c_name'];
                            $adv_type1 = $addrow1['adv_type'];
                            $like3 = $addrow1['likes'];
                            $website = $addrow1['c_website'];
                            $email = $addrow1['v_email'];
                            $advDisplayDate1 = $addrow1['advDisplayDate'];
                            $advExpiryDate1 = $addrow1['advExpiryDate'];
                            $string = slug($title);
                            $tu_id = $addrow1['advertise_id'];
                            //$city=$addrow1['cityName'];   
                            $description = $addrow1['description'];
                            $systemdate1 = date("Y-m-d");
                            $numberDay1 = dateDiff($systemdate1, $advExpiryDate1);
                            
                    ?>
                    <div class="packagelist">                                        
                        <div class="packages">
                            <div class="col-sm-3 pdzero pd0 mr20">
                                <div class="pckg-tab">
                                    <div class="bor">
                                        <div class="col rspsv_img">
                                            <div class="tag">
                                                <?php echo $numberDay1 > 0 ? $numberDay1 . " Days Left" : "1 Day Left" ?>
                                            </div>
                                            <!--<a href="vendor-profile.php?adv_id=<?php // echo $addrow1['advertise_id']; ?>"><img src="vendor_admin/images/<?php // echo $addrow1['advertise_img'] ?>" />-->
                                          <a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id . '/' . $string; ?>"><img src="<?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow1['advertise_img']; ?>" width="269" height="253"></a>

                                        <!--</a>-->
                                        </div>
                                        <div class="details times-Square-left">
                                            <div class="border">
                                                <div class="deal pd0">
                                                    <h5 class="mt0">
                                                        <strong>
                                                            <a href="vendor-profile.php?adv_id=<?php echo $addrow1['advertise_id']; ?>">
                                                                <?php company_echo($addrow1['dealtitle'], 17); ?>
                                                            </a>
                                                        </strong>
                                                    </h5>
                                                    <p><?php company_echo($comapny_name, 17); ?></p>
                                                </div>
                                                <div class="now pd0 deal-right deal-static pull-right">
                                                    <span>
                                                        <span class="tp0">
                                                            <a id="getaID" class="getaID" href="<?php echo $id1 = $addrow1['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Chat Now</a>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php
                                                $aid = $addrow1['advertise_id'];
                                            ?>
                                            <div class="likes lks_rspsv">
                                                <div class="col-lg-12 pd0">
                                                    <ul>
                                                        <li><a onclick="doSomething(<?php echo $addrow1['advertise_id']; ?>);" name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>"><?php echo $like3; ?></span></a></li>
                                                        <li><span><?php custom_echo($addrow1['categoryName'], 18); ?></span></li>
                                                        <li><span class="ny"><?php custom_echo($addrow1['cityName'], 2); ?></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 times-Square">
                                <div class="row">
                                    <div class="col-sm-10 pd0">
                                        <h4 class="zx">
                                            <strong>
                                                <?php echo $addrow1['c_name']; ?>
                                            </strong>
                                        </h4>
                                        <h5>
                                            <strong>
                                                <?php echo $addrow1['dealtitle']; ?>
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row mt10 tp">
                                    <p>  
                                        <?php 
                                            echo $addrow1['sname']; ?>, <?php echo $addrow1['cityName']; ?> | <?php
                                            echo $addrow1['c_telephone'];
                                            echo "-";
                                            echo $addrow1['c_telephone1'];
                                            echo "-";
                                            echo $addrow1['c_telephone2'];
                                        ?>
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 pd0 col-xs-4">
                                        
                                       <a href="<?php echo "http://".$addrow1['c_website']; ?>" target="blank" class="color website site">Website</a>
                                    </div>
                                    <br>
                                    <div class="col-sm-12 col-xs-12 pd0 mt15">
                                        <p>
                                            <?php custom_echo($addrow1['description'], 250); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                </div>
                <div class="bs-example">
                    <ul class="pagination  mt40">
                        <?php
                            if($id=='')
                            {
                                $add1 = "SELECT a.vendor_id,a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id,v.c_name,a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,v.fname,cit.cityName
                                              FROM advertisement a, category c,vendor_details v,city cit
                                              WHERE a.categoryId = c.categoryId and  a.vendor_id = v.vendor_id  AND a.cityId=cit.cityId AND is_delete='0' AND v.isdel='1' " . $condition . " AND adv_type =  'FEATURED'  and v.status = '1' order by a.advertise_id";
                                $addresult1 = mysqli_query($mysqli, $add1);
                            }
                            else 
                            {
                                $add1 = "SELECT a.vendor_id,a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id,v.c_name,a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,v.fname,cit.cityName
                                              FROM advertisement a, category c,vendor_details v,city cit
                                              WHERE a.categoryId = c.categoryId and  a.categoryId=$id and a.vendor_id = v.vendor_id  AND a.cityId=cit.cityId AND is_delete='0' AND v.isdel='1' " . $condition . " AND adv_type =  'FEATURED'  and v.status = '1' order by a.advertise_id";
                                $addresult1 = mysqli_query($mysqli, $add1);
                            }
                            
                            $total_records = mysqli_num_rows($addresult1);
                            $total_pages = ceil($total_records / $perpage);
                            
                        ?>
                        <li><a class='paging' href="category-list.php?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo "1" ?>"><?php echo "<<" ?></a></li>
                        <?php
                            for ($i = 1; $i <= $total_pages - 1; $i++) 
                            {
                                
                        ?>
                        <li><a class='paging' href="category-list.php?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                            }
                        ?>
                        <?php
                            if($total_pages=='0')
                            {
                                
                            }
                            else 
                            {
                        ?>
                            <li><a class='paging' href="category_list.php?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div> 
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
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
<?php
include "footer.php";
?>
<!--Model Of Enquriy From -->
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">LIVE CHAT COMING SOON</h4>
                </div>
                <div class="modal-body">
                    <div class="views">
                        <form method="post" action="enquiry.php" onsubmit="return validatemanageform();">
                            <input type="hidden" id="pageNo" name="pageNo" value="2" />
                            <input type="hidden" id="aid" name="aid" value="" /> 
                            <div class="form-group mt0">
                                <label><h4 class="mt0">In the meantime, send the vendor a message!</h4></label>
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
<!--Model Of Enquriy From -->
<script type="text/javascript">
    $(document).ready(function () {
        $('a.getaID').click(function () {
            var status_id = $(this).attr('href');
            $('#aid').val(status_id);
        });
    });
</script> 