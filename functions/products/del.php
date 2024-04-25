<?php

require_once('../../config/connect.php');

$prodid = $_POST['prodid'];

$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE PRODID = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);

foreach ($productPhoto as $item) {
    unlink('../../' . $item['SRC']);
}

mysqli_query($ConnectDatabase, "DELETE FROM products_img WHERE `products_img`.`PRODID` = $prodid");

mysqli_query($ConnectDatabase, "DELETE FROM `products_profitable` WHERE `products_profitable`.`PRODID` = $prodid");

mysqli_query($ConnectDatabase, "DELETE FROM `products_popular` WHERE `products_popular`.`PRODID` = $prodid");

mysqli_query($ConnectDatabase, "DELETE FROM `products` WHERE `products`.`ID` = $prodid");

mysqli_query($ConnectDatabase, "DELETE FROM `review` WHERE `review`.`PRODID` = $prodid");

require_once('../../config/product.php');
?>

<div id="product-list-block" class="grid-catalog-block">

    <?php
    addProdListAdmin($products, $photos);
    ?>

</div>