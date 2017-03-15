<?php
    include './config.php' ;
            if(isset($_POST['submit']))
            {  
                // value insert into data--------------
                            
                             $name = $_POST['name1'];
                             $email = $_POST['email'];

                             $querynews = "insert into newsletterform(name,email)values('".$name ."','".$email."')";
                             $resultnews = mysqli_query($mysqli,$querynews) or die("query error");  
                             echo $querynews; 
                             //$result = mysql_query($sql);
                             
                        
           }
              if($querynews)
                {
                ?>                   
                    <SCRIPT LANGUAGE='JavaScript'>
	      window.alert('1 Record Added!!!')
		   window.location.href='index.php'		   
                     </SCRIPT>                  
                     <SCRIPT LANGUAGE='JavaScript'>
	      window.alert('1 Record Added!!!')
		   window.location.href='index.php'

                     <?php
                }
                else
                { ?> 
                  <SCRIPT LANGUAGE='JavaScript'>
	       window.alert('Error Record not Added!!!')
		   window.location.href='index.php'
		   </SCRIPT>-->
                    <?php
             }                                    
       ?>