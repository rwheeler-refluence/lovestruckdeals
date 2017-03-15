
<?php

 $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
 if(isset($_POST['btnlike1']))
     
 {
     $ad = $_POST['advertise_id'];
     
     
     $query = "insert into likes(advertise_id)values ('$ad')";
     echo $query;
     $result5 = $mysqli->query($query);
     
//     $query3 = "SELECT count (like_id) as row  FROM likes where advertise_id =$ad";
//     
//     $result2 = $mysqli->query($query3);
//     
//      $row=$result2->fetch_array(); 
//       
//      $id= $row["row"];
//      header("location: local-vendors.php?id=$id");
//     exit();
     
     
 }
  
?>