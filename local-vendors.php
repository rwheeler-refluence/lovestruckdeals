<?php
session_start();
$sessionid = session_id();
include "header.php";
include './config.php';
include './urlseo.php';
include './validation_enquiryform.php';


function company_echo($x, $length) {
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '';
        echo $y . " ...";
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
?>
<html>
    <body>
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://www.owlcarousel.owlgraphic.com/assets/owlcarousel/assets/owl.theme.default.min.css">
        <script src="js/owl.carousel.js"></script>
        <script>
    $(document).ready(function () {
        var owl = $("#owl-demo1");
        owl.owlCarousel({
            itemsCustom: [
                [0, 2],
                [450, 3],
                [600, 4],
                [700, 5],
                [1000, 10],
                [1200, 9],
                        // [1400, 9],
//       [1600, 9],
            ],
            navigation: true,
        });
    });
</script>
        <style>
               img.grey {
    width: 58%;
    /* width: 106px; */
    max-width: 100%;
    height: auto;
    display: block;
    object-fit: contain;
    float: none !important;
    margin: 0 auto;
    
    -webkit-filter: grayscale(95%);
    -moz-filter: grayscale(95%);
    -ms-filter: grayscale(95%);
    -o-filter: grayscale(95%);
    filter: grayscale(95%);

}

    img.grey:hover
{
    -webkit-filter: grayscale(0%);
    -moz-filter: grayscale(0%);
    -ms-filter: grayscale(0%);
    -o-filter: grayscale(0%);
    filter: grayscale(0%);
}



            
            #country-list {
                float: left;
                list-style: none;
                margin: 0;
                padding: 0;
                width: 87%;
                position: absolute;
                z-index: 99;
            }

            #country-list li {
                padding: 8px 10px;
                background: #FAFAFA;
                border-bottom: #F0F0F0 1px solid;
                font-size: 14px;
                color: black;
            }
            #country-list li:hover {
                background: #F0F0F0;

            }
            
              #owl-demo1 .item{
        /*background: #3fbf79;
        padding: 30px 0px;
         margin: 10px;*/
        color: #333;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
        /*display:inline-block;*/
    }
    #owl-demo1 .item a
    {
        font-size:0.6em;
        color:#333;
        display: block;

    }

    #owl-demo1 .owl-item
    {
        margin:0 0;
        /*width:122px !important*/

    }
    #owl-demo1 .owl-carousel .owl-item .item
    {
        /*width:110px !important;*/
        display:inline-block;
    }

    .top-heading .customNavigation{
        text-align: center;
    }
    .top-heading .customNavigation a{
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        padding-top: 10px;
    }
    .owl-pagination{display:none;}
    #owl-demo1 i.glyphicon {color: #888 !important;}
    #country-list{float:left;list-style:none;margin:0;padding:0;width:87%;position:absolute;z-index:99;}
    #country-list li{padding:8px 12px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;font-size:14px; color: black;text-align:left;}
    #country-list li:hover{background:#F0F0F0;}
    @media only screen and (max-width:375px)

    {	/*#owl-demo1 .owl-item{width:77px !important;}*/
        #owl-demo1 .item a{font-size:10px;}
    }
    
        </style>
        <script type="text/javascript">
                    function getCitySearches(val)
                    {
                    $.ajax({
                    type: "POST",
                            url: "citySearches",
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
                    var sessionid = '<?php echo $sessionid; ?>';
                    $.ajax({
                    type: "POST",
                            url: 'vendors_likes?sessionid=' + sessionid,
                            data: {'add_id': add_id},
                            success: function (resp)
                            {
                            $("#likes_new_" + add_id).html(resp);
                            }
                    });
            }
            $(document).on('click', '#SearchFormbt', function(){
            var data = $("#SearchForm").serialize();
                    $.ajax({
                    type: "POST",
                            url:"searchvendorDetails",
                            data: data,
                            dataType: "html",
                            sync: false,
                            success: function (data) {
                            $("#grid").html(data);
                                    return false;
                            }
                    });
            });</script>
            <div class="wrapper">
            <div class="container-fluid pd0">
                <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"> </li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active"> <img src="images/local-vendor-ban1.jpg" alt="wedding specials" width="460" height="345"> </div>
                        <div class="item"> <img src="images/local-vendor-ban2.jpg" alt="wedding specials" width="460" height="345"> </div>
                        <div class="item"> <img src="images/local-vendor-ban3.jpg" alt="wedding specials" width="460" height="345"> </div>
                        <div class="item"> <img src="images/local-vendor-ban4.jpg" alt="wedding specials" width="460" height="345"> </div>
                    </div>
                    <!-- Left and right controls --> 
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                <div class="overlay loc_vndr mt40">
                    <div class="container">
                        <h3>find your vendors</h3>
                        <form  name="SearchCategory" id="SearchForm" >
                            <div class="ban-text text-center">
                                <p>Search vendors and chat with them live</p>
                                <div class="col-sm-12 mt40 xcate_search">
                                    <div class="col-sm-3 col-xs-6 pdzero">
<!--                                        <div class="loc1"></div>-->
                                        <div class="serch-inner">
                                            Enter State Name
                                        </div>
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
<!--                                        <div class="loc1"></div>-->
                                            <div class="serch-inner">
                                                Enter City Name                       
                                            </div>
                                        <select id="city-Name" name="cityID" class="selectpicker show-tick" data-live-search="true">
                                            <option selected disabled> Enter City Name</option>
                                            
                                        </select>                                   
                                    </div>
                                    <div class="col-sm-4 col-xs-12 pdzero cate-main">
<!--                                        <div class="categories1"></div>-->
                                        <div class="categry">
                                        All  Categories
                                        </div>
                                        <select id="basic1" name="cat" class="selectpicker show-tick services">
                                            <option value="">All Categories</option>
                                            <?php
                                            $sql = "SELECT * FROM category where isdel = 0";
                                            $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?php echo $row['categoryId']; ?>"><?php echo $row['categoryName']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 col-xs-12 pdzero">
                                        <input type="button" id="SearchFormbt" name="submit" value="Search" class="btn blu-btn ser-new-btn">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="venders-we">
               
                <div class="container">
                    <div class="holdr categories">
                        <h1 class="brd"><span>LOCAL VENDORS</span></h1>
                        
                        <div class="wedding_deals_main">
                            <div class="cate_popup">    
                                <div class="container">
                                    <nav id="ddmenu">
                                        <ul>
                                            <li class="full-width">
                                                <div id="owl-demo1" class="owl-carousel">
                                                    <?php
                                                    $cat = "SELECT image,categoryName,categoryId FROM category WHERE isdel='0' and status=1";
                                                    $cat_addresult = mysqli_query($mysqli, $cat) or die(mysqli_error());
                                                    $index = 0;
                                                    while ($addrow = mysqli_fetch_array($cat_addresult)) {
                                                        $tu_id = $addrow['categoryId'];
                                                        $title = $addrow['categoryName'];
                                                        $string = slug($title);
                                                        $index++;
                                                        if ($index <= 19) {
                                                            $cat_image = $addrow['image'];
                                                            $cat_name = $addrow['categoryName'];
                                                            $cat_id = $addrow['categoryId'];
                                                            ?>
                                                            <div class="item"><a href="<?php echo ROOT_PATH . 'weddingdeals/' . $tu_id . '/' . $string; ?>"><img src="<?php echo ROOT_PATH; ?>categoryImage/<?php echo $cat_image; ?>" class="grey" width="5" height="5"><?php echo $cat_name ?></a> </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> 
                            </div>    
                        </div>
                    </div>
                    <div class="col-lg-12 pd0 bottom-border" id="grid">
                        <?php
                        $addcat = "SELECT * FROM category WHERE isdel = 0 and categoryId in (1,2,4,6,50,57,61,65)ORDER BY FIND_IN_SET(categoryId,'1,57,65,61,50,6,2,4')";
                        $addresult = mysqli_query($mysqli, $addcat) or die(mysqli_error());
                        while ($addrow = mysqli_fetch_array($addresult)) {
                            $addvendor = "select v.profile_image,v.c_name,v.b_type,v.v_likes,v.isdel,v.c_city,v.status,v.vendor_id,c.cityName from vendor_details v,city c where v.b_type = '" . $addrow['categoryId'] . "' and c.cityId = v.c_city and v.status = '1' and v.isdel = 1 order by v.vendor_id desc limit 5";
                            $addresultven = mysqli_query($mysqli, $addvendor) or die(mysqli_error());
                            ?>
                            <div class="vendor-list">
                                <h2><i class="phone-icon pull-left graphers"><img src="images/<?php echo $addrow['image_icon'] ?>" ></i>
                                    <span><?php echo $addrow['categoryName']; ?></span>
                                </h2>
                                <div class="col-md-12 fln owl-carousel_new pd0" id="owlCarouselWithArrows">
                                    <?php
                                    while ($addrowven = mysqli_fetch_array($addresultven)) {
                                        $title = $addrowven['c_name'];
                                        $string = slug($title);
                                        $tu_id = $addrowven['vendor_id'];
                                        $cate = $addrow['categoryId'];
                                         $catname = $addrow['categoryName'];    
                                        ?>
                                        <div class="studio studio1 item">
                                            <div class="bor"> 
                                                <?php
                                                if ($addrowven['profile_image'] == '') {
                                                    ?>
                                                <a href="<?php echo ROOT_PATH; ?>vendor-profile/<?php echo $tu_id . '/' . $string; ?> "><img src="images/company-logo_new.jpg" alt="wedding specials"></a>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="<?php echo ROOT_PATH; ?>vendor-profile/<?php echo $tu_id . '/' . $string; ?> "><img src="images/<?php echo $addrowven['profile_image']; ?>" alt="wedding specials"></a>

                                                    <?php
                                                }
                                                ?>
                                                <div class="border">
                                                    <h3 class="monts">
                                                        <a href="<?php echo ROOT_PATH; ?>vendor-profile/<?php echo $tu_id . '/' . $string; ?> "> <?php company_echo($addrowven['c_name'], 17); ?></h3></a>
                                                    <p></p>
                                                    <div class="now"> 
                                                        <span><a id="getaID" class="getaID" href="<?php // echo $id1 = $addrowven['vendor_id']; ?>"   data-aid = "<?php echo $id1 = $addrowven['vendor_id'];?>" data-toggle="modal" role="button" data-target="#myModal1">Message</a></span> </div>
                                                </div>
                                                <form  name="loacalvendor1" method="post">
                                                    <div class="dislike col-sm-12 pd0 mt10"> 
                                                        <input type="hidden" name="vendor_id" value='<?php echo $addrowven['vendor_id']; ?> '/>
                                                        <ul>
                                                            <li><a onclick="doSomething(<?php echo $addrowven['vendor_id']; ?>);" name="post_id"><span class="heart" id="likes_new_<?php echo $addrowven['vendor_id']; ?>" ><?php echo $addrowven['v_likes'] ?></span> </a> </li>
                                                            <li><span>
                                                                    <?php custom_echo($addrow['categoryName'], 15); ?>
                                                                </span></li>
                                                            <li><span class="ny">
                                                                    <?php custom_echo($addrowven['cityName'], 2); ?>
                                                                </span></li>
                                                        </ul>
                                                    </div>
                                                </form>
                                                </form>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="more_vendor_link text-center">
                                    <div class="arrow">
                                        <div class="owl-carousel-arrows">
                                            <a class="prev" href="#"><i class="fa fa-chevron-left"></i></a>
                                        </div>
                                    </div>
                                    <div class="more_vendor">
                                        <span class="more_vendor_bg"><a href="morecategories.php?cat_id=<?php echo $addrow['categoryId']; ?>" class="more-deals">MORE <?php echo $addrow['categoryName'] ?></a> </span>
                                      <!--<span class="more_vendor_bg"><a href="<?php // echo ROOT_PATH; ?>morecategories/<?php // echo $cate.'/'.$catname; ?> " class="more-deals">MORE <?php // echo $addrow['categoryName'] ?></a> </span>-->
                                    </div>
                                    <div class="arrow">
                                        <div class="owl-carousel-arrows">
                                            <a class="next" href="#"><i class="fa fa-chevron-right"></i></a><!--btn btn-primary-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="Retweet container"> <span><strong>Photo credits:</strong> 
                    <a  href="http://clarkwalkerstudio.com" target="_blank">Clark + Walker Studio, </a> <a href="http://www.linandjirsa.com" target="_blank">Lin & Jirsa Photography</a> </span> </div>

            <?php
            include "footer.php";
            ?>
        </div>
        <div class="container"> 
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Contact this vendor</h4>
                        </div>
                        <div class="modal-body">
                            <div class="views">
                                <form method="post" action="<?php echo ROOT_PATH; ?>enquiry_localvendor" onsubmit="return validatemanageform();">
                                    <input type="hidden" id="aid" name="aid" value="" />
                                    <input type="hidden" id="pageNo" name="pageNo" value="2" />
                                    <div class="form-group mt0">
                                        <label class="mt0"><h4 class="mt0"></h4></label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 pd0">
                                            <label>Name:</label>
                                        </div>
                                        <div class="col-sm-10 pd0">
                                            <input type="text" name="name1"  id="name1"placeholder="Name">
                                            <div id="name1_error" style="display:none;" class="error_msg" ><font color="red"> Please Enter Your Name</font></div>
                                            <div id="name1_error1"  style="display:none;" class="error_msg" ><font color="red"> Please Enter Your Valid Name</font></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 pd0">
                                            <label>Email:</label>
                                        </div>
                                        <div class="col-sm-10 pd0">
                                            <input type="text" name="email" id="txtemail" placeholder="Email">
                                            <div id="txtemail_error"  style="display:none" class="error_msg">Please Enter Email ID</div>
                                            <div id="txtemail_error1" style="display:none;" class="error_msg">Please Enter Your Valid Email ID</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 pd0">
                                            <label>Message:</label> 
                                        </div>
                                        <div class="col-sm-10 pd0">
                                            <textarea rows="4" cols="40" name="contactNo" id="txtcontact" placeholder="Message"></textarea>
                                            <div id="txtcontact_error" style="display:none;"class="error_msg">Please Enter Message</div>
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
        <script type="text/javascript">
                    $(document).ready(function(){
            $('a.getaID').click(function(){
            var status_id = $(this).attr('href');
                    $('#aid').val(status_id);
            });
            });
                    $('.owl-carousel_new').owlCarousel({
            loop:true,
                    margin:10,
                    responsiveClass:true,
                    responsive:{
                    0:{
                    items:2,
                            nav:true
                    },
                            600:{
                            items:3,
                                    nav:false
                            },
                            1000:{
                            items:5,
                                    nav:true,
                                    loop:false
                            }
                    1200:{
                    items:5,
                            nav:true,
                            loop:false
                    }
                    }
            })

                    $(document).ready(function() {
            var owl = $("#owlCarouselWithArrows");
                    owl.owlCarousel({
                    items: 3
                    });
                    $(".owl-carousel-arrows .next").click(function() {
            owl.trigger('owl.next');
                    event.preventDefault();
            });
                    $(".owl-carousel-arrows .prev").click(function() {

            owl.trigger('owl.prev');
                    event.preventDefault();
            });
            });
        </script>
        <script>
        
        $('#myModal1').on('show.bs.modal', function(e) {
           
            var anid = $(e.relatedTarget).data('aid')
            
            var modal = $(this)

            modal.find('#aid').val(anid)
            
        });
    </script>
    </body>
</html>
