<?php
    include './config.php';
    $cati = $_POST['cat'];
?>
<div class="wedding_deals mt40">
        <div class="col-lg-12">
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
                                            <span class="top-heading">

                                                <div class="customNavigation">
                                                    <!--   <a class="btn prev">Previous</a>-->
                                                    <!--<a class="btn next">More Categories</a>-->
                                                    <!--<a class="btn play">Autoplay</a>
                                                    <a class="btn stop">Stop</a>-->
                                                </div>
                                            </span>

                                            <div class="dd-inner">
                                                <div class="categories_deals"> 

                                                    <div class="dropdown"> <!--id="owl-demo"-->
                                                        <div id="owl-demo" class="owl-carousel">
                                                            <?php
                                                            $cat = "SELECT image,categoryName,categoryId FROM category WHERE isdel='0' and status=1";

                                                            $cat_addresult = mysqli_query($mysqli, $cat) or die(mysqli_error());
//                                                            $index = 0;
                                                            $addrow = mysqli_fetch_array($cat_addresult); {
//                                                                $index++;

//                                                                if ($index <= 30) {
                                                                    $cat_image = $addrow['image'];
                                                                    $cat_name = $addrow['categoryName'];
                                                                    $cat_id = $addrow['categoryId'];
                                                                    ?>
                                                                    <div class="item"><a href="categorydetails.php?cat_id=<?php echo $cat_id ?>"><img src="categoryImage/<?php echo $cat_image; ?>" width="5" height="5" ><?php echo $cat_name ?></a> </div>
                                                                    <?php
//                                                                } else {
                                                                    ?>
                                                                    <?php
                                                                }
//                                                            }
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
                </div>

                <!--<div class="col-lg-9 pd0"> -->
                <!-- Rahul Sortlight -->
                <?php
                $add = "SELECT a.categoryId, a.adv_type,a.likes,a.advDisplayDate,a.advExpiryDate,a.description,a.advertise_id, a.advertise_img, a.price, a.vendor_name, c.categoryName
              FROM advertisement a, category c
              WHERE a.categoryId = c.categoryId 
              AND c.categoryId = '".$cati."'";
             
                
                $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());

//                $index = 0;
                $addrow = mysqli_fetch_array($addresult);
//                    $index++;
//                    if ($index <= 16) 
                    
                        $price = $addrow['price'];
                       $vendor_name = $addrow['vendor_name'];
                       $adv_type = $addrow['adv_type'];
                        $categoryName = $addrow['categoryName'];
                       $like = $addrow['likes'];
                       $advDisplayDate21 = $addrow['advDisplayDate'];
                        $advExpiryDate21 = $addrow['advExpiryDate'];

                       $date21 = date('Y-m-d');
                        $diff21 = date_diff(date_create($date21), date_create($advExpiryDate21));
                        ?>

                        <div class="col-lg-3 col-xs-6  pckg-tab">

                            <div class="packages">

                                <div class="packagelist">


                                    <div class="col">
                                        <div class="tag"><?php echo $diff21->format(" %a days left"); ?>t</div>
                                        <img src="images/<?php echo $addrow['advertise_img']; ?>" width="269" height="253">
                                        <div class="feat_light spot"> <?php echo $adv_type; ?> </div>
                                    </div>
                                    <div class="details">
                                        <div class="border">
                                            <div class="deal pd0">
                                                <h5 class="mt0"><strong>$ <?php echo $price; ?> Off Packages</strong></h5>                                                
                                                <p><?php echo $vendor_name; ?></p>
                                            </div>
                                            <div class="deal-right pd0 pull-right">
                                                <span><a href="chatnow.html">Chat Now</a></span>
                                            </div>
                                        </div>
                                        <?php
                                        $aid = $addrow['advertise_id'];
                                        ?>                                    

                                        <div class="likes">
                                            <form  name="add_form"  >
                                                <ul>
                                                    <input type="hidden" name="advertise_id" value='<?php echo $addrow['advertise_id']; ?> '/>
                                                    <li> <a onclick="doSomething(<?php echo $addrow['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow['advertise_id']; ?>" ><?php echo $like; ?> </span>  </a></li>
                                                    <li><span><?php echo $categoryName; ?></span></li>
                                                    <li><span class="ny">NY</span> </li>
                                                </ul>
                                            </form>
                                        </div>

                                    </div>
                                </div>                          
                            </div>
                        </div>




                        <?php
//                    }
//                }
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
                                        <div class="tag"><?php// echo $diff20->format(" %a days left") ?></div>
                                        <img src="images/<?php //echo $addrow1['advertise_img']; ?>" width="269" height="253">
                                        <div class="feat_light spot"> <?php //echo $adv_type1; ?> </div>
                                        <div class="feat_light feat">FEATURED</div>
                                    </div>
                                    <div class="details">
                                        <div class="border">
                                            <div class="deal pd0">
                                                <h5 class="mt0"><strong>$<?php //echo $price1; ?>  Off Packages</strong></h5>
                                                <p> <?php //echo $vendor_name1; ?> </p>
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

                                                    <input type="hidden" name="advertise_id" value='<?php //echo $addrow1['advertise_id']; ?> '/>                                                                     
                                                    <li> <a onclick="doSomething(<?php //echo $addrow1['advertise_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrow1['advertise_id']; ?>" ><?php echo $like1; ?> </span>  </a></li>

                                                    <li><span> <?php// echo $category_name; ?> </span></li>
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