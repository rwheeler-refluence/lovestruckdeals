<?php
@session_start();
if (empty($_SESSION["name"])) 
    {
        require_once("index.php");
    } 
    else 
    {
        include './vendor_sidebar.php';
        include './config.php';      
        if(!empty($_SESSION['name']))
        {                 
            $sessionSql="select * from vendor_details where vendor_id='".$_SESSION['vendor_id']."'";  
            $sessionQuery=  mysqli_query($mysqli,$sessionSql);
            $sessRow=  mysqli_fetch_array($sessionQuery);   
            
?>
<section>
	<?php
        $id=$_REQUEST['Display'];
 
       $sql="SELECT C.categoryName,V.vendorProfileId,V.gallery_Img,V.addDate,V.status  FROM vendor_gallery_images V INNER JOIN category C ON V.categoryId = C.categoryId where vendorProfileId = '".$id."' ";


     $query=  mysqli_query($mysqli,$sql);
     $row=  mysqli_fetch_array($query); ?>
     
    <div class="views">
			<div class="view_deal">
                <table >
               
                <tr>
                    <td><span>ADD Date:</span><?php echo $row['addDate'] ?></td>
                </tr>
                <tr>
                    <td><span>Category Name : </span><?php echo $row['categoryName'] ?></td>
                </tr>
               
                <tr>
                    <td><span>Status:</span><?php echo $row['status'] ?></td>
                </tr>
                <tr>
                    <td><span>Picture : </span><img src="../images/<?php echo $row['gallery_Img']; ?>" width="110" height="90"></td>
                </tr>
                
            </table>
    
    		</div>
    </div>
</section>    
<?php
 }
    }

 ?>
 


























