<?php
session_start();

$id = $_POST['id'];
unset($_SESSION['basket'][$id]);

$sum = 0;
$countBasket = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $countBasket += $value['VALUE'];
    $sum += $value['AMOUNT'];
}

$_SESSION['basketSum'] = $sum;
$_SESSION['countBasket'] = $countBasket;

require_once('../../config/basket.php');
?>

<table>
    <thead>
        <tr>
            <td class="product">Наименование</td>
            <td class="price">Цена</td>
            <td class="value">Количество</td>
            <td class="amount">Сумма</td>
            <td class="del"></td>
        </tr>
    </thead>
    <tbody id="basket-tbody"><?php
                                if (isset($_SESSION['basket']) && $_SESSION['basket'] !== []) {
                                    addBasket($_SESSION['basket'], $products, $photos);
                                }
                                ?></tbody>
</table>

<span id="basket-count"><?= $_SESSION['countBasket'] ?></span>

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
</p>