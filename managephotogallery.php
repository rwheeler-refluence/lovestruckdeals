<!-- Rahul -->
<?php
@session_start();
if (empty($_SESSION["name"])) {
    require_once("index.php");
} else {
    include './vendor_sidebar.php';
    include ('config.php');
    $id = $_GET['id'];

    if (!empty($_SESSION['name'])) {
        $s = $_SESSION['name'];
        $sql = "SELECT * FROM vendor_details where vendor_id='" . $_SESSION['vendor_id'] . "'";
        $addresult1 = mysqli_query($mysqli, $sql) or die(mysqli_error());
        $vendor_details = mysqli_fetch_array($addresult1);
        $vid = $_SESSION['vendor_id'];
        ?>
        <script type="text/javascript">
            $(function () {
                $(".files_id").on("change", function ()
                {
                    alert("Abhi");
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader)
                        return; // no file selected, or no FileReader support

                    if (/^image/.test(files[0].type)) { // only image file
                        var reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(files[0]); // read the local file

                        reader.onloadend = function () { // set image data as background of div
                            $("#imagePreview").css("background-image", "url(" + this.result + ")");
                        }
                    }
                });
            });
        </script>




        <section>  

            <div class="mang_detail">                 
                <h2> Manage Photo Gallery</h2> 
                <div class="add_btn">
                    <a href="addphotogallery.php">
                        <button type="button">Add Photo Gallery</button>
                    </a>
                </div>

        <?php
        $sql1 = "SELECT C.categoryName,V.vendorProfileId,V.gallery_Img,V.addDate,V.status  FROM vendor_gallery_images V INNER JOIN category C ON V.categoryId = C.categoryId where vendor_id='" . $_SESSION['vendor_id'] . "' ";

        $result1 = mysqli_query($mysqli, $sql1) or die(mysqli_error());
        while ($row = mysqli_fetch_array($result1)) {

            $vprofileid = $row['vendorProfileId'];

            $status = $row['status'];
            ?>


                    <div class="views">
                        <div class="col-lg-3">
                            <div class="photo_gallery">
                                <div id="imagePreview">
                                    <img src="../images/<?php echo $row['gallery_Img']; ?>" />
                                    <h> <?php echo $row['categoryName']; ?></h>
                                </div>
                                <div class="jm-item-description" style="display:block">
                                    <div class="jm-item-button">
                                       <a href="viewphotogallery.php?Display=<?php echo $row['vendorProfileId']; ?>" class="btn-view">

                                            <span class="glyphicon glyphicon-eye-open">View</span>
                                        </a>
                                    </div>
                                    <div class="jm-item-button">
                                        <a href="deletegallery.php?Delete=<?php echo $row['vendorProfileId'];?>" class="btn-delete">
                                            <span class="glyphicon glyphicon-remove">Delete </span>
                                        </a>
                                    </div>
                                    <div class="jm-item-button">
                                        <a href="editphotogallery.php?Edit=<?php echo $row['vendorProfileId'];?>" class="btn-edit">
                                            <span class="glyphicon glyphicon-remove">Edit </span>
                                        </a>
                                    </div>
                                    <div class="jm-item-button"><a href="#">
                                            <span class="glyphicon glyphicon-sort">Inactive</span>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="imagePreview"></div>
                                    <input class="files_id" type="file" name="image" class="img" />
                                 <!--<input type="file" value="uploadFile" name="uploadFile"/>--> 
                                </div>
                            </div>
                        </div>
                    </div>
        <?php } ?>
            </div>

        </section>
        </body>
        </html>    
        <?php
    }
}
?>
<!--endRahul-->
