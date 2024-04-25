<?php
require_once('../../config/connect.php');

$prodid = $_POST['prodid'];
$catid = $_POST['catidprod'];
$name = $_POST['nameprod'];
$code = $_POST['codeprod'];
$price = $_POST['priceprod'];
$brand = $_POST['brandprod'];
$country = $_POST['countryprod'];
$desc = $_POST['descprod'];

mysqli_query($ConnectDatabase, "UPDATE `products` SET 
`CATID` = '$catid', `NAME` = '$name', `CODE` = '$code', `PRICE` = '$price', `BRAND` = '$brand', `PRODUCER` = '$country',
`TEXT` = '$desc' WHERE `products`.`ID` = $prodid");


$profitableist = $_POST['profitablelistprod'];

$profitableListItem = mysqli_query($ConnectDatabase, "SELECT * FROM `products_profitable` WHERE PRODID = '$prodid'");
$profitableListItem = mysqli_fetch_assoc($profitableListItem);

if ($profitableist == 1) {
    if (!isset($profitableListItem))
        mysqli_query($ConnectDatabase, "INSERT INTO `products_profitable` (`ID`, `PRODID`) VALUES (NULL, '$prodid')");
} else {
    mysqli_query($ConnectDatabase, "DELETE FROM `products_profitable` WHERE `products_profitable`.`PRODID` = $prodid");
}


$popularlist = $_POST['popularlistprod'];

$popularListItem = mysqli_query($ConnectDatabase, "SELECT * FROM `products_popular` WHERE PRODID = '$prodid'");
$popularListItem = mysqli_fetch_assoc($popularListItem);

if ($popularlist == 1) {
    if (!isset($popularListItem))
        mysqli_query($ConnectDatabase, "INSERT INTO `products_popular` (`ID`, `PRODID`) VALUES (NULL, '$prodid')");
} else {
    mysqli_query($ConnectDatabase, "DELETE FROM `products_popular` WHERE `products_popular`.`PRODID` = $prodid");
}
