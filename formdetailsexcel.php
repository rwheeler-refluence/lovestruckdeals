<?php
   include './config.php';
    
    $mysql = mysql_connect('localhost', 'root', 'tomorrow15', 'xaazaweb'); 
     
 
    $SQL = "SELECT n.newsletterformId,n.name,n.email,n.contactno,n.categoryId,n.interested,c.categoryId,c.categoryName from category c ,newsletterform n where c.categoryId = n.categoryId";
    $header = '';
    $data ='';
   
    $exportData = mysqli_query($mysqli, $SQL) or die ( "Sql error : " . mysqli_error());
    $fields = mysqli_num_fields($exportData );
     
    for ( $i = 0; $i < $fields; $i++ )
    {
        $header .= mysqli_fetch_field( $exportData , $i ) . "\t";
    }
     
    while( $row = mysqli_fetch_row( $exportData ) )
    {
        $line = '';
        foreach( $row as $value )
        {                                            
            if ( ( !isset( $value ) ) || ( $value == "" ) )
            {
                $value = "\t";
            }
            else
            {
                $value = str_replace( '"' , '""' , $value );
                $value = '"' . $value . '"' . "\t";
            }
            $line .= $value;
        }
        $data .= trim( $line ) . "\n";
    }
    $data = str_replace( "\r" , "" , $data );
     
    if ( $data == "" )
    {
        $data = "\nNo Record(s) Found!\n";                        
    }
     
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=codelution-export.xls");
  
print "$header\n$data";

  
    ?>