<?php
require_once('../../config/connect.php');

$catid = $_POST['catidprod'];
$name = $_POST['nameprod'];
$code = $_POST['codeprod'];
$price = $_POST['priceprod'];
$brand = $_POST['brandprod'];
$country = $_POST['countryprod'];
$desc = $_POST['descprod'];

mysqli_query($ConnectDatabase, "INSERT INTO `products` 
(`ID`, `CATID`, `NAME`, `CODE`, `PRICE`, `BRAND`, `PRODUCER`, `TEXT`) VALUES 
(NULL, '$catid', '$name', '$code', '$price', '$brand', '$country',  '$desc')");

$idProd = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `products`");
$idProd = mysqli_fetch_all($idProd);
$idProd = $idProd[0][0];

echo $idProd;
