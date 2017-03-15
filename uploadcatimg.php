<?php
if (isset($_POST['submit'])) {
    

     if (isset($_POST['uploadFile1'])) {

        
        $imageData = mysql_real_escape_string(file_get_contents($_FILES['uploadFile']['tmp_name']));
        $imageType = mysql_real_escape_string($_FILES['uploadFile']['type']);
        $imgInfo = getimagesize($_FILES['uploadFile']['name']);

       
        
     }
}

       $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');

      $pimg=$_FILES['uploadFile1']['name'];
      $pimg1=$_FILES['uploadFile2']['name'];
      $pimg2=$_FILES['uploadFile3']['name'];
      
    
      
       $qry = "insert into vendor_gallery_image (vendor_id,gallery_Img,addDate) values ('1','$pimg',now())";
       
       $result = mysqli_query($mysqli, $qry) or die(mysqli_error());
       
       $qry1 = "insert into vendor_gallery_image (vendor_id,gallery_Img,addDate) values ('1','$pimg1',now())";
       $result = mysqli_query($mysqli, $qry1) or die(mysqli_error());
       
       $qry2 = "insert into vendor_gallery_image (vendor_id,gallery_Img,addDate) values ('1','$pimg2',now())";
       $result = mysqli_query($mysqli, $qry2) or die(mysqli_error());
    
	//$showonh=$_POST['check'];
	
	//File Uplaoding
	
	$targetpath="category_images/";
	
	//$targetpath="images/";
		
	$targetpath=$targetpath.basename($_FILES['uploadFile1']['name']);
	move_uploaded_file($_FILES['uploadFile1']['tmp_name'],$targetpath);
        
        $targetpath=$targetpath.basename($_FILES['uploadFile2']['name']);
	move_uploaded_file($_FILES['uploadFile2']['tmp_name'],$targetpath);
        
        $targetpath=$targetpath.basename($_FILES['uploadFile3']['name']);
	move_uploaded_file($_FILES['uploadFile3']['tmp_name'],$targetpath);
        
        
        header("Location: registration3.php");

?>