<?php
require_once('../../config/connect.php');

$catid = $_POST['catid'];
$img = $_FILES['file_photo'];
$srcImg = '';

$typeFIle = substr($img['name'], strrpos($img['name'], '.') + 1);

$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);

unlink('../../' . $categoryitem['SRC']);

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

mysqli_query($ConnectDatabase, "UPDATE `category` SET 
    `SRC` = '$srcImg'  WHERE `category`.`ID` = $catid");

require_once('../../config/category.php');

$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);

?>
<div id="mainPhotoCat" class="block-img">
    <img src="../<?= $categoryitem['SRC'] ?>" alt="">
</div>