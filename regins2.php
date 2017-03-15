

<?php

include './config.php';

$path = $_SERVER['SERVER_NAME'];

//print_r($_POST);exit;

 ini_set('max_file_uploads', "50");

if (isset($_POST['submit'])) {



    $passkey = $_POST['vid'];

    $sqlvendert = "select vendor_id from vendor_details where confirm_code='" . $passkey . "'";

    $result = mysqli_query($mysqli, $sqlvendert) or die(mysqli_error());

    $row = mysqli_fetch_array($result);

    $id = $row['vendor_id'];

    ini_set('memory_limit', '-1');

    $image = imagecreatefromstring(file_get_contents($_FILES['image']['tmp_name']));

    $exif = exif_read_data($_FILES['image']['tmp_name']);

    if (!empty($exif['Orientation'])) {

        switch ($exif['Orientation']) {

            case 8:

                ini_set('memory_limit', '-1');

                $image = imagerotate($image, 90, 0);

                break;

            case 3:

                ini_set('memory_limit', '-1');

                $image = imagerotate($image, 180, 0);

                break;

            case 6:

                ini_set('memory_limit', '-1');

                $image = imagerotate($image, -90, 0);

                break;

        }

        imagejpeg($image, $_FILES['image']['tmp_name']);

    }



    $target_path1 = "images/";

    $imgname = rand(1000, 100000) . "-" . $_FILES['image']['name'];

    $target_path = $target_path1 . $imgname;

    move_uploaded_file($_FILES['image']['tmp_name'], $target_path);







    //New code insert on livemysite done by Abhishek Mishra on 7th jan 2015//



    $targetpath_chat_base = "chat/mibew/files/avatar/";

    $targetpath_chat = $targetpath_chat_base . basename($image);



    move_uploaded_file($_FILES['image']['tmp_name'], $targetpath_chat);



    copy($targetpath_chat, $targetpath1);





    //New code insert on livemysite done by Abhishek Mishra on 7th jan 2015//

    //move_uploaded_file($_FILES['image']['tmp_name'], $targetpath_chat);

    $image_name_chat = "files/avatar/" . $image;



    $sql4 = "UPDATE caoperator set vcavatar ='" . $image_name_chat . "' where vendor_id ='" . $id . "'";

    // print_r($sql3);exit;

    $result4 = mysqli_query($mysqli, $sql4);

    //New code insert on livemysite done by Abhishek Mishra//

    //$targetpath = "http://$path/xaaza/venderimage/";       

    //$image =rand(1000,100000)."-".$_FILES['image']['name'];  

    //$image =$_FILES['fileUpload']['name'];





    $instagram = $_POST['instagram'];

    $facebook = $_POST['facebook'];

    $twitter = $_POST['twitter'];

    $pinterest = $_POST['pinterest'];

    $description1 = $_POST['masesges'];
    $description =preg_replace('/[^a-zA-Z0-9_%\[\]\.\(\)%&-]/s',' ',$description1);



    $defaultImage = $_POST['DefaultImage'];



    if ($_POST['DefaultImage'] != "" && $_FILES['image']['name'] == "") {

        $sql3 = "UPDATE vendor_details set profile_image ='" . $defaultImage . "',instagram ='" . $instagram . "',facebook ='" . $facebook . "',twitter = '" . $twitter . "',pinterest= '" . $pinterest . "',b_description ='" . $description . "',is_complete=2 where confirm_code='" . $passkey . "'";

        $result3 = mysqli_query($mysqli, $sql3);

    } elseif($_FILES['image']['name']!="")

    {

        $sql3 = "UPDATE vendor_details set profile_image ='" . $imgname . "',instagram ='" . $instagram . "',facebook ='" . $facebook . "',twitter = '" . $twitter . "',pinterest= '" . $pinterest . "',b_description ='" . $description . "',is_complete=2 where confirm_code='" . $passkey . "'";

        // print_r($sql3);exit;

        $result3 = mysqli_query($mysqli, $sql3);

         

    }





    // image upload 

    foreach ($_FILES["image1"]["error"] as $key => $error) {

        if ($error == UPLOAD_ERR_OK) {

            $venId = $_POST['venderid'];

            $dt2 = date("Y-m-d H:i:s");

            ini_set('memory_limit', '-1');

            $image = imagecreatefromstring(file_get_contents($_FILES['image1']['tmp_name'][$key]));

                    $exif = exif_read_data($_FILES['image1']['tmp_name'][$key]);

                    if (!empty($exif['Orientation'])) {

                        switch ($exif['Orientation']) {

                            case 8:

                                 ini_set('memory_limit', '-1');

                                $image = imagerotate($image, 90, 0);

                                break;

                            case 3:

                                 ini_set('memory_limit', '-1');

                                $image = imagerotate($image, 180, 0);

                                break;

                            case 6:

                                 ini_set('memory_limit', '-1');

                                $image = imagerotate($image, -90, 0);

                                break;

                        }

                        imagejpeg($image, $_FILES['image1']['tmp_name'][$key]);

                    }

                    $target_path1 = "./images/";

                    $imgname = rand(1000, 100000) . "-" . $_FILES['image1']['name'][$key];

                    $target_path = $target_path1 . $imgname;

                    move_uploaded_file($_FILES['image1']['tmp_name'][$key], $target_path);

                    $sql3 = "INSERT INTO vendor_gallery_images(vendor_id,gallery_Img,addDate)VALUES('" . $id . "','" . $imgname . "','" . $dt2 . "')";

                    $result3 = mysqli_query($mysqli, $sql3);

        }

    }





    //    print_r($_POST);  

    // exit;



    $status = strval($_POST['vstatus']);

    if ($status == '0') {

        $vstatus1 = "1";

        $vtype = "vimeo";

        $ystatus1 = "0";

        $ytype = "youtube";

    } else {

        $vstatus1 = "0";

        $vtype = "vimeo";

        $ystatus1 = "1";

        $ytype = "youtube";

    }



    $video = $_POST['yurl'];

    $video1 = $_POST['vurl'];

    //$video2 = explode('vimeo.com/channels/staffpicks/',$video1);

    $video2 = explode('vimeo.com/', $video1);

    $vurl = $video2['1'];





    $video8 = explode('=', $video);

    $yurl = $video8['1'];



    $queryVideo = "INSERT INTO video(vurl,vvideoType,vstatus,yurl,yvideoType,ystatus,vendor_id)VALUES('" . $vurl . "','" . $vtype . "','" . $vstatus1 . "','" . $yurl . "','" . $ytype . "','" . $ystatus1 . "','" . $id . "')";



    $result3 = $mysqli->query($queryVideo);

    ?>



    <SCRIPT LANGUAGE='JavaScript'>

        var passkey = '<?php echo $passkey; ?>';

        window.location.href = 'registration3?completed=3&passkey=' + passkey;

    </SCRIPT> 

    <?php

    exit();

}

?>

