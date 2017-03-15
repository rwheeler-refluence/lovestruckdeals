<?php
include 'config.php';
ini_set('max_file_uploads', "50");

if (isset($_POST['submit']))
     {
 $errors=array();
 $image=$_FILES['image']['name'];
 $file_tmp=$_FILES['image']['tmp_name'];
 }
 if(empty($image))
 {
  $errors[]="please enter all fields";
  
  }
  if(empty($errors))
  {
   move_uploaded_file($file_tmp,'uploads/'.$image).'<br>';
   $errors[]="<font color='green'><b> Image Uploaded.</b></font><br><br><br>";
   
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


$sql = "INSERT INTO vendor_details(feature_name,feature_descript,status,feature_image)
VALUES('$_POST[feature_name]','$_POST[feature_descript]','$_POST[status]','".$_FILES['image']['name']."')";

if (mysql_query($sql,$query))
  { 
  echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Form Succussfully Submitted!!!')
     window.location.href='product_view.php'
     </SCRIPT>");
  }
  else
  {
  echo "error";
  }  

?>