<?php

require_once('../../config/connect.php');

$idPhoto = $_POST['idPhoto'];

$photoitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE ID = '$idPhoto'");
$photoitem = mysqli_fetch_assoc($photoitem);

$prodid = $photoitem['PRODID'];

unlink('../../' . $photoitem['SRC']);

mysqli_query($ConnectDatabase, "DELETE FROM products_img WHERE `products_img`.`ID` = $idPhoto");

require_once('../../config/product-photo.php');
$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE PRODID = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);
?>

<div id="PhotoBlock" class="photo-prod-block">
    <?php
    addProdPhotoAdmin($productPhoto);
    ?>
</div>