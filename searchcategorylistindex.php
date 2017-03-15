<!-- add search catagory --> 
<?php
    session_start();
    $sessionid = session_id();
    include './config.php';

function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}

function custom_echo($x, $length) {
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '';
        echo $y;
    }
}

$id = $_POST['add_id'];
$address = $_POST['txtAddress'];
$catid = $_POST['cat'];
$state = $_POST['stateID'];
$city = $_POST['cityID'];

?>

<div id="data1" >

    <?php
    $add = "SELECT distinct a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId, a.description, a.advertise_img, a.price, a.vendor_name, c.categoryName,catf.vendorfilterId,venfil.vendorfilterId,cit.cityName,v.c_name
                                    FROM vendor_details v,advertisement a join category c on a.categoryId = c.categoryId                                                             
                                    join catfliter catf on catf.advertisement=a.advertise_id
                                    join vendor_filter venfil on venfil.vendorfilterId=catf.vendorfilterId 
                                    join city cit on cit.cityId=a.cityId
                                    WHERE a.adv_type ='SPOTLIGHT' and a.is_delete=0 and a.vendor_id = v.vendor_id and a.spotlightDeal='yes'  AND venfil.filterid='" . $id . "' ";


    $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
    $row = mysqli_num_rows($addresult);

    if ($row <= 0) {
        echo "<br> Sorry! By Using Filter for this Category we have No Data Available Currently.<br>";
    }


    $index = 0;
    while ($addrow = mysqli_fetch_array($addresult)) {
        $index++;
        if ($index <= 3) {
            $price = $addrow['price'];
            $comapny_name = $addrow['c_name'];
            $adv_type = $addrow['adv_type'];
            $like4 = $addrow['likes'];

            $advDisplayDate = $addrow['advDisplayDate'];
            $advExpiryDate = $addrow['advExpiryDate'];
            $city = $addrow['cityName'];
            $systemdate = date("Y-m-d");
            $numberDay = dateDiff($systemdate, $advExpiryDate);
            ?>

            <div class="col-lg-4 pckg-tab">
                <div class="packages">
                    <div class="bor">
                        <div class="col">            
                            <div class="tag"><?php echo $numberDay > 0 ? $numberDay . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left");     ?></div>
                            <a href="vendor-profile.php?adv_id=<?php echo $addrow['advertise_id']; ?>"><img src="images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
                            <div class="feat_light spot"><?php echo $adv_type; ?></div>
                        </div>

                        <div class="details">
                            <div class="border">
                                <div class="deal pd0">
                                    <?php echo '<h5 class="mt0"><strong>$' . $price . ' Off Packages</strong></h5>'; ?>
                                    <p><?php echo $comapny_name; ?></p>
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
                                        <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow['advertise_id']; ?>" ><?php echo $like4; ?> </span>  </a></li>
                                        <li><span><?php custom_echo($addrow['categoryName'], 6); ?></span></li>                                                       
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

    <?php
    $add1 = "SELECT distinct  a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId, a.description, a.advertise_img, a.price, a.vendor_name, c.categoryName,catf.vendorfilterId,venfil.vendorfilterId,cit.cityName,s.sname,v_email,v.c_website,v.c_name
                                    FROM vendor_details v, advertisement a join category c on a.categoryId = c.categoryId 
                                    join state s  on s.sid=a.sid 
                                    join city cit on cit.cityId=a.cityId 
                                    join vendor_details v on v.vendor_id=a.vendor_id
                                    join catfliter catf on catf.advertisement=a.advertise_id
                                    join vendor_filter venfil on venfil.vendorfilterId=catf.vendorfilterId 
                                    WHERE a.adv_type ='FEATURED' and a.is_delete=0 and a.vendor_id = v.vendor_id  and a.spotlightDeal='no' AND venfil.filterid='" . $id . "' ";

    $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
    $row1 = mysqli_num_rows($addresult1);

    if ($row1 <= 0) {
        echo "<br> Sorry! By Using Filter for this Category we have No Data Available Currently. <br>";
    }

    while ($addrow1 = mysqli_fetch_array($addresult1)) {
        $price1 = $addrow1['price'];
        $company_name1 = $addrow1['c_name'];
        $adv_type1 = $addrow1['adv_type'];
        $like3 = $addrow1['likes'];
        $website = $addrow1['c_website'];
        $email = $addrow1['v_email'];
        $advDisplayDate1 = $addrow1['advDisplayDate'];
        $advExpiryDate1 = $addrow1['advExpiryDate'];
        $city = $addrow1['cityName'];
        $description = $addrow1['description'];
        $systemdate1 = date("Y-m-d");
        $numberDay1 = dateDiff($systemdate1, $advExpiryDate1);
        ?>

        <div class="packagelist">                                        
            <div class="packages">
                <div class="col-lg-3">
                    <div class="pckg-tab">
                        <div class="bor">
                            <div class="col">
                                <div class="tag"><?php echo $numberDay1 > 0 ? $numberDay1 . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left");     ?></div>
                                <!--<div class="tag">30 days left</div>-->                                                                    
                                <a href="vendor-profile.php?adv_id=<?php echo $addrow1['advertise_id']; ?>"><img src="images/<?php echo $addrow1['advertise_img'] ?>" /> </a>
                            </div>
                            <div class="details times-Square-left">
                                <div class="border ">
                                    <div class="deal pd0">
                                        <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                        <p><?php echo $company_name1; ?></p>
                                    </div>
                                    <div class="now pd0 pull-right">
                                        <span>
                                            <a href="#">Chat Now</a>
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
                                            <li> <a onclick="doSomething(<?php echo $addrow1['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>" ><?php echo $like3; ?> </span>  </a></li>
                                            <li><span><?php custom_echo($addrow1['categoryName'], 6); ?></span></li>
                                            <li><span class="ny"><?php custom_echo($addrow1['cityName'], 2); ?></span></li>
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
                            <h4 class="zx"><strong><?php echo $addrow1['c_name']; ?></strong></h4>
                        </div>
                        <div class="now pull-right">
                            <span><a href="chatnow.html">Chat Now</a></span>
                        </div>
                    </div>

                    <div class="row tp">
                        <p><?php custom_echo($addrow1['description'], 50); ?></p>
                        <br>

                        <p>  <?php echo $addrow1['sname']; ?> ,<?php echo $addrow1['cityName']; ?> | <?php
                            echo $addrow1['c_telephone'];
                            echo "-";
                            echo $addrow1['c_telephone1'];
                            echo "-";
                            echo $addrow1['c_telephone2'];
                            ?></p>                                                            
                        <br/>

                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-3 pd0">
                            <d class="website contact">
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
</div>
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