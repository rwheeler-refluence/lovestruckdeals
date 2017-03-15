<?php
session_start();
//Rahul login for vendors
if(isset($_POST['submit']))
include '../config.php';
{
   // $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
  
   
     if($email!=''&& $password!='')
     {
        $sql=$mysqli->query("select * from vendor_details where v_email='".$email."' and v_password='".$password."'") or die(mysql_error());
        $res=mysqli_fetch_row($sql);
      
        
        if($res)
        {
            
            $_SESSION['email']=$email; 
              $_SESSION['hash'] = crypt($_POST['password'], '$2y$08$' . generate_bf_salt($email));

            $str1 = $_SESSION['vendor_id'] = $res[0];
            header("location:dashboard.php");             
            ?>
            <SCRIPT LANGUAGE='JavaScript'>
                window.location.href = 'dashboard.php';
            </SCRIPT>
            <?php
           // header('location:dashboard.php');
           
        }
        else
        {    
            $_SESSION["requrl"]= $_SERVER['REQUEST_URI'];
            ?><script language="javascript">window.location.href='vendor_admin/dashboard.php?email'</script><?php
            //header('location:index.php?msg=1');                      
        }
    }
    else 
    {
         $_SESSION["requrl"]= $_SERVER['REQUEST_URI'];
         ?> <script language="javascript">window.location.href='index.php?verifycode=Login Required'</script> <?php
          //header('location:index.php?msg=1');
    }
}
//Rahul login end
?>