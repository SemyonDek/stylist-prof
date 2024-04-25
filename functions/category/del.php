<?php

require_once('../../config/connect.php');

$catid = $_POST['catid'];

$categoryList = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE PARENT = '$catid'");
$categoryList = mysqli_fetch_assoc($categoryList);

$productsList = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE CATID = '$catid'");
$productsList = mysqli_fetch_assoc($productsList);

if (!isset($productsList)) {
    if (!isset($categoryList)) {
        $categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
        $categoryitem = mysqli_fetch_assoc($categoryitem);

        unlink('../../' . $categoryitem['SRC']);

        mysqli_query($ConnectDatabase, "DELETE FROM category WHERE `category`.`ID` = $catid");
    } else {
        echo 'В категорию входят другие категории';
    }
} else {
    echo 'В категории есть товары';
}
