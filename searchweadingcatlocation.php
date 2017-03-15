<?php
        include './config.php';        
        $cat_id=$_POST['cat'];       
        $address=$_POST['txtAddress'];
        
        $val = explode(",", $address);
        $city = $val[0];
        $state = $val[1];
        
        $s1 = trim($state, " ");          
        $qrystate="select sid,sname from state where sname='".$s1."' ";      
        $resultstate= mysqli_query($mysqli, $qrystate);    
        $rowstate=  mysqli_fetch_array($resultstate);    
        $statename=$rowstate['sname'];
        $stateid=$rowstate['sid'];   

        $c1 = trim($city, " "); 
        $qrycity="select cityId,cityName from city where cityName='".$c1."' ";
        $resultcity=  mysqli_query($mysqli, $qrycity);
        $rowcity=  mysqli_fetch_array($resultcity);
        $cityid=$rowcity['cityId'];
        $cityname=$rowcity['cityName'];
        
        $sqlcategoryname="select categoryName from category where categoryId='".$cat_id."'";
        $resultcategoryname=  mysqli_query($mysqli, $sqlcategoryname);
        $rowcategoryname=  mysqli_fetch_array($resultcategoryname);   
?>

<div class="venue">
    <div class="col-lg-10">
        <h2 class="monts mt15">Wedding <?php echo strtolower($rowcategoryname['categoryName']); ?> near <span><?php echo $cityname; ?> , <?php echo $statename; ?></span></h2>                			 
<!--        <p class="sprite" id="cat">Categories</p>                     -->
    </div>

    <div class="col-lg-2 pull-right pd0">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 pd0">
            <div class="venue-right photo">
                <a href="searchindexcategorylocation.php?address=<?php echo $address; ?>&cate=<?php echo $cat_id; ?>&stateid=<?php echo $stateid; ?>&cityid=<?php echo $cityid; ?>"><p>Photo</p></a>
            </div>
        </div>

        <div class="col-lg-4 pd0">
            <div class="venue-right list">
                <a href="searchindexcategorylocationlist.php?address=<?php echo $address; ?>&cate=<?php echo $cat_id; ?>&stateid=<?php echo $stateid; ?>&cityid=<?php echo $cityid; ?>"><p>List</p></a>
<!--                <a href="searchindexcategorylocationlist.php?catid=<?php //echo $cat_id; ?>&statid=<?php //echo $stateid; ?>&cityid=<?php //echo $cityid; ?>&address=<?php //echo $address; ?>"><p>List</p></a>-->
            </div>
        </div>
        <!--<div class="col-lg-4 pd0"><div class="venue-right map"><a href="#"><p>Map</p></a></div></div>-->
    </div>
</div>