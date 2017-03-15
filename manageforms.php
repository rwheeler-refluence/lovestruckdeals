<?php         
include './config.php';
include './webadmin/sidebar.php';


?>
                  <section>

            <div class="views">
                <h3><font color="#19b5bc">Add information</h3></font><br>
                <form action="export1.php" method="post" name="export_excel">
                                            <div class="control-group btn-group ">
                                                <div class="controls">
                                                        <button type="submit" id="export" name="export" class="btn btn-primary button-loading green" data-loading-text="Loading...">Export File</button>
                                                </div>
                                            </div>
                                        </form><br>


                <?php

//                    $form = "SELECT n.newsletterformId,n.name,n.email,n.contactno,n.categoryId,c.categoryId,c.categoryName from category c ,newsletterform n where c.categoryId = n.categoryId ";
                    $form="SELECT name,
group_concat(categoryId SEPARATOR ',') AS Category_Interested
FROM newsletterform
GROUP BY name";
                  
                    $sr_no = 1;
                    $addresult = mysqli_query($mysqli, $form) or die(mysqli_error());


                ?>
                <table class='table table-striped table-hover table-bordered' id='data' border="1">
                    <thead>
                        <tr>
                            <th>
                                Sr no.
                            </th>
                            <th>
                                Name
                            </th>
                             <th>
                               Email
                            </th>
                            <th>
                                Contact no
                            </th>

                            <th>
                                category Name
                            </th>

                        </tr>
                    </thead>
                    <?php
                        while ($addrow = mysqli_fetch_array($addresult)) 
                        {
                    ?>
                            <tbody>
                            <tr>
                                <td><?php echo $sr_no++; ?> </td>
                                <td><?php echo $addrow['name']; ?></td>
                                <td><?php echo $addrow['email']; ?></td>
                                <td><?php echo $addrow['contactno']; ?></td>
                                <td><?php echo $addrow['categoryName']; ?></td>

                            </tr>
                            </tbody>
                    <?php
                        }  
                    ?>
                </table>
            </div>
        </section>


