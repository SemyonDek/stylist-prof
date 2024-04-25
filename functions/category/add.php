<?php
require_once('../../config/connect.php');

$name = $_POST['namecat'];
if (isset($_POST['catid'])) {
    $catid = $_POST['catid'];
} else {
    $catid = 0;
}

$img = $_FILES['file_photo'];
$srcImg = '';

$typeFIle = substr($img['name'], strrpos($img['name'], '.') + 1);

$prov = True;
while ($prov) {
    $fileName = uniqid() . '.' . $typeFIle;
    $fileUrl = '../../img/category/' . $fileName;
    $srcImg = 'img/category/' . $fileName;

    if (!file_exists($fileUrl)) {
        move_uploaded_file($img['tmp_name'], $fileUrl);

        $prov = False;
    }
}

mysqli_query($ConnectDatabase, "INSERT INTO `category` (`ID`, `PARENT`, `NAME`, `SRC`) VALUES (NULL, '$catid', '$name', '$srcImg')");

require_once('../../config/category.php');

?>

<select name="catid" id="catid">
    <?php
    // addSelect($category);
    ?>
</select>