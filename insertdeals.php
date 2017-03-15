<?php
    include './config.php';   
    @session_start();
        if(!empty($_SESSION['name']))
        {
            $s=$_SESSION['name'];
            $sessionSql="select * from vendor_details where vendor_id='".$_SESSION['vendor_id']."'"; 
            $sessionQuery=  mysqli_query($mysqli,$sessionSql);
            $sessRow=  mysqli_fetch_array($sessionQuery);
            $venderID=$sessRow['vendor_id'];           
            if(isset($_POST['submit']))
            {
                $categoryId = $_POST['cat'];        
                $errors=array();
                $image=$_FILES['image']['name'];
                $file_tmp=$_FILES['image']['tmp_name'];
                if(empty($image))
                {
                    $errors[]="please enter all fields";		
		}
                if($_FILES['image']['size'] > 5000000)
                {
                    die('File uploaded exceeds maximum upload size.');
                }
		if(empty($errors))
		{
                    move_uploaded_file($file_tmp,'/var/www/phpdocs/xaazanew/images/'.$image).'<br>';						
                }
		else
		{
                    foreach($errors as $err)
                    {
                        echo "<font color='red'><b>$err</b></font>";
                    }			
		}
		foreach($errors as $err)
		{
                    echo "$err";
		}           
                $vendor_name =$_POST['vendor_name'];
                $adv_type = $_POST['adv_type'];
                $date=$_POST['date'];
                $advExpiryDate= $_POST['advExpiryDate'];     
                $price = $_POST['price'];
                $description = $_POST['description'];
                $sql1 = "INSERT INTO advertisement(categoryId,vendor_id ,advertise_img,description,vendor_name,adv_type,advExpiryDate,price)
                                    VALUES('".$categoryId."','".$venderID."','".$image."','".$description."','".$vendor_name."','".$adv_type."','".$date."','".$price."')";           
                $result12 = mysqli_query($mysqli,$sql1);                
                if($sql1)
                {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('1 Record Added!!!')
		   window.location.href='managedeals.php'
		   </SCRIPT>");
                }
                else
                {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
	       window.alert('Error Record not Added!!!')
		   window.location.href='adddeals.php'
		   </SCRIPT>");
                }     
            }                 
       }
?>