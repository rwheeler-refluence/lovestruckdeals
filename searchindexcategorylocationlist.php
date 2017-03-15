<!-- add search catagory --> 
<?php    
    session_start();
    $sessionid = session_id();
    include './config.php';
    include './urlseo.php';
$catid = $_POST['cat'];

$id=$_POST['add_id'];


// Display Company name
      function company_echo($x, $length) 
    {
        if (strlen($x) <= $length) 
        {
            echo $x;
        } 
        else 
        {
            $y = substr($x, 0, $length) . '';
            echo $y." ...";
        }
    }
function custom_echo($x, $length) {
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '';
        echo $y;
    }
}

  
 $state = $_POST['stateID'];
 $city = $_POST['cityID'];
 $catid=$_POST['cat']; 
          
 //print_r($_POST);exit;
$qry = $mysqli->query("SELECT sid FROM state WHERE sname ='$state'");
$row = $qry->fetch_row();$sid=$row[0];
//$row = $qry->fetch_array();$sid=$row[0];
$qry1 = $mysqli->query("SELECT cityId FROM city WHERE cityName ='$city'");
$row = $qry1->fetch_row();$cid=$row[0];

$condition = "";

if($sid != NULL && $cid == NULL && $catid == NULL) {
    $condition.=" And a.sid='" . $sid . "'";
    
}else if($sid != NULL && $cid != NULL && $catid == NULL) {
    $condition.=" And a.sid='" . $sid . "' And a.cityId='" . $cid . "'";
    
}else if($sid !=NULL  && $cid != NULL && $catid != NULL) {
    $condition.=" And a.sid='" . $sid . "' And a.cityId='" . $cid . "' And a.categoryId='" . $catid . "'";
}else if($sid == NULL && $cid == NULL && $catid != NULL) {
  $condition.=" And a.categoryId='" . $catid . "'";
}else if($sid != NULL && $cid == NULL && $catid != NULL) {
    
  $condition.=" And a.sid='" . $sid . "' And  a.categoryId='" . $catid . "'";
  
}

    function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}
    
    
    
    if ($id == NULL) 
    {
    ?>
    <div id="data1" >
        <?php
       /* $add = "SELECT a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId, a.description,a.dealtitle, a.advertise_img, a.price, a.vendor_name,a.sid,a.cityId, c.categoryName,cit.cityName
                                    FROM advertisement a join category c on a.categoryId = c.categoryId 
                                    join state s  on s.sid=a.sid 
                                    join city cit on cit.cityId=a.cityId 
                                    WHERE 1=1 AND a.adv_type ='SPOTLIGHT' and a.is_delete=0 and a.spotlightDeal='yes' " . $condition . " ";    */      
       $add="SELECT a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId,a.cityId,cit.cityId,a.description, a.advertise_img, a.price, a.vendor_name,a.dealtitle ,c.categoryName,v.c_name,cit.cityName,a.vendor_name,v.c_name,v.vendor_id
                            FROM advertisement a, category c,vendor_details v,city cit
                            WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id and a.cityId=cit.cityId
                            AND adv_type ='SPOTLIGHT' and a.is_delete=0 and v.status = '1' and a.spotlightDeal='yes'".$condition." order by a.advertise_id desc ";  
       // print_r($add);
        $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
        $row = mysqli_num_rows($addresult);
    
        $index = 0;
        while ($addrow = mysqli_fetch_array($addresult)) {
            $index++;
            if ($index <= 3) {
              
                $vendor_name = $addrow['vendor_name'];
                $adv_type = $addrow['adv_type'];
                $like2 = $addrow['likes'];
                $string = slug($title);
                $tu_id = $addrow['advertise_id'];
                $advDisplayDate = $addrow['advDisplayDate'];
                $advExpiryDate = $addrow['advExpiryDate'];
                
                $systemdate = date("Y-m-d");
                $numberDay = dateDiff($systemdate, $advExpiryDate);
                ?>
                <div class="col-lg-4 col-sm-4 pckg-tab">
                    <div class="packages">
                        <div class="bor">
                            <div class="col">
                                <div class="tag"><?php echo $numberDay > 0 ? $numberDay . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left");  ?></div>
                                <!--                                        <div class="tag">30 days left</div>-->
                                <!--<a href="vendor-profile.php?adv_id=<?php // echo $addrow['advertise_id']; ?>"><img src="vendor_admin/images/<?php // echo $addrow['advertise_img']; ?>" width="269" height="253"></a>-->
                             <a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id . '/' . $string; ?>"><img src="<?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
 <?php echo '<div class="feat_light spot">' . $adv_type . '</div>'; ?>
                            </div>
                            <div class="details">
                                <div class="border">
                                    <div class="deal pd0">
                                        <h5 class="mt0"><strong><a href="vendor-profile?adv_id=<?php echo $addrow['advertise_id']; ?>"> <?php company_echo($addrow['dealtitle'],25); ?> </a></strong></h5>
                                        <p><?php company_echo($addrow['c_name'],25); ?></p>
                                    </div>
                                    <div class="deal-right pd0 pull-right">
<!--                                <span><a href="chatnow.php?id=<?php //echo $addrow['vendor_id']; ?>" target="_blank">Chat Now</a></span>-->
                                 <span><a id="getaID" class="getaID" href="<?php echo $id1=$addrow['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Message</a></span>

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
        <!-- Rahul Featured -->
        <div class="featured">
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
                    a.vendor_id = v.vendor_id  AND 
                    a.cityId=cit.cityId AND 
                    is_delete='0' AND 
                    v.isdel='1' ".$condition." AND adv_type =  'FEATURED'  and v.status = '1' order by a.advertise_id desc limit $start_from,$perpage";

      
        $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
        $row1= mysqli_num_rows($addresult1);                                      
//        if($row1<=0)
//        {
//            echo "<br> Sorry! No Featured Deal Available for Current Location and Category."; 
//        }
                        
        while ($addrow1 = mysqli_fetch_array($addresult1)) {
            $price1 = $addrow1['price'];
            $c_name = $addrow1['c_name'];
            $adv_type1 = $addrow1['adv_type'];
            $like3 = $addrow1['likes'];
            $website = $addrow1['c_website'];
            $email = $addrow1['v_email'];
            $advDisplayDate1 = $addrow1['advDisplayDate'];
            $advExpiryDate1 = $addrow1['advExpiryDate'];
            $string = slug($title);
                $tu_id = $addrow1['advertise_id'];
            
            $description = $addrow1['description'];
            $systemdate1 = date("Y-m-d");
            $numberDay1 = dateDiff($systemdate1, $advExpiryDate1);
            ?>
            <div class="packagelist">                                        
                <div class="packages">
                    <div class="col-lg-3 col-sm-4">
                        <div class="pckg-tab">
                            <div class="bor">
                                <div class="col">
                                    <div class="tag"><?php echo $numberDay1 > 0 ? $numberDay1 . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left");    ?></div>                                                
<!--                                    <a href="vendor-profile.php?adv_id=<?php // echo $addrow1['advertise_id']; ?>"><img src="vendor_admin/images/<?php // echo $addrow1['advertise_img'] ?>" /> -->
                                        <!--<div class="feat_light feat">featured</div></a>-->
                                                                     <a href="<?php echo ROOT_PATH; ?>wedding-discounts/<?php echo $tu_id . '/' . $string; ?>"><img src="<?php echo ROOT_PATH; ?>vendor_admin/images/<?php echo $addrow1['advertise_img']; ?>" width="269" height="253"></a>

                                </div>

                                <div class="details times-Square-left">
                                    <div class="border ">
                                        <div class="deal pd0">
                                            <h5 class="mt0"><strong><a href="vendor-profile?adv_id=<?php echo $addrow1['advertise_id']; ?>"><?php company_echo($addrow1['dealtitle'],16); ?></a></strong></h5>
                                            <p><?php company_echo($c_name,16); ?></p>
                                            
                                        </div>

                                        <div class="now pd0 pull-right">
                                            <span>
<!--                                                 <span><a href="chatnow.php?id=<?php //echo $addrow1['vendor_id']; ?>" target="_blank">Chat Now</a></span>-->
                                                  <span><a id="getaID" class="getaID" href="<?php echo $id1=$addrow1['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Message</a></span>
                                            </span>
                                        </div>
                                    </div>

                                    <?php
                                    $aid = $addrow1['advertise_id'];
                                    ?>
                                    <div class="likes">
                                        <div class="col-lg-12 pd0">
                                            <ul>                
                                                <li><a onclick="doSomething(<?php echo $addrow1['advertise_id']; ?>);" name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>" ><?php echo $like3;?> </span> </a></li>
                                             
                                                <li><span><?php custom_echo($addrow1['categoryName'],18); ?></span></li>
                                                <li><span class="ny"><?php custom_echo($addrow1['cityName'],2); ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 times-Square  col-sm-4"> 
                        <div class="row">
                            <div class="col-lg-10 pd0">                
                                <h4 class="zx"><strong><?php echo $addrow1['c_name']; ?></strong></h4>
				<h5 ><strong><?php echo $addrow1['dealtitle']; ?></strong></h5>
                            </div>

                            <div class="now pull-right">
<!--                                <span><a href="chatnow.html">Chat Now</a></span>-->
<!--                                  <span><a id="getaID" class="getaID" href="<?php //echo $id1=$addrow1['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Chat Now</a></span>-->
                            </div>
                        </div>                                       

                        <div class="row mt10 tp">
                        
                            <p>  <?php echo $addrow1['sname']; ?>, <?php echo $addrow1['cityName']; ?> | <?php
                                echo $addrow1['c_telephone'];
                                echo "-";
                                echo $addrow1['c_telephone1'];
                                echo "-";
                                echo $addrow1['c_telephone2'];
                                ?>
                            </p>                                                            
                        
                        </div>
                       
                        <div class="row">
<!--                            <div class="col-lg-3 pd0">
                                <d class="website contact">                                           
                                    <a href="mailto:<?php //echo $email; ?>?subject=Inquiry for the deal&body=Hello Vendor want to get information for the deal.">Send me an email</a>
                                </d>
                            </div>-->

                            <div class="col-lg-3 pd0">
                                <a href="<?php echo "https://".$website; ?>" target="blank" class="color website site">Website</a>
                            </div>
                             <br>
                            <div class="col-sm-12 pd0 mt15">
                              <p><?php custom_echo($addrow1['description'], 250); ?></p>
                          </div>
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
                                     $qry = "SELECT a.vendor_id,a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.advertise_id,v.c_name,a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,v.fname,cit.cityName
                                              FROM advertisement a, category c,vendor_details v,city cit
                                              WHERE a.categoryId = c.categoryId and a.vendor_id = v.vendor_id  AND a.cityId=cit.cityId AND is_delete='0' AND v.isdel='1' ".$condition." AND adv_type =  'FEATURED'  and v.status = '1' order by a.advertise_id ";

                                   $res = mysqli_query($mysqli, $qry);
                                    $total_records = mysqli_num_rows($res);
                                    $total_pages = ceil($total_records / $perpage);
                                        ?>
                                <li><a class='paging' href='categorylist?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo "1" ?>'><?php echo "<<" ?></a></li>
                                    <?php
                                    for ($i = 1; $i <= $total_pages-1; $i++) {
                                    ?>
                                <li><a id='ff' class='paging' href ='categorylist?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo $i ?>'><?php echo $i ?></a></li>
                                    <?php   // echo '&nbsp;';
                                    };
                                    ?>
                                <?php
                                    if($total_pages=='0')
                                    {
                                        
                                    }
                                    else
                                    {
                                ?>
                                <li><a class='paging' href ='categorylist?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo $total_pages; ?>'><?php echo $total_pages; ?></a></li>
                                <?php
                                    }
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
        $add = "SELECT distinct a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId, a.description,a.dealtitle,a.advertise_img, a.price, a.vendor_name, c.categoryName,catf.vendorfilterId,venfil.vendorfilterId,cit.cityName,v.c_name,v.vendor_id
                                    FROM advertisement a join category c on a.categoryId = c.categoryId join vendor_details v on a.vendor_id = v.vendor_id
                                    join state s  on s.sid=a.sid 
                                    join city cit on cit.cityId=a.cityId 
                                    join catfliter catf on catf.advertisement=a.advertise_id
                                    join vendor_filter venfil on venfil.vendorfilterId=catf.vendorfilterId 
                                    WHERE 1=1 AND a.adv_type ='SPOTLIGHT' and a.is_delete=0 and a.spotlightDeal='yes' and v.status = '1' AND venfil.filterid='" . $id . "' " . $condition . " order by a.advertise_id desc  ";        

        $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
        $row = mysqli_num_rows($addresult);

//        if ($row <= 0) {
//            echo "<br>With filter SPOTLIGHT Sorry! We couldn't recognize where you wanted to search.";
//        }


        $index = 0;
        while ($addrow = mysqli_fetch_array($addresult)) {
            $index++;
            if ($index <= 3) {
                $price = $addrow['price'];
                $com_name = $addrow['c_name'];
                $adv_type = $addrow['adv_type'];
                $like4 = $addrow['likes'];
                $title = $addrow['dealtitle'];
                $advDisplayDate = $addrow['advDisplayDate'];
                $advExpiryDate = $addrow['advExpiryDate'];
                $city = $addrow['cityName'];
                $systemdate = date("Y-m-d");
                $numberDay = dateDiff($systemdate, $advExpiryDate);
                ?>

                <div class="col-lg-4 pckg-tab  col-sm-4">
                    <div class="packages">
                        <div class="bor">
                            <div class="col">            
                                <div class="tag"><?php echo $numberDay > 0 ? $numberDay . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left");  ?></div>
                                <a href="vendor-profile?adv_id=<?php echo $addrow['advertise_id']; ?>"><img src="vendor_admin/images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
                                <div class="feat_light spot"><?php echo $adv_type; ?></div>
                            </div>

                            <div class="details">
                                <div class="border">
                                    <div class="deal pd0">
                                        <h5 class="mt0"><strong><a href="vendor-profile?adv_id=<?php echo $addrow['advertise_id']; ?>"><?php company_echo($title,25);?> </a></strong></h5> 
                                        <p><?php company_echo($com_name,25); ?></p>
                                    </div>
                                    <div class="deal-right pd0 pull-right">
<!--                                <span><a href="chatnow.php?id=<?php //echo $addrow['vendor_id']; ?>" target="_blank">Chat Now</a></span>-->
                                 <span><a id="getaID" class="getaID" href="<?php echo $id1=$addrow['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Message</a></span>
                                    </div>
                                </div>

                                <?php
                                $aid = $addrow['advertise_id'];
                                ?> 
                                <form  name="add_form"  >
                                    <div class="likes">
                                        <input type="hidden" name="advertise_id" value='<?php echo $addrow['advertise_id']; ?> '/>
                                        <ul>
                                            
                                            <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow['advertise_id']; ?>" ><?php echo $like4; ?> </span>  </a></li>
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
                        if (isset($_GET["page"])) 
                        {
                                $page = $_GET["page"];
                        } 
                        else 
                        {
                                $page = 1;
                        }
                        $start_from = ($page - 1) * $perpage; 
        $add1 = "SELECT distinct  a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId, a.description,a.dealtitle ,a.advertise_img, a.price, a.vendor_name, c.categoryName,catf.vendorfilterId,venfil.vendorfilterId,cit.cityName,s.sname,v_email,v.c_website,v.c_name,v.c_telephone,v.c_telephone1,v.c_telephone2,v.vendor_id
                                    FROM advertisement a join category c on a.categoryId = c.categoryId 
                                    join state s  on s.sid=a.sid 
                                    join city cit on cit.cityId=a.cityId 
                                    join vendor_details v on v.vendor_id=a.vendor_id
                                    join catfliter catf on catf.advertisement=a.advertise_id
                                    join vendor_filter venfil on venfil.vendorfilterId=catf.vendorfilterId 
                                    WHERE 1=1 AND a.adv_type ='FEATURED' and a.is_delete=0 and a.spotlightDeal='no' and v.status = '1' AND venfil.filterid='" . $id . "' " . $condition . " order by a.advertise_id desc limit $start_from,$perpage ";

        $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
        $row1 = mysqli_num_rows($addresult1);
//
//        if ($row1 <= 0) {
//            echo "<br>With filter FEATURED Sorry! We couldn't recognize where you wanted to search.";
//        }

        while ($addrow1 = mysqli_fetch_array($addresult1)) {
            $price1 = $addrow1['price'];
            $cname = $addrow1['c_name'];
            $title = $addrow1['dealtitle'];
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
                    <div class="col-lg-3 col-sm-4">
                        <div class="pckg-tab">
                            <div class="bor">
                                <div class="col">
                                    <div class="tag"><?php echo $numberDay1 > 0 ? $numberDay1 . " Days Left" : "1 Day Left"  //echo $diff->format("%a days left");  ?></div>
                                    <!--<div class="tag">30 days left</div>-->                                                                    
                                    <a href="vendor-profile?adv_id=<?php echo $addrow1['advertise_id']; ?>"><img src="vendor_admin/images/<?php echo $addrow1['advertise_img'] ?>" /> </a>
                                </div>
                                <div class="details times-Square-left">
                                    <div class="border ">
                                        <div class="deal pd0">
                                            <h5 class="mt0"><strong><a href="vendor-profile?adv_id=<?php echo $addrow1['advertise_id']; ?>"><?php company_echo($title,16);?></a></strong></h5>
                                            <p><?php company_echo($cname,16); ?></p>
                                        </div>
                                        <div class="now pd0 pull-right">
                                            <span>
<!--                                       <span><a href="chatnow.php?id=<?php //echo $addrow1['vendor_id']; ?>" target="_blank">Chat Now</a></span>-->
                                        <span><a id="getaID" class="getaID" href="<?php echo $id1=$addrow1['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Message</a></span>
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
                                                <li><span><?php custom_echo($addrow1['categoryName'], 18); ?></span></li>
                                                <li><span class="ny"><?php custom_echo($addrow1['cityName'], 2); ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 times-Square col-sm-4"> 
                        <div class="row">
                            <div class="col-lg-10 pd0">
                                <h4 class="zx"><strong><?php echo $addrow1['c_name']; ?></strong></h4>
				<h5 ><strong><?php echo $addrow1['dealtitle']; ?></strong></h5>
                            </div>
                            <div class="now pull-right">
<!--                        <span><a href="chatnow.php?id=<?php //echo $addrow1['vendor_id']; ?>" target="_blank">Chat Now</a></span>-->
<!--                         <span><a id="getaID" class="getaID" href="<?php //echo $id1=$addrow1['advertise_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Chat Now</a></span>-->
                            </div>
                        </div>

                        <div class="row tp">
                            

                            <p>  <?php echo $addrow1['sname']; ?>, <?php echo $addrow1['cityName']; ?> | <?php
                                echo $addrow1['c_telephone'];
                                echo "-";
                                echo $addrow1['c_telephone1'];
                                echo "-";
                                echo $addrow1['c_telephone2'];
                                ?></p>                                                            
                            <br/>

                        </div>
                                  <div class="row">
<!--                            <div class="col-lg-3 pd0">
                                <d class="website contact">
                                    <a href="mailto:<?php //echo $email; ?>?subject=Inquiry for the deal&body=Hello Vendor want to get information for the deal.">Send me an email</a>
                                </d>
                            </div>-->
                            
                            <div class="col-lg-3">
                                <a href="https://<?php echo $website; ?>" target="blank" class="color website site">Website</a>
                                   <br>
                            </div>
                            <div class="col-sm-12 pd0 mt15">
                               <p><?php custom_echo($addrow1['description'], 250); ?></p>
                         
                            </div>
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
                                     $qry = "SELECT distinct  a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId, a.description,a.dealtitle ,a.advertise_img, a.price, a.vendor_name, c.categoryName,catf.vendorfilterId,venfil.vendorfilterId,cit.cityName,s.sname,v_email,v.c_website,v.c_name,v.c_telephone,v.c_telephone1,v.c_telephone2,v.vendor_id
                                    FROM advertisement a join category c on a.categoryId = c.categoryId 
                                    join state s  on s.sid=a.sid 
                                    join city cit on cit.cityId=a.cityId 
                                    join vendor_details v on v.vendor_id=a.vendor_id
                                    join catfliter catf on catf.advertisement=a.advertise_id
                                    join vendor_filter venfil on venfil.vendorfilterId=catf.vendorfilterId 
                                    WHERE 1=1 AND a.adv_type ='FEATURED' and a.is_delete=0 and a.spotlightDeal='no' and v.status = '1' AND venfil.filterid='" . $id . "' " . $condition . " order by a.advertise_id desc";

                                   $res = mysqli_query($mysqli, $qry);
                                    $total_records = mysqli_num_rows($res);
                                    $total_pages = ceil($total_records / $perpage);
                                ?>
                                <li><a class='paging' href='categorylist?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo "1" ?>'><?php echo "<<" ?></a></li>
                                    <?php
                                    for ($i = 1; $i <= $total_pages-1; $i++) {
                                    ?>
                                <li><a id='ff' class='paging' href ='categorylist?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo $i ?>'><?php echo $i ?></a></li>
                                    <?php   // echo '&nbsp;';
                                    };
                                    ?>
                                <?php
                                    if($total_pages=='0')
                                    {
                                        
                                    }
                                    else
                                    {
                                ?>
                                <li><a class='paging' href ='categorylist?stateID=<?php echo $state; ?>&cityName=<?php echo $city; ?>&cat_id=<?php echo $catid; ?>&page=<?php echo $total_pages; ?>'><?php echo $total_pages; ?></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
  </div>
    </div>
    <?php
}
?>
<script type="text/javascript">
    function doSomething(add_id)
    {
        var a = $('#item1 span').text();
        var sessionid = '<?php echo $sessionid; ?>';
        $.ajax({
            type: "POST",
            url: 'indexins?sessionid=' + sessionid,
            data: {'add_id': add_id},
            success: function (resp) {
                //alert(resp);
                $("#likes_new_" + add_id).html(resp);
            }
        });
    }

</script>
 <!--Model Of Enquriy From -->
    
     <div class="container">
<!--            </span><a  class="join button" data-toggle="modal" role="button" data-target="#myModal1" >Chat Now</a></span>-->
            <!-- Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                         <h4 class="modal-title" id="myModalLabel" style="margin-left: 128px;">Contact this vendor</h4>
                            </div>                   <div class="modal-body">
                                <div class="views">
                                    <form method="post" action="enquiry" onsubmit="return validatemanageform();">
                                         <input type="hidden" id="pageNo" name="pageNo" value="5" />
                                        <input type="hidden" id="aid" name="aid" value="" /> 
                                        <div class="form-group">
                                        <label style="margin-left: 128px;" ><h4></h4></label>
                                            
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
                                            <textarea rows="4" cols="40" name="contactNo" id="txtcontact" placeholder="Message"></textarea>
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
            