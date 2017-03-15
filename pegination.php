<html>
    <header>
        
        
        
    </header>
    
    <body>
<table id="myTable1" border="1">  
                                            <thead>  
                                              <tr>
                                                <th>Sender</th>
                                                <th>Subject</th>
                                                
                                                <th>Action</th>
                                            </tr>  
                                            </thead>  
                                            <?php
                                            $sql = "select * from tblUser u, tblMessage m where m.ReceiverID=u.UserID and ComDeleteSend=0 and m.UserID='$UserID'";
                                            $query = mysql_query($sql);
                                            while ($result = mysql_fetch_array($query)) {
                                                ?>
                                            <tr>
                                                <td><?php echo $result['UserEmail'] ?></td>
                                                <td><?php echo $result['Message'] ?></td>
                                                <td><div class="btn btn-info"><a href="ViewSendMessage.php?SendMessageID=<?php echo $result['MessageID'] ?>">View</a></div>
                                                    <div class="delete btn"><a href="ReadRecord.php?deletePosterSent=<?php echo $result['MessageID'] ?>" onclick="return confirm('Are you sure you want to Delete Record?');">Delete</a></div>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                                ?>
                                            </table>
        <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
       
         <script>
$(document).ready(function(){
    $('#myTable1').dataTable();
});
</script>
    </body>
 </html>