<?php
session_start();

require_once('../../config/coupon.php');

$couponCode = $_POST['coupon'];

$prov = true;

if (isset($_SESSION['basketSum'])) {
    foreach ($coupon as $item) {
        $code = $item['CODE'];
        $sale = $item['SALE'];
        if ($couponCode == $item['CODE']) {
            $_SESSION['SALE'] = $item['SALE'];
            $prov = false;
            break;
        }
    }
}

if ($prov) {
    $_SESSION['SALE'] = 0;
}

$sum = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $sum += $value['AMOUNT'];
}
$_SESSION['basketSum'] = $sum;

$_SESSION['basketSum'] = $_SESSION['basketSum'] - ($_SESSION['basketSum'] * ($_SESSION['SALE'] / 100));

?>
<p class="title-basket-text">
    В корзине
    <?php

    if (isset($_SESSION['basket']) && $_SESSION['basket'] !== [] && isset($_SESSION['countBasket']) && $_SESSION['countBasket'] > 0) {
    ?>
        <span id="count-products-basket"><?= $_SESSION['countBasket'] ?></span>
    <?php
    } else {
    ?>
        <span id="count-products-basket">0</span>

    <?php
    }
    ?>
    товара на сумму
    <?php

    if (isset($_SESSION['basket']) && $_SESSION['basket'] !== [] && isset($_SESSION['basketSum']) && $_SESSION['basketSum'] > 0) {
    ?>
        <span id="amount-products-basket"><?= $_SESSION['basketSum'] ?></span>
    <?php
    } else {
    ?>
        <span id="amount-products-basket">0</span>

    <?php
    }
    ?>
    <span class="price-rouble"></span>
    co скидкой
    <?php

    if (isset($_SESSION['basket']) && $_SESSION['basket'] !== [] && isset($_SESSION['SALE']) && $_SESSION['SALE'] > 0) {
    ?>
        <span id="sale-value"><?= $_SESSION['SALE'] ?>%</span>
    <?php
    } else {
    ?>
        <span id="sale-value">0%</span>

    <?php
    }
    ?>
</p>