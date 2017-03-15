<?php
include "config.php";
$catid = $_POST['cat'];
?>
<link rel="stylesheet" type="text/css" href=" <?php echo ROOT_PATH; ?>css/bs_leftnavi.css">
<script src="<?php echo ROOT_PATH; ?>js/bs_leftnavi.js"></script>
<div name="fliterID" class="col-lg-12 pd0 filter-data" id="filter">
    <div class="filter-by">  
        <h4 class="gw-menu-text">Filter By</h4> 
        <div class="mfilter"></div>
        <div class="filteroverlay"></div>
        <div class="gw-sidebar mt40">
            <div id="gw-sidebar" class="gw-sidebar">
                <div class="nano-content">                          
                    <ul class="gw-nav gw-nav-list">      
                        <li class="init-arrow-down">
                            <a href="javascript:void(0)"> <span class="gw-menu-text">Type </span>
                                <b class="gw-arrow icon-arrow-up8"></b> 
                            </a>
                            <ul class="gw-submenu" style="display:none;">
<?php
$result = mysqli_query($mysqli, "SELECT filterid,type FROM filter WHERE isdel='1' and categoryId=$catid");
$row_cnt = mysqli_num_rows($result);
if ($row_cnt > 0) {
    $sql2 = "SELECT filterid,type FROM filter WHERE isdel='1' and categoryId=$catid";
    $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error());
    while ($row = mysqli_fetch_array($result2)) {
        $sub_cat_id = $row['filterid'];
        $sub_cat_name = $row['type'];

        ?>
                                        <li class="init-arrow-down"><a onclick="filtercategory(<?php echo $sub_cat_id;
                                echo $count; ?>);"  name="post_id" ><span class="gw-menu-text" id="likes_new_<?php echo $sub_cat_name; ?>" ><?php echo $sub_cat_name; ?> </span> <b class="gw-arrow icon-arrow-up8"></b> </a> </li>
                                        <!-- <li class="init-arrow-down"> <a href="javascript:void(0)" name="fliterid1" value="<?php //$sub_cat_id = $row['filterid']; ?>"> <span class="gw-menu-text" id="fliterID" ><?php //echo $sub_cat_name; ?> </span> <b class="gw-arrow icon-arrow-up8"></b> </a> </li>-->
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <li class="init-arrow-down"><span class="gw-menu-text"> No Filter found for this Category</span> <b class="gw-arrow icon-arrow-up8"></b> </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>