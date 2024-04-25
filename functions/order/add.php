<?php
require_once('../../config/connect.php');
session_start();

if (isset($_SESSION['accountId'])) {
    $idUser = $_SESSION['accountId'];
} else {
    $idUser = 0;
}

$nameUser = $_POST['name_user'];
$commUser = $_POST['comm_user'];
$mailUser = $_POST['mail_user'];
$numberUser = $_POST['number_user'];


$value = $_SESSION['countBasket'];
$sale = $_SESSION['SALE'];
$amount = $_SESSION['basketSum'];

mysqli_query($ConnectDatabase, "INSERT INTO `orders` 
    (`ID`, `USERID`, `VALUE`, `SALE`, `AMOUNT`, `NAME`, `COMM`, `EMAIL`, `NUMBER`, `STATUS`) VALUES 
    (NULL, '$idUser', '$value', '$sale', '$amount', '$nameUser', '$commUser', '$mailUser', '$numberUser', '1')");

$idOrder = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `orders`");
$idOrder = mysqli_fetch_all($idOrder);
$idOrder = $idOrder[0][0];

foreach ($_SESSION['basket'] as $item) {

    $prodid = $item['ID'];
    $productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
    $productitem = mysqli_fetch_assoc($productitem);

    $value = $item['VALUE'];
    $nameProd = $productitem['NAME'];
    $price = $productitem['PRICE'];
    $amountProd = $item['AMOUNT'];

    mysqli_query($ConnectDatabase, "INSERT INTO `order_item` 
    (`ID`, `ORDERID`, `NAME`, `PRICE`, `VALUE`, `AMOUNT`) VALUES 
    (NULL, '$idOrder', '$nameProd', '$price', $value, '$amountProd')");
}

unset($_SESSION['basket']);
unset($_SESSION['basketSum']);
unset($_SESSION['SALE']);
unset($_SESSION['countBasket']);
