<!-- Rahul add indexind.php -->
<?php
    include './config.php';
    $aid = $_POST['add_id'];   
    $sessionid=$_GET['sessionid'];
   
    
    $que = "select likes,sessionid from advertisement where advertise_id='" . $aid . "'";
    $result = $mysqli->query($que);
    $lik = mysqli_fetch_array($result);
    
    if($sessionid!=$lik['sessionid'])
    {
        $likes_new = $lik['0'];
        $likes = $likes_new + 1;
        //print_r($likes_new) ; die;
        $sql = "update advertisement set likes='" . $likes . "' ,sessionid='".$sessionid."' where advertise_id='" . $aid . "'";
        $mysqli->query($sql);
        echo $likes;
        die; 
               
    }
    else
    { 
        //$sessionidnull='';
        $likes_new = $lik['0'];
        $likes = $likes_new +0;
        //print_r($likes_new) ; die;
        $sql = "update advertisement set likes='" . $likes . "' ,sessionid='".$sessionid."' where advertise_id='" . $aid . "'";
        $mysqli->query($sql);
        echo $likes;
        die; 
    }   
    
?>