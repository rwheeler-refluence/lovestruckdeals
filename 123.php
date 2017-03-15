<?php
include "header.php";
include 'config.php';

$id=$_GET['cat_id'];

?>
     <div class="container-fluid pd0">

 	<div class="overlay mt40">
    	<div class="container">
		    <h3>find your vendors</h3>
                    <form  name="SearchCategory" id="SearchForm" method="post"  action="searchcategory.php" >
                        
       		 <div class="ban-text text-center">
                                <p>Search vendors and chat with them live</p>
                  
                                <div class="col-sm-10 mt40 col-sm-push-2">
                                   
                              
                                          <div class="col-lg-4" style="position:relative;">
                                          <div class="loc1"></div>
                                            <select id="basic" class="selectpicker show-tick " >
                                                <option>All Locations</option>
                                                <option>Locations 1</option>
                                                <option>Locations 2</option>
                                                <option>Locations 3</option>
                                             </select>
                                           </div>
                                        
                               	           <div class="col-lg-4">
                                           <div class="categories1"></div>
                                               <select id="basic1" name="cat" class="selectpicker show-tick "  >
                                                
                                                <option>All  Catagories</option>
                                                    <?php  
                                                        $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
                                                         
                                                         
                                                        $sql = "SELECT * FROM category";
                                                        
                                                        $result = mysqli_query($mysqli, $sql) or die(mysqli_error());                                                                                                                                                                   
                                                        
                                                        while ($row = mysqli_fetch_array($result)) 
                                                        {                                                
                                                    ?>
                                                    
                                                    <option value="<?php echo $row['categoryId'];?>"><?php echo $row['categoryName'];?></option>                                                
                                                    
                                                    <?php                                                       
                                                        }
                                                    ?> 
                                               </select>
                                           </div>
                               
                                     <div class="col-lg-2">
                                   <input type="submit" name="search" value="Search" class="btn blu-btn ser-new-btn">
                                    </div>
                                </div>
                          </div>
                    </form>
         </div>
	</div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      
      
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"> </li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
     <!-- <li data-target="#myCarousel" data-slide-to="4"></li>-->
    </ol>

    <!-- Wrapper for slides -->
    <!---->
    <div class="carousel-inner" role="listbox">
    
      <div class="item active">
        <img src="images/local-vendor-ban1.jpg" alt="Chania" width="460" height="345">
      </div>

      <div class="item">
        <img src="images/local-vendor-ban2.jpg" alt="Chania" width="460" height="345">
      </div>
    
      <div class="item">
        <img src="images/local-vendor-ban3.jpg" alt="Flower" width="460" height="345">
      </div>

      <div class="item">
        <img src="images/local-vendor-ban4.jpg" alt="Flower" width="460" height="345">
      </div>    
    </div>
    


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<!---- local-vendors ---> 
<!--<div class="col-lg-12 mt40 ">
	<div class="container">
    	<div class="love bd">
   	    	<img src="images/local-venders-love_03.png">
        </div>
    </div>
</div>-->
<div class="venders-we">
	<div class="container">
            
        <?php
        {
$add = "SELECT categoryId, advertise_img,vendor_name
FROM advertisement 
WHERE a.categoryId = '1'";

 $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
  while ($addrow = mysqli_fetch_array($addresult)) 
  {
                    
                     $vendor_name = $addrow['vendor_name'];
					 $adv_type = $addrow['adv_type'];
            
            
            ?>
            
            
            
            
            
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left home"> </i>venue</h2>
            <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img1.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
               
               
                 <form name="myform1" method="post" action="local-vendors.php">
                      <div class="dislike mt10">
                    <ul>
                            <input type ="hidden" name="advertise_id" value ='<?php echo $addrow['advertise_id'] ?>'/> 
                            <li><input type="submit" name="btnlike1"  style="border:none" value="" class="heart"><?php echo $id;?></span></i> 
                            <?php echo '<li><span>' . $categoryName . '</span></li>'; ?>
                                
                                
                                               
                                               </a></li>
                        <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li><!--<a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a>-->
                    </ul>
                </div>
                 </form>
                
          </div>
       	  <div class="studio">
            	<a href="vendor-profile,html"><img src="images/studio-img2.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
               
                <div class="dislike mt10">
                    
                	<ul>
                            <li><i type="button" class="iconss phone-icon pull-left three" value="like" id="countButton"></i> 

                                                   
                                               
                       <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                    </ul>
                </div>
                
                
          </div>
          <div class="studio">
          		<a href="vendor-profile.html"><img src="images/studio-img3.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
               
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                        <li class="now">
                             <span>
                                <a href="chatnow.html" class="white">Chat Now</a>
                              </span>
                         </li>
                    
                       <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                       </div>
          <div class="studio"> 
                <a href="vendor-profile.html"><img src="images/studio-img4.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
               
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                        <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                       <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio"> 
                <a href="vendor-profile.html"><img src="images/studio-img5.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate"><a href="#">More venues<span class="glyphicon glyphicon-arrow-right"></span></a></div>
        </div>
            <?php
                            }
                        }
                        ?>
            
            
        
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left graphers"> </i>photographers</h2>
            <div class="studio">
            	 <a href="vendor-profile.html"><img src="images/studio-img6.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
       	  <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img7.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img8.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img9.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img10.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate"><a href="#">More photographers<span class="glyphicon glyphicon-arrow-right"></span></a></div>
        </div>
        
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left flowers"> </i>flowers</h2>
            <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                       <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
       	  <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio"> 
          		<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
          		 <a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate">
          	<a href="#">More flowers <span class="glyphicon glyphicon-arrow-right"></span></a>
            </div>
        </div>
        
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left catr"> </i>caterers</h2>
            <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img1.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
       	  <div class="studio">
            	<a href="vendor-profile,html"><img src="images/studio-img2.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
          		<a href="vendor-profile.html"><img src="images/studio-img3.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio"> 
                <a href="vendor-profile.html"><img src="images/studio-img4.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio"> 
                <a href="vendor-profile.html"><img src="images/studio-img5.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate"><a href="#">More caterers<span class="glyphicon glyphicon-arrow-right"></span></a></div>
        </div>
        
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left cak"> </i>cakes and sweets</h2>
            <div class="studio">
            	 <a href="vendor-profile.html"><img src="images/studio-img6.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
       	  <div class="studio">

            	<a href="vendor-profile.html"><img src="images/studio-img7.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img8.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img9.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img10.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate"><a href="#">More cakes and sweets<span class="glyphicon glyphicon-arrow-right"></span></a></div>
        </div>
        
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left cinmgrp"> </i>cinematography</h2>
            <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
       	  <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                         <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio"> 
          		<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
          		 <a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate">
          	<a href="#">More cinematography <span class="glyphicon glyphicon-arrow-right"></span></a>
            </div>
        </div>
        
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left jewl"> </i>jewelry</h2>
            <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img1.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
       	  <div class="studio">
            	<a href="vendor-profile,html"><img src="images/studio-img2.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
          		<a href="vendor-profile.html"><img src="images/studio-img3.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio"> 
                <a href="vendor-profile.html"><img src="images/studio-img4.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio"> 
                <a href="vendor-profile.html"><img src="images/studio-img5.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>  
                        <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate"><a href="#">More jewelry<span class="glyphicon glyphicon-arrow-right"></span></a></div>
        </div>
        
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left dj"> </i>dj</h2>
            <div class="studio">
            	 <a href="vendor-profile.html"><img src="images/studio-img6.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
       	  <div class="studio">

            	<a href="vendor-profile.html"><img src="images/studio-img7.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img8.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                         <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img9.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img10.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li> 
                         <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate"><a href="#">More dj<span class="glyphicon glyphicon-arrow-right"></span></a></div>
        </div>
        
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left fshn"> </i>fashion</h2>
            <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
       	  <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio"> 
          		<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
          		 <a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>  
                        <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate">
          	<a href="#">More fashion <span class="glyphicon glyphicon-arrow-right"></span></a>
            </div>
        </div>
        
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left trav"> </i>travel</h2>
            <div class="studio">
            	 <a href="vendor-profile.html"><img src="images/studio-img6.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
       	  <div class="studio">

            	<a href="vendor-profile.html"><img src="images/studio-img7.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>  
                        <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img8.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img9.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img10.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate"><a href="#">More travel<span class="glyphicon glyphicon-arrow-right"></span></a></div>
        </div>
        
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left limo"> </i>limo</h2>
            <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
       	  <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio"> 
          		<a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                         <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
          		 <a href="vendor-profile.html"><img src="images/studio-img11.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate">
          	<a href="#">More limo <span class="glyphicon glyphicon-arrow-right"></span></a>
            </div>
        </div>
        
        <div class="col-lg-12 pd0 bottom-border">
        <h2><i class="iconss phone-icon pull-left hair"> </i>hair and makeup</h2>
            <div class="studio">
            	 <a href="vendor-profile.html"><img src="images/studio-img6.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
       	  <div class="studio">

            	<a href="vendor-profile.html"><img src="images/studio-img7.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img8.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li> 
                         <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img9.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>  
                        <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          <div class="studio">
            	<a href="vendor-profile.html"><img src="images/studio-img10.jpg"></a>
				<h3 class="monts"><a href="vendor-profile.html">CHRISTIAN OTH STUDIO</a></h3>
                <p>Multiple Locations</p>
                <div class="dislike mt10">
                	<ul>
                    	<li><i class="iconss phone-icon pull-left three"> </i><a href="#">33</a></li>
                          <li class="now">
                             <span>
                                <a href="#" class="white">Chat Now</a>
                              </span>
                         </li>
                        <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                    </ul>
                </div>
                
          </div>
          
          <div class="more-Cate"><a href="#">More hair and makeup<span class="glyphicon glyphicon-arrow-right"></span></a></div>
        </div>
    </div>
</div>

<!----End local-vendors ---> 


  <div class="clearfix"></div>
  
  
<!---- Retweet-deals ---> 

  
       <?php
	   include "footer.php";
	   ?>
