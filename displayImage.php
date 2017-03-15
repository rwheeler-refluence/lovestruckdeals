<?php
//include "header.php";
include "config.php";

 $sql = "SELECT * FROM photogalleryimage";
 $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
while ($row = mysqli_fetch_array($result)) 
                                        
{?>
<h1><?php echo $res1['photogalleryImgId']; ?></h1>
<img src="uploads/<?php echo $row['photogalleryImgName']; ?>" width="200" height="200">

<?Php    
}

//include "footer.php";
?>


