<?php
require_once('../../config/connect.php');
session_start();

$idProd = $_POST['idProd'];
$value = $_POST['value'];
$itemProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE `ID`='$idProd'");
$itemProd = mysqli_fetch_assoc($itemProd);
$price = $itemProd['PRICE'];
$amount = $value * $price;

$prod = [];
$prod['ID'] = $idProd;
$prod['VALUE'] = $value;
$prod['PRICE'] = $price;
$prod['AMOUNT'] = $amount;

if (isset($_SESSION['basket']) && $_SESSION['basket'] !== [] && $_SESSION['basket'] !== '') {
    $basket = $_SESSION['basket'];
} else $basket = [];

$prov = true;
foreach ($basket as $key => $item) {
    if ($item['ID'] == $prod['ID']) {
        $basket[$key]['VALUE'] += $prod['VALUE'];
        $basket[$key]['AMOUNT'] = $prod['PRICE'] * $basket[$key]['VALUE'];
        $prov = false;
        break;
    }
}
if ($prov) array_push($basket, $prod);

$_SESSION['basket'] = $basket;


$sum = 0;
$countBasket = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $countBasket += $value['VALUE'];
    $sum += $value['AMOUNT'];
}


if (!isset($_SESSION['SALE'])) {
    $_SESSION['SALE'] = 0;
}

$_SESSION['basketSum'] = $sum;

$_SESSION['basketSum'] = $_SESSION['basketSum'] - ($_SESSION['basketSum'] * ($_SESSION['SALE'] / 100));
$_SESSION['countBasket'] = $countBasket;

?>
<span id="basket-count"><?= $_SESSION['countBasket'] ?></span>