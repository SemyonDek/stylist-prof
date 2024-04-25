<?php
require_once('config/connect.php');
require_once('config/order-item.php');
$orderid = $_GET['orderid'];
$order = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE ID = '$orderid'");
$order = mysqli_fetch_assoc($order);

$orderItems = mysqli_query($ConnectDatabase, "SELECT * FROM `order_item` WHERE ORDERID = '$orderid'");
$orderItems = mysqli_fetch_all($orderItems, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aдминская панель</title>
    <link rel="stylesheet" href="css/coupon.css">
    <link rel="stylesheet" href="css/product-card.css">
    <link rel="stylesheet" href="css/order-item-adm.css">
    <link rel="stylesheet" href="css/orders-adm.css">

</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="content">
                <h1>Заказ №<?= $orderid ?></h1>
                <div class="block-order">
                    <div class="product-block">
                        <h2>Товары</h2>
                        <table class="table-prod">
                            <thead>
                                <tr>
                                    <td class="name-prod">Название</td>
                                    <td class="price-prod">Цена</td>
                                    <td class="value-prod">Кол-во</td>
                                    <td class="amount-prod">Сумма</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                addOrderItemList($orderItems);
                                ?>
                            </tbody>
                        </table>
                        <div class="bottom-order">
                            <div class="sale-block">Скидка: <?= $order['SALE'] ?>%</div>
                            <div class="amount-price">Итого <?= number_format($order['AMOUNT'], 0, '.', ' ') . ' ' ?> ₽</div>
                        </div>
                    </div>
                    <div class="info-block">
                        <h2>Информация</h2>
                        <div class="info-line">
                            <div class="name-info">ФИО:</div>
                            <div class="value-info"><?= $order['NAME'] ?></div>
                        </div>
                        <div class="info-line">
                            <div class="name-info">Телефон:</div>
                            <div class="value-info"><?= $order['NUMBER'] ?></div>
                        </div>
                        <div class="info-line">
                            <div class="name-info">Email:</div>
                            <div class="value-info"><?= $order['EMAIL'] ?></div>
                        </div>
                        <div class="info-line">
                            <div class="name-info">Комментарий:</div>
                            <div class="value-info"><?= $order['COMM'] ?></div>
                        </div>
                        <div class="info-line">
                            <div class="name-info">Состояние:</div>
                            <div class="value-info">
                                <?php if ($order['STATUS'] == 1) echo 'В обработке' ?>
                                <?php if ($order['STATUS'] == 2) echo 'В доставке' ?>
                                <?php if ($order['STATUS'] == 2) echo 'Доставлен' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-upd-block">
                    <a class="upd-button" href="account.php">Назад</a>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>

</body>

</html>