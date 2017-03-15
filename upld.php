<?php 
 include 'config.php';
 
 if (isset($_POST['submit'])) {
              
                    
                    $image = imagecreatefromstring(file_get_contents($_FILES["image"]["name"]));
                      $exif = exif_read_data($_FILES["image"]["name"]);
                       if(!empty($exif['Orientation'])) {
                           switch($exif['Orientation']) {
                               case 8:
                                   $image = imagerotate($image,90,0);
                                   $tmp_name = $_FILES["image"]["tmp_name"];
                                   $name = rand(1000, 100000) . "-" . $_FILES["image"]["name"];
                                    move_uploaded_file($tmp_name, "images/$name");
                                                      $sql3 = "INSERT INTO vendor_gallery_images(gallery_Img)VALUES('" . $image . "')";
                                                      echo "query".$sql3;
                                                      $result3 = mysqli_query($mysqli, $sql3);
                                                      //print_r($result3);
                                   exit;
                                   break;
                               case 3:
                                   $image = imagerotate($image,180,0);
                                   $tmp_name = $_FILES["image"]["tmp_name"];
                                   $name = rand(1000, 100000) . "-" . $_FILES["image"]["name"];
                                    move_uploaded_file($tmp_name, "images/$name");
                                                      $sql3 = "INSERT INTO vendor_gallery_images(gallery_Img)VALUES('" . $image . "')";
                                                          echo "query".$sql3;
                                                      $result3 = mysqli_query($mysqli, $sql3);
                                                             //  print_r($result3);
                                   exit;
                                   break;
                               case 6:
                                   $image = imagerotate($image,-90,0);
                                   $tmp_name = $_FILES["image"]["tmp_name"];
                                  $name = rand(1000, 100000) . "-" . $_FILES["image"]["name"];
                                                move_uploaded_file($tmp_name, "images/$name");
                                $sql3 = "INSERT INTO vendor_gallery_images(gallery_Img)VALUES('" . $image . "')";
                                   echo "query".$sql3;
                                $result3 = mysqli_query($mysqli, $sql3);
                               // print_r($result3);
                                   exit;
                                   break;
                           }
                       }

              
           
 }
?>
   <form name="ff" action="" enctype="multipart/form-data" method="post" >

                               
              <div class="business-detail">
                   <div class="col-sm-12 col-xs-12 pdzro mt30">
                <div class="col-sm-3 col-xs-6 upload2" >                   
                    <div class="upload-img"  id="imagePreview1"  > 
                        <div id="plus-sign">
                            <input type="file" id="uploadFile1" name="image" accept="image/x-png, image/gif, image/jpeg">
                        </div>
                        <span class="mt10">Upload image</span>
                        <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a> 
                    </div>
                </div>
                                           
                                                                                                        
                 
       
        <!--                        <input type="submit" name="submit" id="submit" value="submit" > -->
                                                        <div class="progress-demo mt20">
                                                            <div class="form-group">
                                                                <input  type="submit"  name="submit" id="submit" data-color="mint" data-style="expand-right" data-size="l">
                                                           
                                                            </div>
                                                        </div>

                                    </div>  
                                                        </form>
            </form>
            <?php
                $sql1 = "SELECT *  FROM vendor_gallery_images ORDER BY vendorProfileId desc limit 3 ";
        
        $result1 = mysqli_query($mysqli, $sql1) or die(mysqli_error());
        while ($row = mysqli_fetch_array($result1)) {
       ?>
            <div class="bor">
                                        <div class="packagelist">
                                            <div class="col">
                                                  <img src="images/<?php echo $row['gallery_Img']; ?>" heigth="250" width="250" />
                                            </div>
                                       
                                        </div>  
                                                                   
                                    </div>
                     <?php }?>                     