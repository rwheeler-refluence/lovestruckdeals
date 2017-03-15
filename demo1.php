<?php
        //image croping in fix size


/*
 * PHP function to resize an image maintaining aspect ratio
 * http://salman-w.blogspot.com/2008/10/resize-images-using-phpgd-library.html
 *
 * Creates a resized (e.g. thumbnail, small, medium, large)
 * version of an image file and saves it as another file
 */

define('THUMBNAIL_IMAGE_MAX_WIDTH', 385);
define('THUMBNAIL_IMAGE_MAX_HEIGHT', 542);

if (isset($_POST['submit']))
{
function generate_image_thumbnail($source_image_path, $thumbnail_image_path)
{
    list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
    switch ($source_image_type) {
        case IMAGETYPE_GIF:
            $source_gd_image = imagecreatefromgif($source_image_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gd_image = imagecreatefromjpeg($source_image_path);
            break;
        case IMAGETYPE_PNG:
            $source_gd_image = imagecreatefrompng($source_image_path);
            break;
    }
    if ($source_gd_image === false) {
        return false;
    }
    $source_aspect_ratio = $source_image_width / $source_image_height;
    $thumbnail_aspect_ratio = THUMBNAIL_IMAGE_MAX_WIDTH / THUMBNAIL_IMAGE_MAX_HEIGHT;
    if ($source_image_width <= THUMBNAIL_IMAGE_MAX_WIDTH && $source_image_height <= THUMBNAIL_IMAGE_MAX_HEIGHT) {
        $thumbnail_image_width = $source_image_width;
        $thumbnail_image_height = $source_image_height;
    } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
        $thumbnail_image_width = (int) (THUMBNAIL_IMAGE_MAX_HEIGHT * $source_aspect_ratio);
        $thumbnail_image_height = THUMBNAIL_IMAGE_MAX_HEIGHT;
    } else {
        $thumbnail_image_width = THUMBNAIL_IMAGE_MAX_WIDTH;
        $thumbnail_image_height = (int) (THUMBNAIL_IMAGE_MAX_WIDTH / $source_aspect_ratio);
    }
    $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
    imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
    imagejpeg($thumbnail_gd_image, $thumbnail_image_path, 90);
    imagedestroy($source_gd_image);
    imagedestroy($thumbnail_gd_image);
    return true;
}

/*
 * Uploaded file processing function
 */

define('UPLOADED_IMAGE_DESTINATION', './images/');
define('THUMBNAIL_IMAGE_DESTINATION', './thumbnails/');

function process_image_upload($field)
{
    $temp_image_path = $_FILES[$field]['tmp_name'];
    $temp_image_name = $_FILES[$field]['name'];
    list(, , $temp_image_type) = getimagesize($temp_image_path);
    if ($temp_image_type === NULL) {
        return false;
    }
    switch ($temp_image_type) {
        case IMAGETYPE_GIF:
            break;
        case IMAGETYPE_JPEG:
            break;
        case IMAGETYPE_PNG:
            break;
        default:
            return false;
    }
    $uploaded_image_path = UPLOADED_IMAGE_DESTINATION . $temp_image_name;
    move_uploaded_file($temp_image_path, $uploaded_image_path);
    $thumbnail_image_path = THUMBNAIL_IMAGE_DESTINATION . preg_replace('{\\.[^\\.]+$}', '.jpg', $temp_image_name);
    $result = generate_image_thumbnail($uploaded_image_path, $thumbnail_image_path);
    return $result ? array($uploaded_image_path, $thumbnail_image_path) : false;
}

/*
 * Here is how to call the function(s)
 */

$result = process_image_upload('Image1');
if ($result === false) {
    echo '<br>An error occurred while processing upload';
} else {
    echo '<br>Uploaded image saved as ' . $result[0];
    echo '<br>Thumbnail image saved as ' . $result[1];
}

}
?>


<form action="" method="post" enctype="multipart/form-data">
    Upload an image for processing<br>
    <input type="file" name="Image1"><br>
    <input type="submit" name="submit" value="submit">
</form>