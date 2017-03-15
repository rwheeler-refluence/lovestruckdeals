
<?php
include "config.php";
include './urlseo.php';
$catid = $_POST['cat'];
$id = $_POST['add_id'];

//google searche Addresss to 
$address = $_POST['txtAddress'];


$state = $_POST['stateID'];
$city = $_POST['cityID'];
$catid = $_POST['cat'];

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

$qry = $mysqli->query("SELECT sid FROM state WHERE sname = '$state'");
$row = $qry->fetch_row();
$sid = $row[0];

//$row = $qry->fetch_array();$sid=$row[0];
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

function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}

//


if ($id == NULL) {
    ?>


    <div id="data1">
    <?php
    $add = "SELECT a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId,a.cityId,cit.cityId,a.description, a.advertise_img, a.price, a.vendor_name,a.dealtitle ,c.categoryName,v.c_name,cit.cityName
                            FROM advertisement a, category c,vendor_details v,city cit
                            WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id and a.cityId=cit.cityId
                            AND adv_type ='SPOTLIGHT' and a.is_delete=0 and v.status = '1' and a.spotlightDeal='yes'" . $condition . " order by a.advertise_id desc";
    //print_r($add);

    $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());

    $index = 0;
    while ($addrow = mysqli_fetch_array($addresult)) {
        $title = $addrow['c_name'];
        $string = slug($title);
        $tu_id = $addrow['advertise_id'];
        $index++;
        if ($index <= 3) {
            $price = $addrow['price'];
            $vendor_name = $addrow['fname'];
            $adv_type = $addrow['adv_type'];
            $like2 = $addrow['likes'];
            $title = $addrow['dealtitle'];
            $comapny_name = $addrow['c_name'];
            $advDisplayDate = $addrow['advDisplayDate'];
            $advExpiryDate = $addrow['advExpiryDate'];
            $city = $addrow['cityName'];
            $systemdate = date("Y-m-d");
            $numberDay = dateDiff($systemdate, $advExpiryDate);
            ?>
                <div class="col-lg-4 col-sm-4 pckg-tab">
                    <div class="packages">
                        <div class="bor">
                            <div class="col">
                                <div class="tag"><?php echo $numberDay > 0 ? $numberDay . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                <a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id . '/' . $string; ?> "><img src="<?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
                <?php echo '<div class="feat_light spot">' . $adv_type . '</div>'; ?>
                            </div>
                            <div class="details">
                                <div class="border">
                                    <div class="deal pd0">
                                        <h5 class="mt0"><strong><?php company_echo($title, 25); ?> </strong></h5>
                                        <p><?php company_echo($comapny_name, 25); ?></p>
                                    </div>
                                    <div class="deal-right pd0 pull-right">
            <!--                                       <span><a href="chatnow.html">Message</a></span>-->
                                        <span><a id="getaID" class="getaID" href="<?php //echo $id1 = $addrow['advertise_id']; ?>"data-aid = "<?php echo $addrow1['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal123">Message</a></span>
                                    </div>
                                </div>
            <?php
            $aid = $addrow['advertise_id'];
            ?> 
                                <form  name="add_form"  >
                                    <div class="likes">
                                        <input type="hidden" name="advertise_id" value='<?php echo $addrow['advertise_id']; ?> '/>
                                        <ul>

                                            <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow['advertise_id']; ?>" ><?php echo $like2; ?> </span>  </a></li>
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
    $perpage = 12;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    $start_from = ($page - 1) * $perpage;
    //$add1 = "SELECT * FROM advertisement WHERE adv_type='FEATURED'";
//  $add1="SELECT a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description, a.advertise_img, a.price, a.vendor_name, c.categoryName,v.fname
//                    FROM advertisement a, category c,vendor_details v
//                    WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id
//                    AND adv_type =  'FEATURED'  and a.categoryId='".$catid."' and a.sid ='".$sid."' and a.cityId='".$cid."'";

    $add1 = "SELECT a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description, a.advertise_img, a.price, a.vendor_name, c.categoryName,a.dealtitle,c.categoryName,v.c_name,cit.cityName
                    FROM advertisement a, category c,vendor_details v,city cit
                    WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id and a.cityId=cit.cityId AND a.adv_type='FEATURED' and v.status = '1' and a.is_delete=0 " . $condition . " order by a.advertise_id desc limit $start_from,$perpage";



    $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
    while ($addrow1 = mysqli_fetch_array($addresult1)) {
        $title = $addrow1['c_name'];
        $string = slug($title);
        $tu_id = $addrow1['advertise_id'];


        $like_featue = $addrow1['likes'];
        $vendor_name1 = $addrow1['fname'];
        $adv_type1 = $addrow1['adv_type'];
        $title = $addrow1['dealtitle'];
        $com_name = $addrow1['c_name'];
        $advDisplayDate = $addrow1['advDisplayDate'];
        $advExpiryDate1 = $addrow1['advExpiryDate'];
        $city_feature = $addrow1['cityName'];
        $systemdate1 = date("Y-m-d");
        $numberDay1 = dateDiff($systemdate1, $advExpiryDate1);
        ?>

                <div class="col-lg-3 pckg-tab pd0 col-sm-4">
                    <div class="packages">  
                        <div class="bor">   

                            <div class="col">
                                <div class="tag"><?php echo $numberDay1 > 0 ? $numberDay1 . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                <a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id . '/' . $string; ?> "> <img src="<?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow1['advertise_img']; ?>" width="269" height="253"></a>


                                <!--<div class="feat_light feat">FEATURED</div>-->
                            </div>
                            <div class="details">
                                <div class="border">
                                    <div class="deal pd0">
                                        <h5 class="mt0"><strong><?php company_echo($title, 17); ?></strong></h5>
                                        <p><?php company_echo($com_name, 17); ?></p>
                                    </div>
                                    <div class="deal-right pd0 pull-right">
        <!--                                                    <span><a href="chatnow.html">Message</a></span>-->
                                        <span><a id="getaID" class="getaID" href="<?php //echo $id1 = $addrow1['advertise_id']; ?>" data-aid = "<?php echo $addrow1['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal123">Message</a></span>
                                    </div>
                                </div>
        <?php
        $aid = $addrow['advertise_id'];
        ?> 
                                <form  name="add_form"  >
                                    <div class="likes">
                                        <input type="hidden" name="advertise_id" value='<?php echo $addrow1['advertise_id']; ?> '/>
                                        <ul>

                                            <li> <a onclick="doSomething(<?php echo $addrow1['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>" ><?php echo $like_featue; ?> </span>  </a></li>
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
            <div class="bs-example">
                <ul class="pagination monts">
    <?php
    $qry = "SELECT a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description, a.advertise_img, a.price, a.vendor_name, c.categoryName,a.dealtitle,c.categoryName,v.c_name,cit.cityName
                    FROM advertisement a, category c,vendor_details v,city cit
                    WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id and a.cityId=cit.cityId AND a.adv_type='FEATURED' and v.status = '1' and a.is_delete=0 " . $condition . " order by a.advertise_id desc ";

    $res = mysqli_query($mysqli, $qry);
    $total_records = mysqli_num_rows($res);
    $total_pages = ceil($total_records / $perpage);

    echo "<li><a class='paging' href='weddingdeals?page=1'>&laquo;</a></li>";
    //echo '&nbsp;';

    for ($i = 1; $i <= $total_pages - 1; $i++) {
        ?>

                        <li><a class='paging' id='vbvv' href ='weddingdeals?page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
        <?php
    };
    //echo '&nbsp;';
    echo "<li><a class='paging' href ='weddingdeals?page=$total_pages'>$total_pages</a></li>";
    ?> 

                </ul>
            </div>
        </div>
    </div>
                    <?php
                } else {
                    ?>
    <div id="data1" >

                    <?php
                    $add = "SELECT a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId,a.cityId,cit.cityId,a.description, a.advertise_img, a.price, a.vendor_name,a.dealtitle ,c.categoryName,v.c_name,cit.cityName 
                            FROM advertisement a, category c,vendor_details v,city cit
                            WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id and a.cityId=cit.cityId
                            AND adv_type ='SPOTLIGHT' " . $condition . " and a.is_delete=0 and v.status = '1'  and a.advertise_id in(select advertisement from catfliter where  vendorfilterId  in (select vendorfilterId  from vendor_filter where filterid=" . $id . ")) order by a.advertise_id desc";
// print_r($add);
                    $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());

                    $index = 0;
                    while ($addrow = mysqli_fetch_array($addresult)) {
                        $title = $addrow['c_name'];
                        $string = slug($title);
                        $tu_id = $addrow['advertise_id'];
                        $index++;
                        if ($index <= 3) {
                            $price = $addrow['price'];
                            $vendor_name = $addrow['fname'];
                            $adv_type = $addrow['adv_type'];
                            $likess = $addrow['likes'];
                            $titles = $addrow['dealtitle'];
                            $com_names = $addrow['c_name'];
                            $advDisplayDate = $addrow['advDisplayDate'];
                            $advExpiryDate_spo = $addrow['advExpiryDate'];
                            $city_spot = $addrow['cityName'];
                            $systemdate_spot = date("Y-m-d");
                            $numberDay_spo = dateDiff($systemdate_spot, $advExpiryDate_spo);
                            ?>
                <div class="col-lg-4 pckg-tab col-sm-4">
                    <div class="packages">
                        <div class="bor">
                            <div class="col">
                                <div class="tag"><?php echo $numberDay_spo > 0 ? $numberDay_spo . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                <a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id . '/' . $string; ?> "><img src="<?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
                <?php echo '<div class="feat_light spot">' . $adv_type . '</div>'; ?>
                            </div>
                            <div class="details">
                                <div class="border">
                                    <div class="deal pd0">
                                        <h5 class="mt0"><strong> <?php company_echo($titles, 25); ?></strong></h5>
                                        <p><?php company_echo($com_names, 25); ?></p>
                                    </div>
                                    <div class="deal-right pd0 pull-right">
            <!--                                       <span><a href="chatnow.html">Message</a></span>-->
                                        <span><a id="getaID" class="getaID" href="<?php //echo $id1 = $addrow['advertise_id']; ?>" data-aid = "<?php echo $addrow1['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal123">Message</a></span>
                                    </div>
                                </div>
                <?php
                $aid = $addrow['advertise_id'];
                ?> 
                                <form  name="add_form"  >
                                    <div class="likes">
                                        <input type="hidden" name="advertise_id" value='<?php echo $addrow['advertise_id']; ?> '/>
                                        <ul>

                                            <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow['advertise_id']; ?>" ><?php echo $likess; ?> </span>  </a></li>
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
        <!-- Rahul Featured -->
        <div class="featured">
    <?php
    $perpage = 12;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    $start_from = ($page - 1) * $perpage;
    $add1 = "SELECT a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description, a.advertise_img, a.price, a.vendor_name, c.categoryName,a.dealtitle,c.categoryName,v.c_name,cit.cityName
                    FROM advertisement a, category c,vendor_details v,city cit
                    WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id and a.cityId=cit.cityId AND a.adv_type='FEATURED' and v.status = '1' and a.is_delete=0 " . $condition . " and a.advertise_id in(select advertisement from catfliter where  vendorfilterId  in (select vendorfilterId  from vendor_filter where filterid=" . $id . ")) order by a.advertise_id desc limit $start_from,$perpage";


    $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
    while ($addrow1 = mysqli_fetch_array($addresult1)) {
        $title = $addrow1['c_name'];
        $string = slug($title);
        $tu_id = $addrow1['advertise_id'];

        $comn = $addrow1['c_name'];
        $vendor_name1 = $addrow1['fname'];
        $adv_type1 = $addrow1['adv_type'];
        $titlef = $addrow1['dealtitle'];
        $advDisplayDate = $addrow1['advDisplayDate'];
        $advExpiryDate_fet = $addrow1['advExpiryDate'];
        $city_fet = $addrow1['cityName'];
        $systemdate_fet = date("Y-m-d");
        $numberDay_fet = dateDiff($systemdate_fet, $advExpiryDate_fet);
        $like_fet = $addrow1['likes'];
        ?>

                <div class="col-lg-3  pckg-tab pd0 col-sm-4">
                    <div class="packages">  
                        <div class="bor">   

                            <div class="col">
                                <div class="tag"><?php echo $numberDay_fet > 0 ? $numberDay_fet . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                <a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id . '/' . $string; ?> "> <img src="<?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow1['advertise_img']; ?>" width="269" height="253"></a>
                <?php // echo  '<div class="feat_light spot">' . $adv_type1 .'</div>'; ?>

                                <!--<div class="feat_light feat">FEATURED</div>-->
                            </div>
                            <div class="details">
                                <div class="border">
                                    <div class="deal pd0">
                                        <h5 class="mt0"><strong><?php company_echo($titlef, 17); ?></strong></h5>
                                        <p><?php company_echo($comn, 17); ?></p>
                                    </div>
                                    <div class="deal-right pd0 pull-right">
        <!--                                                    <span><a href="chatnow.html">Message</a></span>-->
                                        <span><a id="getaID" class="getaID" href="<?php // echo $id1 = $addrow1['advertise_id']; ?>" data-aid = "<?php echo $addrow1['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal123">Message</a></span>
                                    </div>
                                </div>
                <?php
                $aid = $addrow['advertise_id'];
                ?> 
                                <form  name="add_form"  >
                                    <div class="likes">
                                        <input type="hidden" name="advertise_id" value='<?php echo $addrow1['advertise_id']; ?> '/>
                                        <ul>

                                            <li> <a onclick="doSomething(<?php echo $addrow1['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>" ><?php echo $like_fet; ?> </span>  </a></li>
                                            <li><span><?php custom_echo($addrow1['categoryName'], 15); ?></span></li>
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
            <div class="bs-example">
                <ul class="pagination monts">
    <?php
//                                    $qry = "SELECT a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description, a.advertise_img, a.price, a.vendor_name, c.categoryName,a.dealtitle,c.categoryName,v.c_name,cit.cityName
//                    FROM advertisement a, category c,vendor_details v,city cit
//                    WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id and a.cityId=cit.cityId AND a.adv_type='FEATURED' and v.status = '1' and a.is_delete=0 ".$condition." order by a.advertise_id desc ";
//                                   
    $add1 = "SELECT a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id, a.description, a.advertise_img, a.price, a.vendor_name, c.categoryName,a.dealtitle,c.categoryName,v.c_name,cit.cityName
                    FROM advertisement a, category c,vendor_details v,city cit
                    WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id and a.cityId=cit.cityId AND a.adv_type='FEATURED' and v.status = '1' and a.is_delete=0 " . $condition . " and a.advertise_id in(select advertisement from catfliter where  vendorfilterId  in (select vendorfilterId  from vendor_filter where filterid=" . $id . ")) order by a.advertise_id desc";

    $res = mysqli_query($mysqli, $add1);
    $total_records = mysqli_num_rows($res);

    $total_pages = ceil($total_records / $perpage);
    ?>
                    <li><a class='paging' href='weddingdeals?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo "1" ?>'><?php echo "<<" ?></a></li>
    <?php
    for ($i = 1; $i <= $total_pages - 1; $i++) {
        ?>
                        <li><a id='ff' class='paging' href ='weddingdeals?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo $i ?>'><?php echo $i ?></a></li>
        <?php
        // echo '&nbsp;';
    };
    ?>

                    <li><a class='paging' href ='weddingdeals?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo $total_pages; ?>'><?php echo $total_pages; ?></a></li>

                </ul>
            </div>
        </div>

                <?php } ?>

    <!--Model Of Enquriy From -->

    <div class="container">
        <!--            </span><a  class="join button" data-toggle="modal" role="button" data-target="#myModal1" >Message</a></span>-->
        <!-- Modal -->
        <div class="modal fade" id="myModal123" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="margin-left: 128px;">Contact this vendor</h4>
                    </div>                   <div class="modal-body">
                        <div class="views">
                            <form method="post" action="<?php echo ROOT_PATH; ?>enquiry" onsubmit="return validatemanageform();">
                                <input type="hidden" id="pageNo" name="pageNo" value="4" />
                                <input type="hidden" id="aid" name="aid" value="" /> 
                                <div class="form-group">
                                    <label><h4></h4></label>

                                </div>
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name1"  id="name1"placeholder="Name">
                                    <div id="name1_error" style="display:none;" class="error_msg" ><font color="red"> Please Enter Your Name</font></div>
                                    <div id="name1_error1" style="display:none;" class="error_msg" ><font color="red"> Please Enter Your Valid Name</font></div>

                                </div>
                                <div class="form-group">
                                    <label>Email:</label> 
                                    <input type="text" name="email" id="txtemail" placeholder="Email">
                                    <div id="txtemail_error" style="display:none;"class="error_msg">Please Enter Email ID</div>
                                    <div id="txtemail_error1" style="display:none;"class="error_msg">Please Enter Your Valid Email ID</div>

                                </div>
                                <div class="form-group">
                                    <label>Message:</label> 
                                    <textarea rows="4" cols="40" name="contactNo" id="txtcontact" placeholder="Message"></textarea>
                                    <div id="txtcontact_error" style="display:none;"class="error_msg">Please Enter Message</div>

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
    <script>
        $(document).ready(function () {
            $('a.getaID').click(function () {
                var status_id = $(this).attr('href');
                $('#aid').val(status_id);
            });
        });
        $('#myModal123').on('show.bs.modal', function(e) {
           
            var anid = $(e.relatedTarget).data('aid')
            
            var modal = $(this)

            modal.find('#aid').val(anid)
            
        });
    </script>
    
