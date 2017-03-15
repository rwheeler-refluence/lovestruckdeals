

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Xaaza</title>
        <link type="text/css" href="css/style.css" rel="stylesheet"/>
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,700|Montserrat|Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/bs_leftnavi.css">


        <script src="js/jquery.min.js"></script>

 <!--<script type="text/javascript" src="js/bootstrap-select.js"></script>-->

    </head>

    <body>
        <header class="head-brd">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="row menu-lg">
                        <nav id="navigation" role="navigation" class="col-lg-8 pd0">
                            <div class="main-navigation navbar navbar-inverse">
                                <!--<div class="navbar-inner">
                                        <div class="container"></div>
            </div>-->
                                <div class="col-lg-3 logo"><a href=""><img src="images/xaaza_logo.png"  alt=" "></a></div>
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <div class="col-lg-9 pd0">
                                    <div class="nav-collapse collapse">
                                        <div class="menu-menu-1-container text-uppercase">
                                            <ul id="menu-menu-1" class="nav">
                                                <li><a href="#">Wedding&nbsp;deals</a></li>
                                                <li><a href="#">Xaaza&nbsp;style</a></li>
                                                <li><a href="#">Local&nbsp;Vendors</a></li>
                                                <li><a href="#">About</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </nav>
                        <div class="col-lg-4">
                            <div class="accnt">
                                <div class="ac-log text-right">
                                    <ul >
                                        <li><a href="#" class="blu-btn">Login</a></li>
                                        <li><a href="#" class="blu-btn">Sign Up</a></li>
                                    </ul>
                                </div>
                                <div class=" social pull-right">
                                    <ul>
                                        <li><a href="#" class="instg">Instagram</a></li>
                                        <li><a href="#" class="fb">Facebook</a></li>
                                        <li><a href="#" class="twt">Twitter</a></li>
                                        <li><a href="#" class="pint">pinterest</a></li>
                                    </ul>
                                </div>
                            </div>              </div>
                    </div>
                </div>
            </div>
        </header>


        <!-- wedding_deals ---> 

        <div class="wedding_deals">
            <div class="col-lg-12">
                <div class="container">
                    <div class="venue">
                        <div class="col-lg-10">
                            <h2 class="monts mt15">Wedding Venues near <span>new york,ny</span></h2>

                            <p class="sprite" id="cat">Categories</p>

                        </div>

                        <div class="col-lg-2 pull-right pd0">
                            <div class="col-lg-4 pd0"><div class="venue-right photo"><a href="#"><p>Photo</p></a></div></div>
                            <div class="col-lg-4 pd0"><div class="venue-right list"><a href="#"><p>List</p></a></div></div>
                            <div class="col-lg-4 pd0"><div class="venue-right map"><a href="#"><p>Map</p></a></div></div>
                        </div>
                    </div>
                    <div class="holdr categories">
                        <!-- <h4 class="brd">GREAT WEDDING DEALS</h4>-->
                        <div class="deals photo"><a href="Photography.php?cat_id=1"><p>Photography</p></a></div>
                        <div class="deals cate"><a href="Photography.php?cat_id=2"><p>caterers</p></a></div>
                        <div class="deals cakes"><a href="Photography.php?cat_id=3"><p>cakes and sweets</p></a></div>
                        <div class="deals cinema"><a href="Photography.php?cat_id=4"><p>cinematography<p></a></div>
                        <div  class="deals jwele"><a href="Photography.php?cat_id=5"><p>Jwellery<p></a></div>
                        <div  class="deals dj"><a href="Photography.php?cat_id=6"><p>Dj<p></a></div>
                        <div class="deals fashion"><a href="Photography.php?cat_id=7"><p>Fashion</p></a></div>
                        <div class="deals travel"><a href="Photography.php?cat_id=8"><p>Travels</p></a></div>
                        <div class="deals limo"><a href="Photography.php?cat_id=9"><p>limo</p></a></div>
                        <div class="deals hair"><a href="Photography.php?cat_id=10"><p>Hair And Makeup</p></a></div>

                        <div class="clearfix"></div>

                        <div class="mt30"><img src="images/line_163.png"></div> 
                    </div>

                    <div class="col-lg-3">
                        <div class="filter-by">
                            <!--<h4 class="mt10">Filter by</h4>-->
                            <!-- <ul>
                                <li class="border"><a href="#">Near by Areas</a></li>
                                <li class="border"><a href="#">Distance Form</a></li>
                                <li class="border"><a href="#">Maximum Capacity</a></li>
                                <li class="border"><a href="#">Wedding Events</a></li>
                                <li class="border"><a href="#">Type</a></li>
                                <li class="border"><a href="#">Venue Setting</a></li>
                                
                             </ul>-->
                            <h4 class="gw-menu-text">Filter by</h4> 
                            <div class="gw-sidebar mt40">
                                <div id="gw-sidebar" class="gw-sidebar">
                                    <div class="nano-content">

                                        <ul class="gw-nav gw-nav-list">
                                            <!--  <li class="init-un-active"> <a href="javascript:void(0)"></a> </li>-->
                                            <?php
                                           $id = $_GET['cat_id'];
                                            $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
                                            $sql = "SELECT * FROM cat_attributes WHERE categoryId='$id' and  parent_id = 0";
                                            $result = mysqli_query($mysqli, $sql) or die(mysqli_error());


                                            while ($row = mysqli_fetch_array($result)) {
                                                $atr_id = $row['atr_id'];
                                                $atr_name = $row['atr_name'];
                                                echo '<li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text">' . $atr_name . '</span> <b class="gw-arrow icon-arrow-up8"></b> </a>';
                                                echo '<ul class="gw-submenu">';
                                                $sql2 = "SELECT * FROM cat_attributes WHERE parent_id=$atr_id and atr_id<>0";
                                                $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error());

                                                while ($row = mysqli_fetch_array($result2)) {
                                                    $sub_cat_id = $row['atr_id'];
                                                    $sub_cat_name = $row['atr_name'];
                                                   
                                                    echo '<li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text">' . $sub_cat_name . '</span> <b class="gw-arrow icon-arrow-up8"></b> </a> </li>';
                                                }
                                                echo '</ul>';
                                                echo "</li>";
                                            }
                                            ?>



                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9 pd0">


                        <div class="col-lg-4 pckg-tab">
                            <div class="packages"> 
                                <div class="bor">
                                    <div class="col">
                                        <div class="tag">30 days left</div>
                                        <img src="images/img1.jpg" width="269" height="253">
                                        <div class="feat_light spot">SPOTLIGHT</div>
                                    </div>
                                    <div class="details">
                                        <div class="border">
                                            <div class="deal pd0">
                                                <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                                <p>Fred Marcus Studio</p>
                                            </div>
                                            <div class="deal-right pd0 pull-right">
                                                <span><a href="#">Chat Now</a></span>
                                            </div>
                                        </div>
                                        <div class="likes">
                                            <ul>
                                                <li><span class="heart">526</span></li>
                                                <li><span>Venues</span></li>
                                                <li><span class="ny">NY</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pckg-tab">
                            <div class="packages"> 
                                <div class="bor">
                                    <div class="col">
                                        <div class="tag">30 days left</div>
                                        <img src="images/img2.jpg" width="269" height="253">
                                        <div class="feat_light spot">SPOTLIGHT</div>
                                    </div>
                                    <div class="details">
                                        <div class="border">
                                            <div class="deal pd0">
                                                <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                                <p>Fred Marcus Studio</p>
                                            </div>
                                            <div class="deal-right pd0 pull-right">
                                                <span><a href="#">Chat Now</a></span>
                                            </div>
                                        </div>
                                        <div class="likes">
                                            <ul>
                                                <li><span class="heart">526</span></li>
                                                <li><span>Venues</span></li>
                                                <li><span class="ny">NY</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pckg-tab">
                            <div class="packages"> 
                                <div class="bor">
                                    <div class="col">
                                        <div class="tag">30 days left</div>
                                        <img src="images/img3.jpg" width="269" height="253">
                                        <div class="feat_light spot">SPOTLIGHT</div>
                                    </div>
                                    <div class="details">
                                        <div class="border">
                                            <div class="deal pd0">
                                                <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                                <p>Fred Marcus Studio</p>
                                            </div>
                                            <div class="deal-right pd0 pull-right">
                                                <span><a href="#">Chat Now</a></span>
                                            </div>
                                        </div>
                                        <div class="likes">
                                            <ul>
                                                <li><span class="heart">526</span></li>
                                                <li><span>Venues</span></li>
                                                <li><span class="ny">NY</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="featured">


                            <div class="col-lg-3 pckg-tab pd0">
                                <div class="packages">  
                                    <div class="bor">   

                                        <div class="col">
                                            <div class="tag">30 days left</div>
                                            <img src="images/img1.jpg" width="269" height="253">
                                            <div class="feat_light feat">FEATURED</div>
                                        </div>
                                        <div class="details">
                                            <div class="border">
                                                <div class="deal pd0">
                                                    <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                                    <p>Fred Marcus Studio</p>
                                                </div>
                                                <div class="deal-right pd0 pull-right">
                                                    <span><a href="#">Chat Now</a></span>
                                                </div>
                                            </div>
                                            <div class="likes">
                                                <ul>
                                                    <li><span class="heart">526</span></li>
                                                    <li><span>Venues</span></li>
                                                    <li><span class="ny">NY</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 pckg-tab pd0">
                                <div class="packages">  
                                    <div class="bor">   

                                        <div class="col">
                                            <div class="tag">30 days left</div>
                                            <img src="images/img2.jpg" width="269" height="253">
                                            <div class="feat_light feat">FEATURED</div>
                                        </div>
                                        <div class="details">
                                            <div class="border">
                                                <div class="deal pd0">
                                                    <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                                    <p>Fred Marcus Studio</p>
                                                </div>
                                                <div class="deal-right pd0 pull-right">
                                                    <span><a href="#">Chat Now</a></span>
                                                </div>
                                            </div>
                                            <div class="likes">
                                                <ul>
                                                    <li><span class="heart">526</span></li>
                                                    <li><span>Venues</span></li>
                                                    <li><span class="ny">NY</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 pckg-tab pd0">
                                <div class="packages">  
                                    <div class="bor">   

                                        <div class="col">
                                            <div class="tag">30 days left</div>
                                            <img src="images/img3.jpg" width="269" height="253">
                                            <div class="feat_light feat">FEATURED</div>
                                        </div>
                                        <div class="details">
                                            <div class="border">
                                                <div class="deal pd0">
                                                    <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                                    <p>Fred Marcus Studio</p>
                                                </div>
                                                <div class="deal-right pd0 pull-right">
                                                    <span><a href="#">Chat Now</a></span>
                                                </div>
                                            </div>
                                            <div class="likes">
                                                <ul>
                                                    <li><span class="heart">526</span></li>
                                                    <li><span>Venues</span></li>
                                                    <li><span class="ny">NY</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 pckg-tab pd0">
                                <div class="packages">  
                                    <div class="bor">   

                                        <div class="col">
                                            <div class="tag">30 days left</div>
                                            <img src="images/img4.jpg" width="269" height="253">
                                            <div class="feat_light feat">FEATURED</div>
                                        </div>
                                        <div class="details">
                                            <div class="border">
                                                <div class="deal pd0">
                                                    <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                                    <p>Fred Marcus Studio</p>
                                                </div>
                                                <div class="deal-right pd0 pull-right">
                                                    <span><a href="#">Chat Now</a></span>
                                                </div>
                                            </div>
                                            <div class="likes">
                                                <ul>
                                                    <li><span class="heart">526</span></li>
                                                    <li><span>Venues</span></li>
                                                    <li><span class="ny">NY</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mt15 pckg-tab pd0">
                                <div class="packages">  
                                    <div class="bor">   

                                        <div class="col">
                                            <div class="tag">30 days left</div>
                                            <img src="images/img5.jpg" width="269" height="253">
                                            <div class="feat_light feat">FEATURED</div>
                                        </div>
                                        <div class="details">
                                            <div class="border">
                                                <div class="deal pd0">
                                                    <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                                    <p>Fred Marcus Studio</p>
                                                </div>
                                                <div class="deal-right pd0 pull-right">
                                                    <span><a href="#">Chat Now</a></span>
                                                </div>
                                            </div>
                                            <div class="likes">
                                                <ul>
                                                    <li><span class="heart">526</span></li>
                                                    <li><span>Venues</span></li>
                                                    <li><span class="ny">NY</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mt15 pckg-tab pd0">
                                <div class="packages">  
                                    <div class="bor">   

                                        <div class="col">
                                            <div class="tag">30 days left</div>
                                            <img src="images/img6.jpg" width="269" height="253">
                                            <div class="feat_light feat">FEATURED</div>
                                        </div>
                                        <div class="details">
                                            <div class="border">
                                                <div class="deal pd0">
                                                    <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                                    <p>Fred Marcus Studio</p>
                                                </div>
                                                <div class="deal-right pd0 pull-right">
                                                    <span><a href="#">Chat Now</a></span>
                                                </div>
                                            </div>
                                            <div class="likes">
                                                <ul>
                                                    <li><span class="heart">526</span></li>
                                                    <li><span>Venues</span></li>
                                                    <li><span class="ny">NY</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mt15 pckg-tab pd0">
                                <div class="packages">  
                                    <div class="bor">   

                                        <div class="col">
                                            <div class="tag">30 days left</div>
                                            <img src="images/img7.jpg" width="269" height="253">
                                            <div class="feat_light feat">FEATURED</div>
                                        </div>
                                        <div class="details">
                                            <div class="border">
                                                <div class="deal pd0">
                                                    <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                                    <p>Fred Marcus Studio</p>
                                                </div>
                                                <div class="deal-right pd0 pull-right">
                                                    <span><a href="#">Chat Now</a></span>
                                                </div>
                                            </div>
                                            <div class="likes">
                                                <ul>
                                                    <li><span class="heart">526</span></li>
                                                    <li><span>Venues</span></li>
                                                    <li><span class="ny">NY</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mt15 pckg-tab pd0">
                                <div class="packages">  
                                    <div class="bor">   

                                        <div class="col">
                                            <div class="tag">30 days left</div>
                                            <img src="images/img8.jpg" width="269" height="253">
                                            <div class="feat_light feat">FEATURED</div>
                                        </div>
                                        <div class="details">
                                            <div class="border">
                                                <div class="deal pd0">
                                                    <h5 class="mt0"><strong>$100 off packages</strong></h5>
                                                    <p>Fred Marcus Studio</p>
                                                </div>
                                                <div class="deal-right pd0 pull-right">
                                                    <span><a href="#">Chat Now</a></span>
                                                </div>
                                            </div>
                                            <div class="likes">
                                                <ul>
                                                    <li><span class="heart">526</span></li>
                                                    <li><span>Venues</span></li>
                                                    <li><span class="ny">NY</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="bs-example">
                            <ul class="pagination  mt40">
                                <li><a href="#">&laquo;</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#">7</a></li>
                                <li><a href="#">8</a></li>
                                <li><a href="#">9</a></li>
                                <li><a href="#">10</a></li>
                                <li><a href="#">..</a></li>
                                <li><a href="#">11</a></li>
                                <li><a href="#">&raquo;</a></li>
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
        <div class="Retweet-deals">
            <div class="container">
                <div class="col-lg-12">
                    <div class="col-lg-6 bl pdr">
                        <h4 class="mt10"><strong>New vendor? </strong></h4>
                        <a class="blu-btn bton"><strong>Register here</strong></a>

                    </div>
                    <div class="col-lg-6">
                        <h4 class="mt10 mar-left"><strong>Already a XAAZA vendor?</strong></h4>
                        <a class="blu-btn bton"><strong>Log in here</strong></a>
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
                        <li><a class="ft-instg" href="#">Instagram</a></li>
                        <li><a class="ft-fb" href="#">Facebook</a></li>
                        <li><a class="ft-twt" href="#">Twitter</a></li>
                        <li><a class="ft-pinte" href="#">pinterest</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="line"></div>
        <div class="Retweet container">
            <span><strong>Photo credits, from top to bottom:</strong> 
                Christophe Genty Photography, Natalie Franke Photography, Lin and Jirsa Photography, Studio Merima
            </span>

        </div>

        <!----End Retweet-deals ---> 


        <!-- footer --->  

        <div class="footer">
            <div class="container">
                <div class="location">
                    <h6>About Xaaza :</h6>
                    <ul class="test">
                        <li><a href="#">New York</a></li>
                        <li><a href="#">San Fransisco</a></li>
                        <li><a href="#">Los Angeles</a></li>
                        <li><a href="#">New York</a></li>
                    </ul>

                </div>
                <div class="location">
                    <h6>Wedding Resources :</h6>	
                    <ul class="test">
                        <li><a href="#">Project Wedding</a></li>
                        <li><a href="#">Martha Stewart</a></li> 
                        <li><a href="#">WeddingWire Blog</a></li>
                        <li><a href="#">BridalBuds</a></li>
                        <li><a href="#">WeddingAces</a></li> 
                    </ul>

                </div>
                <div class="deals-location right-border">
                    <h6>Legal :</h6>
                    <ul class="test">
                        <li><a href="#">Photography</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Caterers</a></li>
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Photography</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Caterers</a></li>
                        <li><a href="#">Travel</a></li>
                    </ul>

                </div>
                <div class="location right-border mt10">
                    <h6>Vendor Search :</h6>
                    <ul class="test">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Local Vendors</a></li>
                        <li><a href="#">Xaaza Style</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Wedding Cakes</a></li>
                        <li><a href="#"> Wedding Venues</a></li>
                        <li><a href="#">Rehearsal Dinner</a></li> 
                        <li><a href="#">Wedding Caterers</a></li>
                        <li><a href="#">Wedding Photographers</a></li>
                        <li><a href="#"> Wedding Videographers</a></li>
                        <li><a href="#">Wedding Registry</a></li>
                        <li><a href="#"> Wedding Decor</a></li> 
                        <li><a href="#">Wedding Invitations</a></li>
                        <li><a href="#">Wedding Favors & Gifts</a></li> 
                        <li><a href="#">Wedding Bands</a></li> 
                        <li><a href="#">Wedding DJs</a></li> 
                        <li><a href="#">Wedding Dresses</a></li> 
                        <li><a href="#">Wedding Florists</a></li> 
                        <li><a href="#">Wedding Limos Travel</a></li>
                        <li><a href="#">Ceremony Music </a></li>
                        <li><a href="#">Wedding Planners</a></li> 
                        <li><a href="#">Wedding Rentals</a></li> 
                        <li><a href="#">Wedding Officiants</a></li> 
                        <li><a href="#">Wedding Jewelry</a></li> 
                        <li><a href="#">Wedding Hairstyles</a></li> 
                        <li><a href="#">Name Change </a></li>



                    </ul>
                </div>
                <div class="location right-border">
                    <div class="fot-logo"><img src="images/footer-logo.png" /></div>
                    <h5><a href="#">© Copyrights 2015 xaaza</a></h5>
                    <!-- <ul class="test">
                         
                         <li><a href="#">Terms of use </a></li>
                         <li><a href="#">Privacy policy</a></li>
                         
                     </ul>-->

                </div>
                <!--<div class="col-lg-3 bl">
                        <h6>Deals by Locations</h6>
                    <ul>
                        <div class="col-lg-6">
                            <li><a href="#" class="mt5">Photography</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Caterers</a></li>
                            <li><a href="#">Travel</a></li>
                        </div>
                        <div class="col-lg-6">
                            <li><a href="#"  class="mt5">Photography</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Caterers</a></li>
                            <li><a href="#">Travel</a></li>
                        </div>
                    </ul>
                        
                </div>-->
                <!--<div class="col-lg-3 bl">
                        <h6>Quick Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Local Vendors</a></li>
                        <li><a href="#">Xaaza Style</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                        
                </div>-->
                <!--<div class="col-lg-3 bl">
                        <div class="fot-logo"><img src="images/footer-logo.png" /></div>
                    <ul>
                        <li><a href="#">© Copyrights 2015 xaaza</a></li>
                        <li><a href="#">Terms of use </a></li>
                        <li><a href="#">Privacy policy</a></li>
                        
                    </ul>
                        
                </div>-->
            </div>
        </div>

        <script src="js/bootstrap.js"></script>
        <script src="js/bs_leftnavi.js"></script>
        <!-- End footer --->   
        <script>
            $(document).ready(function () {
                $("#cat").click(function () {
                    $(".categories").fadeToggle("slow up down");

                });
            });
        </script>


    </body>
</html>
