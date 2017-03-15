<?php 
     $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
     // $mysqli = mysqli_connect('localhost', 'livemysi_xaaza', 'n8viiA(liqof', 'livemysi_xaaza'); 
     
    if(isset($_POST['video']))
    {//button for Upload                        
        $target = "./category_video/"; //folder where to save the uploaded file/video
        $target = $target . basename( $_FILES['uploaded']['name']) ; //gets the name of the upload file
        $ok=1; 
        if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
        {
            $query =mysqli_query( "INSERT INTO video(videofile) VALUES ('$target')");//insertion to database
            $result = mysqli_insert_id($query);
 
            echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
        } 
        else 
        {
            echo "Sorry, there was a problem uploading your file.";
        }
    }
     header("location: registration3.php");
    
    exit();
?>