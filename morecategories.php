<?php
session_start();



$sessionid = session_id();



include "header.php";


include './urlseo.php';
include './config.php';



include './validation_enquiryform.php';



$cat_id = $_GET['cat_id'];

// Display Company name

function company_echo($x, $length) {

    if (strlen($x) <= $length) {

        echo $x;
    } else {

        $y = substr($x, 0, $length) . '';

        echo $y . " ...";
        ;
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
<!--<link rel="stylesheet" type="text/css" href="css/bs_leftnavi.css">
<script src="js/bs_leftnavi.js"></script>-->
<style>
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
</style>

<!-- <script type="text/javascript">            



 // searche to state Name.......       



 $(document).ready(function(){



    $("#search-box1").keyup(function()



        {       



           // debugger;



                $.ajax({



                type: "POST",



                url: "stateSearches.php",



                data:'state='+$(this).val(),



                beforeSend: function(){



                        $("#search-box1").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");



                },



                success: function(data){



                        $("#suggesstion-box1").show();



                        $("#suggesstion-box1").html(data);



                        $("#search-box1").css("background","#FFF");



                }



                });



        });



    });



     



    function selectState(val) 



    {                 



        $("#search-box1").val(val);



        $("#suggesstion-box1").hide();



    }







 // searche to city Name.......   



    $(document).ready(function()



    {



        $("#search-box").keyup(function()



        {       



                var stateID=$('#search-box1').val();



                var cityID=$('#search-box').val();



                $.ajax({



                type: "POST",



                url: "citySearches.php",



                data:{'city':cityID,'stateID':stateID},



                beforeSend: function(){



                        $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");



                },



                success: function(data){



                        $("#suggesstion-box").show();



                        $("#suggesstion-box").html(data);



                        $("#search-box").css("background","#FFF");



                }



                });



        });



    });







    function selectCountry(val) 



    {        



        $("#search-box").val(val);



        $("#suggesstion-box").hide();



    }



 </script>-->

<script>

    function getCitySearches(val)

    {

        //debugger;

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











    $(document).ready(function () {



//        document.getElementById('txtAddress').setAttribute('autocomplete', 'off');        



//        //googel autosearch textbox



//        function initialize() {



//            /*



//             var options = {



//             componentRestrictions: { country: "in" }



//             };*/



//



//            var txtAddress = document.getElementById('txtAddress');



//            var autocomplete = new google.maps.places.Autocomplete(txtAddress);          



//        }



//        google.maps.event.addDomListener(window, 'load', initialize);



//        //end google autosearch textbox



//        











        $("#SearchForm").on('submit', (function (e) {



//debugger;



            e.preventDefault();



            $.ajax({
                url: "searchvendoremore",
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











        }));























    });



    //end txtAddress blur



</script>
<script type="text/javascript">



    function doSomething(add_id)



    {



        //  debugger;



        var a = $('#item1 span').text();



        var sessionid = '<?php echo $sessionid; ?>';



        $.ajax({
            type: "POST",
            url: 'vendors_likes?sessionid=' + sessionid,
            data: {'add_id': add_id},
            success: function (resp)



            {



                //alert(resp);



                $("#likes_new_" + add_id).html(resp);



            }



        });











//        $.ajax({



//                type: "POST",



//                url: 'searchvendoremore.php',



//                data: {'add_id': add_id},



//                    success: function (resp) 



//                    {



//                      $("#grid").html(resp);



//                    }



//                });        











    }







    function filtercategory(add_id, catid)



    {











        $.ajax({
            type: "POST",
            url: 'searchvendoremore',
            data: {'add_id': add_id, 'hdnid': catid},
            success: function (resp) {



                $("#grid").html(resp);



            }



        });



    }











    $(document).ready(function (e) {



















    });



</script>

<div class="wrapper">
    <div class="container-fluid pd0">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"> </li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active"> <img src="images/local-vendor-ban1.jpg" alt="Chania" width="460" height="345"> </div>
                <div class="item"> <img src="images/local-vendor-ban2.jpg" alt="Chania" width="460" height="345"> </div>
                <div class="item"> <img src="images/local-vendor-ban3.jpg" alt="Flower" width="460" height="345"> </div>
                <div class="item"> <img src="images/local-vendor-ban4.jpg" alt="Flower" width="460" height="345"> </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
        <div class="overlay more_cat mt40">
            <div class="container">
                <h3>find your vendors</h3>
                <form  name="SearchCategory" id="SearchForm" method="post"  action="" >
                    <div class="ban-text text-center">
                        <p>Search vendors and chat with them live</p>
                        <div class="col-sm-10 mt40 m0 pdzero col-sm-push-2">
                            <div class="col-sm-3 col-xs-6 pdzero">
                                <!--                                <div class="loc1"></div>-->

<!--  <input type="text" id="search-box1"name="stateID" placeholder="Enter State" value="<?php echo $state; ?>" />

                <div id="suggesstion-box1"></div>-->

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
                                <!--                                <div class="loc1"></div>-->

<!--<input type="text" id="search-box" name="cityID" placeholder="Enter City" value="<?php echo $city; ?>" />

            <div id="suggesstion-box"></div>     -->

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

                            <!--                               	    <div class="col-lg-4">
              
              
              
                                                                              <div class="categories1"></div>
              
              
              
                                                                                  <select id="basic1" name="cat" class="selectpicker show-tick "  >                                                
              
              
              
                                                                                      <option>All  Catagories</option>
              
              
              
                            <?php
                            $sql = "SELECT * FROM category";



                            $result = mysqli_query($mysqli, $sql) or die(mysqli_error());



                            while ($row = mysqli_fetch_array($result)) {
                                ?>                                                    
                      
                      
                      
                                                                                                      <option value="<?php echo $row['categoryId']; ?>"><?php echo $row['categoryName']; ?></option>                                                                                                    
                      
                      
                      
                                <?php
                            }
                            ?> 
              
              
              
                                                                                  </select>
              
              
              
                                                                          </div>-->

                            <div class="col-lg-2 col-sm-3 col-xs-12 pdzero">
                                <input type="hidden" name="hdnid" value="<?php echo $cat_id; ?>">
                                <input type="submit" name="submit" value="Search" class="btn blu-btn ser-new-btn">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="venders-we">
        <div class="container">
            <div class="col-lg-12">
                <div class="col-lg-3 pdzero">
                    <div class="filter-by mt0 wd100">
                        <h4 class="gw-menu-text">Filter by</h4>
                        <div class="mfilter"></div>
                        <div class="filteroverlay"></div>
                        <div class="gw-sidebar mt40">
                            <div id="gw-sidebar" class="gw-sidebar">
                                <div class="nano-content">
                                    <ul class="gw-nav gw-nav-list">
                                        <li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text">Type </span> <b class="gw-arrow icon-arrow-up8"></b> </a>
                                            <ul class="gw-submenu" style="display: block;" >
                                                <?php
                                                $sql2 = "SELECT filterid,type,categoryId FROM filter WHERE isdel='1'and categoryId=$cat_id";



                                                $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error());







                                                while ($row = mysqli_fetch_array($result2)) {



                                                    $sub_cat_id = $row['filterid'];



                                                    $sub_cat_name = $row['type'];



                                                    $catid = $row['categoryId'];
                                                    ?>
                                                    <li class="init-arrow-down"><a onclick="filtercategory(<?php echo $sub_cat_id; ?>,<?php echo $catid; ?>);"  name="post_id" ><span class="gw-menu-text" id="likes_new_<?php echo $sub_cat_name; ?>" ><?php echo $sub_cat_name; ?> </span> <b class="gw-arrow icon-arrow-up8"></b> </a> </li>

        <!--                                               <li class="init-arrow-down"> <a href="javascript:void(0)" name="fliterid1" value="<?php $sub_cat_id = $row['filterid']; ?>"> <span class="gw-menu-text" id="fliterID" ><?php echo $sub_cat_name; ?> </span> <b class="gw-arrow icon-arrow-up8"></b> </a> </li>-->

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
                <div class="col-lg-9 pd0" id="grid">
                    <?php
//                    $addcat = "SELECT  c.categoryName,c.categoryId,v.fname,v.lname,v.profile_image,v.c_website,v.b_description,v.c_name,v.b_type,v.c_telephone,v.c_telephone1,v.c_telephone2,v.c_website,v.c_address1,v.c_address2,v.c_city,v.c_postalcode,v.c_regionstate FROM vendor_details v,category c WHERE v.b_type = c.categoryId";



                    $addcat = "select * from  category where isdel = 0 and categoryId = '" . $cat_id . "'";



                    $addresult = mysqli_query($mysqli, $addcat) or die(mysqli_error());



                    while ($addrow = mysqli_fetch_array($addresult)) {



//                       



                        $addvendor = "select v.profile_image,v.fname,v.c_name,v.b_type,v.v_likes,v.c_city,v.vendor_id,ca.categoryId,ca.categoryName,v.isdel,c.cityName



                                    from  vendor_details v ,category ca,city c



                                    where v.b_type = ca.categoryId and v.status = '1' and v.b_type ='" . $cat_id . "' and v.isdel = 1 and c.cityId = v.c_city order by vendor_id desc ";



                        $addresultven = mysqli_query($mysqli, $addvendor) or die(mysqli_error());
                        ?>
                        <h2><i class="cat_icon"><img src="images/<?php echo $addrow['image_icon'] ?>" ></i><span><?php echo $addrow['categoryName']; ?></span></h2>
                        <?php
                        while ($addrowven = mysqli_fetch_array($addresultven)) {
                            $title = $addrowven['c_name'];
                            $string = slug($title);
                            $tu_id = $addrowven['vendor_id'];
                            ?> 
                            <div class="studio">
                                <div class="bor"> <?php
                            if ($addrowven['profile_image'] == '') {
                                ?>
                                        <a href="<?php echo ROOT_PATH; ?>vendor-profile/<?php echo $tu_id . '/' . $string; ?> "><img src="images/company-logo_new.jpg"></a>

                                        <?php
                                    } else {
                                        ?>
                                        <a href="<?php echo ROOT_PATH; ?>vendor-profile/<?php echo $tu_id . '/' . $string; ?> "><img src="images/<?php echo $addrowven['profile_image']; ?>"></a>

                                        <?php
                                    }
                                    ?>
                                            <!--<a href="  <?php // echo ROOT_PATH;  ?>vendor-profile/<?php // echo $tu_id.'/'.$string;  ?> "><img src="images/<?php // echo $addrowven['profile_image'];  ?>"></a>-->
                                            <?php /* <a href="vendor-profile?id=<?php echo $addrowven['vendor_id']; ?>"><img src="images/<?php echo $addrowven['profile_image']; ?>"></a> */ ?>
                                    <div class="border">
                                        <h3 class="monts"><a href="  <?php echo ROOT_PATH; ?>vendor-profile/<?php echo $tu_id . '/' . $string; ?> "> <?php company_echo($addrowven['c_name'], 17); ?></a>
        <?php /* <a href="vendor-profile?id=<?php echo $addrowven['vendor_id']; ?>"><?php company_echo($addrowven['c_name'], 16); ?> */  ?>
                                            </a></h3>
                                        <div class="now"> 

                <!--                                               <span><a href="chatnow?id=<?php // echo $addrowven['vendor_id'];  ?>" target="_blank">Message</a></span>--> 

                                            <span><a id="getaID" class="getaID" href="<?php echo $id1 = $addrowven['vendor_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Message</a></span> </div>
                                    </div>
                                    <form  name="loacalvendor1" method="post">
                                        <div class="dislike mt10">
                                            <input type="hidden" name="vendor_id" value='<?php echo $addrowven['vendor_id']; ?> '/>
                                            <ul>
                                                <li><a onclick="doSomething(<?php echo $addrowven['vendor_id']; ?>);"  name="post_id"> <span class="heart" id="likes_new_<?php echo $addrowven['vendor_id']; ?>" ><?php echo $addrowven['v_likes'] ?></span> </a> </li>
                                                <li> <span>
                                                        <?php custom_echo($addrow['categoryName'], 15); ?>
                                                    </span></li>
                                                <li><span class="ny">
        <?php custom_echo($addrowven['cityName'], 2); ?>
                                                    </span></li>

                <!--<li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->

                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
    <?php } ?>

                        <!--                <div class="more-Cate">
              
              
              
                                                      <a href="categorydetails.php?cat_id=<?php // echo $categoryid;    ?>">More photographers<span class="glyphicon glyphicon-arrow-right"></span></a></div>
              
              
              
                                               
              
              
              
                                                   <div class="pull-right"><a href="morecategories.php" class="more-deals">More <?php // echo $addrow['categoryName']  ?></a></div>-->

                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!----End local-vendors --->

    <div class="clearfix"></div>

    <!---- Retweet-deals --->

    <?php
    include "footer.php";
    ?>
</div>

<!--Model Of Enquriy From -->

<div class="container"> 

    <!--            </span><a  class="join button" data-toggle="modal" role="button" data-target="#myModal1" >Message</a></span>--> 

    <!-- Modal -->

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Contact this vendor</h4>
                </div>
                <div class="modal-body">
                    <div class="views">
                        <form method="post" action="enquiry_localvendor" onsubmit="return validatemanageform();">
                            <input type="hidden" id="pageNo" name="pageNo" value="2" />
                            <input type="hidden" id="aid" name="aid" value="" />
                            <div class="form-group">
                                <label>
                                    <h4></h4>
                                </label>
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
                                    <div id="txtemail_error" style="display:none;"class="error_msg">Please Enter Email ID</div>
                                    <div id="txtemail_error1" style="display:none;"class="error_msg">Please Enter Your Valid Email ID</div>
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

<!--Model Of Enquriy From --> 

<script>



    $(document).ready(function () {



        $('a.getaID').click(function () {



            var status_id = $(this).attr('href');



            $('#aid').val(status_id);



        });



    });



</script> 
