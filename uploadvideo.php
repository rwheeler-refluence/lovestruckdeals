<?php
if (isset($_POST['submit'])) {
    

     if (isset($_POST['uploadFile2'])) {

        
        $imageData = mysql_real_escape_string(file_get_contents($_FILES['uploadFile4']['tmp_name']));
        $imageType = mysql_real_escape_string($_FILES['uploadFile4']['type']);
        $imgInfo = getimagesize($_FILES['uploadFile4']['name']);

       
        
     }
}

                ini_set('upload_max_filesize', '20M');
		ini_set('post_max_size', '20M');
		ini_set('max_input_time', 300);
		ini_set('max_execution_time', 300);


       $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');

      $pimg=$_FILES['uploadFile4']['name'];
     
    
      
       $qry = "insert into video (videofile,videoAddDate,vendor_id) values ('$pimg',now(),'1')";
       
       $result = mysqli_query($mysqli, $qry) or die(mysqli_error());
       
      
    
	//$showonh=$_POST['check'];
	
	//File Uplaoding
	
	$targetpath="category_video/";
	
	//$targetpath="images/";
		
	$targetpath=$targetpath.basename($_FILES['uploadFile4']['name']);
	move_uploaded_file($_FILES['uploadFile4']['tmp_name'],$targetpath);
        
       
        
        
        header("Location: registration3.php");

?>


     
		  $mname=$_POST['mname'];
		  $subid=$_POST['state'];
		  $mtype=$_POST['materialtype'];
        $video=$_FILES['vid']['name'];
        $type=$_FILES['vid']['type'];
        $size=$_FILES['vid']['size'];
        $tempname=$_FILES['vid']['tmp_name'];
        $dir="videos/".$video;
        move_uploaded_file($tempname,"$dir");
		$stu="select * from teacher where Email='$email'";
					$rs2=mysql_query($stu) or die("query error 2");
					$blurb = mysql_fetch_array($rs2) or die(mysql_error());
					$writeby = $blurb[0];
						       
							$d= getDate();
							$c = $d["mday"]."-" . $d["month"] . "-" .$d["year"];
							
		$insert=mysql_query("insert into material(`Material_Name`,`Subject_Id`,`Material_Type`,`Material`,`T_Id`,`Creat_Date`) values ('$mname','$subid','$mtype','$video','$writeby','$c')")or die(mysql_error());