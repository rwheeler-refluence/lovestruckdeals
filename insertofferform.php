    <?php
    include '../config.php';   
  
            if(isset($_POST['submit']))
            {  
                    $name = $_POST['name1'];
                    $email = $_POST['email'];
                    $contactno = $_POST['contactno'];
                    $categoryname = $_POST['catname'];
                    $intrested = $_POST['Inerested'];
//                   echo $intrested; exit();
                    
                    $query = "insert into newsletterform(name,email,contactno,category,interested) values('".$name ."','".$email."','".$contactno."','".$categoryname ."','".$intrested."')";
                 
                    $result = mysqli_query($mysqli, $query);
                    
                    
            }
            
                    if($query)
                {
                   
                ?>                   
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
	      window.alert('1 Record Added!!!')
		   window.location.href='manageform.php'
		   </SCRIPT>");
                 
                     <?php
                }
                else
                {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
	       window.alert('Error Record not Added!!!')
		   window.location.href='adddeals.php'
		   </SCRIPT>");
                }                                    
                             
                
              
       ?>
