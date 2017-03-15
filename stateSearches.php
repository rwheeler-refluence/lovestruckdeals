<?php
include "config.php";
if(!empty($_POST["state"]))
{
    $qry ="SELECT sname from state where sname like'".$_POST["state"]."%' ORDER BY sname LIMIT 0,6";
    $addresult = mysqli_query($mysqli, $qry) or die(mysqli_error());
    if(!empty($addresult))
    {?>
        <ul id="country-list">
        <?php
       while ($addrow = mysqli_fetch_array($addresult)) 
            {
        ?>
            <li onClick="selectState('<?php echo $addrow["sname"]; ?>');"><?php echo $addrow["sname"]; ?></li>
        <?php } ?>
        </ul>
   <?php }
}


