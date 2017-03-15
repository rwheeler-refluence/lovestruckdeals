<?php 

    include './config.php';
    
    $vid=$_POST['add_id'];
    $sessionid=$_GET['sessionid'];
    
           
    $que="select v_likes,sessionid from vendor_details where vendor_id='".$vid."'";          
    $result = mysqli_query($mysqli,$que);
    $lik = mysqli_fetch_array($result);
   
    
    if($sessionid!=$lik['sessionid'])
    {       
        $likes_new = $lik['0'];
        $likes = $likes_new + 1;
        //print_r($likes_new) ; die;
        $sql="update vendor_details set v_likes='".$likes."',sessionid='".$sessionid."' where vendor_id='".$vid."'";
        mysqli_query($mysqli,$sql);
        echo $likes;
        die; 
    }
    else
    {               
        $likes_new = $lik['0'];
        $likes = $likes_new + 0;
        //print_r($likes_new) ; die;
        $sql="update vendor_details set v_likes='".$likes."',sessionid='".$sessionid."' where vendor_id='".$vid."'";
        mysqli_query($mysqli,$sql);
        echo $likes;
        die;
        
    }    
    ?>