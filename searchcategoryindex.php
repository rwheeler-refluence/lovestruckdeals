<!-- add search catagory -->
<?php
session_start();    
$sessionid= session_id();
    include "config.php";
    
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
      
    
    $id = $_POST['add_id'];       
    $address = $_POST['txtAddress'];     
    $catid = $_POST['cat'];       
    $state = $_POST['stateID'];
    $city = $_POST['cityID']; 
          
    
   
?>
    <div id="data1">
    <?php       
         $add="SELECT distinct a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId, a.description, a.advertise_img, a.price, a.vendor_name, c.categoryName,catf.vendorfilterId,venfil.vendorfilterId,cit.cityName,v.c_name
                                    FROM vendor_details v, advertisement a join category c on a.categoryId = c.categoryId                                                                      
                                    join catfliter catf on catf.advertisement=a.advertise_id
                                    join vendor_filter venfil on venfil.vendorfilterId=catf.vendorfilterId 
                                    join city cit on cit.cityId=a.cityId
                                    WHERE a.adv_type ='SPOTLIGHT' and a.is_delete=0 and a.vendor_id = v.vendor_id and a.spotlightDeal='yes'  AND venfil.filterid='".$id."'";                       
                          
        $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
        $row= mysqli_num_rows($addresult);                                
                
        if($row<=0)
        {
            echo "<br>With filter SPOTLIGHT Sorry! We couldn't recognize where you wanted to search."; 
        }       
       

        $index = 0;
        while ($addrow = mysqli_fetch_array($addresult)) 
        {
            $index++;
            if ($index <= 3) 
            {
                $price = $addrow['price'];
                $comapny_name = $addrow['c_name'];
                $adv_type = $addrow['adv_type'];
                $like4 = $addrow['likes'];
                
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
<!--                                <div class="tag">30 days left</div>-->
                                    <div class="tag"><?php echo $numberDay>0?$numberDay." Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                <a href="vendor-profile.php?adv_id=<?php echo $addrow['advertise_id']; ?>"><img src="images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253"></a>
                                <?php echo '<div class="feat_light spot">' . $adv_type . '</div>'; ?>
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
                                            <li><span class="ny"><?php custom_echo($addrow['cityName'], 2);  ?></span></li>
<!--                                            <li><span class="ny">NY</span></li>-->
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
            $add1="SELECT distinct  a.vendor_name,a.categoryId, a.adv_type,a.likes,a.email,a.advDisplayDate,a.advExpiryDate,a.advertise_id,a.categoryId, a.description, a.advertise_img, a.price, a.vendor_name, c.categoryName,catf.vendorfilterId,venfil.vendorfilterId,v.c_name
                                    FROM  FROM vendor_details v,advertisement a join category c on a.categoryId = c.categoryId                                                                     
                                    join catfliter catf on catf.advertisement=a.advertise_id
                                    join vendor_filter venfil on venfil.vendorfilterId=catf.vendorfilterId 
                                    WHERE a.adv_type ='FEATURED' and a.is_delete=0 and a.vendor_id = v.vendor_id and a.spotlightDeal='no' AND venfil.filterid='".$id."'";                       
                                                  
                $addresult1 = mysqli_query($mysqli, $add1) or die(mysqli_error());
                $row1= mysqli_num_rows($addresult1);                                
                
                if($row1<=0)
                {
                    echo "<br>With filter FEATURED Sorry! We couldn't recognize where you wanted to search."; 
                }                
                
                while ($addrow1 = mysqli_fetch_array($addresult1)) 
                {
                    $price1 = $addrow1['price'];
                    $company_name1 = $addrow1['c_name'];
                    $adv_type1 = $addrow1['adv_type'];
                    $like5 = $addrow1['likes']; 
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
<!--                                    <div class="tag">30 days left</div>-->
                                    <div class="tag"><?php echo $numberDay1>0?$numberDay1." Days Left" : "1 Day Left"  //echo $diff->format("%a days left"); ?></div>
                                        <a href="vendor-profile.php?adv_id=<?php echo $addrow1['advertise_id']; ?>"> <img src="images/<?php echo $addrow1['advertise_img']; ?>" width="269" height="253"></a>
                                        <?php echo '<div class="feat_light spot">' . $adv_type1 . '</div>'; ?>
                                        <div class="feat_light feat">FEATURED</div>
                                </div>
                                <div class="details">
                                    <div class="border">
                                        <div class="deal pd0">
                                            <?php echo '<h5 class="mt0"><strong>$' . $price1 . ' Off Packages</strong></h5>'; ?>
                                            <?php echo '<p>' . $company_name1 . '</p>'; ?>
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
                                                <li> <a onclick="doSomething(<?php echo $addrow1['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>" ><?php echo $like5; ?> </span>  </a></li>
                                                <li><span><?php custom_echo($addrow1['categoryName'], 6); ?></span></li>
                                                 <li><span class="ny"><?php custom_echo($addrow1['cityName'], 2);  ?></span></li>
<!--                                                <li><span class="ny">NY</span></li>-->
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